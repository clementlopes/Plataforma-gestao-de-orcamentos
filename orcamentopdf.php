<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

    <?php
    include_once'session.php';
    $total=0;
  
        
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
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="img/icon pgo.png">
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

                        <li <?php echo $_SESSION['ADMIN']; ?> ><a href="utilizadores.php"><i class="fa fa-user-plus"></i> <span>Utilizadores</span></a></li>






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
                        Editar Orçamento
                    </h1>

                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Ver Orçamento</li>
                    </ol>
                </section>

                <!-- Main content -->




                <!-- Your Page Content Here -------------------------------------------------------------------------------------------------------------------------->

                <section class="content">

                    <!-- /.row -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                

                                
                                        
                                        <!--<div class="box-body">-->
                                            
                                        <div class="box-body" >
                                        <div class=" col-xs-8"  >
                                        <div class=" col-xs-6"  >
                                            
                                            <?php
                                                $queryemp='SELECT * FROM empresa';
                                                $emp= get_dados_one($queryemp);
                                            
                                            
                                                if (!empty($_GET['id'])) {
                                                    $sql = 'SELECT orcamento.ID_ORCAMENTO, ID_ORC_CLIENTES, clientes.NOME CLIENTE, orcamento.DATA, orcamento.OBSERVACOES, utilizadores.NOME UTILIZADOR, tipo_orc.NOME TIPO FROM orcamento INNER JOIN clientes ON (orcamento.ID_ORC_CLIENTES = clientes.ID_CLIENTES) INNER JOIN utilizadores ON (orcamento.ID_ORC_UTILIZADORES = utilizadores.ID_UTILIZADORES) INNER JOIN tipo_orc ON (orcamento.TIPO = tipo_orc.ID_TIPO_ORC) WHERE ID_ORCAMENTO= ' . $_GET['id'] . ';';
                                                    $row = get_dados_one($sql);
                                                    
                                                    
                                                    ?>
                                           <!--  ============================  PARA PDF  ======================================  -->
                                            <input class="form-control" type="hidden"  id="nome_emp" value="<?php echo $emp['NOME']; ?>" >
                                            <input class="form-control" type="hidden"  id="rua_emp" value="<?php echo $emp['RUA']; ?>" >
                                            <input class="form-control" type="hidden"  id="cidade_emp" value="<?php echo $emp['CIDADE']; ?>" >
                                            <input class="form-control" type="hidden"  id="codigo_emp" value="<?php echo $emp['CODIGOPOSTAL']; ?>" >
                                            <input class="form-control" type="hidden"  id="nif_emp" value="<?php echo $emp['NIF']; ?>" >
                                            <input class="form-control" type="hidden"  id="contato_emp" value="<?php echo $emp['CONTACTO']; ?>" >
                                            <input class="form-control" type="hidden"  id="email_emp" value="<?php echo $emp['EMAIL']; ?>" >
                                            <input class="form-control" type="hidden"  id="iban_emp" value="<?php echo $emp['IBAN']; ?>" >
                                            <input class="form-control" type="hidden"  id="DATA"  value="<?php echo $row['DATA']; ?>">
                                            
                                            
                                            
                                            <input class="form-control" type="hidden"  name="utilizador" value="<?php echo $_SESSION['ID_UTILIZADORES']; ?>" >
                                            <input class="form-control" type="hidden" id="UTILIZADOR"  name="util" value="<?php echo $_SESSION['NOME']; ?>" >
                                            
                                            <input type="hidden" class="form-control" id="IDORCAMENTO" name="id" value="<?php echo $_GET['id']; ?>" >
                                            <input type="hidden" id="ID" name="cod" class="form-control" value="<?php echo $row['ID_ORC_CLIENTES']; ?>" >
                                            
                                            
                                            
                                            <div class="form-group">
                                                <label for="cliente">Cliente:</label>
                                                <input type="text" name="cliente" id="country" class="form-control"  value="<?php echo $row['CLIENTE']; ?>" readonly=""  />  
                                                
                                            </div>
                                            
                                            <?php
                                            
                                            $querycliente= 'SELECT clientes.NOME, CONCAT_WS(", Nº", RUA, NUMERO) AS MORADA, clientes.ID_CLIENTES, clientes.RUA, clientes.NUMERO, clientes.CIDADE, clientes.POSTAL, clientes.NIF FROM clientes where ID_CLIENTES='.$row['ID_ORC_CLIENTES'].';';
                                            $cliente = get_dados_one($querycliente);
                                            ?>
                                            
                                            
                                            <div class="form-group">
                                                    <label for="rua">Morada:</label>
                                                    <input class="form-control" type="text"  id="RUA" name="RUA" value="<?php echo $cliente['MORADA']; ?>" disabled="" >
                                                    <input class="form-control" type="text"  id="CIDADE" name="CIDADE" value="<?php echo $cliente['CIDADE']; ?>" disabled="" >
                                                    <input class="form-control" type="text"  id="POSTAL" name="POSTAL" value="<?php echo $cliente['POSTAL']; ?>" disabled="" >
                                            </div>
                                            <div class="hidden" >
                                            <table id="clienteMorada" >
                                                <thead>
                                                <tr>
                                                    <td>
                                                        Exmo(S) Sr(S)
                                                    </td>
                                                </tr>
                                                <tbody>
                                                    
                                                <tr>
                                                    <td>
                                                        <?php echo $row['CLIENTE']; ?><br>
                                                        <?php echo $cliente['MORADA']; ?><br>
                                                        <?php echo $cliente['CIDADE']; ?> <?php echo $cliente['POSTAL']; ?><br>
                                                <b>NIF:</b><?php echo $cliente['NIF']; ?> 
                                                    </td>
                                                </tr>
                                                
                                                </tbody>
                                            </table>
                                                </div>
                                            
                                            <div class="form-group">
                                                <label>Nif:</label>
                                                <input class="form-control" type="text" id="NIF" name="NIF" placeholder="<?php echo $cliente['NIF']; ?>" disabled="" >
                                            </div>
                                            </div>
                                            
                                        </div>
                                            
                                            <div class="col-md-3"  >
                                                
                                                <div class="form-group">
                                                    <label>Data: <?php echo $row['DATA']; ?></label><br>
                                                    <label>Funcionário: <?php echo $row['UTILIZADOR']; ?></label><br>
                                                   
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            <!--</div>-->
                                            <div class="col-md-12 ">
                                                
                                            <div class="box-body">
                                               <div class="box-body">
                                             
                                            
                                            
                                            <div class=" box box-primary">
                                                <div class="box-body">
                                                   
                                                    <table id="example2" class="table table-bordered table-striped" >
                                                        <thead>
                                                            <tr>
                                                                
                                                                <td>NOME</td>
                                                                <td>DESCRIÇÃO</td>
                                                                <td>PREÇO S/IVA</td>
                                                                <td>QUANT.</td>
                                                                <td>DESC</td>
                                                                <td>IVA</td>
                                                                <td>TOTAL</td>
                                                            </tr>
                                                        </thead>


                                                        <?php
                                                        $query = 'SELECT orc_art_ser.ID_ORC_ART_SER CODIGO, orc_art_ser.NOME NOME, null ID_OAS_SERVICOS , orc_art_ser.DESCRICAO, orc_art_ser.QUANTIDADE, unidades.NOME UNIDADE, orc_art_ser.PRECO, orc_art_ser.DESCONTO, iva.IVA, orc_art_ser.OAS_IVA FROM orc_art_ser 
                                                                    INNER JOIN artigos ON (orc_art_ser.ID_OAS_ARTIGOS = artigos.ID_ARTIGOS) INNER JOIN iva ON (orc_art_ser.OAS_IVA = iva.ID_IVA)
                                                                    INNER JOIN unidades ON (artigos.ID_ART_UNIDADE = unidades.ID_UNIDADE) WHERE ID_OAS_ORCAMENTO=' . $_GET['id'] . '
                                                                    UNION
                                                                   SELECT orc_art_ser.ID_ORC_ART_SER CODIGO, servicos.NOME, null ID_OAS_ARTIGOS, orc_art_ser.DESCRICAO, orc_art_ser.QUANTIDADE, unidades.NOME, orc_art_ser.PRECO, orc_art_ser.DESCONTO, iva.IVA, orc_art_ser.OAS_IVA 
                                                                    FROM orc_art_ser INNER JOIN servicos ON (orc_art_ser.ID_OAS_SERVICOS = servicos.ID_SERVICOS) INNER JOIN iva ON (orc_art_ser.OAS_IVA = iva.ID_IVA) INNER JOIN unidades ON (servicos.ID_SER_UNIDADE = unidades.ID_UNIDADE) 
                                                                    WHERE ID_OAS_ORCAMENTO=' . $_GET['id'] . '  ORDER BY CODIGO';
                                                        $produtos = get_dados($query);
                                                        $num = 0;
                                                        foreach ($produtos as $value) {
                                                            $num = $num + 1;
                                                            ?>
                                                            <tbody>
                                                                <tr>
                                                                    
                                                                    <td align="left"  ><?php echo $value['NOME']; ?><?php echo $value['ID_OAS_SERVICOS']; ?>
                                                                        <input type="hidden" id="NOMEPROORC<?php echo $num; ?>" name="nomeproorc<?php echo $num; ?>"  class="form-control" value="<?php echo $value['NOME']; ?>" >
                                                                    </td>
                                                                    <td align="left"><?php echo $value['DESCRICAO']; ?>
                                                                        <input type="hidden" id="DESCRICAOORC<?php echo $num; ?>" name="descricaoorc<?php echo $num; ?>"  class="form-control" value="<?php echo $value['DESCRICAO']; ?>" >
                                                                    </td>
                                                                    <td align="right" style=" width: 110px" ><?php echo $value['PRECO'] . "€"; ?>
                                                                        <input type="hidden" id="PRECOORC<?php echo $num; ?>" name="precoorc<?php echo $num; ?>"  class="form-control" value="<?php echo $value['PRECO']; ?>" >
                                                                    </td>
                                                                    <td align="right" style=" width: 65px"><?php echo $value['QUANTIDADE'].' '. $value['UNIDADE']; ?><input type="hidden" id="QUANTIDADEORC<?php echo $num; ?>" name="qtdorc"  class="form-control" value="<?php echo $value['QUANTIDADE']; ?>" >
                                                                        <input type="hidden" id="VALORPROD<?php echo $num; ?>" name="valorprod<?php echo $num; ?>"  class="form-control" value="" >
                                                                    </td>
                                                                    <td align="right" style=" width: 65px"><?php echo $value['DESCONTO'] . "%"; ?><input type="hidden" id="DESCONTOORC<?php echo $num; ?>" name="descontoorc" class="form-control" value="<?php echo $value['DESCONTO']; ?>" >
                                                                        <input type="hidden" id="VALORDESCORC<?php echo $num; ?>" name="valordescorc<?php echo $num; ?>"  class="form-control" value="" >
                                                                    </td>
                                                                    <td align="right" style=" width: 65px"><?php echo $value['IVA'] . "%"; ?><input type="hidden" id="IVAORC<?php echo $num; ?>" name="ivaorc" class="form-control" value="<?php echo $value['OAS_IVA'] ?>" >
                                                                        <input type="hidden" id="VALORIVAORC<?php echo $num; ?>" name="valorivaorc<?php echo $num; ?>"  class="form-control" value="" >
                                                                        <input type="hidden" id="IVAPERC<?php echo $num; ?>" name="ivaperc<?php echo $num; ?>"  class="form-control" value="<?php echo $value['IVA'] . "%"; ?>" >
                                                                    </td>
                                                                    <td align="right" style=" width: 85px">
                                                                        <?php
                                                                        $value['PRECOTEM'] = ($value['QUANTIDADE'] * $value['PRECO']) * ($value['DESCONTO'] / 100);
                                                                        $value['PRECODESC'] = ($value['QUANTIDADE'] * $value['PRECO']) - $value['PRECOTEM'];
                                                                        $destotal[$num] = $value['PRECOTEM'];

                                                                        $value['PRECOIVA'] = ($value['PRECODESC']) * ($value['IVA'] / 100);
                                                                        $value['PRECOFINAL'] = ($value['PRECODESC'] + $value['PRECOIVA']);
                                                                        $valorfinal = $value['PRECOFINAL'];
                                                                        echo number_format($valorfinal, 2, ',', ' ') . "€"
                                                                        ?>

                                                                        <input type="hidden" id="PRECOFINALORC<?php echo $num; ?>" name="precofinalorc"  class="form-control" value="<?php echo number_format($valorfinal, 2, ',', ' '); ?>" >
                                                                    </td>
                                                                    
                                                                </tr>
                                                            </tbody>



                                                            <?php
                                                            $total = $total + $value['PRECOFINAL'];
                                                        }
                                                        ?>


                                                    </table>
                                                    <input type="hidden" id="numLinhas" class="form-control" value="<?php echo $num; ?>" >

                                                </div>
                                            </div> 
                                                
                                            </div></div></div>
                                            
                                            
                                            
                                            
                                                                                            
                                                        
                                            <div class="box-body">
                                                        
                                                <div class=" col-xs-8"  >        
                                                
                                                <div class="form-group">
                                                    <label for="observações">Observações:</label><br>
                                                    <textarea cols="65" rows="4" id="OBS" name="obs" readonly="" ><?php echo $row['OBSERVACOES']; ?></textarea>
                                                    
                                                </div>
                                                    <div class="hidden">
                                                    <table id="observacoes" >
                                                <thead>
                                                <tr>
                                                    <td>
                                                        Observações:
                                                    </td>
                                                </tr>
                                                <tbody>
                                                    
                                                <tr>
                                                    <td>
                                                        <?php echo $row['OBSERVACOES']; ?>
                                                    </td>
                                                </tr>
                                                
                                                </tbody>
                                            </table>
                                                    </div>
                                                    
                                                </div>
                                                        
                                                    <div class=" col-md-4" >


                                                        <div align="right" class="form-group">    
                                                          
                                                            <label for="precototal">DESCONTO:</label>
                                                            <input type="text"  name="totaldesconto" id="TOTALDESCONTO" value="" style="text-align:right; width: 110px;"  class="form-control"  readonly>


                                                            <label for="precototal">TOTAL LÍQUIDO:</label>
                                                            <input type="text"  name="totalliquido" id="TOTALLIQUIDO" value="" style="text-align:right; width: 110px;" class="form-control"  readonly>

                                                            <label for="precototal">TOTAL IVA:</label>
                                                            <input type="text" name="totaliva" id="TOTALIVA" value="" style="text-align:right; width: 110px;" class="form-control"  readonly>

                                                            <label for="precototal">TOTAL COM IVA:</label>
                                                            <input type="text"  name="totaLcomiva" id="TOTALCOMIVA" step="1" class="form-control" style="text-align:right; width: 110px;" value=""  readonly >


                                                        </div>
                                                    </div>
                                            </div>

                                           


                                                <?php }?>

                                            <div class="box-footer">
                                            </div>
                                        </div>
                                    
                                </div>
                                    
                                </div> 
                                       
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                              </div>

                                            </div>
                                
                                
                                
                                
                                
                        
                                
                                
   
                                    
                                <!-- /.box-body -->
                            
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
                    <img  src="img/icon Pgo.png"  >&nbsp  Plataforma<strong>&nbspGO</strong> - Versão <?PHP echo $versao['VERSAO']; ?>
                    <input type="hidden" id="VERSAO" name="versao"  class="form-control" value="<?PHP echo $versao['VERSAO']; ?>" >
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
        <!-- FLOT CHARTS -->
        <script src="plugins/flot/jquery.flot.min.js"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="plugins/flot/jquery.flot.resize.min.js"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="plugins/flot/jquery.flot.categories.min.js"></script>
        <!-- Page script -->


        <script>  
   
  
    
    
    window.onload = function(){
    console.log('entrou calcular');
      var $rowno=1;
     var numeroLinhas = document.getElementById("numLinhas");
     console.log('linhas'+numLinhas.value);
     var totalfinalvalor = 0;
     var totalfinaldesconto = 0;
     var totalfinaliva = 0;
     var totaldocumento = 0;
     var $rowno=1;
     
     
     for(var i=1; i<=numeroLinhas.value; i++){
         
         
           var quantidade = document.getElementById("QUANTIDADEORC"+$rowno);
    var preco = document.getElementById("PRECOORC"+$rowno);
    var desconto = document.getElementById("DESCONTOORC"+$rowno);
    var iva = document.getElementById("IVAORC"+$rowno);
//      var iva = document.getElementById("modal-content IVA"+$rowno)
       
//         console.log("preco  "+preco.value);
        console.log("iva get  "+iva.value);
        
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
   
    
    //If the textbox is not blank
    if(quantidade.value!="")
    {
            console.log("iva: "+iva);
            
            
        temporario = parseFloat(quantidade.value*preco.value);
        console.log("preco * quant.: "+temporario);
        
        temporario2 = parseFloat(desconto.value/100);
        console.log("desc: "+temporario2);
        
        if(temporario2==0){
            console.log("nao tem desc "+temporario2);
            temporario3 = temporario;
            console.log("preço c/ desc: "+temporario3);
            
            totalfinalvalor = totalfinalvalor+temporario3;
            console.log("preço do valor final: "+totalfinalvalor);
            
            $('#VALORDESCORC'+$rowno).val(0);
            $('#VALORPROD'+$rowno).val(temporario3);
            temporario4 = parseFloat(temporario3*iva);
        console.log("preço do iva: "+temporario4);
        $('#VALORIVAORC'+$rowno).val(temporario4);
        
        totalfinaliva = totalfinaliva+temporario4;
        console.log("preço do valor IVA FINAL: "+totalfinaliva);
        
        temporario5 = parseFloat(temporario+temporario4);
        console.log("preço c/iva: "+temporario5);
        precofinal = temporario5.toFixed(2);
        totaldocumento = totaldocumento+temporario5;
         console.log("preço COM IVA FINAL: "+totaldocumento);
        }
        else{
            console.log("tem desc "+temporario2);
            temporario3 = parseFloat(temporario*temporario2);
            console.log("preço do desc: "+temporario3);
            
            totalfinaldesconto = totalfinaldesconto+temporario3;
            
            
            $('#VALORDESCORC'+$rowno).val(temporario3);
            temporario4 = parseFloat(temporario-temporario3);
            
            
            totalfinalvalor = totalfinalvalor+temporario4;
             
            
            $('#VALORPROD'+$rowno).val(temporario4);
            temporario5 = parseFloat(temporario4*iva);
            console.log("preço do iva: "+temporario5);
            
            $('#VALORIVAORC'+$rowno).val(temporario5);
            console.log("preço do valor IVA: "+totalfinaliva);
            
            totalfinaliva = totalfinaliva+temporario5;
            console.log("preço do valor IVA FINAL: "+totalfinaliva);
            
            temporario6 = parseFloat(temporario4+temporario5);
            console.log("preço c/iva: "+temporario6);
            precofinal = temporario6.toFixed(2);
            totaldocumento = totaldocumento+temporario6;
            console.log("preço COM IVA FINAL: "+ totaldocumento);
        }
        console.log("CHEGOU");

        
        $('.modal-content #PRECOFINAL'+$rowno).val(precofinal);  
        
        $('#TOTALDESCONTO').val(totalfinaldesconto.toFixed(2)+'€');
        $('#TOTALLIQUIDO').val(totalfinalvalor.toFixed(2)+'€');
        $('#TOTALIVA').val(totalfinaliva.toFixed(2)+'€');
        $('#TOTALCOMIVA').val(totaldocumento.toFixed(2)+'€');
        
        
        
}
         $rowno = $rowno+1;
         
     }
     
  
  
   //=========================PDF=================================
  
 
  
  
    var doc = new jsPDF();
      
      var nome_emp = $('#nome_emp').val();
      var rua_emp = $('#rua_emp').val();
      var cidade_emp = $('#cidade_emp').val();
      var codigo_emp = $('#codigo_emp').val();
      var nif_emp = $('#nif_emp').val();
      var contato_emp = $('#contato_emp').val();
      var email_emp = $('#email_emp').val();
      var iban_emp = $('#iban_emp').val();
      var func_emp = $('#UTILIZADOR').val();
      var idorcamento = $('#IDORCAMENTO').val();
      var data= $('#DATA').val();
      var anotemp = new Date( data );
      var ano = anotemp.getFullYear();
      var versao = $('#VERSAO').val();
      console.log(ano);
      
              
       
        

        //===================================== print linhas ==========================
      
      
      
      
        doc.autoTable({ 
      
      html: '#example2',
      theme : 'plain',
       margin: { top:95, left:13, bottom: 60, right:12 },
       rowPageBreak: 'avoid',
        columnWidth: 'wrap',
        showHead: 'everyPage',
        headStyles: {
        fontSize: 8,
        lineWidth: 0.1,
        lineColor: [0, 0, 0],
        halign: 'center'
    },
    columnStyles: { 
        0: { halign: 'left'},
        1: { halign: 'left'},
        2: { halign: 'right'},
        3: { halign: 'right'},
        4: { halign: 'right'},
        5: { halign: 'right'},
        6: { halign: 'right', cellWidth: 22}
            }
            
     
  
     
        })
      
          const pages = doc.internal.getNumberOfPages();
      for (var j = 1; j < pages + 1 ; j++) {
      doc.setPage(j);
      
      
       
      
      //=============================EMPRESA
      
//          var imgData = 'data:image/jpg;base64,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VFVudEYjUmx0AAAAAAAAAAAAAAAAQmxkIFVudEYjUmx0AAAAAAAAAAAAAAAAUnNsdFVudEYjUHhsQFIAk4AAAAAAAAAKdmVjdG9yRGF0YWJvb2wBAAAAAFBnUHNlbnVtAAAAAFBnUHMAAAAAUGdQQwAAAABMZWZ0VW50RiNSbHQAAAAAAAAAAAAAAABUb3AgVW50RiNSbHQAAAAAAAAAAAAAAABTY2wgVW50RiNQcmNAWQAAAAAAAAAAABBjcm9wV2hlblByaW50aW5nYm9vbAAAAAAOY3JvcFJlY3RCb3R0b21sb25nAAAAAAAAAAxjcm9wUmVjdExlZnRsb25nAAAAAAAAAA1jcm9wUmVjdFJpZ2h0bG9uZwAAAAAAAAALY3JvcFJlY3RUb3Bsb25nAAAAAAA4QklNA+0AAAAAABAASAJOAAEAAgBIAk4AAQACOEJJTQQmAAAAAAAOAAAAAAAAAAAAAD+AAAA4QklNBA0AAAAAAAQAAAAeOEJJTQQZAAAAAAAEAAAAHjhCSU0D8wAAAAAACQAAAAAAAAAAAQA4QklNJxAAAAAAAAoAAQAAAAAAAAACOEJJTQP1AAAAAABIAC9mZgABAGxmZgAGAAAAAAABAC9mZgABAKGZmgAGAAAAAAABADIAAAABAFoAAAAGAAAAAAABADUAAAABAC0AAAAGAAAAAAABOEJJTQP4AAAAAABwAAD/////////////////////////////A+gAAAAA/////////////////////////////wPoAAAAAP////////////////////////////8D6AAAAAD/////////////////////////////A+gAADhCSU0EAAAAAAAAAgAAOEJJTQQCAAAAAAACAAA4QklNBDAAAAAAAAEBADhCSU0ELQAAAAAABgABAAAAAzhCSU0ECAAAAAAAEAAAAAEAAAJAAAACQAAAAAA4QklNBB4AAAAAAAQAAAAAOEJJTQQaAAAAAAM/AAAABgAAAAAAAAAAAAAB/wAAAcMAAAAFAGwAbwBnAG8AcwAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAABwwAAAf8AAAAAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAQAAAAAQAAAAAAAG51bGwAAAACAAAABmJvdW5k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UwA2AAAAAQA4QklNBAYAAAAAAAcACAEBAAEBAP/hDhBodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0RXZ0PSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VFdmVudCMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIyLTAxLTI0VDEyOjM0OjU2WiIgeG1wOk1vZGlmeURhdGU9IjIwMjItMDEtMjRUMTI6MzU6MzRaIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDIyLTAxLTI0VDEyOjM1OjM0WiIgZGM6Zm9ybWF0PSJpbWFnZS9qcGVnIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6M0E4OTFCMjAxMjdERUMxMUEwMkZEQzMxNTg1NjA4OUIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6Mzk4OTFCMjAxMjdERUMxMUEwMkZEQzMxNTg1NjA4OUIiIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDozOTg5MUIyMDEyN0RFQzExQTAyRkRDMzE1ODU2MDg5QiI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6Mzk4OTFCMjAxMjdERUMxMUEwMkZEQzMxNTg1NjA4OUIiIHN0RXZ0OndoZW49IjIwMjItMDEtMjRUMTI6MzQ6NTZaIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY29udmVydGVkIiBzdEV2dDpwYXJhbWV0ZXJzPSJmcm9tIGltYWdlL3BuZyB0byBpbWFnZS9qcGVnIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDozQTg5MUIyMDEyN0RFQzExQTAyRkRDMzE1ODU2MDg5QiIgc3RFdnQ6d2hlbj0iMjAyMi0wMS0yNFQxMjozNTozNFoiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAg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'
                var imgData = new Image()
                imgData.src = 'img/logo.png'
                doc.addImage(imgData, 'png', 15, 10, 40, 40);


        
     
      doc.setFontSize(12);
      doc.setFontType('bold');
      doc.text(13, 58, nome_emp);
      doc.setFontSize(10);
      doc.setFontType('normal');
      doc.text(13,64, rua_emp);
      doc.text(13,68, cidade_emp);
      doc.text(13,72, codigo_emp);
      doc.setFontType('bold');doc.text(13, 76, 'NIF:');
      doc.setFontType('normal');
      doc.text(22,76, nif_emp);
      doc.setFontType('bold');doc.text(13, 80, 'TLM:');
      doc.setFontType('normal');
      doc.text(24,80, contato_emp);
      doc.setFontType('bold');doc.text(13, 84, 'EMAIL:');
      doc.setFontType('normal');
      doc.text(28,84, email_emp);
      doc.setFontType('bold');doc.text(13, 88, 'IBAN:');
      doc.setFontType('normal');
      doc.text(25,88, iban_emp);
      
      doc.setFontType('bold');doc.text(13, 92, 'FUNCIONÁRIO:');
      doc.setFontType('normal');
      doc.text(41.5,92, func_emp);
      
      //==============================DATA
      
       
      doc.setFontSize(10);
      // rectangulo
      doc.line(130, 10, 130, 20);
      doc.line(198, 10, 198, 20);
      doc.line(165, 10, 165, 20);
      doc.line(130, 10, 198, 10);
      doc.line(130, 15, 198, 15);
      doc.line(130, 20, 198, 20);
      
      doc.setTextColor(0)
      doc.setFontType('bold');doc.text(136, 14, 'ORÇAMENTO');
      doc.setFontType('bold');doc.text(176, 14, 'DATA');
      
      doc.setTextColor(0)
      doc.setFontType('normal');
      doc.text(141, 19, ano+'/'+idorcamento);
      doc.text(172, 19, data);
      
      
      //=============================CLIENTE
      
      var nome_cli = $('#country').val();
      var rua_cli = $('#RUA').val();
      var num_cli = $('#NUMERO').val();
      var cidade_cli = $('#CIDADE').val();
      var codigo_cli = $('#POSTAL').val();
      
      
      
      doc.autoTable({ 
      
      html: '#clienteMorada',
      theme : 'plain',
      startY:60,
       margin: { top:60, left:115, bottom: 60, right:12 },
        columnWidth: 'wrap',
        showHead: 'everyPage',
        headStyles: {
        fontSize: 10,
        lineWidth: 0.1,
        lineColor: [0, 0, 0],
        halign: 'left'
    },
    bodyStyles:{
        fontSize: 10,
        lineWidth: 0.1,
        lineColor: [0, 0, 0],
        halign: 'left'
    }
            
     
  
     
        })
        
         doc.autoTable({ 
      
      html: '#observacoes',
      theme : 'plain',
      startY:238,
       margin: {  left:13, right: 110 },
        showHead: 'everyPage',
        headStyles: {
        fontSize: 10,
        lineWidth: 0.1,
        lineColor: [0, 0, 0],
        halign: 'left'
    },
    columnStyles: {
         0: { 
         rowHeight:20,
         fontSize: 10,
        lineWidth: 0.1,
        lineColor: [0, 0, 0],
        halign: 'left'
    },
     }
     
        }) 
      
   
    //====================== resto ========================
    
    
    doc.setDrawColor(0, 0, 0);
    var obs = $('#OBS').val();
    var totaldesc = $('#TOTALDESCONTO').val();  
    var totaliva = $('#TOTALIVA').val(); 
    var totalliquido = $('#TOTALLIQUIDO').val();
    var totaldocumento = $('#TOTALCOMIVA').val();
    
    doc.line(13, 230, 198, 230);
    
   
      
    
  
    
      doc.line(130, 238, 130, 266);
      doc.line(198, 238, 198, 266);
      
      doc.line(130, 238, 198, 238);
      doc.line(130, 245, 198, 245);
      doc.line(130, 252, 198, 252);
      doc.line(130, 259, 198, 259);
      doc.line(130, 266, 198, 266);

    doc.setFontSize(10);
    doc.setFontType('bold');doc.text(131, 243, 'DESCONTO :  ');
    doc.setFontType('bold');doc.text(131, 250, 'TOTAL LÍQUIDO:  ');
    doc.setFontType('bold');doc.text(131, 257, 'TOTAL IVA:  ');
    doc.setFontType('bold');doc.text(131, 264, 'TOTAL DOCUMENTO:  ');
        doc.setTextColor(0)
    doc.text(totaldesc, 196, 243, "right");
    doc.text(totalliquido, 196, 250, "right");
    doc.text(totaliva, 196, 257, "right");
    doc.text(totaldocumento, 196, 264, "right");
    
    doc.line(13, 280, 198, 280);
    doc.setTextColor(15)
    doc.setFontSize(6);
    doc.text("PGO V "+versao+" - Plataforma Gestão de Orçamentos", 99, 285, "center" );
    doc.setTextColor(0)
     
      
      doc.setFontType('bold');
      doc.text( "Pag."+j+" de "+pages, 198, 290, "right");
  }
      
      
      
      
      
   
         
      doc.save('Orçamento '+nome_cli+data+'.pdf');
      
  
  
  
 

  
}
     
</script>
 
 </script> 

  

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
    </body>
</html>

