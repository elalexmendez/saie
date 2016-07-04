<?php
	
	require 'resources/config.php';

	$id = $_POST['id'];
	$c = $_POST['cedula'];
	$p = $_POST['apellido'];
	$n = $_POST['nombre'];
	$ca = $_POST['tipo'];
	$u = $_POST['user'];
	$pa = $_POST['pass'];

	$sql = "UPDATE usuarios SET cedula = '$c' , apellidos = '$p' , nombres = '$n' , cargo = '$ca' , usuario = '$u' , password = '$pa' ";
	$result = mysql_query($sql);

	echo"<script type=\"text/javascript\">alert('Se ha actualizado el Usuario'); window.location='gestiondeusuarios.php';</script>";

?>