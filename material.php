<?php

$conexion = mysql_connect("localhost", "root");

mysql_select_db("saie" , $conexion);

$sql = "INSERT INTO mteriales (nombre, material, cantidad, descripcion, fecha) " .
	"VALUES ('{$_POST['nombre']}' , '{$_POST['material']}' , '{$_POST['cantidad']}' , '{$_POST['descripcion']}' , '".date(" Y-m-d")."') ";
$result = mysql_query($sql);
echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='materiales.html';</script>";

?>