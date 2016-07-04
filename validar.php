<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Validar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

</head>

<body>

<?php
    session_start();
?>

<?php

    require 'resources/config.php';
    if (!isset($_POST['login'])) {
        $Usuario = $_POST['user'];
        $password = $_POST['pass'];
        $sql = ("SELECT * FROM usuarios WHERE usuario = '$Usuario' AND password = '$password' ");
        $result = mysql_query($sql);
        if (mysql_num_rows($result)>0) {
            $row = mysql_fetch_array($result);
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