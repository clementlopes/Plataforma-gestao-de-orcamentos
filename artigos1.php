<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

    <?php
    include_once __DIR__ . '/includes/session.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['nome'])) {
            
             if (validar_produto($_POST['nome'], $_POST['precounitario'], $_POST['quantidade'],  $_POST['iva'], $_POST['categoria']) == 1) {
                if (insert_artigos($_POST['nome'], $_POST['descricao'], $_POST['precounitario'], $_POST['quantidade'], $_POST['unidade'], $_POST['iva'], $_POST['categoria']) == 1) {
                    header("location: artigos.php");
                }
             }
        } 
        else {
            if (isset($_POST['nome1'])) {
                if (validar_produto($_POST['nome1'], $_POST['precounitario1'], $_POST['quantidade1'],  $_POST['iva1'], $_POST['categoria1']) == 1) {
                    if (actulizar_artigos($_POST['nome1'], $_POST['id'], $_POST['descricao1'], $_POST['precounitario1'], $_POST['quantidade1'], $_POST['unidade1'],  $_POST['iva1'], $_POST['categoria1']) == 1) {
                        header("location: artigos.php");
                    }
                }
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
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->



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
                            <p><?php echo $_SESSION['NOME']; ?></p>
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

                        <li class="active" ><a href="artigos.php"><i class="fa fa-dropbox"></i> <span>Artigos</span></a></li>

                        <li><a href="servicos.php"><i class="fa fa-dropbox"></i> <span>Serviços</span></a></li>

                        <li><a href="verorcamento.php"><i class="fa fa-fw fa-archive"></i> <span>Ver orçamentos</span></a></li>

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
                         <?php
                        if(isset($_GET['id'])){
                             echo 'Editar artigo';
                        
                        }
                        else{
                            echo 'Criar artigo';
                        }
                        ?>
                        
                    </h1>

                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li>Criar artigo</li>
                    </ol>
                </section>

                <!-- Main content -->



                <!-- Your Page Content Here -->
                <section class="content">

                    <!-- /.row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <?php
                                if (!empty($_GET['id'])) {
                                    $sql = 'SELECT artigos.NOME, artigos.DESCRICAO, artigos.PRECOUNITARIO, artigos.QUANTIDADE, artigos.ID_ART_CATEGORIA, artigos.ID_ART_UNIDADE, categoria.NOME CATEGORIA, artigos.ID_ART_IVA IVA FROM artigos INNER JOIN categoria ON (artigos.ID_ART_CATEGORIA = categoria.ID_CATEGORIA) WHERE ID_ARTIGOS='. $_GET['id'] . ';';

                                    $row = get_dados_one($sql);
                                    ?>
                                <form id="EDIT_ARTIGO" role="form" action="" method="post">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['NOME']; ?>"name="nome1" id="NOME1" required>
                                                <span id="MSG_NOME1" name="msg" style="color:red"></span>
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="descricao">Descrição:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['DESCRICAO']; ?>"name="descricao1" id="DESCRICAO1">
                                               
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="precounitario">Preço unitário:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['PRECOUNITARIO']; ?>"name="precounitario1" id="PRECO1" >
                                                <span id="MSG_PRECO1" name="msg" style="color:red"></span>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="quantidade">Quantidade:</label>
                                                <input type="text" class="form-control " value="<?php echo $row['QUANTIDADE']; ?>"name="quantidade1" id="QUANTIDADE1"  readonly >
                                                 <span id="MSG_QUANTIDADE1" name="msg" style="color:red"></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Unidade:</label>
                                                <select name="unidade1" id="unidade1" class="form-control">
                                             <?php
                                                //query a executar...a tabela chama-se seccoes
                                                $queryUn='Select ID_UNIDADE, NOME from unidades';

                                                //execução da query
                                                $resultadoUn=mysqli_query(bd(),$queryUn);
                                               

                                                //para todas as linhas da tabela
                                                
                                                while($linhaUn=mysqli_fetch_array($resultadoUn))
                                                {
                                                //escreve o 'id' no value e o 'nome' no texto.
                                                   if($row['ID_ART_UNIDADE'] == $linhaUn['ID_UNIDADE']){
                                                echo '<option selected value="' . $linhaUn['ID_UNIDADE'] . '">' . $linhaUn['NOME'] . '</option>';
                                                }
                                                else{
                                                     echo '<option value="' . $linhaUn['ID_UNIDADE'] . '">' . $linhaUn['NOME'] . '</option>';
                                                }
                                                }
                                                
                                                ?>
                                                
                                               </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="iva">Iva:</label>
                                                <select name="iva1" id="iva1" class="form-control">
                                             <?php
                                                //query a executar...a tabela chama-se seccoes
                                                $query='Select ID_IVA, IVA from iva';

                                                //execução da query
                                                $resultado=mysqli_query(bd(),$query);
                                               

                                                //para todas as linhas da tabela
                                                
                                                while($linha=mysqli_fetch_array($resultado))
                                                {
                                                //escreve o 'id' no value e o 'nome' no texto.
                                                   if($row['IVA'] == $linha['ID_IVA']){
                                                echo '<option selected value="' . $linha['ID_IVA'] . '">' . $linha['IVA'] . '</option>';
                                                }
                                                else{
                                                     echo '<option value="' . $linha['ID_IVA'] . '">' . $linha['IVA'] . '</option>';
                                                }
                                                }
                                                
                                                ?>
                                                
                                               </select> 
                                                
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="categoria">Categoria:</label>
                                                <select name="categoria1" id="CATEGORIA1" class="form-control">
                                             <?php
                                                //query a executar...a tabela chama-se seccoes
                                                $query='Select ID_CATEGORIA, NOME from categoria';

                                                //execução da query
                                                $resultado=mysqli_query(bd(),$query);
                                               

                                                //para todas as linhas da tabela
                                               
                                                
                                                while($linha=mysqli_fetch_array($resultado))
                                                {
                                                //escreve o 'id' no value e o 'nome' no texto.
                                                   if($row['ID_ART_CATEGORIA'] == $linha['ID_CATEGORIA']){
                                                echo '<option selected value="' . $linha['ID_CATEGORIA'] . '">' . $linha['NOME'] . '</option>';
                                                }
                                                else{
                                                     echo '<option value="' . $linha['ID_CATEGORIA'] . '">' . $linha['NOME'] . '</option>';
                                                }
                                                }
                                                
                                                ?>
                                                
                                               </select>
                                                <span id="MSG_CATEGORIA1" name="msg" style="color:red"></span>
                                                
                                            </div>
                                            
                                            
                                             <div class="" style=" position: relative; left: 25%;" >
                                                <span onclick="edit_artigo();" class="btn btn-success col-md-6"><i class="fa fa-refresh"></i> Actualizar</span>
                                                </div>
                                        </div>
                                    </form>
                                    <?php
                                } else {
                                    ?>
                                <form id="ADD_ARTIGO" role="form" action="" method="post">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control" id="NOME" name="nome" >
                                                <span id="MSG_NOME" name="msg" style="color:red"></span>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="descricao">Descrição:</label>
                                                <input type="text" class="form-control" name="descricao" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="precounitario">Preço Unitário:</label>
                                                <input type="text" class="form-control" id="PRECO" name="precounitario" >
                                                <span id="MSG_PRECO" name="msg" style="color:red"></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="quantidade">Quantidade:</label>
                                                <input type="text" class="form-control" name="quantidade" id="QUANTIDADE" value="1" readonly="">
                                                <span id="MSG_QUANTIDADE" name="msg" style="color:red"></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Unidade:</label>
                                                <select id="UNIDADE"  name="unidade"  class="form-control">
                                                    <option value="0">Escolher Unidade</option>
                                             <?php
                                                //query a executar...a tabela chama-se seccoes
                                                $queryUn='Select ID_UNIDADE, NOME from unidades';

                                                //execução da query
                                                $resultadoUn=mysqli_query(bd(),$queryUn);
                                               

                                                //para todas as linhas da tabela
                                                
                                                while($linhaUn=mysqli_fetch_array($resultadoUn))
                                                {
                                                echo '<option value="' . $linhaUn['ID_UNIDADE'] . '">' . $linhaUn['NOME'] . '</option>';
                                                }
                                                
                                                ?>
                                                
                                               </select>
                                                <span id="MSG_UNIDADE" name="msg" style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="iva">Iva:</label>
                                                <select name="iva" class="form-control">
                                             <?php
                                                //query a executar...a tabela chama-se seccoes
                                                $queryIva='Select ID_IVA, IVA from iva';

                                                //execução da query
                                                $resultadoIva=mysqli_query(bd(),$queryIva);
                                               

                                                //para todas as linhas da tabela
                                                
                                                while($linhaIva=mysqli_fetch_array($resultadoIva))
                                                {
                                                //escreve o 'id' no value e o 'nome' no texto.
                                                   if($rowIva['IVA'] == $linhaIva['ID_IVA']){
                                                echo '<option selected value="' . $linhaIva['ID_IVA'] . '">' . $linhaIva['IVA'] . '</option>';
                                                }
                                                else{
                                                     echo '<option value="' . $linhaIva['ID_IVA'] . '">' . $linhaIva['IVA'] . '</option>';
                                                }
                                                }
                                                
                                                ?>
                                                
                                               </select> 
                                                
                                            </div>
                                            
                                             <div class="form-group">
                                                 <label for="categoria">Categoria:</label>
                                                 <select name="categoria" id="CATEGORIA" class="form-control">
                                                    <option value="0">Escolher Categoria</option>
                                             <?php
                                                //query a executar...a tabela chama-se seccoes
                                                $query='Select * from categoria';

                                                //execução da query
                                                $resultado=mysqli_query(bd(),$query);
                                               

                                                //para todas as linhas da tabela
                                                
                                                while($linha=mysqli_fetch_array($resultado))
                                                {
                                                //escreve o 'id' no value e o 'nome' no texto.
                                                   
                                                echo '<option value="' . $linha['ID_CATEGORIA'] . '">' . $linha['NOME'] . '</option>';
                                                }
                                                
                                                ?>
                                                
                                               </select>
                                                 <span id="MSG_CATEGORIA" name="msg" style="color:red"></span>
                                                
                                            </div>
                                            
                                            
                                             <div class="" style=" position: relative; left: 25%;" >
                                                <span onclick="add_artigo();" class="btn btn-success col-md-6"><i class="fa fa-save"></i> Guardar</span>
                                            </div>
                                            
                                        </div>
                                    </form>
                                <?php }  ?>
                                <!-- /.box-body -->
                            </div>
                        </div></div>
                            <!-- /.box -->
                        </div>
                    </div>
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
                <center>
                    Plataforma<strong>GO</strong> - Versão <?PHP echo $versao['VERSAO']; ?>  Desenvolvido por Clément Lopes
                <br><strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. <b>Version</b> 2.3.7
                </center>
            </footer>



        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

         <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>

        <script>
        
 function add_artigo(){
            
             var nome = $('#NOME').val();
             var preco = $('#PRECO').val();
             var quantidade = $('#QUANTIDADE').val();
             var unidade = $('#UNIDADE').val();
             var categoria = $('#CATEGORIA').val();
             
             $('#MSG_NOME').html("");
             $('#MSG_PRECO').html("");
             $('#MSG_QUANTIDADE').html("");
             $('#MSG_UNIDADE').html("");
             $('#MSG_CATEGORIA').html("");
             
              if( nome == '')  
              {  
                $('#MSG_NOME').html("*Campo obrigatório!");
              }
              if( preco == '')  
              {  
                $('#MSG_PRECO').html("*Deve colocar o preço!");
              }
              if( unidade == 0)  
              {  
                $('#MSG_UNIDADE').html("*Escolha uma Unidade!");
              }
              if( quantidade == '')  
              {  
                $('#MSG_QUANTIDADE').html("*Campo obrigatório!");
              }
              if( categoria == 0)  
              {  
                $('#MSG_CATEGORIA').html("*Escolha uma categoria!");
              }
              else{
              $('#MSG_NOME').html("");
             $('#MSG_PRECO').html("");
             $('#MSG_QUANTIDADE').html("");
             $('#MSG_CATEGORIA').html("");
               document.getElementById("ADD_ARTIGO").submit();
              
              }
        }
        
        function edit_artigo() {
            var nome = $('#NOME1').val();
            var preco = $('#PRECO1').val();

            if( nome == '')
            {
                $('#MSG_NOME1').html("*Campo obrigatório!");
            }
            if( preco == '')
            {
                $('#MSG_PRECO1').html("*Deve colocar o preço!");
            }

    document.getElementById("EDIT_ARTIGO").submit();
}

        
        
        </script>
        
    </body>
</html>
