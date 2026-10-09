<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

    <?php
    include_once __DIR__ . '/includes/session.php';
    
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
        <link rel="shortcut icon" type="image/x-icon" href="img/icon pgo.png">
        <style>
            .lista{
                border: 1px solid #000000;
                color: black;
            }
            
            
           .sublista{
        cursor: pointer;
        border-bottom: 1px solid #3c8dbc;
        
            }
            .sublista:hover {
          background-color: #3c8dbc;
           color: black;
        }
 
            .butao:hover {
            cursor: pointer; 
            }
   .dataTables_wrapper .dataTables_filter{
        width: 100%;
       float: left !important;
}
div.dataTables_wrapper div.dataTables_filter input {
    margin: 0px;
    padding-left: 10px;
      width: 100%;
}
label{
    width: 100%;
}
        


        </style>
    </head>

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

                            <ul class="dropdown-menu">   </ul>



                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?php echo $_SESSION['NOME']; ?> </span>
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
                                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
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
                            <p><?php echo $_SESSION['NOME']; ?> </p>
                            <!-- Status -->
                            <a><i class="fa fa-circle text-success"></i> Online</a>
                        </div>



                    </div>



                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU</li>

                        <!-- Optionally, you can add icons to the links -->

                        <li><a href="home.php"><i class=" fa fa-home"></i> <span>Inicio</span></a> </li>

                        <li><a href="empresa.php"><i class=" fa fa-building"></i> <span>Dados Empresa</span></a> </li>

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

                        <li class="active"><a href="verorcamento.php"><i class="fa fa-fw fa-archive"></i> <span>Ver orçamentos</span></a></li>

                        <li><a href="clientes.php"><i class="fa fa-user-plus"></i> <span>Clientes</span></a></li>

                        <li <?php echo $_SESSION['ADMIN']; ?>  ><a href="utilizadores.php"><i class="fa fa-user-plus"></i> <span>Utilizadores</span></a></li>






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
                        Criar Orçamento
                    </h1>

                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Criar Orçamento</li>
                    </ol>
                </section>

                <!-- Main content -->




                <!-- Your Page Content Here -------------------------------------------------------------------------------------------------------------------------->

                <section class="content">

                    <!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
    
                                <form role="form" action="api/ins_linha.php" id="theform" method="post">
                                        <div class="box-body">
                                            
                                        <div class="box-body" >
                                        <div class=" col-xs-6"  >
                                           
                                            
                                            <input class="form-control" type="hidden" id="ID"  name="idcliente1">
                                            <input class="form-control" type="hidden"  name="data" value="<?php echo date("Y-m-d"); ?>" >
                                            <input class="form-control" type="hidden"  name="utilizador" value="<?php echo $_SESSION['ID_UTILIZADORES']; ?>" >
                                            <input class="form-control" type="hidden"  name="empresa" value="1" >
                                            <input class="form-control" type="hidden"  name="tipo" value="1" >
                                            
                                            <div class="box ">
                                                <div class="box-header">
                                                
                                                <div class="pull-right box-tools">
                                                    <button type="button" class="btn btn-primary btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                        <i class="fa fa-minus"></i></button>
                                                </div>
                                                </div>
                                                    <div class="box-body pad ">
                                                <label for="cliente">Cliente:</label>
                                                
                                                <?php
                                                $clientes = "SELECT clientes.NOME, CONCAT_WS('', RUA, NUMERO) AS MORADA, clientes.ID_CLIENTES, clientes.RUA, clientes.NUMERO, clientes.CIDADE, clientes.POSTAL, clientes.NIF FROM clientes order BY NOME ";
                                                $resp = get_dados($clientes);
                                                ?>
                                                <table id="tabelaClientes" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <td></td>
                                                            <td>NOME</td>
                                                            <td>MORADA</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php 
                                                        foreach ($resp as $client){
                                                        ?>
                                                        <tr>   
                                                            <td style="width: 20px;"><i class="glyphicon glyphicon-plus butao text-green " onclick='add_cliente(<?php echo json_encode($client); ?>)' ></i></td>
                                                            <td><?php echo $client['NOME']; ?></td>
                                                            <td><?php echo $client['MORADA']; ?></td>
                                                            
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                
                                                
                                                
                                            </div>
                                        </div>
                                            
                                            <input type="text" name="nomecliente" id="NOMECLIENTE" class="form-control" placeholder="" readonly="" />

                                            
                                            <div class="form-group">
                                                    <label for="rua">Morada:</label>
                                                    <input class="form-control" type="text" id="RUA" name="RUA" placeholder="Rua" disabled="" >
                                                    <input class="form-control" type="text" id="CIDADE" name="CIDADE" placeholder="Cidade" disabled="" >
                                                    <input class="form-control" type="text" id="POSTAL" name="POSTAL" placeholder="Código Postal" disabled="" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="data">Nif:</label>
                                                <input class="form-control" type="text" id="NIF" name="NIF" placeholder="Nif" disabled="" >
                                            </div>

                                            
                                            </div>
                                            
                                            <div class="col-md-3"  >
                                                
                                                <div class="form-group">
                                                    <label for="data">Data: <?php echo date("Y-m-d"); ?></label>
                                                </div>
                                            </div>
                                            
                                            
                                            </div>
                                            
                                            <div class="box box-primary" >

                                                <div id="wrapper" class="box-body">
                                                    <h3 class="text-center">Adicione Produtos</h3><br>

                                                    <div id="form_div">

                                                        <table id="linhas" class="table table-bordered table-striped" >

                                                            <thead>
                                                                <tr>
                                                                    <td>Código</td>
                                                                    <td>Nome</td>
                                                                    <td>Descrição</td>
                                                                    <td>Preço unitário</td>
                                                                    <td>Quantidade</td>
                                                                    <td>Desconto</td>
                                                                    <td>Iva</td>
                                                                    <td>Preço final</td>
                                                                    <td>Funções</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                
                                                            </tbody>
                                                        </table>

                                                    </div>
                                            
                                                </div>
                                                <!--===========================        END FORM =============================-->

                                                <div class="box box-primary" >
                                                    <div class="box-body  ">
                                                          <!--================================== ADCIONA ARTIGOS==========================================-->
                                                        
                                                          <div class="" style=" position: relative; left: 25%;" >
                                                                     <button type="button" onclick="add_row();" class="btn btn-primary col-md-6"><i class="glyphicon glyphicon-plus "   ></i>&nbspAdicionar Linha</button>
                                                                </div>
                                                         
                                                        
                                                        <div class="form-group">
                                                            <br><br><label for="artigos"><b>Procurar:</b></label>
                                                            <select id="OPCAO" name="OPCAO" style=" width: 200px" class="form-control" onchange="showDiv(this)" >
                                                            <option value="1">Artigos</option>
                                                            <option value="2">Serviços</option>
                                                        </select>
                                                          
                                                        </div>
                                                        
                                                         <?php
                                                         
                                                        $sql = 'SELECT artigos.ID_ARTIGOS, artigos.NOME, artigos.DESCRICAO, artigos.PRECOUNITARIO, artigos.QUANTIDADE, categoria.NOME CATEGORIA, iva.IVA IVA, ID_ART_IVA FROM artigos '
                                                                . 'INNER JOIN categoria ON (artigos.ID_ART_CATEGORIA = categoria.ID_CATEGORIA) INNER JOIN iva ON (artigos.ID_ART_IVA = iva.ID_IVA)';
                                                        $rows = get_dados($sql);
                                                          ?>
                                                        <div id="1" class="" style="display: block;">
                                                        <table id="artigotable" class="table table-bordered table-striped ">
                                                            <thead>
                                                                <tr>
                                                                    <td>Funções</td>
                                                                    <td>Código</td>
                                                                    <td>Nome</td>
                                                                    <td>Descrição</td>
                                                                    <td>Preço</td>
                                                                    <td>Iva</td>
                                                                    <td>Categoria</td>
                                                                    
                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                <?php foreach ($rows as $value) {
                                                                    ?>
                                                                <tr>
                                                                    <td><i class="glyphicon glyphicon-plus butao text-green " id="id_linha"  onclick='add_artigo(<?php echo json_encode($value); ?>);' ></i> </td>
                                                                        <td><?php echo $value['ID_ARTIGOS']; ?></td>
                                                                        <td><?php echo $value['NOME']; ?></td>
                                                                        <td><?php echo $value['DESCRICAO']; ?></td>
                                                                        <td><?php echo $value['PRECOUNITARIO'] . "€"; ?></td>
                                                                        <td><?php echo $value['IVA'] . "%"; ?></td>
                                                                        <td><?php echo $value['CATEGORIA']; ?></td>
                                                                        
                                                                    </tr>
                                                                <?php } ?>

                                                            </tbody>
                                                        </table>
                                                        </div>
                                                        <!--================================== ADCIONA SERVIÇOS==========================================-->
                                                        <div id="2" class="" style="display: none;">
                                                            
                                                            
                                                            <?php
                                                         
                                                        $sql2 = 'SELECT servicos.ID_SERVICOS, servicos.NOME, servicos.DESCRICAO, servicos.PRECOUNITARIO, servicos.QUANTIDADE, categorias.NOME CATEGORIAS, iva.IVA IVA FROM servicos INNER JOIN categorias ON (servicos.ID_SER_CATEGORIA = categorias.ID_CATEGORIAS) INNER JOIN iva ON (servicos.ID_SER_IVA = iva.ID_IVA)';
                                                        $rows2 = get_dados($sql2);
                                                          ?>
                                                            
                                                             <table id="servicotable" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <td>Funções</td>
                                                                    <td>Código</td>
                                                                    <td>Nome</td>
                                                                    <td>Descrição</td>
                                                                    <td>Preço</td>
                                                                    <td>Iva</td>
                                                                    <td>Categoria</td>
                                                                    
                                                                </tr>
                                                            </thead>

                                                            <tbody>

                                                                <?php foreach ($rows2 as $value2) {
                                                                    ?>
                                                                <tr>
                                                                    <td><i class="glyphicon glyphicon-plus butao text-green " id="id_linha"  onclick='add_artigo(<?php echo json_encode($value2); ?>);' ></i> </td>
                                                                        <td><?php echo $value2['ID_SERVICOS']; ?></td>
                                                                        <td><?php echo $value2['NOME']; ?></td>
                                                                        <td><?php echo $value2['DESCRICAO']; ?></td>
                                                                        <td><?php echo $value2['PRECOUNITARIO'] . "€"; ?></td>
                                                                        <td><?php echo $value2['IVA'] . "%"; ?></td>
                                                                        <td><?php echo $value2['CATEGORIAS']; ?></td>
                                                                        
                                                                    </tr>
                                                                <?php } ?>

                                                            </tbody>
                                                        </table>
                                                            
                                                        </div>
                                                            
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        

                                                        
                                                        <!--<input type="text" id="ARTIGO1"  name="name[]"  class="form-control" placeholder="" />--> 
                                                        <!--<div id="artigosList1"></div>-->
                                                    </div>
                                                </div>




                                            </div>                                                  
                                                        
                                            <div class="box-body">
                                                        
                                                <div class=" col-xs-9"  >        
                                                
                                                <div class="form-group">
                                                    <label for="observações">Observações:</label><br>
                                                    <textarea cols="45" rows="3"  name="obs"></textarea>
                                                    <!--<input type="text" class="form-control" name="obs" placeholder="" >-->
                                                    <input type="hidden" id="cod" name="cod" class="form-control" >
                                                </div>
                                                </div>
                                                        
                                                    <div class=" col-md-3">
                                                    
                                                        
                                                        
                                                   <label for="precototal">DESCONTO:</label>
                                                   <input type="number"  name="totaldesconto" id="TOTALDESCONTO"  class="form-control"  disabled>
                                                       
                                                   
                                                   <label for="precototal">TOTAL LÍQUIDO:</label>
                                                   <input type="number"  name="totalliquido" id="TOTALLIQUIDO"  class="form-control"  disabled>
                                                    
                                                   <label for="precototal">TOTAL IVA:</label>
                                                   <input type="NUMBER" name="totaliva" id="TOTALIVA" step='0.01' class="form-control"disabled>
                                                    
                                                   <label for="precototal">TOTAL COM IVA:</label>
                                                   <input type="number"  name="totaLcomiva" id="TOTALCOMIVA"  class="form-control"  disabled>
                                                     
                                                        
                                                    </div>
                                            </div>
                                                
                                            
                                            <div class="" style=" position: relative; left: 25%;" >
                                                <br><button type="submit" name="submit_row" class="btn btn-success col-md-6"><i class="fa fa-save"></i>&nbspInserir</button>
                                            </div>

                                            
                                        </div>

                                    </form>
                                
   
                                <!-- /.box-body -->
                            </div>
                        </div></div>
                    <!-- /.row -->
                </section>

                <!-- /.box-body-->
            </div>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer ">
                <?php
                $footerq= 'SELECT * FROM versao_pgo';
                $versao= get_dados_one($footerq);
                ?>
                <center><p style="font-size: 10px;">
                    <img  src="img/icon pgo.png"  >&nbsp  Plataforma<strong>&nbspGO</strong> - Versão <?PHP echo $versao['VERSAO']; ?>
                <br><strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. <b>Version</b> 2.3.7
                    </p></center>
            </footer>

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


        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
        

        <script> 
 
    var $rowno = 0;
    var artigo;
    var $rtem;
    var $resultado;
    var $dec;
    var $total=0;
    var $totaliva;
    var $precofinal=0;
    
    function add_cliente(data){
       
        $('#NOMECLIENTE').val(data.NOME);
        $('#ID').val(data.ID_CLIENTES);
        $('#RUA').val(data.RUA+' '+data.NUMERO);  
        $('#CIDADE').val(data.CIDADE);  
        $('#POSTAL').val(data.POSTAL); 
        $('#NIF').val(data.NIF); 
                         
    }
    
    
       function showDiv(elem){
            
    if(elem.value == 1){
        document.getElementById('1').style.display = "block";
      document.getElementById('2').style.display = "none";
    }
    if(elem.value == 2){
      document.getElementById('1').style.display = "none";
        document.getElementById('2').style.display = "block";
    }
            }
    
 function add_artigo(value){
   
   opcao = document.getElementById('OPCAO').value;
   $('#cod').val($rowno);
   
   
        if(opcao==1){
            $('#CODIGO'+$rowno).val(value.ID_ARTIGOS);
            $('#TIPOINS'+$rowno).val(1);
          
            }
        else{
            $('#CODIGO'+$rowno).val(value.ID_SERVICOS);
            $('#TIPOINS'+$rowno).val(2);
            }
            
            
            
     $('#IDLINHAADD'+$rowno).val($rowno);
   
    
     $('#NAME'+$rowno).val(value.NOME);
     $('#DESCRICAO'+$rowno).val(value.DESCRICAO);  
     $('#PRECO'+$rowno).val(value.PRECOUNITARIO);
     $('#QUANTIDADE'+$rowno).val(1);
     $('#DESCONTO'+$rowno).val(0);
     
     var iva = value.ID_ART_IVA;
     
     
     
    $('#IVA'+$rowno+' option').filter(function(){
    return $(this).val() == iva;
    }).prop("selected", true);
  
     calculo($rowno);
 };
 
 
    
     
 

     
     

                        
 
    
    
    
   

       function add_row(){
            
            $rowno=$rowno+1;
           $("#linhas tr:last").after("<tr id='row"+$rowno+"'>\n\
                                                <td><input type='hidden' name='idlinhaadd[]' id='IDLINHAADD"+$rowno+"' class='form-control' readonly>\n\
                                                <input type='text' name='codigo[]' id='CODIGO"+$rowno+"' class='form-control'  readonly> \n\
                                                <input type='hidden' name='tipoins[]' id='TIPOINS"+$rowno+"' class='form-control'> </td>\n\
                                                <td><input type='text' id='NAME"+$rowno+"' name='name[]' placeholder='' class='form-control' readonly></td>\n\
                                                <td><input type='text' id='DESCRICAO"+$rowno+"' name='descricao[]' class='form-control'readonly></td>\n\
                                                <td><input type='number' name='preco[]' id='PRECO"+$rowno+"' onchange=calculo(document.getElementById('IDLINHAADD"+$rowno+"').value) step='.01' class='form-control' readonly></td>\n\
                                                <td><input type='number' name='qtd[]' id='QUANTIDADE"+$rowno+"' min='1' onchange=calculo(document.getElementById('IDLINHAADD"+$rowno+"').value) class='form-control'><input type='hidden' name='valor[]' id='VALOR"+$rowno+"'  class='form-control' disabled></td>\n\
\n\                                             <td><input type='number' name='desconto[]' id='DESCONTO"+$rowno+"' onchange=calculo(document.getElementById('IDLINHAADD"+$rowno+"').value) min='0' class='form-control'><input type='hidden' name='valordesc[]' id='VALORDESC"+$rowno+"' onchange=calculo(document.getElementById('IDLINHAADD"+$rowno+"').value) min='0' class='form-control' readonly></td>\n\
                                                <td><input type='hidden' name='valoriva[]' id='VALORIVA"+$rowno+"'  class='form-control' readonly ><select id='IVA"+$rowno+"' name='iva[]' class='form-control' onchange=calculo(document.getElementById('IDLINHAADD"+$rowno+"').value)  > <option value='1'>23%</option> <option value='2'>14%</option> <option value='3'>6%</option> <option value='4'>0%</option> </select></td> \n\
                                                <td><input type='number' name='precofinal[]'  id='PRECOFINAL"+$rowno+"' class='form-control' disabled></td> \n\
                                                <td><i class='glyphicon glyphicon-remove butao text-red'   onclick=delete_row('row"+$rowno+"')></i></td></tr>");
        
        }
        
      
        
        function delete_row(rowno){
            $('#'+rowno).remove();
            
        }

 
    function calculo(num){
    
    var linha= num;
    
    verificarCampos(linha);
   
    //Assume form with id="theform"
    var theform = document.forms["theform"];
    //Get a reference to the TextBox
    var quantidade = theform.elements["QUANTIDADE"+linha];
    var preco = theform.elements["PRECO"+linha];
    var desconto = theform.elements["DESCONTO"+linha];
    var iva = theform.elements["IVA"+linha];
    
    if(iva.value == "1"){
        iva=23/100;
        }
        
    else if(iva.value=="2"){
        iva=14/100;
    }
    else if(iva.value=="3"){
        iva=6/100;
    }
    else{
        iva=0;
    }
    
//    var totalfinal = theform.elements["PRECOTOTAL"];
    var temporario =0;
    var temporario2 =0;
    var temporario3 =0;
    var temporario4 =0;
    var temporario5 =0;
    var temporario6 =0;
    var precofinal =0;
// ========== TOTAL VALOR com IVA 
     var total =0;
    var totalfinal =0;
    var totalfinaltemp =0;
// ========== TOTAL DESCONTO var
    var totaldesc =0;
    var totaldesctemp =0;
    var totaldescfinal =0;
//    ========== TOTAL VALOR SEM IVA (LIQUIDO) var
    var totalvalor =0;
    var totalvalortemp =0;
    var totalvalorfinal =0;
//        ========== TOTAL VALOR do IVA  var
    var totalvaloriva =0;
    var totalvalorivatemp =0;
    var totalvalorivafinal =0;
    
//    If the textbox is not blank
    if(quantidade.value!="")
    {
            
            
            
        temporario = parseFloat(quantidade.value*preco.value);
        
        
        temporario2 = parseFloat(desconto.value/100);
        
        
        if(temporario2==0){
           
            temporario3 = temporario;
           
            $('#VALORDESC'+linha).val(0);
            $('#VALOR'+linha).val(temporario3);
            temporario4 = parseFloat(temporario3*iva);
        
        $('#VALORIVA'+linha).val(temporario4);
        temporario5 = parseFloat(temporario+temporario4);
       
        precofinal = temporario5.toFixed(2);
        }
        else{
           
            temporario3 = parseFloat(temporario*temporario2);
      
            $('#VALORDESC'+linha).val(temporario3);
            temporario4 = parseFloat(temporario-temporario3);
     
            $('#VALOR'+linha).val(temporario4);
            temporario5 = parseFloat(temporario4*iva);
     
            $('#VALORIVA'+linha).val(temporario5);
            temporario6 = parseFloat(temporario4+temporario5);
            
            precofinal = temporario6.toFixed(2);
        }
 

        $('#PRECOFINAL'+linha).val(precofinal);
        
        
// ========== TOTAL DESCONTO
        
         for(i=1; i<=$rowno; i++){
            
            
            // verifica se tem valor para somar
            totaldesc = theform.elements["VALORDESC"+i];
            if ( totaldesc &&  totaldesc.value) {
             
                totaldesctemp = parseFloat(totaldesc.value*1);
                totaldescfinal = parseFloat(totaldescfinal+totaldesctemp);
                
            }
            
           
        }
        totaldescfinal = parseFloat(totaldescfinal*1).toFixed(2);
        $('#TOTALDESCONTO').val(totaldescfinal);
        
//        ========== TOTAL VALOR SEM IVA (LIQUIDO)
        
        for(i=1; i<=$rowno; i++){
            
            
                 // verifica se tem valor para somar
            totalvalor = theform.elements["VALOR"+i];
            if (  totalvalor &&   totalvalor.value) {
                 totalvalortemp = parseFloat(totalvalor.value*1);
          totalvalorfinal = parseFloat(totalvalorfinal+totalvalortemp);
                
            }
            
            
           
        }
        totalvalorfinal = parseFloat(totalvalorfinal*1).toFixed(2);
        $('#TOTALLIQUIDO').val(totalvalorfinal);
        
//        ========== TOTAL VALOR  IVA 
        
         for(i=1; i<=$rowno; i++){
            
          totalvaloriva = theform.elements["VALORIVA"+i];
          
            if (  totalvaloriva &&   totalvaloriva.value) {
                 totalvalorivatemp = parseFloat(totalvaloriva.value*1);
          totalvalorivafinal = parseFloat(totalvalorivafinal+totalvalorivatemp);
                
            }
          
         
           
        }
        totalvalorivafinal = parseFloat(totalvalorivafinal*1).toFixed(2);
        $('#TOTALIVA').val(totalvalorivafinal);
        
        
//        ========== TOTAL VALOR COM IVA 
        
        for(i=1; i<=$rowno; i++){
            
          total = theform.elements["PRECOFINAL"+i];
          
           if (  total &&   total.value) {
                 totalfinaltemp = parseFloat(total.value*1);
          totalfinal = parseFloat(totalfinal+totalfinaltemp);   
            }
          
          
          
           
        }
        
        totalfinal = parseFloat(totalfinal*1).toFixed(2);
        $('#TOTALCOMIVA').val(totalfinal);
        
        
    }
}

 function verificarCampos(numeroLinha) {
    var linha = numeroLinha;
    console.log("ENTROU VERIFICA" + linha);
    
    // Assume form com id="theform"
    var theform = document.forms["theform"];
    // Get a reference to the TextBox
    var CODIGO = theform.elements["CODIGO" + linha];
    var TIPOINS = theform.elements["TIPOINS" + linha];

    var nomeCampoName = theform.elements["NAME" + linha]; // Use colchetes em vez de parênteses
    var nomeCampoDescricao = theform.elements["DESCRICAO" + linha]; // Use colchetes em vez de parênteses
    var nomeCampoPreco = theform.elements["PRECO" + linha];
    
    console.log(nomeCampoName, nomeCampoDescricao);

    console.log(CODIGO.value, TIPOINS.value);
    if (CODIGO.value === '1' && TIPOINS.value === '1') { // Certifique-se de comparar os valores com '==='
        nomeCampoName.removeAttribute('readonly');
        nomeCampoDescricao.removeAttribute('readonly');
         nomeCampoPreco.removeAttribute('readonly');
    }
    else{
       nomeCampoName.setAttribute('readonly', 'readonly');
        nomeCampoDescricao.setAttribute('readonly', 'readonly');
        nomeCampoPreco.setAttribute('readonly', 'readonly');
    }
}
        
     $(function () {
    $("#artigotable").DataTable({
        "paging": true,
      "lengthMenu": [ 5, 10, 15, 25 ],
      "pageLength": 5,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $("#servicotable").DataTable({
        "paging": true,
      "lengthMenu": [ 5, 10, 15, 25 ],
      "pageLength": 5,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $("#tabelaClientes").DataTable({
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
  });
 

 
 </script> 

    
    </body>
</html>

