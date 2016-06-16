<?php

include 'ser.php';

	$canti = $_POST['cantidad'];

	$sql = "SELECT SUM(cantidad) as total_suma FROM dinero";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);

	$sql = "SELECT SUM(cantidad_dinero) as total_suma2 FROM egresos";
	$result = mysql_query($sql) or die(mysql_error());
	$row2 = mysql_fetch_array($result);
	
	$disponible = $row['total_suma'] - $row2['total_suma2'];

	if ($canti > $disponible) {

		echo"<script type=\"text/javascript\">alert('Dinero no Disponible, Verifique el Monto'); window.location='edinero.php';</script>";
		
	}
	else { 
	$sql = "INSERT INTO egresos (titulo , id_categoria , cantidad_dinero , descripcion , fecha) " .
		"VALUES ('{$_POST['nombre']}' , '1' , '{$_POST['cantidad']}' , '{$_POST['mensaje']}' , '".date(" Y-m-d")."') ";
	$result = mysql_query($sql);

	$sql = "UPDATE  totaldinero SET cantidad = cantidad -  '{$_POST['cantidad']}' ";
	$result = mysql_query($sql);
	echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='edinero.php';</script>";
	}
	?>