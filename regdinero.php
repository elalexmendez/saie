<?php

include 'resources/config.php';

	if (isset($_POST['cedula'])) {
	$Cedula = $_POST['cedula'];
    $sql = mysql_query("SELECT * FROM donadores WHERE id='".$_POST['cedula']."'");
    if (mysql_num_rows($sql)>0) {
    	$row = mysql_fetch_array($sql);
    	$_POST["cedula"] == $row['id'];

		$sql = "INSERT INTO ingresos (donador_id , descripcion , type )" .
		"VALUES ('{$_POST['cedula']}' , '{$_POST['mensaje']}' , 'dinero')";
		$result = mysql_query($sql);
    
		$dinero = "SELECT id FROM ingresos ORDER BY id DESC LIMIT 1";
    	$resultado = mysql_query($dinero);
    	$row2 = mysql_fetch_array($resultado);

		$sql = "INSERT INTO ingresos_dinero (ingreso_id , estipendio_id , cantidad )" .
		"VALUES ('$row2[id]' , '{$_POST['estipendio']}' , '{$_POST['cantidad']}')";
		$result = mysql_query($sql);

		echo"<script type=\"text/javascript\"> window.location='ingreso_dinero.php';</script>";

    }
    else{
    	echo '<script> alert("El Contribuyente no esta Registrado."); </script>';
    	echo '<script> window.location="contribuyente.php"; </script>';
    }


	

	}



?>