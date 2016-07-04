<?php
    session_start();
    require 'resources/config.php';
    if (isset($_SESSION['user'])) {
    echo '<script> window.location="index.php";</script>';
    }
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Inicio de Sesion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/login2.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- /container -->

    <br><br><br><br><br><br><br>
    <div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-3 col-md-offset-9">
            <div class="panel panel-default login">
                <div class="panel-heading">                            
                    <div class="row-fluid user-row">
                        <i class="fa fa-eye fa-3x"></i> 
                    </div>
                    <h3 class="panel-title user-row"> SAIE Aranzazu</h3> 
                </div>
                <div class="panel-body">
                    <div class="form-group">
                          <label>Sistema Administrativo</label>
                          <hr>
                    </div>
                    <form role="form" name="login" method="POST" action="validar.php">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Nombre de Usuario" name="user" type="text" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Contraseña" name="pass" type="password" required>
                        </div>
                        <button type="submit" class="btn btn-success btn pull-right">Iniciar</button>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>

</body>

</html>