<?php 
	require 'resources/config.php';

	$egreso_id = $_POST['egreso_id'];
	$dinero_id = $_POST['dinero_id'];
	$titulo = $_POST['titulo'];
	$nombre = $_POST['nombre'];
	$canti = $_POST['cantidad'];
	$descripcion = $_POST['descripcion'];

	$actualizar = ("UPDATE egresos SET titulo = '$titulo' , nombre = '$nombre' , descripcion = '$descripcion' WHERE id = '$egreso_id' ");
	$result = mysql_query($actualizar);

	$actualizar1 = ("UPDATE egresos_dinero SET cantidad_dinero = '$canti' WHERE id = '$dinero_id' ");
	$result1 = mysql_query($actualizar1);

if ($result == true AND $result1 == true) {
	echo "<script type=\"text/javascript\">alert('Se han actualizado sus datos'); window.location='modidineroegreso.php';</script>";
}else {
	echo "error"; };

?>