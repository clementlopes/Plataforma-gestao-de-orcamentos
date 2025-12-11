<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<?php
include_once 'session.php';
session_start();
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Plataforma GO</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <style>
        table, th, td {
            border: 1px solid #000;
        }

        .butao:hover {
            cursor: pointer;
        }

        .dataTables_wrapper .dataTables_filter {
            width: 100%;
            float: left !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            margin: 0px;
            padding-left: 10px;
            width: 100%;
        }

        label {
            width: 100%;
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
                            <span class="hidden-xs"><?php echo $_SESSION['login_user']['NOME']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $_SESSION['login_user']['NOME']; ?>

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
                    <p><?php echo $_SESSION['login_user']['NOME']; ?></p>
                    <!-- Status -->
                    <a><i class="fa fa-circle text-success"></i> Online</a>
                </div>


            </div>


            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">MENU</li>

                <!-- Optionally, you can add icons to the links -->

                <li><a href="home.php"><i class=" fa fa-home"></i> <span>Inicio</span></a></li>

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

                <li><a href="utilizadores.php"><i class="fa fa-user-plus"></i> <span>Utilizadores</span></a></li>
                <li class="active" class="treeview">
                    <a><i class="fa fa-fw fa-home"></i> <span>Casa</span>
                        <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="casa.php"><i class="fa fa-home"></i>Casa</a></li>

                    </ul>
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
                Criar casa
            </h1>

            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Level</a></li>
                <li>Criar casa</li>
            </ol>
        </section>

        <!-- Main content -->


        <!--Your Page Content Here ------------------------------------------------------------------------------->
        <section class="content">


            <div class="row">

                <div class=" box box-primary">
                    <div class="box-body">

                        <!-- ------------------------------------ CLIENTE ------------------------------------------------------------------------------->
                        <div class="row">
                            <div class=" col-xs-6">


                                <input class="form-control" type="hidden" id="ID" name="idcliente1">
                                <input class="form-control" type="hidden" name="data"
                                       value="<?php echo date("Y-m-d"); ?>">
                                <input class="form-control" type="hidden" name="utilizador"
                                       value="<?php echo $_SESSION['login_user']['ID_UTILIZADORES']; ?>">
                                <input class="form-control" type="hidden" name="empresa" value="1">
                                <input class="form-control" type="hidden" name="tipo" value="1">

                                <div class="box ">
                                    <div class="box-header">

                                        <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"
                                                    data-toggle="tooltip" title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body pad ">
                                        <label for="cliente">Cliente:</label>
                                        <input type="text" name="procuracliente" id="PROCURACLIENTE"
                                               class="form-control" placeholder="PROCURAR CLIENTE"/>

                                        <div id="divTabelaCliente"></div>

                                    </div>
                                </div>

                                <input type="text" name="nomecliente" id="NOMECLIENTE" class="form-control"
                                       placeholder="" readonly=""/>


                                <div class="form-group">
                                    <label for="rua">Morada:</label>
                                    <input class="form-control" type="text" id="RUA" name="RUA" placeholder="Rua"
                                           disabled="">
                                    <input class="form-control" type="text" id="CIDADE" name="CIDADE"
                                           placeholder="Cidade" disabled="">
                                    <input class="form-control" type="text" id="POSTAL" name="POSTAL"
                                           placeholder="Código Postal" disabled="">
                                </div>

                                <div class="form-group">
                                    <label for="data">Nif:</label>
                                    <input class="form-control" type="text" id="NIF" name="NIF" placeholder="Nif"
                                           disabled="">
                                </div>


                            </div>

                            <div class="col-md-6">

                                <div class="box ">
                                    <div class="box-header">

                                        <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"
                                                    data-toggle="tooltip" title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>

                                    <div class="box-body pad ">

                                        <div class="form-group">
                                            <label for="data">Data: <?php echo date("Y-m-d"); ?></label>
                                        </div>

                                        <!-- ------------------------------------ TECIDO ------------------------------------------------------------------------------->

                                        <div class="form-group">
                                            <label for="data">Nome Janela:</label>
                                            <input class="form-control" type="text" id="NOME_JANELA" name="nome_janela">
                                        </div>

                                        <div class="form-group">
                                            <label for="data">Fornecedor Tecido:</label>
                                            <input class="form-control" type="text" id="TECIDO_FORNECEDOR"
                                                   name="tecido_fornecedor" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="data">Tecido Referencia:</label>
                                            <input class="form-control" type="text" id="TECIDO_REFERENCIA"
                                                   name="tecido_referencia" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="data">Tecido Cor:</label>
                                            <input class="form-control" type="text" id="TECIDO_COR" name="tecido_cor"
                                                   value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="data">Preço Tecido:</label>
                                            <input class="form-control" type="text" id="PRECO_TECIDO"
                                                   name="preco_tecido" value="">
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tipo Aplicação:</label>

                                    <input class="form-control" type="text" id="PROCURA_APLICACAO" name="nome_aplicacao"
                                           value="">
                                    <div id="divTabelaAplicacao"></div>
                                    <input class="form-control" type="text" id="NOME_TIPO_APLICACAO"
                                           name="nome_tipo_aplicacao" value="" readonly="">
                                    <input class="form-control" type="hidden" id="ID_TIPO_APLICACAO"
                                           name="id_tipo_aplicacao" value="" readonly="">
                                    <input class="form-control" type="hidden" id="PRECO_TIPO_APLICACAO"
                                           name="preco_tipo_aplicacao" value="" readonly="">


                                </div>
                                <div class="form-group">
                                    <label>Largura da Onda:</label>
                                    <select id="MUTIPLICAR_TECIDO" name="mutiplicar_tecido" class="form-control">
                                        <option value="0">ESCOLHER LARGURA</option>
                                        <option value="2.5">2.5</option>
                                        <option value="2.7">2.7</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="data">Fita:</label>
                                    <select id="FITA" name="fita" class="form-control">
                                        <option value="0">ESCOLHER FITA</option>
                                        <?php
                                        //query a executar...a tabela chama-se seccoes
                                        $query = 'Select * from fitas';
                                        //execução da query
                                        $resultado = mysqli_query(bd(), $query);
                                        //para todas as linhas da tabela
                                        while ($linha = mysqli_fetch_array($resultado)) {
                                            //escreve o 'id' no value e o 'nome' no texto.

                                            echo '<option value="' . $linha['PRECO'] . '">' . $linha['NOME'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <table class="tabela">

                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="form-group">
                                                <label for="data">Largura Calha:</label>
                                                <input class="form-control" type="text" id="LAR_CALHA" name="lar_calha"
                                                       value="" onchange="procura_calha()">
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="data">Altura Janela:</label>
                                                <input class="form-control" type="text" id="ALT_JANELA"
                                                       name="alt_janela" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <img src="img/janela/janela.png" width="400" height="400"></td>
                                        <td>
                                            <div class="form-group">
                                                <label for="data">Altura Calha:</label>
                                                <input class="form-control" type="text" id="ALT_CALHA" name="alt_calha"
                                                       value="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="data">Largura Janela:</label>
                                                <input class="form-control" type="text" id="LAR_JANELA"
                                                       name="lar_janela" value="">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>

                                    </tr>
                                </table>

                            </div>
                            <div class="col-md-6">


                                <div class="form-group">

                                    <label for="data">Calha:</label>
                                    <select id="COR_CALHA" name="cor_calha" class="form-control"
                                            onchange="procura_calha()">
                                        <option value="0">ESCOLHER COR</option>
                                        <?php

                                        //query a executar...a tabela chama-se seccoes
                                        $query = 'Select * from cor_calha';
                                        //execução da query
                                        $resultado = mysqli_query(bd(), $query);
                                        //para todas as linhas da tabela
                                        while ($linha = mysqli_fetch_array($resultado)) {
                                            //escreve o 'id' no value e o 'nome' no texto.

                                            echo '<option value="' . $linha['ID_COR'] . '">' . $linha['COR'] . '</option>';

                                        }


                                        ?>
                                    </select>
                                    <div class="form-group col-md-6">
                                        <label for="data">Calha:</label>
                                        <input class="form-control" type="text" id="NOME_CALHA" name="nome_calha"
                                               value="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="data">Medida:</label>
                                        <input class="form-control" type="text" id="MEDIDA_CALHA" name="medida_calha"
                                               value="">
                                    </div>
                                    <div id="divtabelaCalhas"></div>
                                    <input class="form-control" type="text" id="ID_CALHA" name="id_calha" value="">
                                    <input class="form-control" type="number" id="PRECO_CALHA" name="calha_preco"
                                           value="">
                                    <input class="form-control" type="text" id="FORNECEDOR_CALHA"
                                           name="fornecedor_calha" value="">
                                    <input class="form-control" type="text" id="OPCAO" name="fornecedor_calha" value="">
                                </div>


                            </div>
                            <input class="form-control" type="text" id="TOTAL" name="total" value="">
                            <button type="button" class="teste btn btn-primary col-md-6" onClick="calcular()">CALCULAR
                            </button>
                        </div>


                    </div>


                </div>
            </div>
            <!--                     /.row -->
        </section>

    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">

        <!-- Default to the left -->
        <center><strong>&copy; 2016</strong> Plataforma<strong>GO</strong>
        </center>
    </footer>


</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script>

    $(document).ready(function () {

        $('#PROCURACLIENTE').keyup(function () {
            var nome_cliente = $(this).val();

            if (nome_cliente != '') {

                const xhttp = new XMLHttpRequest();
                xhttp.onload = function () {
                    document.getElementById("divTabelaCliente").innerHTML = this.responseText;
                }
                xhttp.open("GET", "ajaxrequest/ajaxfuncoes.php?nome_cliente=" + nome_cliente);
                xhttp.send();
            } else {
                document.getElementById("divTabelaCliente").innerHTML = '';
            }


        });
    });

    $(document).ready(function () {

        $('#PROCURA_APLICACAO').keyup(function () {
            var nome_aplicacao = $(this).val();

            if (nome_aplicacao != '') {

                const xhttp = new XMLHttpRequest();
                xhttp.onload = function () {
                    document.getElementById("divTabelaAplicacao").innerHTML = this.responseText;
                }
                xhttp.open("GET", "ajaxrequest/ajaxfuncoes.php?nome_aplicacao=" + nome_aplicacao);
                xhttp.send();
            } else {
                document.getElementById("divTabelaAplicacao").innerHTML = '';
            }


        });
    });

    function add_cliente(num) {

        var id = document.getElementById("ID_CLIENTE" + num);
        var nome = document.getElementById("NOME_CLIENTE" + num);
        var morada = document.getElementById("MORADA" + num);
        var cidade = document.getElementById("CIDADE" + num);
        var postal = document.getElementById("POSTAL" + num);
        var nif = document.getElementById("NIF" + num);
        $('#NOMECLIENTE').val(nome.value);
        $('#ID').val(id.value);
        $('#RUA').val(morada.value);
        $('#CIDADE').val(cidade.value);
        $('#POSTAL').val(postal.value);
        $('#NIF').val(nif.value);

    }

    function add_aplicacao(num) {
        console.log(num);
        var id = document.getElementById("ID_TIPO_APLICACAO" + num);
        var nome = document.getElementById("NOME_APLICACAO" + num);
        var preco = document.getElementById("PRECO_APLICACAO" + num);
        $('#NOME_TIPO_APLICACAO').val(nome.value);
        $('#ID_TIPO_APLICACAO').val(id.value);
        $('#PRECO_TIPO_APLICACAO').val(preco.value);

    }

    function add_tipoJanela(tipoJanela) {

        $('#ID_TIPO_JANELA').val(tipoJanela.ID_TIPO_JANELA);
        $('#NOME_TIPO_JANELA').val(tipoJanela.NOME);
        $('#PRECO_TIPO_JANELA').val(tipoJanela.PRECO);
    }

    function add_calha(num) {

        var id = document.getElementById("ID_LINHACALHA" + num);
        var nome = document.getElementById("CALHA_NOME" + num);
        var fornecedor = document.getElementById("CALHA_FORNECEDOR" + num);
        var medida = document.getElementById("CALHA_MEDIDA" + num);
        var preco = document.getElementById("CALHA_PRECO" + num);
        var opcao = document.getElementById("OPCAO" + num);
        $('#ID_CALHA').val(id.value);
        $('#NOME_CALHA').val(nome.value);
        $('#MEDIDA_CALHA').val(medida.value);
        $('#PRECO_CALHA').val(preco.value);
        $('#FORNECEDOR_CALHA').val(fornecedor.value);
        $('#OPCAO').val(opcao.value);
    }

    function procura_calha() {

        var calhaL = document.getElementById("LAR_CALHA");
        var medida = calhaL.value;
        var cor = document.getElementById("COR_CALHA");
        var cor_calha = cor.value;


        if (medida != '' && cor_calha != 0) {

            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                document.getElementById("divtabelaCalhas").innerHTML = this.responseText;
            }
            xhttp.open("GET", "ajaxrequest/ajaxfuncoes.php?Lar=" + medida + "&Cor=" + cor_calha);
            xhttp.send();
        } else {
            document.getElementById("divtabelaCalhas").innerHTML = '';
        }


    }

    function calcular() {

        var calhaL = document.getElementById("LAR_CALHA");
        console.log('largura calha', calhaL.value);
        var mutiplicar_tecido = document.getElementById("MUTIPLICAR_TECIDO");

        var largura_tecido = (calhaL.value * mutiplicar_tecido.value);
        console.log('largura tecido', largura_tecido);

        var preco_tecido = document.getElementById("PRECO_TECIDO");
        var preco_tecido_total = preco_tecido.value * largura_tecido;
        console.log('preco tecido', preco_tecido_total);

        var preco_confecao = document.getElementById("PRECO_TIPO_JANELA");
        var preco_confecao_final = (preco_confecao.value * calhaL.value);
        console.log('preco confecao', preco_confecao_final);

        var preco_calha = document.getElementById("PRECO_CALHA");
        var preco_calha_final = preco_calha.value;
        console.log('preco calha', preco_calha_final);

        var preco_fita = document.getElementById("FITA");
        var preco_fita_final = (preco_fita.value * largura_tecido);
        console.log('preco fita', preco_fita_final);

        var total = preco_tecido_total + preco_fita_final + preco_confecao_final + (preco_calha_final * 1);
        console.log('total', total);
        $('#TOTAL').val(total);


    }


    $(function () {
        $("#cliente").DataTable({
            "dom": "<'row'<'col-lg-12 col-md-12 col-xs-12'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "paging": true,
            "pageLength": 1,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "oLanguage": {
                "sSearch": ""
            }
        });

        $("#calhas").DataTable({});


    });


</script>
</body>
</html>
