<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Control de Ingresos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>


    <!-- Alertify -->

    <link rel="stylesheet" type="text/css" href="assets/alertify/themes/alertify.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/alertify/themes/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="assets/alertify/themes/alertify.default.css">
    <script src="assets/alertify/lib/alertify.js"></script>
    <script src="assets/alertify/lib/alertify.min.js"></script>
</head>

<body>
    <?php
    session_start();
?>

<?php

include 'ser.php';
if (isset($_POST['login'])) {
    $Usuario = $_POST['user'];
    $password = $_POST['pass'];
    $sql = mysql_query("SELECT * FROM usuarios WHERE usuario='".$_POST['user']."' AND password='".$_POST['pass']."' ");
    if (mysql_num_rows($sql)>0) {
        $row = mysql_fetch_array($sql);
        $_SESSION["usuario"] = $row['usuario'];
        echo '<script> window.location="index.php"; </script>';
    }
    else{
        echo '<script> alert("Usuario o Contraseña son Incorrectos."); </script>';
        echo '<script> window.location="login.php"; </script>';
    }
}
?>
</body>

<html>