<?php 
	include 'ser.php';

	$id = $_POST['id'];
	$cedula = $_POST['cedula'];
	$cantidad = $_POST['cantidad'];
	$descripcion = $_POST['mensaje'];


	$actualizar = mysql_query("UPDATE ingrersos SET id_donadores = '$cedula' WHERE id = $id");
	$actualizar = mysql_query("UPDATE ingrersos SET id_dinero = '$cantidad' WHERE id = $id");

if ($actualizar == true) {
	echo "<script type=\"text/javascript\">alert('Se han actualizado sus datos'); window.location='histdinero.php';</script>";
}

?>