<?php 
	include 'ser.php';

	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];

	$actualizar = ("UPDATE donadores SET id = '$cedula' , Nombre = '$nombre' , Apellido = '$apellido' WHERE id = '$cedula' ");
	$result = mysql_query($actualizar);

if ($result == true ) {
	echo "<script type=\"text/javascript\">alert('Se han actualizado sus datos'); window.location='gestiondecontribuyente.php';</script>";
}else {
	echo "erro"; };

?>