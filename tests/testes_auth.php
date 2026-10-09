<?php
/**
 * Suite de testes da autenticacao da Plataforma GO.
 *
 * Corre sobre MySQL/MariaDB real. Define a variavel de ambiente PGO_TEST_DB
 * com o nome da base de dados de testes (tem de existir e estar vazia).
 *
 *   mysql -u root -e "CREATE DATABASE gestao_teste CHARACTER SET utf8;"
 *   mysql -u root gestao_teste < "database/gestao.sql"
 *   $env:PGO_TEST_DB="gestao_teste"; php tests/testes_auth.php
 */

$dbRequerida = getenv('PGO_TEST_DB');

if (!$dbRequerida) {
    fwrite(STDERR, "Defina PGO_TEST_DB com o nome da base de dados de testes.\n");
    exit(1);
}

$raiz = __DIR__ . '/..';
$db   = new mysqli('localhost', 'root', '', $dbRequerida);

if ($db->connect_errno) {
    fwrite(STDERR, 'Nao foi possivel ligar a base de dados de testes: ' . $db->connect_error . "\n");
    exit(1);
}

$db->set_charset('utf8');

// config.php le as credenciais do .env. Numa base de dados de testes nao se
// quer criar um .env, por isso definem-se as constantes antes de o carregar.
putenv('DB_SERVER=localhost');
putenv('DB_USERNAME=root');
putenv('DB_PASSWORD=');
putenv('DB_DATABASE=' . $dbRequerida);
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', $dbRequerida);

// ----------------------------------------------------------------------
// Helpers
// ----------------------------------------------------------------------

$GLOBALS['passou'] = 0;
$GLOBALS['falhou'] = 0;

function t($nome, $condicao) {
    if ($condicao) {
        $GLOBALS['passou']++;
        echo "  PASS  $nome\n";
    } else {
        $GLOBALS['falhou']++;
        echo "  FAIL  $nome\n";
    }
}

function secao($titulo) {
    echo "\n-- $titulo --\n";
}

/** Arranca uma sessao limpa, com um utilizador autenticado falso. */
function sessao_limpa() {
    $_SESSION = array();
    auth_limpar_tentativas();
}

// ----------------------------------------------------------------------

$_SERVER['HTTPS'] = 'off';
require $raiz . '/includes/auth.php';
auth_iniciar_sessao();
require $raiz . '/includes/login_check.php';

// ======================================================================
secao('Sessao');
// ======================================================================

t('sessao arrancada', session_status() === PHP_SESSION_ACTIVE);
t('nome da sessao e PGOSESSID', session_name() === 'PGOSESSID');

$params = session_get_cookie_params();
t('cookie HttpOnly', $params['httponly'] === true);
t('cookie SameSite Lax', $params['samesite'] === 'Lax');
t('cookie secure=false sobre http', $params['secure'] === false);
t('chamar auth_iniciar_sessao() duas vezes e seguro', auth_iniciar_sessao() === null);

$_SERVER['HTTPS'] = 'on';
auth_iniciar_sessao();

// ======================================================================
secao('Formato do hash');
// ======================================================================

$h = auth_hash_senha('user2026');
t('formato sha256:<sal>:<hash>', (bool) preg_match('/^sha256:[0-9a-f]{32}:[0-9a-f]{64}$/', $h));
t('tem 104 caracteres', strlen($h) === 104);
t('cabe em varchar(255)', strlen($h) <= 255);
t('2 hashes da mesma senha sao diferentes', auth_hash_senha('user2026') !== auth_hash_senha('user2026'));

$sals = array();
for ($i = 0; $i < 50; $i++) {
    $sals[explode(':', auth_hash_senha('x'))[1]] = true;
}
t('50 salts todos distintos', count($sals) === 50);

// ======================================================================
secao('Verificacao de senha');
// ======================================================================

t('senha correcta aceite', auth_verificar_senha('user2026', $h) === true);
t('senha errada rejeitada', auth_verificar_senha('user2025', $h) === false);
t('hash vazio rejeitado', auth_verificar_senha('user2026', '') === false);
t('hash null rejeitado', auth_verificar_senha('user2026', null) === false);
t('formato invalido rejeitado', auth_verificar_senha('user2026', 'abc') === false);
t('algoritmo desconhecido rejeitado', auth_verificar_senha('user2026', 'bcrypt:a:b') === false);
t('hash truncado rejeitado', auth_verificar_senha('user2026', 'sha256:aaaa:' . str_repeat('0', 63)) === false);

// Os hashes md5 que a versao original guardava tem de ser recusados: a base
// de dados foi recriada, nao ha migracao.
t('md5 antigo "user" rejeitado', auth_verificar_senha('user', 'ee11cbb19052e40b07aac0ca060c23ee') === false);
t('md5 antigo "admin" rejeitado', auth_verificar_senha('admin', '21232f297a57a5a743894a0e4a801fc3') === false);

// ======================================================================
secao('Politica de senha (minimo 8 caracteres)');
// ======================================================================

