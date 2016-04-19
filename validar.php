<?php
	session_start();
?>

<?php

include 'ser.php';
if (isset($_POST['login'])) {
	$Usuario = $_POST['user'];
	$password = $_POST['pass'];
    $sql = mysql_query("SELECT * FROM usuarios WHERE usuario='".$_POST['user']."' AND password='".$_POST['pass']."'");
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