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
                <li><a href="dinconsulta.php">Anterior</a></li>
            </ul>
        </div>

        <div class="row col-md-8 col-md-offset-2 custyle">
            <?php

    include 'ser.php';
        $sql = "SELECT SUM(cantidad) as total_suma FROM dinero";
        $result = mysql_query($sql) or die(mysql_error());
        $row = mysql_fetch_array($result);

        $sql = "SELECT SUM(cantidad_dinero) as total_suma2 FROM egresos";
        $result = mysql_query($sql) or die(mysql_error());
        $row2 = mysql_fetch_array($result);

        $disponible = $row['total_suma'] - $row2['total_suma2'];

            if(mysql_num_rows($result));

                 /* Desplegamos cada uno de los registros dentro de una tabla */
                echo "<table class='table table-striped custab text-center table-bordered' cellpadding=4 cellspacing=0>";

                /*Priemro los encabezados*/
                 echo "<tr>
                        <th class='text-center' colspan=5> Catidad total de Dinero </th>
                   <tr>
                     <th class='text-center'> Cantidad </th>

                  </tr>";

                 /*Y ahora todos los registros */

                 echo "<tr>
                     <td class='text-center'> $disponible Bs. </td>
                     </tr>";

                echo "</table>";

?>
        </div>

</div>

    </div>

    <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

</body>