<?php
/**
 * login_check.php
 *
 * Autenticacao de utilizadores.
 *
 * Alterado face a versao original:
 *  - a senha deixou de ser md5() e passou a SHA256 com sal unico por
 *    utilizador (formato "sha256:<sal>:<hash>");
 *  - a consulta usa prepared statements, sem concatenar valores na SQL;
 *  - a comparacao usa hash_equals(), em tempo constante;
 *  - o ID da sessao e regenerado apos o login, para evitar session fixation;
 *  - a resposta ao utilizador e generica, sem revelar se o nome de utilizador
 *    existe;
 *  - ha limitacao de tentativas e token CSRF.
 *
 * NOTA: a base de dados foi migrada por inteiro, pelo que nao existe logica
 * de rehash das senhas antigas.
 */

include_once __DIR__ . '/config.php';
include_once __DIR__ . '/auth.php';

auth_iniciar_sessao();


/**
 * Tenta autenticar um utilizador.
 *
 * @param string $utilizador Nome de utilizador introduzido.
 * @param string $senha      Senha em texto puro.
 * @return bool Verdadeiro se a sessao foi iniciada.
 */
function sesseos($utilizador, $senha) {
    $utilizador = trim((string) $utilizador);

    if ($utilizador === '' || (string) $senha === '') {
        // Gasto de tempo equivalente ao resto do caminho, mas sem tocar na BD.
        auth_hash_decoy();
        return false;
    }

    $ligacao = bd();

    // Prepared statement: a senha nunca entra na string SQL.
    $sql = 'SELECT ID_UTILIZADORES, NOME, TIPO, PASSWORD
            FROM utilizadores
            WHERE USERNAME = ?
            LIMIT 1';

    $stmt = mysqli_prepare($ligacao, $sql);

    if ($stmt === false) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, 's', $utilizador);
    mysqli_stmt_execute($stmt);

    // bind_result() em vez de mysqli_stmt_get_result(): funciona tambem sem
    // a extensao mysqlnd, que nem sempre esta activa em hosting partilhado.
    $id = $nome = $tipo = $armazenada = null;
    mysqli_stmt_bind_result($stmt, $id, $nome, $tipo, $armazenada);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);

    if ($id === null) {
        // Hash descartavel: mantem o tempo de resposta igual ao de um
        // utilizador existente, para nao permitir enumerar contas.
        auth_verificar_senha($senha, auth_hash_decoy());
        return false;
    }

    if (!auth_verificar_senha($senha, $armazenada)) {
        return false;
    }

    // Regenerar o ID da sessao evita que um atacante fixe o ID antes do login.
    // Se ja tiver sido enviado output, nao ha nada a fazer.
    if (!headers_sent()) {
        session_regenerate_id(true);
    }

    $_SESSION['ID_UTILIZADORES'] = (int) $id;
    $_SESSION['NOME'] = $nome;
    $_SESSION['TIPO'] = (int) $tipo;
    $_SESSION['ADMIN'] = ($_SESSION['TIPO'] === 1) ? '' : "class='hidden'";
    $_SESSION['ENTRADA_EM'] = time();

    auth_limpar_tentativas();

    return true;
}


/**
 * Verifica se ha uma sessao de utilizador valida.
 *
 * @return bool
 */
function autenticado() {
    auth_iniciar_sessao();

    return !empty($_SESSION['ID_UTILIZADORES']);
}
