<?php
/**
 * auth.php
 *
 * Nucleo de autenticacao da Plataforma GO.
 *
 * Responsabilidades:
 *  - iniciar sessao com cookies protegidos;
 *  - politica de senha (minimo 8 caracteres);
 *  - hashing de senhas com SHA256 + sal unico por utilizador;
 *  - comparacao em tempo constante (hash_equals);
 *  - tokens CSRF;
 *  - limitacao de tentativas de login.
 *
 * Formato de armazenamento da senha na base de dados:
 *
 *     sha256:<sal_hex>:<hash_hex>
 *
 * NOTA: SHA256 continua a ser mais rapido de computar do que argon2id/bcrypt.
 * Numa aplicacao real em producao, password_hash() seria preferivel. Aqui o
 * objectivo e cumprir o requisito explicito do projecto (SHA256) sem perder a
 * protecao essencial contra rainbow tables, que e o sal unico por utilizador.
 */

const AUTH_PASSWORD_ALGO = 'sha256';
const AUTH_PASSWORD_MIN = 8;
const AUTH_PASSWORD_SALT_BYTES = 16;

/** Numero de falhas de login toleradas antes do bloqueio temporario. */
const AUTH_LOGIN_MAX_TENTATIVAS = 5;

/** Duracao do bloqueio temporario em segundos. */
const AUTH_LOGIN_BLOQUEIO_SEGUNDOS = 60;

const AUTH_COOKIE_REMEMBER = 'pgo_remember_user';


/* =============================== SESSAO =============================== */

/**
 * Arranca a sessao com cookies endurecidos.
 *
 * Safe para chamar varias vezes: se a sessao ja estiver iniciada, nao faz nada.
 * Deve ser chamada antes de qualquer output HTML, caso contrario o PHP
 * emitira o aviso "headers already sent".
 */
function auth_iniciar_sessao() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        return;
    }

    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443)
        || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

    session_set_cookie_params(array(
        'lifetime' => 0,
        'path'     => '/',
        'domain'   => '',
        'secure'   => $https,
        'httponly' => true,
        'samesite' => 'Lax',
    ));

    session_name('PGOSESSID');
    session_start();
}


/* =============================== SENHAS =============================== */

/**
 * Gera um sal aleatorio unico, em hexadecimal.
 */
function auth_gerar_salt() {
    return bin2hex(random_bytes(AUTH_PASSWORD_SALT_BYTES));
}

/**
 * Gera o hash de uma senha: SHA256 sobre (sal + senha).
 *
 * @param string $senha Senha em texto puro.
 * @return string Hash no formato "sha256:<sal_hex>:<hash_hex>".
 */
function auth_hash_senha($senha) {
    $sal = auth_gerar_salt();
    $hash = hash(AUTH_PASSWORD_ALGO, $sal . $senha);

    return AUTH_PASSWORD_ALGO . ':' . $sal . ':' . $hash;
}

/**
 * Confirma uma senha contra o valor guardado na base de dados.
 *
 * A comparacao e feita com hash_equals() para que o tempo de execucao nao
 * dependa do numero de caracteres correctos, o que impediria ataques de
 * temporização.
 *
 * @param string $senha      Senha introduzida pelo utilizador.
 * @param string $armazenado Valor tal e qual guardado na coluna PASSWORD.
 * @return bool
 */
function auth_verificar_senha($senha, $armazenado) {
    if (!is_string($armazenado) || $armazenado === '') {
        return false;
    }

    $partes = explode(':', $armazenado, 3);

    if (count($partes) !== 3) {
        return false;
    }

    list($algoritmo, $sal, $esperado) = $partes;

    if ($algoritmo !== AUTH_PASSWORD_ALGO || $sal === '' || $esperado === '') {
        return false;
    }

    $calculado = hash(AUTH_PASSWORD_ALGO, $sal . $senha);

    return hash_equals($esperado, $calculado);
}

/**
 * Verifica a politica de senha do projecto: minimo de 8 caracteres.
 *
 * @param string $senha Senha em texto puro.
 * @return bool
 */
