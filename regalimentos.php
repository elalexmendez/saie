<?php

include 'ser.php';

$sql = "INSERT INTO alimentos (nombre, alimento, cantidad, descripcion, fecha) " .
	"VALUES ('{$_POST['nombre']}' , '{$_POST['alimentos']}' , '{$_POST['cantidad']}' , '{$_POST['descripcion']}' , '".date(" Y-m-d")."') ";
$result = mysql_query($sql);
echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='alimentos.php';</script>";

?>