<?php

include 'ser.php';

	if (isset($_POST['cedula'])) {
	$Cedula = $_POST['cedula'];
    $sql = mysql_query("SELECT * FROM donadores WHERE id='".$_POST['cedula']."'");
    if (mysql_num_rows($sql)>0) {
    	$row = mysql_fetch_array($sql);
    	$_POST["cedula"] == $row['id'];

    	$material = $_POST['material'];

    	$sql = "INSERT INTO ingrersos (id_donadores , id_categoria , id_material , descripcion ,  Fecha)" .
		"VALUES ('{$_POST['cedula']}' , '2' , '$material' , '{$_POST['mensaje']}' , '".date(" Y-m-d")."')";
		$result = mysql_query($sql);

		$sql = "INSERT INTO mteriales (id_donadores , material , cantidad ,  descripcion ,  Fecha)" .
		"VALUES ('{$_POST['cedula']}' , '{$_POST['material']}' , '{$_POST['cantidad']}' ,  '{$_POST['mensaje']}' , '".date(" Y-m-d")."')";
		$result = mysql_query($sql);
		echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='materiales.php';</script>";
    }
    else{
    	echo '<script> alert("El Contribuyente no esta Registrado."); </script>';
    	echo '<script> window.location="contribuyente.php"; </script>';
    }


	

	}

?>