<?php 
	require 'resources/config.php';

	$id1 = $_POST['id1'];
	$id2 = $_POST['id2'];
	$cedula = $_POST['cedula'];
	$canti = $_POST['cantidad'];
	$descripcion = $_POST['mensaje'];
	$arancel = $_POST['estipendio'];

	$actualizar = ("UPDATE ingresos SET donador_id = '$cedula' , descripcion = '$descripcion' WHERE id = '$id1' ");
	$result = mysql_query($actualizar);

	$actualizar1 = ("UPDATE ingresos_dinero SET estipendio_id = '$arancel' , cantidad = '$canti' WHERE id = '$id2' ");
	$result1 = mysql_query($actualizar1);

if ($result == true AND $result1 == true) {
	echo "<script type=\"text/javascript\">alert('Se han actualizado sus datos'); window.location='modidinero.php';</script>";
}else {
	echo "error"; };

?>