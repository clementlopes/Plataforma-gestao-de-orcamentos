<?php
/**
 * index.php — Pagina de entrada (login).
 */

include_once __DIR__ . '/includes/login_check.php';

$erro = null;
$utilizador_preenchido = auth_lembrado();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!auth_csrf_valido(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '')) {
        $erro = 'A sessao do formulario expirou. Tente novamente.';
    } elseif (auth_bloqueio_restante() > 0) {
        $erro = 'Demasiadas tentativas. Tente novamente dentro de '
            . auth_bloqueio_restante() . ' segundos.';
    } elseif (sesseos($_POST['username'], $_POST['password'])) {
        if (!empty($_POST['lembrar'])) {
            auth_lembrar_utilizador(trim($_POST['username']));
        } else {
            setcookie(AUTH_COOKIE_REMEMBER, '', time() - 3600, '/');
        }

        header('Location: home.php');
        exit();
    } else {
        // Mensagem unica para utilizador inexistente e senha errada: nao
        // revela quais das duas coisas falhou.
        $erro = 'Credenciais invalidas.';
        auth_registar_falha();
        $utilizador_preenchido = trim($_POST['username']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo APP_NOME; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
        <link rel="shortcut icon" type="image/x-icon" href="img/icon pgo.png">
    </head>

    <body class="hold-transition login-page">

        <div class="login-box">
            <div class="login-logo">
                <div>
                    <span>Plataforma Gestão de Orçamentos</span>
                </div>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <div style="width: 100%; display: flex; justify-content: center;">
                    <img class="img-lg" src="img/logoPgo.png" alt="Plataforma GO">
                </div>
                <br>
                <p class="login-box-msg">Iniciar sessão</p>

                <?php if ($erro !== null) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($erro, ENT_QUOTES, 'UTF-8'); ?>
                </div>
                <?php } ?>

                <form action="" method="post" autocomplete="off">
                    <?php echo auth_csrf_input(); ?>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="username" placeholder="Utilizador"
                               value="<?php echo htmlspecialchars($utilizador_preenchido, ENT_QUOTES, 'UTF-8'); ?>"
                               required autofocus maxlength="25" autocomplete="username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password"
                               required autocomplete="current-password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="lembrar" value="1" <?php echo $utilizador_preenchido !== '' ? 'checked' : ''; ?>>
                                    Lembrar utilizador
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%'
                });
            });
        </script>
    </body>
</html>
