<?php

include 'ser.php';

$canti = $_POST['cantidad'];
$ali = $_POST['nombre'];
$alimento = $_POST['alimento']

$sql = "SELECT Cantidad FROM alimentos WHERE alimento = '$alimento' ";
$result = mysql_query($sql);
$row=mysql_fetch_array($result);

if ($canti > $row['Cantidad']) {

	echo"<script type=\"text/javascript\">alert('Cantidad no Disponible'); window.location='ealimentos.php';</script>";
	
}
else { 
$sql = "INSERT INTO egresos (titulo , id_categoria , cantidad_alimento , descripcion) " .
	"VALUES ('{$_POST['nombre']}' , '3' , '{$_POST['cantidad']}' , '{$_POST['mensaje']}'";
$result = mysql_query($sql);

$sql = "UPDATE  alimentos SET cantidad = cantidad -  '$canti' WHERE alimento = '$ali' ";
$result = mysql_query($sql);
echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='ealimentos.php';</script>";
}
?>