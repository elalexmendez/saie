<?php

	require 'resources/config.php';

	/* realizamos la consulta */
	$id = $_POST['eliminar'];
	$id2 = $_POST['eliminar2'];

	$sql = "DELETE  FROM egresos WHERE id = '$id' ";
	$result = mysql_query($sql) or die("error");

	$sql = "DELETE  FROM egresos_dinero WHERE id = '$id2' ";
	$result = mysql_query($sql) or die("error");
	

	echo"<script type=\"text/javascript\">alert('Se ha eliminado su registro'); window.location='modidineroegreso.php';</script>";


?>