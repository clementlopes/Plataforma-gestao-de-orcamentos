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
//                                        var_dump($_POST['nome'], $_POST['rua'], $_POST['cidade'], $_POST['postal'], $_POST['contato'], $_POST['nif'], $_POST['email'], $_POST['data']);
//                                        die;
                                        if (insert_clientes($_POST['nome'], $_POST['rua'], $_POST['numero'], $_POST['cidade'], $_POST['postal'], $_POST['contato'], $_POST['nif'], $_POST['email'], $_POST['data'] ) == 1) {
                                            header("location: clientes.php");
                                            
                                        }
                                    } else {
                                        if (isset($_POST['nome1'])) {
//                                            var_dump($_POST['nome1'], $_POST['rua1'], $_POST['cidade1'], $_POST['postal1'], $_POST['contato1'], $_POST['nif1'], $_POST['email1'], $_POST['data1']);
//                                            die;
                                            if (actulizar_clientes($_POST['id'], $_POST['nome1'], $_POST['rua1'], $_POST['numero1'], $_POST['cidade1'], $_POST['postal1'], $_POST['contato1'], $_POST['nif1'], $_POST['email1'], $_POST['data1']  ) == 1) {
                                                header("location: clientes.php");
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
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
   <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  
  
 
  
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
       
       <li><a href="artigos.php"><i class="fa fa-dropbox"></i> <span>Artigos</span></a></li>
        
        <li><a href="servicos.php"><i class="fa fa-dropbox"></i> <span>Serviços</span></a></li>

        <li><a href="verorcamento.php"><i class="fa fa-fw fa-archive"></i> <span>Ver orçamentos</span></a></li>
        
        <li class="active" ><a href="clientes.php"><i class="fa fa-user-plus"></i> <span>Clientes</span></a></li>
        
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
                             echo 'Editar cliente';
                        
                        }
                        else{
                            echo 'Criar cliente';
                        }
                        ?>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Level</a></li>
        <li>Criar Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    
    

      <!-- Your Page Content Here -------------------------------------------------------------------------------------------------------------------------->
 <section class="content">
   
      <!-- /.row -->

          <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <?php
                                if (!empty($_GET['id'])) {
                                    $sql = 'SELECT * FROM clientes WHERE ID_CLIENTES='. $_GET['id'] . ';';
                                    $row = get_dados_one($sql);
                                    ?>
                                    <form role="form" action="" method="post">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['NOME']; ?>"name="nome1" placeholder="<?php echo $row['NOME']; ?>" >
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="rua">Rua:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['RUA']; ?>"name="rua1" placeholder="<?php echo $row['RUA']; ?>" >
                                               
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cidade">Numero porta:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['NUMERO']; ?>"name="numero1" placeholder="<?php echo $row['NUMERO']; ?>" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cidade">Cidade:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['CIDADE']; ?>"name="cidade1" placeholder="<?php echo $row['CIDADE']; ?>" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="postal">Código postal:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['POSTAL']; ?>"name="postal1" placeholder="<?php echo $row['POSTAL']; ?>" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="contato">Contato:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['CONTATO']; ?>"name="contato1" placeholder="<?php echo $row['CONTATO']; ?>" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="nif">Nif:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['NIF']; ?>"name="nif1" placeholder="<?php echo $row['NIF']; ?>" >
                                               
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" value="<?php echo $row['EMAIL']; ?>"name="email1" placeholder="<?php echo $row['EMAIL']; ?>" >
                                                
                                            </div>
                                            

                                            <div class="form-group">
                                                    <label for="data">Data de nascimento:</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker" value="<?php echo $row['NASCIMENTO']; ?>"name="data1" placeholder="<?php echo $row['NASCIMENTO']; ?>">
                                                    </div>
                                                    <!-- /.input group -->
                                            </div>

                                        
                                            
                                            <div class="box-footer">
                                                <div class="" style=" position: relative; left: 25%;" >
                                                <button type="submit" class="btn btn-primary col-md-6"><i class="fa fa-refresh"></i> Actualizar</button>
                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                } else {
                                    ?>
                                    <form role="form" action="" method="post">
                                        <div class="box-body">

                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control" name="nome" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="rua">Rua:</label>
                                                <input type="text" class="form-control" name="rua" >
                                               
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="rua">Numero de Porta:</label>
                                                <input type="text" class="form-control" name="numero" >
                                               
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cidade">Cidade:</label>
                                                <input type="text" class="form-control" name="cidade" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="postal">Código postal:</label>
                                                <input type="text" class="form-control" name="postal" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="contato">Contato:</label>
                                                <input type="text" class="form-control" name="contato" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="nif">Nif:</label>
                                                <input type="text" class="form-control" name="nif" >
                                               
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" name="email" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="data">Data de nascimento:</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker" name="data">
                                                    </div>
                                                    <!-- /.input group -->
                                            </div>
                                            
                                            
                                            <div class="box-footer">
                                                <div class="" style=" position: relative; left: 25%;" >
                                                <button type="submit" class="btn btn-primary col-md-6"><i class="fa fa-save"></i> Guardar</button>
                                                </div>
                                                </div>
                                            </div>
                                         </form>
                                <?php }  ?>
                                        </div>
                                   
                                
                                <!-- /.box-body -->
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
                <center><p style="font-size: 10px;">
                    <img  src="img/icon pgo.png"  >&nbsp  Plataforma<strong>&nbspGO</strong> - Versão <?PHP echo $versao['VERSAO']; ?>
                <br><strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. <b>Version</b> 2.3.7
                    </p></center>
            </footer>

  

<!-- jQuery 2.2.3 -->
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  <!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  <script>

 //Date picker
   $('#datepicker').datepicker({
    format: 'yyyy/mm/dd',
    autoclose: true

});
  </script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
