<?php 
	include 'ser.php';

	$id = $_POST['id'];
	$cedula = $_POST['cedula'];
	$material = $_POST['material'];
	$cantidad = $_POST['cantidad'];
	$descripcion = $_POST['mensaje'];

	$sql = ("SELECT * FROM mteriales WHERE id = '$id' ");
	$result = mysql_query($sql);
	$actualizar = ("UPDATE mteriales SET id_donadores = '$cedula' , material = '$material' , cantidad = '$cantidad' , descripcion = '$descripcion' WHERE id = $id");
	$result = mysql_query($actualizar);

	$sql = ("SELECT * FROM ingrersos WHERE id = '$id' ");
	$result = mysql_query($sql);
	$actualizar = ("UPDATE ingrersos SET id_donadores = '$cedula' , id_material = '$material' , descripcion = '$descripcion' WHERE id = $id");
	$result = mysql_query($actualizar);

if ($actualizar == true) {
	echo "<script type=\"text/javascript\">alert('Se han actualizado sus datos'); window.location='modimateriales.php';</script>";
};

?>
