<?php

	require 'resources/config.php';

	/* realizamos la consulta */
	$id = $_POST['eliminar'];
	$canti = $_POST['cantidad'];
	$ali = $_POST['alimento'];


	$sql = "DELETE  FROM egresos_alimentos WHERE id = '$id' ";
	$result = mysql_query($sql) or die("error");

	$sql2 = "UPDATE alimentos SET Cantidad = Cantidad + '$canti' WHERE Alimento = '$ali' ";
	$result2 = mysql_query($sql2);
	

	echo"<script type=\"text/javascript\">alert('Se ha eliminado su registro'); window.location='modialimentosegresos.php';</script>";


?>