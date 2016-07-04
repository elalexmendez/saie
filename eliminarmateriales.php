<?php

	require 'resources/config.php';

	/* realizamos la consulta */
	$id = $_POST['eliminar'];

	$sql = "DELETE  FROM materiales WHERE id = '$id' ";
	$result = mysql_query($sql) or die("error");
	
	echo"<script type=\"text/javascript\">alert('Se ha eliminado su registro'); window.location='gestionmateriales.php';</script>";


?>