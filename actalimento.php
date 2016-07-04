<?php
	
	require 'resources/config.php';

	$id = $_POST['id'];
	$a = $_POST['alimento'];
	$c = $_POST['cantidad'];

	$sql = "UPDATE alimentos SET Alimento = '$a' , Cantidad = '$c' WHERE id = '$id' ";
	$result = mysql_query($sql);

	echo"<script type=\"text/javascript\">alert('Se ha actualizado el Alimento'); window.location='gestionalimentos.php';</script>";


?>