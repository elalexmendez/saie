<?php 
	include 'ser.php';

	$id = $_POST['id'];
	$id2 = $_POST['id2'];
	$cedula = $_POST['cedula'];
	$canti = $_POST['cantidad'];
	$descripcion = $_POST['mensaje'];

	$sql = ("SELECT * FROM ingrersos WHERE id = '$id' ");
	$result = mysql_query($sql);
	$actualizar = ("UPDATE ingrersos SET id_donadores = '$cedula' , id_dinero = '$canti' , descripcion = '$descripcion' WHERE id = '$id' ");
	$result = mysql_query($actualizar);

	$sql1 = ("SELECT * FROM dinero WHERE id = '$id2' ");
	$result1 = mysql_query($sql1);
	$actualizar1 = ("UPDATE dinero SET id_donadores = '$cedula' , cantidad = '$canti' , mensaje = '$descripcion' WHERE id = '$id2' ");
	$result1 = mysql_query($actualizar1);

if ($result == true AND $result1 == true) {
	echo "<script type=\"text/javascript\">alert('Se han actualizado sus datos'); window.location='modidinero.php';</script>";
}else {
	echo "erro"; };

?>