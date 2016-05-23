<?php
	include 'ser.php';

	$cedula = $_POST['cedula'];

	if (isset($cedula)) {
		$sql = mysql_query("SELECT * FROM donadores WHERE id = '$cedula'");
    if (mysql_num_rows($sql)>0) {
    	$row = mysql_fetch_array($sql);
    	$cedula == $row['id'];

    	echo"<script type=\"text/javascript\">alert('La Cedula ya existe'); window.location='contribuyente.php';</script>";

    }else {

    	$sql = "INSERT INTO donadores (id , Nombre ,  Apellido) " . 
		" VALUES ($cedula , '{$_POST['nombre']}' , '{$_POST['apellido']}')";
		$result = mysql_query($sql);
		echo "<script type=\"text/javascript\">alert('Se ha registrado el Contribuyente'); window.location='contribuyente.php';</script>";

    }
		
		
	}

	
?>