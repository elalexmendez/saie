<?php
    session_start();

    error_reporting(E_ALL ^ E_DEPRECATED);

    $conexion = mysql_connect("localhost", "root", "");
    mysql_select_db("saie", $conexion);
    mysql_query("SET NAMES 'utf8'");


    /* Redirect */
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php?from=config");
    }

?>