t('minimo configurado = 8', AUTH_PASSWORD_MIN === 8);
t('7 caracteres rejeitado', auth_validar_senha('1234567') === false);
t('8 caracteres aceite', auth_validar_senha('12345678') === true);
t('vazio rejeitado', auth_validar_senha('') === false);
t('null rejeitado', auth_validar_senha(null) === false);
t('array rejeitado', auth_validar_senha(array()) === false);
t('7 caracteres multibyte rejeitado', auth_validar_senha('aàáâãçé') === false);
t('8 caracteres multibyte aceite', auth_validar_senha('aàáâãäçé') === true);

// ======================================================================
secao('CSRF');
// ======================================================================

$token = auth_csrf_token();
t('token com 64 caracteres hex', (bool) preg_match('/^[0-9a-f]{64}$/', $token));
t('token estavel dentro da sessao', auth_csrf_token() === $token);
t('token valido aceite', auth_csrf_valido($token) === true);
t('token errado rejeitado', auth_csrf_valido(str_repeat('a', 64)) === false);
t('token vazio rejeitado', auth_csrf_valido('') === false);
t('token null rejeitado', auth_csrf_valido(null) === false);
t('token de tipo array rejeitado', auth_csrf_valido(array()) === false);
t('campo oculto inclui o token', strpos(auth_csrf_input(), $token) !== false);

// ======================================================================
secao('Limitacao de tentativas');
// ======================================================================

auth_limpar_tentativas();
t('sem tentativas nao ha bloqueio', auth_bloqueio_restante() === 0);

$resultados = array();
for ($i = 0; $i < 4; $i++) {
    $resultados[] = auth_registar_falha();
}
t('4 falhas ainda nao bloqueiam', $resultados[3] === false);
t('5a falha bloqueia', auth_registar_falha() === true);
t('bloqueio de 60 segundos', auth_bloqueio_restante() === 60);

auth_limpar_tentativas();
t('login bem-sucedido limpa o contador', auth_bloqueio_restante() === 0);

for ($i = 0; $i < 5; $i++) {
    auth_registar_falha();
}
$_SESSION['login_tentativa_em'] = time() - 61;
t('expirado ao fim de 60s volta a permitir', auth_bloqueio_restante() === 0);

$_SESSION['login_tentativas'] = 'sujo';
auth_registar_falha();
t('contador corrompido e recuperado', $_SESSION['login_tentativas'] === 1);

// ======================================================================
secao('Login com a base de dados de testes');
// ======================================================================

sessao_limpa();
t('user / user2026 autentica', sesseos('user', 'user2026') === true);
t('ID_UTILIZADORES = 4', (int) $_SESSION['ID_UTILIZADORES'] === 4);
t('NOME = Utilizador', $_SESSION['NOME'] === 'Utilizador');
t('TIPO = 2', (int) $_SESSION['TIPO'] === 2);
t("ADMIN oculto para o tipo 2", $_SESSION['ADMIN'] === "class='hidden'");
t('ENTRADA_EM registado', !empty($_SESSION['ENTRADA_EM']));

sessao_limpa();
t('admin / admin2026 autentica', sesseos('admin', 'admin2026') === true);
t('TIPO = 1', (int) $_SESSION['TIPO'] === 1);
t('ADMIN vazio para o tipo 1', $_SESSION['ADMIN'] === '');

$tentativas = array(
    'senha errada'              => array('user', 'errada123'),
    'utilizador inexistente'    => array('fantasma', 'user2026'),
    'nome de utilizador vazio'  => array('', 'user2026'),
    'senha vazia'               => array('user', ''),
    'md5 antigo "user"'         => array('user', 'user'),
    'md5 antigo "admin"'        => array('admin', 'admin'),
    'user com a senha do admin' => array('user', 'admin2026'),
    'admin com a senha do user' => array('admin', 'user2026'),
    'injecao OR 1=1'            => array("' OR 1=1 -- ", 'x'),
    'injecao UNION'             => array("' UNION SELECT 1,2,3,4 -- ", 'x'),
    'tautologia na senha'       => array('admin', "x' OR '1'='1"),
);

foreach ($tentativas as $nome => $credenciais) {
    sessao_limpa();
    $entrou = sesseos($credenciais[0], $credenciais[1]);
    t($nome . ' -> rejeitado', $entrou === false);
    t('   e sem sessao iniciada', !isset($_SESSION['ID_UTILIZADORES']));
}

// ======================================================================
secao('Criar e actualizar utilizadores');
// ======================================================================

$_SESSION['ID_UTILIZADORES'] = 5;
$_SESSION['TIPO'] = 1;
$_SERVER['REQUEST_METHOD'] = 'GET';
require $raiz . '/includes/session.php';

$db->query('DELETE FROM utilizadores WHERE USERNAME LIKE "teste%"');

foreach (array('a', 'ab', 'abc', 'abcd', 'abcde', 'abcdef', 'abcdefg') as $senha) {
    auth_limpar_erro();
    $r = insert_utilizadores('T', 'teste' . md5($senha), $senha, 't@t.com', 2);
    t("'" . str_pad($senha, 7) . "' (" . strlen($senha) . ' caracteres) rejeitado', $r === 0 && auth_erro() !== null);
}

