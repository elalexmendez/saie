<?php
	
	require 'resources/config.php';

	$c = $_POST['cedula'];
	$p = $_POST['apellido'];
	$n = $_POST['nombre'];
	$ca = $_POST['tipo'];
	$u = $_POST['user'];
	$pa = $_POST['pass'];

	$sql1 = "SELECT cedula FROM usuarios";
	$result1 = mysql_query($sql1);
	$row1 = mysql_fetch_array($result1);

	if ($row1['cedula'] == $c) {
		echo"<script type=\"text/javascript\">alert('La Cedula ya exite'); window.location='nuevousuario.php';</script>";
	}

	else {
	$sql = "INSERT INTO usuarios (cedula, apellidos, nombres, cargo, usuario, password) 
	VALUES ('$c' , '$p' , '$n' , '$ca' , '$u' , '$pa') ";
	$result = mysql_query($sql);

	echo"<script type=\"text/javascript\">alert('Se ha registrado el Usuario'); window.location='nuevousuario.php';</script>";
}
?>