function auth_validar_senha($senha) {
    if (!is_string($senha)) {
        return false;
    }

    return mb_strlen($senha, 'UTF-8') >= AUTH_PASSWORD_MIN;
}

/**
 * Cria um hash dummy, usado para que o login demore o mesmo tempo
 * exista ou nao o utilizador. Sem isto, um atacante mediria o tempo de
 * resposta para descobrir que nomes de utilizador sao validos.
 *
 * @return string
 */
function auth_hash_decoy() {
    static $decoy = null;

    if ($decoy === null) {
        $decoy = auth_hash_senha('decoy-' . bin2hex(random_bytes(8)));
    }

    return $decoy;
}


/* =============================== ERROS =============================== */

function auth_guardar_erro($mensagem) {
    $GLOBALS['auth_erro'] = $mensagem;
}

function auth_erro() {
    return isset($GLOBALS['auth_erro']) ? $GLOBALS['auth_erro'] : null;
}

function auth_limpar_erro() {
    unset($GLOBALS['auth_erro']);
}


/* =============================== CSRF =============================== */

/**
 * Devolve (criando se necessario) o token CSRF da sessao.
 */
function auth_csrf_token() {
    auth_iniciar_sessao();

    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

/** Campo oculto para colocar dentro de um <form>. */
function auth_csrf_input() {
    return '<input type="hidden" name="csrf_token" value="' . auth_csrf_token() . '">';
}

/**
 * Confirma o token CSRF recebido no pedido.
 *
 * @return bool
 */
function auth_csrf_valido($token) {
    auth_iniciar_sessao();

    if (empty($_SESSION['csrf_token']) || !is_string($token) || $token === '') {
        return false;
    }

    return hash_equals($_SESSION['csrf_token'], $token);
}


/* ==================== LIMITACAO DE TENTATIVAS ==================== */

/**
 * Regista uma falha de login. Devolve true se a conta foi temporariamente
 * bloqueada por excesso de tentativas.
 */
function auth_registar_falha() {
    auth_iniciar_sessao();

    if (empty($_SESSION['login_tentativas']) || !is_int($_SESSION['login_tentativas'])) {
        $_SESSION['login_tentativas'] = 0;
    }

    $_SESSION['login_tentativas']++;
    $_SESSION['login_tentativa_em'] = time();

    return $_SESSION['login_tentativas'] >= AUTH_LOGIN_MAX_TENTATIVAS;
}

/** Limpa o contador apos um login bem sucedido. */
function auth_limpar_tentativas() {
    unset($_SESSION['login_tentativas'], $_SESSION['login_tentativa_em']);
}

/** Segundos restantes de bloqueio (0 se nao houver bloqueio). */
function auth_bloqueio_restante() {
    auth_iniciar_sessao();

    if (empty($_SESSION['login_tentativas']) || $_SESSION['login_tentativas'] < AUTH_LOGIN_MAX_TENTATIVAS) {
        return 0;
    }

    $desde = isset($_SESSION['login_tentativa_em']) ? (int) $_SESSION['login_tentativa_em'] : 0;
    $passados = time() - $desde;

    return $passados >= AUTH_LOGIN_BLOQUEIO_SEGUNDOS
        ? 0
        : AUTH_LOGIN_BLOQUEIO_SEGUNDOS - $passados;
}


/* =========================== LEMBRAR-ME =========================== */

/**
 * "Lembrar-me": guarda apenas o nome de utilizador num cookie, para que o
 * formulario venha preenchido na proxima visita.
 *
 * Deliberadamente NAO faz auto-login: um auto-login exigiria um segredo de
 * aplicacao ou uma tabela de tokens, e um cookie sem assinatura pode ser
 * simplesmente forjado por qualquer pessoa.
 */
function auth_lembrar_utilizador($utilizador) {
    setcookie(AUTH_COOKIE_REMEMBER, $utilizador, time() + 60 * 60 * 24 * 30, '/');
}

function auth_lembrado() {
    return isset($_COOKIE[AUTH_COOKIE_REMEMBER]) ? $_COOKIE[AUTH_COOKIE_REMEMBER] : '';
}
