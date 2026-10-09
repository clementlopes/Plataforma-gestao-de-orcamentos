<?php
/**
 * logout.php
 *
 * Termina a sessao e limpa os cookies relacionados. Sem isto, o cookie de
 * sessao continuaria no navegador e o ficheiro de sessao no servidor.
 */

include_once __DIR__ . '/includes/auth.php';

auth_iniciar_sessao();

// Esvazia os dados da sessao antes de a destruir.
$_SESSION = array();

if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

session_destroy();

// Limpa tambem o cookie do "lembrar utilizador".
setcookie(AUTH_COOKIE_REMEMBER, '', time() - 3600, '/');

header('Location: index.php');
exit();
