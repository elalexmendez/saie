<?php

/* Abrimos la base de datos */
  $conx = mysql_connect ("localhost","root","");
  if (!$conx) die ("Error al abrir la base <br/>". mysql_error()); 
  mysql_select_db("saie") OR die("Connection Error to Database");    

/* Realizamos la consulta SQL */
$sql="select * from dinero";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

/* Desplegamos cada uno de los registros dentro de una tabla */  
echo "<table border=1 cellpadding=4 cellspacing=0>";

/*Priemro los encabezados*/
 echo "<tr>
         <th colspan=5> Datos de Ingresos </th>
       <tr>
         <th> ID </th><th> Nombre </th><th> Cantidad </th>
         <th> Descripcion </th><th> Fecha de I </th>
      </tr>";

/*Y ahora todos los registros */
while($row=mysql_fetch_array($result))
{
 echo "<tr>
         <td align='right'> $row[id] </td>
         <td> $row[nombre] </td>
         <td> $row[cantidad] </td>
         <td> $row[mensaje] </td>
         <td> $row[fecha] </td>
      </tr>";
}
echo "</table>";

?>