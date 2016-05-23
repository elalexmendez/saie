<?php
	$conexion = mysql_connect("localhost", "root");
	mysql_select_db("prueba", $conexion);

	$sql = "INSERT INTO campo2 (profesion, empleo, hobbie, id_campo1)" .
		"VALUES ('{$_POST['profesion']}' , '{$_POST['empleo']}' , '{$_POST['hobbie']}' , '{$_POST['id_campo1']}') ";

		$result = mysql_query($sql) ;

		echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='campo.php';</script>";

?>