foreach (array('12345678', 'abcdefgh', 'uma senha mais longa') as $i => $senha) {
    auth_limpar_erro();
    $r = insert_utilizadores('T', 'teste' . $i, $senha, "t$i@t.com", 2);
    t("'teste$i' com " . strlen($senha) . ' caracteres aceite', $r === 1);
}

auth_limpar_erro();
t('nome vazio rejeitado', insert_utilizadores('', 'x', '12345678', 't@t.com', 2) === 0);
auth_limpar_erro();
t('utilizador vazio rejeitado', insert_utilizadores('T', '', '12345678', 't@t.com', 2) === 0);
auth_limpar_erro();
t('email vazio rejeitado', insert_utilizadores('T', 'x', '12345678', '', 2) === 0);
auth_limpar_erro();
t('id invalido no actualizar rejeitado', actulizar_utilizadores(0, 'T', 'x', '12345678', 't@t.com', 2) === 0);

auth_limpar_erro();
t('nome de utilizador duplicado rejeitado', insert_utilizadores('Outro', 'user', '12345678', 'o@o.com', 2) === 0);
t('mensagem menciona duplicado', stripos((string) auth_erro(), 'ja existe') !== false);

foreach (array('teste0', 'teste1', 'teste2') as $u) {
    $guardado = $db->query("SELECT PASSWORD FROM utilizadores WHERE USERNAME = '$u'")->fetch_assoc();
    t("$u: hash no formato correcto", (bool) preg_match('/^sha256:[0-9a-f]{32}:[0-9a-f]{64}$/', $guardado['PASSWORD']));
}

$guardado = $db->query("SELECT PASSWORD FROM utilizadores WHERE USERNAME = 'teste0'")->fetch_assoc();
t('a senha nao aparece em texto puro', strpos($guardado['PASSWORD'], '12345678') === false);

$original = $db->query("SELECT PASSWORD FROM utilizadores WHERE USERNAME = 'user'")->fetch_assoc();
t('mesma senha, hashes diferentes (sal unico)', $original['PASSWORD'] !== $guardado['PASSWORD']);

sessao_limpa();
t('login com a senha recem-criada', sesseos('teste0', '12345678') === true);
sessao_limpa();
t('login com a senha errada recem-criada', sesseos('teste0', 'errada123') === false);

$id = (int) $db->query("SELECT ID_UTILIZADORES FROM utilizadores WHERE USERNAME = 'teste0'")->fetch_assoc()['ID_UTILIZADORES'];
$antes = $db->query("SELECT PASSWORD FROM utilizadores WHERE ID_UTILIZADORES = $id")->fetch_assoc()['PASSWORD'];

auth_limpar_erro();
t('actualizar com senha de 7 caracteres rejeitado', actulizar_utilizadores($id, 'T2', 'teste0', '1234567', 't2@t.com', 2) === 0);

auth_limpar_erro();
t('actualizar sem senha mantem a senha actual', actulizar_utilizadores($id, 'T3', 'teste0', '', 't3@t.com', 2) === 1);
t('o hash nao mudou', $db->query("SELECT PASSWORD FROM utilizadores WHERE ID_UTILIZADORES = $id")->fetch_assoc()['PASSWORD'] === $antes);
t('o nome foi alterado', $db->query("SELECT NOME FROM utilizadores WHERE ID_UTILIZADORES = $id")->fetch_assoc()['NOME'] === 'T3');

sessao_limpa();
t('login com a senha antiga ainda funciona', sesseos('teste0', '12345678') === true);

auth_limpar_erro();
t('actualizar com senha nova aceite', actulizar_utilizadores($id, 'T4', 'teste0', 'novasenha1', 't4@t.com', 2) === 1);
t('o hash mudou', $db->query("SELECT PASSWORD FROM utilizadores WHERE ID_UTILIZADORES = $id")->fetch_assoc()['PASSWORD'] !== $antes);

sessao_limpa();
t('login com a senha nova', sesseos('teste0', 'novasenha1') === true);
sessao_limpa();
t('a senha antiga deixa de funcionar', sesseos('teste0', '12345678') === false);

// ======================================================================
secao('Injecao de SQL');
// ======================================================================

auth_limpar_erro();
insert_utilizadores("x'); DROP TABLE utilizadores; -- ", 'testeinj', '12345678', 'i@i.com', 2);
t('a tabela utilizadores continua de pe', $db->query("SHOW TABLES LIKE 'utilizadores'")->num_rows === 1);
t('os dados foram escapados, nao executados', (bool) $db->query("SELECT ID_UTILIZADORES FROM utilizadores WHERE USERNAME = 'testeinj'")->fetch_assoc());

// ======================================================================

echo "\n" . str_repeat('-', 40) . "\n";
echo $GLOBALS['passou'] . " passed, " . $GLOBALS['falhou'] . " failed\n";

exit($GLOBALS['falhou'] === 0 ? 0 : 1);
