<?php
	
	require 'resources/config.php';

	$id = $_POST['eliminar'];

	$sql = "DELETE FROM usuarios WHERE id = '$id' ";
	$result = mysql_query($sql);

	echo"<script type=\"text/javascript\">alert('Se ha eliminado el Usuario'); window.location='gestiondeusuarios.php';</script>";
?>