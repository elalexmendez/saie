<?php
    require "resources/config.php";
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Control de Ingresos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="edinconsulta.php">Anterior</a></li>
            </ul>
        </div>

        <?php

            /* Abrimos la base de datos */
              $conx = mysql_connect ("localhost","root","");
              if (!$conx) die ("Error al abrir la base <br/>". mysql_error());
              mysql_select_db("saie") OR die("Connection Error to Database");

            /* Realizamos la consulta SQL */
            $sql="select * from egresos";
            $result= mysql_query($sql) or die(mysql_error());
            if(mysql_num_rows($result)==0);

            /* Desplegamos cada uno de los registros dentro de una tabla */
            echo "<table class='table table-striped custab text-center' border=1 cellpadding=4 cellspacing=0>";

            /*Priemro los encabezados*/
             echo "<tr>
                     <th class='text-center' colspan=6> Datos de Ingresos </th>

                   <tr>
                     <th class='text-center' > ID </th>
                     <th class='text-center'> Nombre </th>
                     <th class='text-center'> Cantidad </th>
                     <th class='text-center'> Descripcion </th>
                     <th class='text-center'> Fecha </th>
                  </tr>";

            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result))
            {
             echo "<tr>
                     <td align='right'> $row[id] </td>
                     <td> $row[nombre] </td>
                     <td> $row[cantidad] bs. </td>
                     <td> $row[descripcion] </td>
                     <td> $row[fecha] </td>
                  </tr>";
            }
            echo "</table>";

        ?>

</div>

    </div>

    <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>


</body>
