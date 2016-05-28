<?php 
	include 'ser.php';

	$id = $_POST['id'];
	$cedula = $_POST['cedula'];
	$material = $_POST['material'];
	$cantidad = $_POST['cantidad'];
	$descripcion = $_POST['mensaje'];


	$actualizar = mysql_query("UPDATE mteriales SET id_donadores = '$cedula' WHERE id = $id");
	$actualizar = mysql_query("UPDATE mteriales SET material = '$material' WHERE id = $id");

if ($actualizar == true) {
	echo "<script type=\"text/javascript\">alert('Se han actualizado sus datos'); window.location='invmateriales.php';</script>";
};

?>
