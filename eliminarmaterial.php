<?php

	include 'ser.php';

	/* realizamos la consulta */
	$id = $_POST['eliminar'];
	$id2 = $_POST['eliminar2'];

	$sql = "DELETE  FROM ingrersos WHERE id = '$id' ";
	$result = mysql_query($sql) or die("error");

	$sql = "DELETE  FROM mteriales WHERE id = '$id2' ";
	$result = mysql_query($sql) or die("error");
	

	echo"<script type=\"text/javascript\">alert('Se ha eliminado su registro'); window.location='modimateriales.php';</script>";


?>