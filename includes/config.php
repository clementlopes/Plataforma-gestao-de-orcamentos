<?php
/**
 * config.php
 *
 * Ligacao a base de dados e definicao de constantes da aplicacao.
 *
 * As credenciais sao lidas do ficheiro .env (ver .env.example), o que evita
 * ter credenciais reais escritas no codigo. Se o .env nao existir, sao usados
 * os valores de fallback abaixo — uteis para desenvolvimento local, mas
 * nunca para um servidor publico.
 */

require_once __DIR__ . '/env.php';

if (!function_exists('bd')) {
    /**
     * Liga ao servidor MySQL.
     *
     * NOTA: cada chamada abre uma nova ligacao. Guarde o resultado numa variavel
     * quando precisar de varias operacoes seguidas (por exemplo, quando usar
     * mysqli_prepare), em vez de chamar bd() varias vezes.
     *
     * @return mysqli
     */
    function bd() {
        // A partir do PHP 8.1 o mysqli passa a lancar excecoes em vez de
        // devolver false. Todo o codigo deste projecto (herdado de PHP 5/7)
        // assume a forma antiga, por isso voltamos a esse comportamento e
        // tratamos a falha aqui, com uma mensagem em vez de um stack trace.
        mysqli_report(MYSQLI_REPORT_OFF);

        $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if ($db === false) {
            if (APP_DEBUG) {
                http_response_code(500);
                exit('Nao foi possivel ligar a base de dados: ' . mysqli_connect_error());
            }

            http_response_code(500);
            exit('Nao foi possivel ligar a base de dados. Verifique o ficheiro .env.');
        }

        return $db;
    }
}
