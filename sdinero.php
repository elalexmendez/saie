<?php

$conexion = mysql_connect("localhost", "root");

mysql_select_db("saie" , $conexion);

$sql = "INSERT INTO egresos (nombre, cantidad, descripcion, fecha) " .
	"VALUES ('{$_POST['nombre']}' , '{$_POST['cantidad']}' , '{$_POST['mensaje']}' , '".date(" Y-m-d")."') ";
$result = mysql_query($sql);

$sql = "UPDATE  totaldinero SET cantidad = cantidad -  '{$_POST['cantidad']}' ";
$result = mysql_query($sql);
echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='dinero.php';</script>";

?>