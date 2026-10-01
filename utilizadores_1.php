<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    
     <?php
    include_once('session.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['nome'])) {
            if (insert_utilizadores($_POST['nome'], $_POST['utilizador'], $_POST['password'], $_POST['email'], $_POST['tipo'] ) == 1) {
                header("location: utilizadores.php");
                exit();
            }
        } else {
            if (isset($_POST['nome1'])) {
                if (actulizar_utilizadores($_POST['id'], $_POST['nome1'], $_POST['utilizador1'], $_POST['password1'], $_POST['email1'], $_POST['tipo1']  ) == 1) {
                    header("location: utilizadores.php");
                    exit();
                }
            }
        }
    }

    $erro = auth_erro();
    auth_limpar_erro();
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
  <link rel="stylesheet" href="modal.css">
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
              <span class="hidden-xs"><?php echo $_SESSION['login_user']['NOME']; ?></span>
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
            <?php
                        if(isset($_GET['id'])){
                             echo 'Editar utilizador';
                        
                        }
                        else{
                            echo 'Criar utilizador';
                        }
                        ?>
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Level</a></li>
        <li>Criar Utilizadores</li>
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
                                    // (int) impede injecao de SQL no id.
                                    $id = (int) $_GET['id'];
                                    $sql = 'SELECT utilizadores.NOME, utilizadores.USERNAME, utilizadores.EMAIL, tipo.NOME TIPO '.
                                            'FROM utilizadores INNER JOIN tipo ON (utilizadores.TIPO = tipo.ID_TIPO) WHERE ID_UTILIZADORES=' . $id . ';';
                                    $row = get_dados_one($sql);
                                    ?>
                                    <form role="form" action="" method="post" autocomplete="off">
                                        <div class="box-body">

                                            <?php if ($erro !== null) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                            <?php } ?>

                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['NOME'], ENT_QUOTES, 'UTF-8'); ?>" name="nome1" >
                                                <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" >
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="utilizador">Utilizador:</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['USERNAME'], ENT_QUOTES, 'UTF-8'); ?>" name="utilizador1" maxlength="25" required >
                                               
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" class="form-control" value="" name="password1" placeholder="Deixe em branco para manter" minlength="8" autocomplete="new-password" >
                                                <p class="help-block">Minimo <?php echo AUTH_PASSWORD_MIN; ?> caracteres. Se ficar em branco, a password actual mantem-se.</p>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['EMAIL'], ENT_QUOTES, 'UTF-8'); ?>" name="email1" >
                                                
                                            </div>
                                            
                                             <label for="tipo">Tipo:</label>
                                             <div class="form-group">
                                                <select name="tipo1" class="form-control">
                                             <?php
                                                //query a executar...a tabela chama-se seccoes
                                                $query='Select * from tipo';

                                                //execução da query
                                                $resultado=mysqli_query(bd(),$query);
                                               

                                                //para todas as linhas da tabela
                                                
                                                while($linha=mysqli_fetch_array($resultado))
                                                {
                                                //escreve o 'id' no value e o 'nome' no texto.
                                                   
                                                echo '<option value="' . $linha['ID_TIPO'] . '">' . $linha['NOME'] . '</option>';
                                                }
                                                
                                                ?>
                                                
                                               </select> 
                                             </div>
                                            
                                        
                                            
                                            <div class="box-footer">
                                                <div class="" style=" position: relative; left: 25%;" >
                                                <button type="submit" class="btn btn-success col-md-6"><i class="fa fa-refresh"></i> Actualizar</button>
                                                </div>


                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                } else {
                                    ?>
                                    <form role="form" action="" method="post" autocomplete="off">
                                        <div class="box-body">


                                            <?php if ($erro !== null) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?>
                                            </div>
                                            <?php } ?>


                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control" name="nome" required >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="utilizador">Utilizador:</label>
                                                <input type="text" class="form-control" name="utilizador" maxlength="25" required >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="password">Password:</label>
                                                <input type="password" class="form-control" name="password" minlength="8" required autocomplete="new-password" >
                                                <p class="help-block">Minimo <?php echo AUTH_PASSWORD_MIN; ?> caracteres.</p>
                                                
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" name="email" >
                                                
                                            </div>
                                            
                                             <label for="tipo">Tipo:</label>
                                             
                                             <div class="form-group">
                                                <select name="tipo" class="form-control">
                                             <?php
                                                //query a executar...a tabela chama-se seccoes
                                                $query='Select * from tipo';

                                                //execução da query
                                                $resultado=mysqli_query(bd(),$query);
                                               

                                                //para todas as linhas da tabela
                                                
                                                while($linha=mysqli_fetch_array($resultado))
                                                {
                                                //escreve o 'id' no value e o 'nome' no texto.
                                                   
                                                echo '<option value="' . $linha['ID_TIPO'] . '">' . $linha['NOME'] . '</option>';
                                                }
                                                
                                                ?>
                                                
                                               </select> 
                                                    </div>
                                            
                                            <div class="box-footer">
                                                <div class="" style=" position: relative; left: 25%;" >
                                                <button type="submit" class="btn btn-success col-md-6"><i class="fa fa-save"></i> Guardar</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                <?php }  ?>
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
                    <img  src="img/icon Pgo.png"  >&nbsp  Plataforma<strong>&nbspGO</strong> - Versão <?PHP echo $versao['VERSAO']; ?>
                <br><strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. <b>Version</b> 2.3.7
                    </p></center>
            </footer>

  


<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>