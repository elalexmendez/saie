<?php
    session_start();
    include 'ser.php';
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

    <link rel="icon" href="/assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="container">

        <form class="form-signin" method="POST" action="validar.php">
            <h2 class="form-signin-heading">Inicie Sesión</h2>
            <label for="inputEmai" class="sr-only">Nombre de Usuario</label>
            <input type="text" id="inputEmail" class="form-control" name="user" placeholder="Nombre de Usuario" required autocomplete="off">
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Contraseña" required autocomplete="off">
            <div class="checkbox">
            </div>
            <button class="btn btn-lg btn-default btn-block" name="login" type="submit">Acceder</button>
        </form>
        

    </div>
    <!-- /container -->

    <script src="/assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>