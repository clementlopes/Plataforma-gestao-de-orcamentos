<?php
/**
 * tools/gerar_hash.php
 *
 * Gera um hash de senha no mesmo formato usado pela aplicacao.
 * Util para criar palavras-passe de um utilizador directamente no servidor,
 * sem passar pelo formulario.
 *
 * Como usar, via SSH no Virtualmin:
 *
 *   php tools/gerar_hash.php "a minha palavra passe"
 *
 * Depois, no phpMyAdmin ou na consola MySQL:
 *
 *   UPDATE utilizadores SET PASSWORD = '<hash gerado>' WHERE USERNAME = 'admin';
 */

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit("Este script so corre na linha de comandos.\n");
}

require __DIR__ . '/../includes/auth.php';

$senha = isset($argv[1]) ? $argv[1] : '';

if ($senha === '') {
    fwrite(STDERR, "Uso: php tools/gerar_hash.php \"palavra passe\"\n");
    exit(1);
}

if (!auth_validar_senha($senha)) {
    fwrite(STDERR, 'A palavra passe deve ter pelo menos ' . AUTH_PASSWORD_MIN . " caracteres.\n");
    exit(1);
}

echo auth_hash_senha($senha), "\n";
