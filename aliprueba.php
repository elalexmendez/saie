<?php
	
	include 'ser.php';

	if (isset($_POST['cedula'])) {
	$Cedula = $_POST['cedula'];
    $sql = mysql_query("SELECT * FROM donadores WHERE id='".$_POST['cedula']."'");
    if (mysql_num_rows($sql)>0) {
    	$row = mysql_fetch_array($sql);
    	$_POST["cedula"] == $row['id'];

    	$sql = "INSERT INTO ingrersos (id_donadores , id_categoria , id_alimento , cantidad_alimento , descripcion ,  Fecha)" .
		"VALUES ('{$_POST['cedula']}' , '3' , '{$_POST['nombre']}' , '{$_POST['cantidad']}' , '{$_POST['descripcion']}' , '".date(" Y-m-d")."')";
		$result = mysql_query($sql);


		$sql = "UPDATE  alimentos SET cantidad = cantidad +  '{$_POST['cantidad']}' WHERE alimento = '{$_POST['nombre']}'";
		$result = mysql_query($sql);
		echo"<script type=\"text/javascript\">alert('Se han registrado sus datos'); window.location='alimentos.php';</script>";
    }
    else{
    	echo '<script> alert("El Contribuyente no esta Registrado."); </script>';
    	echo '<script> window.location="contribuyente.php"; </script>';
    }


	}
?>