<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    
     <?php
    include_once __DIR__ . '/includes/session.php';

    if (!empty($_GET['utilizadores'])) {
    $sql="DELETE FROM utilizadores WHERE ID_utilizadores=".$_GET['utilizadores'].';';
    mysqli_query(bd(), $sql);
     header("location: utilizadores.php");
    }
        
    
    ?>
    
    
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Plataforma GO</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
        
        <li><a href="clientes.php"><i class="fa fa-user-plus"></i> <span>Clientes</span></a></li>
        
        <li class="active" <?php echo $_SESSION['ADMIN']; ?> ><a href="utilizadores.php"><i class="fa fa-user-plus"></i> <span>Utilizadores</span></a></li>
        
        
        
        
        
        
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
          Utilizadores
      </h1>

      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Level</a></li>
        <li>Utilizadores</li>
      </ol>
    </section>

    <!-- Main content -->
      <!-- Your Page Content Here ------------------------------------------------------------------------------------------------------------------------>
      <section class="content">
          <!-- /.row -->
          <div class="row">
              <!-- /.col -->
              <div class="col-xs-12">
                  <div class="box box-primary">
                      <div class="box-header with-border">
                          <div class="" style=" position: relative; left: 25%;" >
                              <a href="utilizadores_1.php"> <button type="submit" class="btn btn-primary col-md-6"><i class="fa fa-plus"></i> Adicionar Novo</button></a><br><br>
                          </div>
                      </div>
                      <div class="box-body">
                          <?php
                          $sql = 'SELECT tipo.NOME tipo , utilizadores.ID_UTILIZADORES, utilizadores.NOME, utilizadores.USERNAME, utilizadores.EMAIL
                                  FROM utilizadores INNER JOIN tipo ON (utilizadores.TIPO = tipo.ID_TIPO)
                                  ORDER BY utilizadores.ID_UTILIZADORES DESC';
                          $rows = get_dados($sql);
                          ?>

                          <table  id="example1" class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                      <th>Codigo</th>
                                      <th>Nome</th>
                                      <th>Username</th>
                                      <th>Email</th>
                                      <th>Tipo</th>
                                      <th>Funções</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php foreach ($rows as $value) {
                                      ?>
                                      <tr>
                                      <td><?php echo (int) $value['ID_UTILIZADORES']; ?></td>
                                      <td><?php echo htmlspecialchars($value['NOME'], ENT_QUOTES, 'UTF-8'); ?></td>
                                      <td><?php echo htmlspecialchars($value['USERNAME'], ENT_QUOTES, 'UTF-8'); ?></td>
                                      <td><?php echo htmlspecialchars($value['EMAIL'], ENT_QUOTES, 'UTF-8'); ?></td>
                                      <td><?php echo htmlspecialchars($value['tipo'], ENT_QUOTES, 'UTF-8'); ?></td>
                                      <td><a href="utilizadores_1.php?id=<?php echo (int) $value['ID_UTILIZADORES']; ?>"><span class="glyphicon glyphicon-refresh text-yellow"></span></a>&nbsp

                                              <a href="?utilizadores=<?php echo $value['ID_UTILIZADORES']; ?>"><span class="glyphicon glyphicon-trash text-red"></span></a></span></td>
                                      </tr>
                                  <?php } ?>
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th>Codigo</th>
                                      <th>Nome</th>
                                      <th>Username</th>
                                      <th>Email</th>
                                      <th>Tipo</th>
                                      <th>Funções</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <!-- /.row -->
      </section>
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
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({ order: [[0, "desc"]] });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>