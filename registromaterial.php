<?php
	
	require 'resources/config.php';

	$m = $_POST['material'];
	$c = $_POST['cantidad'];

	$sql1 = "SELECT material FROM materiales WHERE material = '$m' ";
	$result1 = mysql_query($sql1);

	if ($row1 = mysql_num_rows($result1) > 0) {
		echo"<script type=\"text/javascript\">alert('El Material ya existe'); window.location='nuevomaterial.php';</script>";
	}

	else{
	$sql = "INSERT INTO materiales (material , cantidad) VALUES ('$m' , '$c') ";
	$result = mysql_query($sql);

	echo"<script type=\"text/javascript\">alert('Se ha registrado el Material'); window.location='nuevomaterial.php';</script>";
}
?>