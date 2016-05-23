<?php
	
	$conexion = mysql_connect("localhost", "root");

	mysql_select_db("saie" , $conexion);

	$alimentos = $_POST['id'];
	$alimentos = $_POST['nombre'];
	$alimentos = $_POST['alimento'];
	$alimentos = $_POST['cantidad'];
	$alimentos = $_POST['descripcion'];

	$sql = "UPDATE alimentos SET nombre = '{$_POST['nombre']}' , alimento = '{$_POST['alimento']}' , 
	cantidad = '{$_POST['cantidad']}' , descripcion = '{$_POST['descripcion']}' WHERE id = '{$_POST['id']}'";

	$result = mysql_query($sql);
	echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='consumodificacion.php';</script>";

?>