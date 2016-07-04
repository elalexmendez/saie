<?php

	require "resources/config.php";


	$cedula = $_POST['cedula'];

	$sql = "SELECT * FROM donadores WHERE id = '$cedula'";
	$result = mysql_query($sql);
	$resgistros = mysql_num_rows($result);
	$row = mysql_fetch_array($result);

	if ($resgistros > 0) {
		echo "Si existe el Numero de Identificación<br><br> <b>Nombre: </b>" .$row['Nombre']. '<br><b>Apellido:</b> '.$row['Apellido'] ;
	}else{
		echo "No existe el Numero de Identificación";
	}

?>