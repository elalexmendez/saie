<?php

include 'ser.php';

	if (isset($_POST['cedula'])) {
	$Cedula = $_POST['cedula'];
    $sql = mysql_query("SELECT * FROM donadores WHERE id='".$_POST['cedula']."'");
    if (mysql_num_rows($sql)>0) {
    	$row = mysql_fetch_array($sql);
    	$_POST["cedula"] == $row['id'];

		$sql = "INSERT INTO dinero (id_donadores , id_estipendio , cantidad ,  mensaje ,  Fecha)" .
		"VALUES ('{$_POST['cedula']}' , '{$_POST['estipendio']}' , '{$_POST['cantidad']}' ,  '{$_POST['mensaje']}' , '".date(" Y-m-d")."')";
		$result = mysql_query($sql);
		echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='dinero.php';</script>";
    
		$dinero = "SELECT id FROM dinero ORDER BY id DESC LIMIT 1";
    	$resultado = mysql_query($dinero);
    	$row2 = mysql_fetch_array($resultado);

		$sql = "INSERT INTO ingrersos (id_donadores , id_categoria , id_dinero , id_estipendio ,  descripcion ,  Fecha)" .
		"VALUES ('{$_POST['cedula']}' , '1' , '$row2[id]' , '{$_POST['estipendio']}' , '{$_POST['mensaje']}' , '".date(" Y-m-d")."')";
		$result = mysql_query($sql);

    }
    else{
    	echo '<script> alert("El Contribuyente no esta Registrado."); </script>';
    	echo '<script> window.location="contribuyente.php"; </script>';
    }


	

	}



?>