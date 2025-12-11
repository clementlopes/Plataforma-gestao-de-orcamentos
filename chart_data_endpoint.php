<?php
// chart_data_endpoint.php - Standalone chart data endpoint
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

include_once 'config.php';
include_once 'session.php'; // Include session to ensure session is started

// Function to get chart data - copied from session.php
function getChartData() {
    // Initialize all months with zero values
    $data = array();
    for ($i = 1; $i <= 12; $i++) {
        $data[$i] = [
            'Orcamentos Realizados' => 0,
            'Orcamentos Pedidos' => 0,
            'Orcamentos Rejeitados' => 0,
        ];
    }

    $sql = "SELECT
        MONTH(o.DATA) AS Mes,
        SUM(CASE WHEN tipo.NOME = 'realizado' THEN 1 ELSE 0 END) AS OrcamentosRealizados,
        SUM(CASE WHEN tipo.NOME = 'pedido' THEN 1 ELSE 0 END) AS OrcamentosPedidos,
        SUM(CASE WHEN tipo.NOME = 'rejeitado' THEN 1 ELSE 0 END) AS OrcamentosRejeitados
    FROM orcamento o
    INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
    WHERE YEAR(o.DATA) = YEAR(CURRENT_DATE())
    GROUP BY Mes";

    $result = get_dados($sql);

    foreach ($result as $row) {
        $mes = $row['Mes'];
        $OrcamentosRealizados = $row['OrcamentosRealizados'];
        $OrcamentosPedidos = $row['OrcamentosPedidos'];
        $OrcamentosRejeitados = $row['OrcamentosRejeitados'];

        $data[$mes] = [
            'Orcamentos Realizados' => $OrcamentosRealizados,
            'Orcamentos Pedidos' => $OrcamentosPedidos,
            'Orcamentos Rejeitados' => $OrcamentosRejeitados,
        ];
    }

    return $data;
}

$chartData = getChartData();
echo json_encode($chartData);
?>