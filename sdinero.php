<?php

include 'ser.php';

$canti = $_POST['cantidad'];

$sql = "SELECT cantidad FROM totaldinero";
$result = mysql_query($sql);
$row=mysql_fetch_array($result);

if ($canti > $row['cantidad']) {

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