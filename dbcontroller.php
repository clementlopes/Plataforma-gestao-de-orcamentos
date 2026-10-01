<?php
/**
 * dbcontroller.php
 *
 * Camada fina sobre o mysqli. As credenciais vêm do config.php (e portanto do
 * .env), em vez de estarem escritas aqui — antes havia um "123456" hardcoded
 * que não correspondia ao config.php.
 */

include_once __DIR__ . '/config.php';

class DBController
{
    private $conn;

    function __construct() {
        $this->conn = $this->connectDB();
    }

    function connectDB() {
        return bd();
    }

    function runQuery($query) {
        $resultset = array();

        $result = mysqli_query($this->conn, $query);

        if ($result === false) {
            return false;
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }

        return $resultset;
    }

    function numRows($query) {
        $result = mysqli_query($this->conn, $query);

        if ($result === false) {
            return 0;
        }

        return mysqli_num_rows($result);
    }
}
