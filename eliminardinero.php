<?php

	include 'ser.php';

	/* realizamos la consulta */
	$id = $_POST['eliminar'];
	$cantidad = $_POST['$row[cantidad]'];

	$sql = "DELETE  FROM ingrersos WHERE id = '$id' ";
	$result = mysql_query($sql) or die("error");

	$sql = "UPDATE  totaldinero SET cantidad = cantidad - '$cantidad' ";
	$result = mysql_query($sql);

	echo"<script type=\"text/javascript\">alert('Se ha eliminado su registro'); window.location='modidinero.php';</script>";


?>