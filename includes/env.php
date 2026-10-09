<?php
/**
 * env.php
 *
 * Leitor de .env minimo, sem dependencias externas.
 *
 * Suporta o formato KEY=valor, com valores entre aspas simples ou duplas e
 * linhas de comentario. Define as constantes abaixo, sem as sobrepor se ja
 * tiverem sido definidas.
 */

if (!function_exists('env_ficheiro_valor')) {
    function env_ficheiro_valor($chave, $predefinido = '') {
        static $valores = null;

        if ($valores === null) {
            $valores = array();
            $ficheiro = __DIR__ . '/.env';

            if (is_readable($ficheiro)) {
                foreach (file($ficheiro, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $linha) {
                    $linha = trim($linha);

                    if ($linha === '' || $linha[0] === '#') {
                        continue;
                    }

                    $pos = strpos($linha, '=');
                    if ($pos === false) {
                        continue;
                    }

                    $nome = trim(substr($linha, 0, $pos));
                    $valor = trim(substr($linha, $pos + 1));

                    if (strlen($valor) >= 2) {
                        $primeiro = $valor[0];
                        $ultimo = substr($valor, -1);
                        if (($primeiro === '"' && $ultimo === '"') || ($primeiro === "'" && $ultimo === "'")) {
                            $valor = substr($valor, 1, -1);
                        }
                    }

                    $valores[$nome] = $valor;
                }
            }
        }

        return array_key_exists($chave, $valores) ? $valores[$chave] : $predefinido;
    }
}

if (!function_exists('env')) {
    /**
     * Le um valor do .env, dando prioridade as variaveis de ambiente reais
     * (util quando o hosting as define, em vez de um ficheiro .env).
     */
    function env($chave, $predefinido = '') {
        $valor = getenv($chave);

        if ($valor !== false && $valor !== '') {
            return $valor;
        }

        return env_ficheiro_valor($chave, $predefinido);
    }
}

if (!function_exists('env_bool')) {
    function env_bool($chave, $predefinido = false) {
        $valor = env($chave, $predefinido ? 'true' : 'false');

        return in_array(strtolower((string) $valor), array('1', 'true', 'sim', 'yes', 'on'), true);
    }
}

if (!defined('DB_SERVER')) {
    define('DB_SERVER', env('DB_SERVER', 'localhost'));
}
if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', env('DB_USERNAME', 'root'));
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', env('DB_PASSWORD', ''));
}
if (!defined('DB_DATABASE')) {
    define('DB_DATABASE', env('DB_DATABASE', 'gestao'));
}

/**
 * Mostrar erros no browser. Em producao tem de ser false: mostrar erros num
 * servidor publico revela caminhos e detalhes internos da base de dados.
 */
if (!defined('APP_DEBUG')) {
    define('APP_DEBUG', env_bool('APP_DEBUG', false));
}

if (!defined('APP_NOME')) {
    define('APP_NOME', env('APP_NOME', 'Plataforma GO'));
}
