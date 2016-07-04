<?php
	
	require 'resources/config.php';

	$id = $_POST['id'];
	$m = $_POST['material'];
	$c = $_POST['cantidad'];

	$sql = "UPDATE materiales SET material = '$m' , cantidad = '$c' WHERE id = '$id' ";
	$result = mysql_query($sql);

	echo"<script type=\"text/javascript\">alert('Se ha actualizado el Material'); window.location='gestionmateriales.php';</script>";


?>