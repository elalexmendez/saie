<?php

include 'resources/config.php';

	$canti = $_POST['cantidad'];

	$sql = "SELECT SUM(cantidad) as total_suma FROM ingresos_dinero";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);

	$sql2 = "SELECT SUM(cantidad_dinero) as total_suma2 FROM egresos_dinero";
	$result2 = mysql_query($sql2) or die(mysql_error());
	$row2 = mysql_fetch_array($result2);
	
	$disponible = $row['total_suma'] - $row2['total_suma2'];

	if ($canti > $disponible) {

		echo"<script type=\"text/javascript\">alert('Dinero no Disponible, Verifique el Monto'); window.location='edinero.php';</script>";
		
	}
	else { 
	$sql4 = "INSERT INTO egresos (titulo , nombre , descripcion , type ) " .
		"VALUES ('{$_POST['titulo']}' , '{$_POST['nombre']}' , '{$_POST['descripcion']}' , 'dinero') ";
	$result4 = mysql_query($sql4);

	$dinero = "SELECT id FROM egresos ORDER BY id DESC LIMIT 1";
    $resultado = mysql_query($dinero);
    $row2 = mysql_fetch_array($resultado);

	$sql1 = "INSERT INTO egresos_dinero (egreso_id , cantidad_dinero) " .
		"VALUES ( '$row2[id]' , '$canti') ";
	$result = mysql_query($sql1);
	echo"<script type=\"text/javascript\"> window.location='egreso_dinero.php';</script>";
	}
	?>