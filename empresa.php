<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <?php
    include_once'session.php';
    
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se os campos do formulário foram enviados
    if (isset($_POST['nome'], $_POST['rua'], $_POST['cidade'], $_POST['postal'], $_POST['nif'], $_POST['iban'], $_POST['contato'], $_POST['email'])) {
       
        actulizar_empresa($_POST['nome'], $_POST['nome_com'], $_POST['rua'], $_POST['cidade'], $_POST['postal'], $_POST['nif'], $_POST['iban'], $_POST['contato'], $_POST['email'], $_POST['site'], $_POST['id'] );
    }
}
    
    
    if(isset($_POST['img'])){
            $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
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
        <link rel="shortcut icon" type="image/x-icon" href="img/icon pgo.png">
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

                            <ul class="dropdown-menu">   </ul>



                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"> <?php echo $_SESSION['NOME']; ?> </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">

                                        <p>
                                            <!--NOME DO UTILIZADOR-->
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
                            <p> <?php echo $_SESSION['NOME']; ?> </p>
                            <!-- Status -->
                            <a><i class="fa fa-circle text-success"></i> Online</a>
                        </div>



                    </div>



                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU</li>

                        <!-- Optionally, you can add icons to the links -->

                        <li><a href="home.php"><i class=" fa fa-home"></i> <span>Inicio</span></a> </li>

                        <li class="active"><a href="empresa.php"><i class=" fa fa-building"></i> <span>Dados Empresa</span></a> </li>

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
                        Empresa
                    </h1>

                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li>Empresa</li>
                    </ol>
                </section>

                <!-- Main content -->
                <!-- Your Page Content Here -->
                <section class="content">
                    <!-- /.row -->
                    <div class="row">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Dados da empresa</h3><br><br>
                                <div class="col-md-6" >
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <?php
                                    $sql = 'SELECT * FROM empresa  ';
                                    $row = get_dados_one($sql);
                                    ?>

                                    <form role="form" id="empresa" action="" method="post">
                                        <div class="box box-body">
                                            <div class="form-group">
                                                <label for="nome">Nome:</label>
                                                <input type="text" class="form-control" id="NOME" name="nome"  value="<?php echo $row['NOME']; ?>" >
                                                <span id="MSG_NOME" class="msg-error" style="color:red"></span>
                                                <input type="hidden" class="form-control"  name="id" value="<?php echo $row['ID_EMPRESA']; ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="nome">Nome comercial:</label>
                                                <input type="text" class="form-control" name="nome_com"  value="<?php echo $row['NOME_COMERCIAL']; ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="rua">Rua:</label>
                                                <input type="text" class="form-control" name="rua" id="RUA"  value="<?php echo $row['RUA']; ?>" >
                                                <span id="MSG_RUA" class="msg-error" style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="cidade">Cidade:</label>
                                                <input type="text" class="form-control" name="cidade" id="CIDADE"  value="<?php echo $row['CIDADE']; ?>">
                                                <span id="MSG_CIDADE" class="msg-error"style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="postal">Codigo postal:</label>
                                                <input type="text" class="form-control" name="postal" id="POSTAL" value="<?php echo $row['CODIGOPOSTAL']; ?>" >
                                                <span id="MSG_POSTAL" class="msg-error" style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="nif">NIF:</label>
                                                <input type="text" class="form-control" id="NIF" name="nif"   value="<?php echo $row['NIF']; ?>">
                                                <span id="MSG_NIF" class="msg-error" style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="iban">IBAN:</label>
                                                <input type="text" class="form-control" name="iban" id="IBAN"  value="<?php echo $row['IBAN']; ?>">
                                                <span id="MSG_IBAN" class="msg-error" style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="contato">Contato:</label>
                                                <input type="text" class="form-control" name="contato" id="CONTATO"  value="<?php echo $row['CONTACTO']; ?>" >
                                                <span id="MSG_CONTATO" class="msg-error" style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" name="email" id="EMAIL"  value="<?php echo $row['EMAIL']; ?>">
                                                <span id="MSG_EMAIL" class="msg-error" style="color:red"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="site">Website:</label>
                                                <input type="text" class="form-control" name="site" placeholder="<?php echo $row['WEBSITE']; ?>" value="<?php echo $row['WEBSITE']; ?>">
                                            </div>
                                        </div>
                                    </form>
                                    <div   style=" position: relative; left: 25%;">
                                        <button type="submit" id="botaoEmpresa" class="btn btn-primary col-md-6" onclick="verifica()"><i class="fa fa-refresh"> Atualizar</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 " >
                                <div class="box box-body ">
                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" id="LOGO" name="logo" value="<?php echo $row['LOGO']; ?>" >
                                        <div class="form-group" style="  position: relative; left: 25%; " >
                                            <div>
                                                <img src="<?php echo $row['LOGO']; ?>" alt=" " height="250" width="250"><br>
                                                <br>
                                            </div>
                                            <label >Carregar logotipo:</label>
                                            <input type="file" name="fileToUpload" id="fileToUpload"><br>
                                            <button type="submit" id="botaoLogo" class="btn btn-primary col-md-6" name="submit" class="btn btn-primary"><i class="fa fa-refresh"> Atualizar</i></button>
                                            <input type="hidden" class="form-control" name="idempresa" value="<?php echo $row['ID_EMPRESA']; ?>" >
                                        </div>
                                    </form>
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
                    <img  src="img/icon Pgo.png"  >&nbsp  Plataforma<strong>&nbspGO</strong> - Versão <?PHP echo $versao['VERSAO']; ?>
                <br><strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. <b>Version</b> 2.3.7
                    </p></center>
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


        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->

    </body>
    
    <script>
    
     function verifica() {
    console.log('ENTROU');

    // Get the form.
    var form = $('#empresa');

    // Get the messages div.
    var formMessages = $('#msg');

    var nome = $('#NOME').val();
    var rua = $('#RUA').val();
    var cidade = $('#CIDADE').val();
    var postal = $('#POSTAL').val();
    var nif = $('#NIF').val();
    var iban = $('#IBAN').val();
    var contato = $('#CONTATO').val();
    var email = $('#EMAIL').val();

    // Limpar mensagens de erro
    $('.msg-error').text("");
    
    if (nome === '' || rua === '' || cidade === '' || postal === '' || nif === '' || iban === '' || contato === '' || email === '') {

    if (nome === '') {
        $('#MSG_NOME').text("*Campo obrigatório!");
    }
    if (rua === '') {
        $('#MSG_RUA').text("*Campo obrigatório!");
    }
    if (cidade === '') {
        $('#MSG_CIDADE').text("*Campo obrigatório!");
    }
    if (postal === '') {
        $('#MSG_POSTAL').text("*Campo obrigatório!");
    }
    if (nif === '') {
        $('#MSG_NIF').text("*Campo obrigatório!");
    }
    if (iban === '') {
        $('#MSG_IBAN').text("*Campo obrigatório!");
    }
    if (contato === '') {
        $('#MSG_CONTATO').text("*Campo obrigatório!");
    }
    if (email === '') {
        $('#MSG_EMAIL').text("*Campo obrigatório!");
    }

    // Verifique se há algum erro
    if ($('.msg-error').text() === '') {
        form.submit(); // Envie o formulário se não houver erros
    }
    
        }
        else {
        document.getElementById("empresa").submit(); // Envie o formulário
    }
}

 function verificaExisteEmpresa() {
    var nome = $('#NOME').val();
    var rua = $('#RUA').val();
    var cidade = $('#CIDADE').val();
    var postal = $('#POSTAL').val();
    var nif = $('#NIF').val();
    var iban = $('#IBAN').val();
    var contato = $('#CONTATO').val();
    var email = $('#EMAIL').val();


        var btnAtualizar = document.getElementById("botaoEmpresa");

      
        if (nome === '' || rua === '' || cidade === '' || postal === '' || nif === '' || iban === '' || contato === '' || email === '') {
            // Se estiver preenchido, muda o ícone para fa-refresh
            btnAtualizar.innerHTML = '<i class="fa fa-plus"></i> Inserir';
        }
    }
    
     function verificaExisteLogo() {
          


        var logo = $('#LOGO').val();

 var btnAtualizar = document.getElementById("botaoLogo");
     
        if (logo === '') {
            // Se estiver preenchido, muda o ícone para fa-refresh
            btnAtualizar.innerHTML = '<i class="fa fa-plus"></i> Carregar';
        }
    }
    
 window.onload = function () {
        verificaExisteEmpresa();
        verificaExisteLogo();
    };
    
    
    </script>
</html>