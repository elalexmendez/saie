<?php

	include 'ser.php';

	/* realizamos la consulta */
	$id = $_POST['eliminar'];

	$sql = "DELETE  FROM mteriales WHERE id = '$id' ";
	$result = mysql_query($sql) or die("error");

	echo"";


?>