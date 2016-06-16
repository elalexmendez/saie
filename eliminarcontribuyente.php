<?php

	include 'ser.php';

	/* realizamos la consulta */
	$id = $_POST['eliminar'];

	$sql = "DELETE  FROM donadores WHERE id = '$id' ";
	$result = mysql_query($sql) or die("error");


	echo"<script type=\"text/javascript\">alert('Se ha eliminado el Contribuyente'); window.location='gestiondecontribuyente.php';</script>";


?>