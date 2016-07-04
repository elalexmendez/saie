<?php
	
	require 'resources/config.php';

	$a = $_POST['alimento'];
	$c = $_POST['cantidad'];

	$sql1 = "SELECT Alimento FROM alimentos WHERE Alimento = '$a' ";
	$result1 = mysql_query($sql1);

	if ($row1 = mysql_num_rows($result1) > 0) {
		echo"<script type=\"text/javascript\">alert('El Alimento ya existe'); window.location='nuevoalimento.php';</script>";
	}

	else{
	$sql = "INSERT INTO alimentos (Alimento , Cantidad) VALUES ('$a' , '$c') ";
	$result = mysql_query($sql);

	echo"<script type=\"text/javascript\">alert('Se ha registrado el Alimento'); window.location='nuevoalimento.php';</script>";
}
?>