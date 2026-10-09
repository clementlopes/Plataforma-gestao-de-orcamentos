<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<?php
include_once __DIR__ . '/includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['fornecedor'], $_POST['dataEmissao'], $_POST['dataPagamento'], $_POST['valor'], $_POST['dias'])) {
        $fornecedor = $_POST['fornecedor'];
        $dataEmissao = $_POST['dataEmissao'];
        $dataPagamento = $_POST['dataPagamento'];
        $valor = $_POST['valor'];
        $dias = $_POST['dias'];

        $result = addCheque($fornecedor, $dataEmissao, $dataPagamento, $valor, $dias);

        if ($result === 1) {
            // Redirecionar para a página de sucesso
            echo "Cheque Adicionado.";
        } else {
            // Tratar erro de inserção
            echo "Erro ao adicionar cheque.";
        }
    } elseif (isset($_POST['idChequeEdit'], $_POST['fornecedorEdit'], $_POST['dataEmissaoEdit'], $_POST['dataPagamentoEdit'], $_POST['valorEdit'], $_POST['diasEdit'])) {
        $idChequeEdit = $_POST['idChequeEdit'];
        $fornecedorEdit = $_POST['fornecedorEdit'];
        $dataEmissaoEdit = $_POST['dataEmissaoEdit'];
        $dataPagamentoEdit = $_POST['dataPagamentoEdit'];
        $valorEdit = $_POST['valorEdit'];
        $diasEdit = $_POST['diasEdit'];

        $result = editCheque($idChequeEdit, $fornecedorEdit, $dataEmissaoEdit, $dataPagamentoEdit, $valorEdit, $diasEdit);

        if ($result === 1) {
            // Redirecionar para a página de sucesso
            echo "Cheque Editado.";
        } else {
            // Tratar erro de edição
            echo "Erro ao editar cheque.";
        }
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Plataforma GO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <!--<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">-->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and memes queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon pgo.png">

    <style>
        /* Properly position footer to avoid overlapping sidebar */
        .main-footer {
            margin-left: 230px; /* Match the sidebar width */
        }

        @media (max-width: 767px) {
            .main-footer {
                margin-left: 0;
            }
        }

        .sidebar-collapse .main-footer {
            margin-left: 0;
        }
    </style>

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="home.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">P<b>GO</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Plataforma<b>GO</b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <ul class="dropdown-menu"></ul>


                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo $_SESSION['NOME']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $_SESSION['NOME']; ?>

                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat disabled">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="logout.php" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
                </div>


                <div class="pull-left info">
                    <p><?php echo $_SESSION['NOME']; ?></p>
                    <!-- Status -->
                    <a><i class="fa fa-circle text-success"></i> Online</a>
                </div>


            </div>


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">MENU</li>

                <!-- Optionally, you can add icons to the links -->

                <li class="active"><a href="home.php"><i class=" fa fa-home"></i> <span>Inicio</span></a></li>

                <li><a href="empresa.php"><i class=" fa fa-building"></i> <span>Dados Empresa</span></a></li>

                <li class="treeview">
                    <a><i class="fa fa-fw fa-archive"></i> <span>Categorias</span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="categoria1.php"><i class="fa fa-folder"></i>Categoria de Artigos</a></li>

                        <li><a href="categoria2.php"><i class="fa fa-folder"></i>Categoria de Serviços</a></li>

                    </ul>
                </li>

                <li><a href="artigos.php"><i class="fa fa-dropbox"></i> <span>Artigos</span></a></li>

                <li><a href="servicos.php"><i class="fa fa-dropbox"></i> <span>Serviços</span></a></li>

                <li><a href="verorcamento.php"><i class="fa fa-fw fa-archive"></i> <span>Ver orçamentos</span></a></li>

                <li><a href="clientes.php"><i class="fa fa-user-plus"></i> <span>Clientes</span></a></li>

                <li <?php echo $_SESSION['ADMIN']; ?> ><a href="utilizadores.php"><i class="fa fa-user-plus"></i> <span>Utilizadores</span></a>
                </li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Início
            </h1>

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li>Início</li>
            </ol>
        </section>

        <!-- Main content -->

        <!--Your Page Content Here ------------------------------------------------------------------------------->
        <section class="content">


            <div class="row">
                <div class="col-xs-12">

                    <div class=" box box-primary">
                        <div class="box-body">
                            <div class="box-body">


                                <!--==============================CHEQUES=========================-->

                                <div class="col-md-6">
                                    <?php

                                    $sqlCheques = 'SELECT DATE_FORMAT(DATA_PAGAMENTO, "%Y-%m") AS MesAno, SUM(VALOR) AS TotalValor
                                                      FROM cheques
                                                      WHERE DATA_PAGAMENTO BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 MONTH)
                                                      GROUP BY MesAno ORDER BY MesAno;';
                                    $cheques = get_dados($sqlCheques);
                                    ?>

                                    <div class="box">
                                        <div class="box-header with-border">

                                            <h3 class="text-center text-bold ">Cheques</h3>

                                            <div class="">
                                                <button type="button" class="btn btn-primary col-md-6 "
                                                        data-toggle="modal" data-target="#addChequeModal"
                                                        style=" position: relative; left: 25%; ">
                                                    <i class="fa fa-plus"></i> &nbsp Adicionar Cheque
                                                </button>
                                            </div>
                                        </div>

                                        <table id="tabelaCheques" class="table ">
                                            <thead>
                                            <tr>
                                                <th>Mês</th>
                                                <th>Data Emissão</th>
                                                <th>Data Pagamento</th>
                                                <th>Dias</th>
                                                <th>Valor</th>
                                                <th></th>
                                            </tr>
                                            </thead>


                                            <?php
                                            $currentMonth = '';
                                            $sqlDetalhesCheques = 'SELECT DATE_FORMAT(DATA_PAGAMENTO, "%Y-%m") AS MesAno, ID_CHEQUES,
                                                                    FORNECEDOR, DATE_FORMAT(DATA_EMITIDA, "%Y-%m-%d") AS DataEmitida,
                                                                    DATE_FORMAT(DATA_PAGAMENTO, "%Y-%m-%d") AS DataPagamento,
                                                                    VALOR, dias_pagamento.DIAS AS DIAS
                                                                    FROM cheques
                                                                    INNER JOIN dias_pagamento ON (cheques.ID_CHEQUES_DIAS = dias_pagamento.ID_DIAS)
                                                                    WHERE DATA_PAGAMENTO BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 3 MONTH)
                                                                    ORDER BY MesAno, DATA_PAGAMENTO;';
                                            $detalhesCheques = get_dados($sqlDetalhesCheques);

                                            foreach ($cheques as $soma) {
                                                $mesAno = $soma['MesAno'];
                                                if ($currentMonth != $mesAno) {
                                                    $nomeMes = date('F Y', strtotime($mesAno . '-01'));
                                                    echo '<tr>';
                                                    echo '<td class="text-bold bg-gray-light">' . $nomeMes . '</td>';
                                                    echo '<td class="text-bold bg-gray-light"></td>';
                                                    echo '<td class="text-bold bg-gray-light"></td>';
                                                    echo '<td class="text-bold bg-gray-light"></td>';
                                                    echo '<td class="text-bold bg-gray-light">' . $soma['TotalValor'] . '€' . '</td>';
                                                    echo '<td class="text-bold bg-gray-light"></td>';
                                                    echo '</tr>';
                                                    $currentMonth = $mesAno;
                                                }

                                                foreach ($detalhesCheques as $dadoscheques) {
                                                    if ($dadoscheques['MesAno'] == $mesAno) {
                                                        // Crie objetos DateTime para as datas de emissão e pagamento
                                                        $dataEmitida = new DateTime($dadoscheques['DataEmitida']);
                                                        $dataPagamento = new DateTime($dadoscheques['DataPagamento']);
                                                        $diasPagamento = $dadoscheques['DIAS'];
                                                        // Calcule a diferença de dias
                                                        $diferencaDias = $dataEmitida->diff($dataPagamento)->days;

                                                        // Defina a classe CSS com base na diferença de dias
                                                        $classeCSS = '';
                                                        if ($diferencaDias <= $diasPagamento) {
                                                            $classeCSS = 'text-success'; // Verde
                                                        } else {
                                                            $classeCSS = 'text-danger'; // Vermelho
                                                        }

                                                        $valorDiferencaDias = ($diferencaDias > $diasPagamento) ? ('+ ' . ($diferencaDias - $diasPagamento)) : ('- ' . ($diasPagamento - $diferencaDias));

                                                        echo '<tr>';
                                                        echo '<td class="text-bold ' . $classeCSS . '">' . $dadoscheques['FORNECEDOR'] . '</td>';
                                                        $dataEmitidaFormatada = date('d-m-Y', strtotime($dadoscheques['DataEmitida']));
                                                        echo '<td class="text-bold ' . $classeCSS . '">' . $dataEmitidaFormatada . '</td>';

                                                        $dataPagamentoFormatada = date('d-m-Y', strtotime($dadoscheques['DataPagamento']));
                                                        echo '<td class="text-bold ' . $classeCSS . '">' . $dataPagamentoFormatada . '</td>';
                                                        echo '<td class="text-bold ' . $classeCSS . '">' . $dadoscheques['DIAS'] . ' DIAS |  ' . $valorDiferencaDias . '</td>';
                                                        echo '<td class="text-bold ' . $classeCSS . '">' . $dadoscheques['VALOR'] . '€' . '</td>';
                                                        echo '<td> <a href="#editChequeModal" data-toggle="modal" data-id="' . htmlspecialchars($dadoscheques['ID_CHEQUES']) . '" class="edit-cheque"><span class="glyphicon glyphicon-refresh text-green text-bold"></span></a> </td>';
                                                        echo '</tr>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </table>

                                    </div>
                                </div>


                                <!--============================================== ANIVERSARIOS ===========================================================-->

                                <div class="col-md-6">


                                    <?php
                                    $sql = 'SELECT NOME, CONTATO, NASCIMENTO FROM clientes 
                                    WHERE (MONTH(NASCIMENTO), DAY(NASCIMENTO)) = (MONTH(CURDATE()),DAY(CURDATE()))';
                                    $rows = get_dados($sql);
                                    ?>
                                    <div class="box table-responsive">
                                        <div class="box-header with-border">
                                            <h3 class=" text-center text-bold ">Aniversários</h3>
                                        </div>
                                        <table class="table table-hover">
                                            <tr>

                                                <th>NOME</th>
                                                <th>DATA</th>
                                                <th>CONTATO</th>

                                            </tr>
                                            <?php foreach ($rows as $value) { ?>
                                                <tr>

                                                    <td><?php echo $value['NOME']; ?></td>
                                                    <td><?php echo $value['NASCIMENTO']; ?></td>
                                                    <td><?php echo $value['CONTATO']; ?></td>

                                                </tr>
                                            <?php } ?>

                                        </table>

                                    </div>
                                </div>


                            </div>


                            <br>
                            <div class="box-body">
                                <div class="col-md-4 ">
                                    <div class="box box-primary">

                                        <h3 class="text-center text-bold ">Total Orçamentos Realizados</h3>
                                        <div class="nav-tabs-custom" style="height: 185px;">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#valor_1" data-toggle="tab"
                                                                      aria-expanded="true">Mensal</a></li>
                                                <li class=""><a href="#valor_2" data-toggle="tab" aria-expanded="false">Trimestal</a>
                                                </li>
                                                <li class=""><a href="#valor_3" data-toggle="tab" aria-expanded="false">Anual</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="valor_1">

                                                    <?php
                                                    $TotalMensal = 'SELECT
                                                   ROUND (SUM((os.PRECO * os.QUANTIDADE) * (1 + (iv.IVA / 100))),2) AS ValorTotalOrcamentoComIVA
                                                   FROM orcamento o
                                                   INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                   INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                   INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                   WHERE YEAR(o.DATA) = YEAR(CURRENT_DATE()) AND MONTH(o.DATA) = MONTH(CURRENT_DATE())
                                                   AND tipo.NOME = "realizado"';
                                                    $total = get_dados_one($TotalMensal);
                                                    if (!empty($total) && isset($total['ValorTotalOrcamentoComIVA'])) {
                                                        echo '<h1 class="text-center text-bold text-primary" >' . $total['ValorTotalOrcamentoComIVA'] . '€</h1>';
                                                    } else {
                                                        echo '<h1 class="text-center text-bold text-primary" >0€</h1>';
                                                    }

                                                    ?>

                                                </div>

                                                <div class="tab-pane" id="valor_2">

                                                    <?php
                                                    $TotalMensal2 = 'SELECT
                                                   ROUND (SUM((os.PRECO * os.QUANTIDADE) * (1 + (iv.IVA / 100))),2) AS ValorTotalOrcamentoComIVA
                                                   FROM orcamento o
                                                   INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                   INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                   INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                   WHERE o.DATA >= DATE_SUB(CURRENT_DATE(), INTERVAL 3 MONTH)
                                                   AND tipo.NOME = "realizado"';
                                                    $total2 = get_dados_one($TotalMensal2);
                                                    if (!empty($total2) && isset($total2['ValorTotalOrcamentoComIVA'])) {
                                                        echo '<h1 class="text-center text-bold text-primary" >' . $total2['ValorTotalOrcamentoComIVA'] . '€</h1>';
                                                    } else {
                                                        echo '<h1 class="text-center text-bold text-primary" >0€</h1>';
                                                    }

                                                    ?>

                                                </div>

                                                <div class="tab-pane" id="valor_3">

                                                    <?php
                                                    $TotalMensal3 = 'SELECT
                                                   ROUND (SUM((os.PRECO * os.QUANTIDADE) * (1 + (iv.IVA / 100))),2) AS ValorTotalOrcamentoComIVA
                                                   FROM orcamento o
                                                   INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                   INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                   INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                   WHERE YEAR(o.DATA) = YEAR(CURRENT_DATE())
                                                   AND tipo.NOME = "realizado"';
                                                    $total3 = get_dados_one($TotalMensal3);
                                                    if (!empty($total3) && isset($total3['ValorTotalOrcamentoComIVA'])) {

                                                        echo '<h1 class="text-center text-bold text-primary" >' . $total3['ValorTotalOrcamentoComIVA'] . '€</h1>';
                                                    } else {
                                                        echo '<h1 class="text-center text-bold text-primary" >0€</h1>';
                                                    }

                                                    ?>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div><!--
                                
-->
                                <div class="col-md-4 ">
                                    <div class="box box-primary">

                                        <h3 class="text-center text-bold ">Iva</h3>
                                        <div class="nav-tabs-custom" style="height: 185px;">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#iva_1" data-toggle="tab"
                                                                      aria-expanded="true">Mensal</a></li>
                                                <li class=""><a href="#iva_2" data-toggle="tab" aria-expanded="false">Trimestal</a>
                                                </li>
                                                <li class=""><a href="#iva_3" data-toggle="tab" aria-expanded="false">Anual</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="iva_1">

                                                    <?php
                                                    $ivaMensal = 'SELECT
                                                    ROUND(SUM((os.PRECO * os.QUANTIDADE) * (iv.IVA / 100)), 2) AS ValorTotalIVA
                                                    FROM orcamento o
                                                    INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                    INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                    INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                    WHERE tipo.NOME = "realizado"
                                                    AND YEAR(o.DATA) = YEAR(CURRENT_DATE()) AND MONTH(o.DATA) = MONTH(CURRENT_DATE())
                                                   ';
                                                    $ivatotal = get_dados_one($ivaMensal);
                                                    if (!empty($ivatotal) && isset($ivatotal['ValorTotalIVA'])) {
                                                        echo '<h1 class="text-center text-bold text-primary" >' . $ivatotal['ValorTotalIVA'] . '€</h1>';
                                                    } else {
                                                        echo '<h1 class="text-center text-bold text-primary" >0€</h1>';
                                                    }
                                                    ?>


                                                </div>

                                                <div class="tab-pane" id="iva_2">
                                                    <?php
                                                    $ivaMensal2 = 'SELECT
                                                    ROUND(SUM((os.PRECO * os.QUANTIDADE) * (iv.IVA / 100)), 2) AS ValorTotalIVA
                                                    FROM orcamento o
                                                    INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                    INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                    INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                    WHERE tipo.NOME = "realizado"
                                                    AND o.DATA >= DATE_SUB(CURRENT_DATE(), INTERVAL 3 MONTH)
                                                   ';
                                                    $ivatotal2 = get_dados_one($ivaMensal2);

                                                    if (!empty($ivatotal2) && isset($ivatotal2['ValorTotalIVA'])) {


                                                        echo '<h1 class="text-center text-bold text-primary" >' . $ivatotal2['ValorTotalIVA'] . '€</h1>';
                                                    } else {
                                                        echo '<h1 class="text-center text-bold text-primary" >0€</h1>';
                                                    }


                                                    ?>
                                                </div>

                                                <div class="tab-pane" id="iva_3">
                                                    <?php
                                                    $ivaMensal3 = 'SELECT
                                                    ROUND(SUM((os.PRECO * os.QUANTIDADE) * (iv.IVA / 100)), 2) AS ValorTotalIVA
                                                    FROM orcamento o
                                                    INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                    INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                    INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                    WHERE tipo.NOME = "realizado"
                                                    AND YEAR(o.DATA) = YEAR(CURRENT_DATE())';
                                                    $ivatotal3 = get_dados_one($ivaMensal3);

                                                    if (!empty($ivatotal3) && isset($ivatotal3['ValorTotalIVA'])) {
//                                                      
                                                        echo '<h1 class="text-center text-bold text-primary" >' . $ivatotal3['ValorTotalIVA'] . '€</h1>';
                                                    } else {
                                                        echo '<h1 class="text-center text-bold text-primary" >0€</h1>';
                                                    }
                                                    ?>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4 ">
                                    <div class="box box-primary">

                                        <h3 class="text-center text-bold ">Clientes TOP 5</h3><!-- Custom Tabs -->
                                        <div class="nav-tabs-custom" style="height: 185px;">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#tab_1" data-toggle="tab"
                                                                      aria-expanded="true">Mensal</a></li>
                                                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Trimestal</a>
                                                </li>
                                                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Anual</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">


                                                    <?php
                                                    $topClientes = 'SELECT
                                                                c.NOME AS NomeCliente,
                                                                ROUND (SUM((os.PRECO * os.QUANTIDADE) * (1 + (iv.IVA / 100))),2) AS ValorTotalOrcamentoComIVA
                                                                FROM clientes c
                                                                INNER JOIN orcamento o ON c.ID_CLIENTES = o.ID_ORC_CLIENTES
                                                                INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                                INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                                INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                                WHERE tipo.NOME = "realizado"
                                                                AND MONTH(o.DATA) = MONTH(CURRENT_DATE()) 
                                                                AND YEAR(o.DATA) = YEAR(CURRENT_DATE())
                                                                GROUP BY c.NOME 
                                                                ORDER BY ValorTotalOrcamentoComIVA DESC LIMIT 5';
                                                    $orcClientes = get_dados($topClientes);

                                                    ?>

                                                    <table class="table-striped" style=" width: 100%">


                                                        <?php


                                                        if (empty($orcClientes)) {
                                                            echo '<h4 class="text-center text-bold" > Sem orçamentos realizados </h4>';
                                                        } else {
                                                            foreach ($orcClientes as $valorOrc) { ?>
                                                                <tr>

                                                                    <td><?php echo '<span class="text-bold" >' . $valorOrc['NomeCliente'] . '</span>'; ?></td>
                                                                    <td align="right"><?php echo '<span class="text-bold" >' . $valorOrc['ValorTotalOrcamentoComIVA'] . '€</span>'; ?></td>

                                                                </tr>
                                                            <?php }
                                                        } ?>

                                                    </table>


                                                </div>
                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="tab_2">


                                                    <?php
                                                    $topClientes2 = 'SELECT
                                                                c.NOME AS NomeCliente,
                                                                ROUND (SUM((os.PRECO * os.QUANTIDADE) * (1 + (iv.IVA / 100))),2) AS ValorTotalOrcamentoComIVA
                                                                FROM clientes c
                                                                INNER JOIN orcamento o ON c.ID_CLIENTES = o.ID_ORC_CLIENTES
                                                                INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                                INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                                INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                                WHERE tipo.NOME = "realizado"
                                                                AND o.DATA >= DATE_SUB(CURRENT_DATE(), INTERVAL 3 MONTH)
                                                                GROUP BY c.NOME 
                                                                ORDER BY ValorTotalOrcamentoComIVA DESC LIMIT 5';
                                                    $orcClientes2 = get_dados($topClientes2);

                                                    ?>

                                                    <table class="table-striped" style=" width: 100%">

                                                        <?php
                                                        if (empty($orcClientes2)) {
                                                            echo '<h4 class="text-center text-bold" > Sem orçamentos realizados </h4>';
                                                        } else {
                                                            foreach ($orcClientes2 as $valorOrc2) { ?>
                                                                <tr>

                                                                    <td><?php echo '<span class="text-bold" >' . $valorOrc2['NomeCliente'] . '</span>'; ?></td>
                                                                    <td align="right"><?php echo '<span class="text-bold" >' . $valorOrc2['ValorTotalOrcamentoComIVA'] . '€</span>'; ?></td>

                                                                </tr>
                                                            <?php }
                                                        } ?>

                                                    </table>

                                                </div>
                                                <!-- /.tab-pane -->
                                                <div class="tab-pane" id="tab_3">


                                                    <?php
                                                    $topClientes3 = 'SELECT
                                                                c.NOME AS NomeCliente,
                                                                ROUND (SUM((os.PRECO * os.QUANTIDADE) * (1 + (iv.IVA / 100))),2) AS ValorTotalOrcamentoComIVA
                                                                FROM clientes c
                                                                INNER JOIN orcamento o ON c.ID_CLIENTES = o.ID_ORC_CLIENTES
                                                                INNER JOIN orc_art_ser os ON o.ID_ORCAMENTO = os.ID_OAS_ORCAMENTO
                                                                INNER JOIN iva iv ON os.OAS_IVA = iv.ID_IVA
                                                                INNER JOIN tipo_orc tipo ON o.TIPO = tipo.ID_TIPO_ORC
                                                                WHERE tipo.NOME = "realizado"
                                                                AND YEAR(o.DATA) = YEAR(CURRENT_DATE())
                                                                GROUP BY c.NOME 
                                                                ORDER BY ValorTotalOrcamentoComIVA DESC LIMIT 5';
                                                    $orcClientes3 = get_dados($topClientes3);

                                                    ?>

                                                    <table class="table-striped " style=" width: 100%">

                                                        <?php
                                                        if (empty($orcClientes3)) {
                                                            echo '<h4 class="text-center text-bold" > Sem orçamentos realizados </h4>';
                                                        } else {
                                                            foreach ($orcClientes3 as $valorOrc3) { ?>
                                                                <tr>

                                                                    <td><?php echo '<span class="text-bold" >' . $valorOrc3['NomeCliente'] . '</span>'; ?></td>
                                                                    <td align="right"><?php echo '<span class="text-bold" >' . $valorOrc3['ValorTotalOrcamentoComIVA'] . '€</span>'; ?></td>


                                                                </tr>
                                                            <?php }
                                                        } ?>

                                                    </table>


                                                </div>
                                                <!-- /.tab-pane -->
                                            </div>
                                            <!-- /.tab-content -->


                                        </div>
                                        <!-- nav-tabs-custom -->
                                    </div>
                                </div>

                            </div>
                            <div class="content">

                                <!------------------------------------------------ BAR CHART ---------------------------------------------------------------->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="text-center text-bold ">Orçamentos</h3>

                                    </div>
                                    <div class="box-body">
                                        <div class="chart-container"
                                             style="position: relative; height:400px; width:100%;">
                                            <canvas id="barChart"></canvas>
                                        </div>
                                        <p class="text-center "><span class=" text-primary ">Orçamentos Pedidos &nbsp &nbsp &nbsp </span>
                                            <span class=" text-green "> Orçamentos Realizados &nbsp &nbsp &nbsp</span>
                                            <span class="text-danger"> Orçamentos Rejeitados &nbsp &nbsp &nbsp</span>
                                        </p>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box-body -->

                        </div>

                    </div>
                    <!--end box body-->
                </div>


                <!--end box box primary-->
            </div>


            <!--================================================== MODAL CHEQUES EDITAR =================================================================-->


            <div class="modal " id="editChequeModal">
                <div class="modal-dialog">
                    <!-- Modal content -->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Editar Cheque</h4>
                        </div>

                        <div class="modal-body">

                            <form id="editCheque" action="" method="POST">

                                <input type="hidden" id="IDCHEQUEEDIT" name="idChequeEdit" class="form-control">


                                <div class="form-group">
                                    <label for="Fornecedor">Fornecedor:</label>
                                    <input type="text" id="FORNECEDOREDIT" name="fornecedorEdit"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="Fornecedor">Data Emissão:</label>

                                    <div class="input-group date">

                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="DATAEMISSAOEDIT"
                                               name="dataEmissaoEdit">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="Fornecedor">Data Pagamento:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="DATAPAGAMENTOEDIT"
                                               name="dataPagamentoEdit">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Fornecedor">Valor:</label>
                                    <input type="text" id="VALOREDIT" name="valorEdit" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Fornecedor">Dias Pagamento:</label>

                                    <select name="diasEdit" id="DIASEDIT" class="form-control" style="">
                                        <?php

                                        //query a executar...a tabela chama-se seccoes
                                        $queryDiasP = 'Select * from dias_pagamento';
                                        //execução da query
                                        $resultadoDias = mysqli_query(bd(), $queryDiasP);
                                        //para todas as linhas da tabela
                                        while ($DiasPagamento = mysqli_fetch_array($resultadoDias)) {

                                            echo '<option value="' . $DiasPagamento['ID_DIAS'] . '" >' . $DiasPagamento['DIAS'] . ' DIAS</option>';

                                        }


                                        ?>
                                    </select>

                                </div>
                                </tr>
                                </table>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close
                            </button>
                            <button form="editCheque" type="submit" class="btn btn-success ">Atualizar</button>
                        </div>
                    </div>
                </div>

            </div>


            <!--================================================== MODAL CHEQUES ADICIONAR =================================================================-->


            <div class="modal " id="addChequeModal" style="display: none;">
                <div class="modal-dialog">
                    <!-- Modal content -->
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Adicionar Cheque</h4>
                        </div>

                        <div class="modal-body">

                            <form id="addChequeForm" action="" method="POST">

                                <div class="form-group">
                                    <label for="Fornecedor">Fornecedor:</label>
                                    <input type="text" id="FORNECEDOR" name="fornecedor" class="form-control">

                                </div>

                                <div class="form-group">
                                    <label for="Data Emissao">Data Emissao:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="DATAEMISSAOADDCHEQUE"
                                               name="dataEmissao">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Data Emissao">Data Pagamento:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="DATAPAGAMENTO"
                                               name="dataPagamento">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Valor">Valor:</label>
                                    <input type="number" id="VALOR" name="valor" class="form-control" step='.01'>

                                </div>

                                <div class="form-group">
                                    <label for="Valor">Dias:</label>
                                    <select name="dias" id="DIAS" class="form-control" style=" width: 130px">
                                        <?php

                                        //query a executar...a tabela chama-se seccoes
                                        $query = 'Select ID_DIAS, DIAS from dias_pagamento';
                                        //execução da query
                                        $resultado = mysqli_query(bd(), $query);
                                        //para todas as linhas da tabela
                                        while ($linha = mysqli_fetch_array($resultado)) {

                                            echo '<option selected="selected" value="' . $linha['ID_DIAS'] . '" >' . $linha['DIAS'] . ' DIAS</option>';
                                        }
                                        ?>
                                    </select>
                                </div>


                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left danger" data-dismiss="modal">
                                Fechar
                            </button>
                            <button form="addChequeForm" type="submit" class="btn btn-success "><i
                                        class="fa fa-save"></i> &nbsp; Guardar
                            </button>
                        </div>
                    </div>
                </div>

            </div>


            <!--======================================== END CONTENT     =================================================-->
        </section>
    </div>





    <!--end row-->


<!-- /.content-wrapper -->

<footer class="main-footer">
    <?php
    $footerq = 'SELECT * FROM versao_pgo';
    $versao = get_dados_one($footerq);
    ?>
    <center><p style="font-size: 10px;">
            <img src="img/icon pgo.png">&nbsp Plataforma<strong>&nbspGO</strong> -
            Versão <?PHP echo $versao['VERSAO']; ?>
            <br><strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All
            rights reserved. <b>Version</b> 2.3.7
        </p></center>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>


    $(document).ready(function () {
        // Array de nomes dos meses
        var nomesDosMeses = [
            "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
            "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
        ];

        $.ajax({
            url: 'includes/session.php?chartData=true',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var meses = [];
                var totalOrcamentosRealizados = [];
                var totalOrcamentosPedidos = [];
                var totalOrcamentosRejeitados = [];

                for (var mes = 1; mes <= 12; mes++) {
                    meses.push(nomesDosMeses[mes - 1]); // Obter o nome do mês
                    var mesData = data[mes] || {
                        'Orcamentos Realizados': 0,
                        'Orcamentos Pedidos': 0,
                        'Orcamentos Rejeitados': 0
                    };
                    totalOrcamentosRealizados.push(mesData['Orcamentos Realizados']);
                    totalOrcamentosPedidos.push(mesData['Orcamentos Pedidos']);
                    totalOrcamentosRejeitados.push(mesData['Orcamentos Rejeitados']);
                }

                var barChartData = {
                    labels: meses,
                    datasets: [

                        {
                            label: "Orçamentos Pedidos",
                            backgroundColor: 'rgba(51, 122, 183, 0.5)', // Bootstrap primary blue with transparency
                            borderColor: 'rgba(51, 122, 183, 1)', // Bootstrap primary blue
                            borderWidth: 1,
                            data: totalOrcamentosPedidos
                        },
                        {
                            label: "Orçamentos Realizados",
                            backgroundColor: 'rgba(0, 166, 90, 0.5)', // Bootstrap green with transparency
                            borderColor: 'rgba(0, 166, 90, 1)', // Bootstrap green
                            borderWidth: 1,
                            data: totalOrcamentosRealizados
                        },
                        {
                            label: "Orçamentos Rejeitados",
                            backgroundColor: 'rgba(221, 75, 57, 0.5)', // Bootstrap red with transparency
                            borderColor: 'rgba(221, 75, 57, 1)', // Bootstrap red
                            borderWidth: 1,
                            data: totalOrcamentosRejeitados
                        }
                    ]
                };

                var ctx = document.getElementById('barChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                beginAtZero: true,
                                ticks: {
                                    autoSkip: true,
                                    maxRotation: 45,
                                    minRotation: 0
                                }
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Function to handle chart resize for proper display
                function resizeChart() {
                    if (myChart) {
                        myChart.resize();
                    }
                }

                // Also resize when sidebar toggles (AdminLTE specific)
                $('[data-toggle="offcanvas"]').on('click', function () {
                    setTimeout(resizeChart, 200);
                });

                // Handle window resize
                $(window).resize(function () {
                    setTimeout(resizeChart, 100);
                });
            },
            error: function (xhr, status, error) {
                console.log("AJAX Error: " + error);
                console.log("Status: " + status);
                console.log("Response: " + xhr.responseText);

                // Fallback chart with sample data in case of error
                var meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                    "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
                var barChartData = {
                    labels: meses,
                    datasets: [
                        {
                            label: "Orçamentos Pedidos",
                            backgroundColor: 'rgba(51, 122, 183, 0.5)',
                            borderColor: 'rgba(51, 122, 183, 1)',
                            borderWidth: 1,
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                        },
                        {
                            label: "Orçamentos Realizados",
                            backgroundColor: 'rgba(0, 166, 90, 0.5)',
                            borderColor: 'rgba(0, 166, 90, 1)',
                            borderWidth: 1,
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                        },
                        {
                            label: "Orçamentos Rejeitados",
                            backgroundColor: 'rgba(221, 75, 57, 0.5)',
                            borderColor: 'rgba(221, 75, 57, 1)',
                            borderWidth: 1,
                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                        }
                    ]
                };

                var ctx = document.getElementById('barChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: barChartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                beginAtZero: true,
                                ticks: {
                                    autoSkip: true,
                                    maxRotation: 45,
                                    minRotation: 0
                                }
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    });

    // DATA TABLE CHEQUES ------------------------------------------

    $(function () {
        $('#tabelaCheques').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false
        });
    });

    // Inicialize o datepicker com o formato 'dd/mm/yyyy' e a data atual como valor inicial
    $('#DATAEMISSAOADDCHEQUE').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    }).datepicker("setDate", 'now');

    // Inicialize o datepicker com o formato 'dd/mm/yyyy' e a data atual como valor inicial
    $('#DATAPAGAMENTO').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    }).datepicker("setDate", 'now');


    //========================= carrega id para o modal editar cheque =============
    $(document).ready(function () {
        // Quando o ícone de edição é clicado
        $('.edit-cheque').click(function (e) {
            e.preventDefault();
            var idCheque = $(this).data('id');


            // Faça uma solicitação AJAX para obter os detalhes do cheque
            $.ajax({
                url: 'includes/session.php',
                method: 'POST',
                data: {idCheque: idCheque},
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        // Preencha os campos no modal com os detalhes do cheque
                        $('#IDCHEQUEEDIT').val(response.ID_CHEQUES);
                        $('#FORNECEDOREDIT').val(response.FORNECEDOR);

                        // Converte a data no formato yyyy-mm-dd para dd/mm/yyyy
                        var dataEmissao = new Date(response.DATA_EMITIDA);
                        var dataPagamento = new Date(response.DATA_PAGAMENTO);

                        // Use o datepicker para definir o valor com o formato 'dd/mm/yyyy'
                        $('#DATAEMISSAOEDIT').datepicker({
                            format: 'dd/mm/yyyy',
                            autoclose: true
                        }).datepicker('setDate', dataEmissao);

                        $('#DATAPAGAMENTOEDIT').datepicker({
                            format: 'dd/mm/yyyy',
                            autoclose: true
                        }).datepicker('setDate', dataPagamento);

                        $('#VALOREDIT').val(response.VALOR);


                        const $select = document.querySelector('#DIASEDIT');
                        $select.value = response.ID_CHEQUES_DIAS;


                        // Abra o modal de edição
                        $('#editChequeModal').modal('show');
                    }
                },
            });
        });
    });


</script>
</body>
</html>
