<?php

	include 'ser.php';
	if (isset($_POST['enviar'])) {
		
		$fecha = $_POST['desde'];
		$fecha = $_POST['hasta'];
    	/* Realizamos la consulta SQL */
    	$sql = "SELECT * FROM dinero WHERE fecha BETWEEN  '".$_POST['desde']."' AND '".$_POST['hasta']."'";
        $result = mysql_query($sql) or die("Error");
 
    		if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

           		 /* Desplegamos cada uno de los registros dentro de una tabla */  
            	echo "<table class='table table-striped custab' border=1 cellpadding=4 cellspacing=0>";

            	/*Priemro los encabezados*/
            	 echo "<tr>
             	        <th class='text-center' colspan=5> Datos de Ingresos </th>
                   <tr>
                     <th class='text-center'> ID </th><th class='text-center'> Nombre </th><th class='text-center'> Cantidad </th>
                     <th class='text-center'> Descripcion </th><th class='text-center'> Fecha de Ingreso </th>
                  </tr>";

           		 /*Y ahora todos los registros */
           		 while($row=mysql_fetch_array($result))
            		{
            	 echo "<tr>
                     <td class='text-center' align='right'> $row[id] </td>
                     <td class='text-center'> $row[nombre] </td>
                     <td class='text-center'> $row[cantidad] Bs. </td>
                     <td class='text-center'> $row[mensaje] </td>
                     <td class='text-center'> $row[fecha] </td>
                 	 </tr>";
           		 }
            	echo "</table>";

	}
?>