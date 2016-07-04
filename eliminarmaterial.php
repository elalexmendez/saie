<?php

	require 'resources/config.php';

	/* realizamos la consulta */
	$id = $_POST['eliminar'];
	$cantidad = $_POST['cantidad'];
	$material = $_POST['material'];


	$sql = "DELETE  FROM ingresos_materiales WHERE id = '$id' ";
	$result = mysql_query($sql) or die("error");
	
	$sql1 = "UPDATE materiales SET cantidad = cantidad - '$cantidad' WHERE material = '$material' ";
	$resul1 = mysql_query($sql1);

	if ($result == true AND $resul1 == true) {
		echo"<script type=\"text/javascript\">alert('Se ha eliminado su registro'); window.location='modimateriales.php';</script>";
	}else{
		echo "error";
	}

	


?>