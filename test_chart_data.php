<?php
// Simple test file to check the chart data format
include_once 'session.php';

if (isset($_GET['chartData'])) {
    $chartData = getChartData();
    header('Content-Type: application/json');
    echo json_encode($chartData);
    exit();
}
?>