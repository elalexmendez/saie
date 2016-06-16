<?php
    require "resources/config.php";
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gestion de Usuario</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href="assets/css/dataTable.css"/>
    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script>

$(document).ready(function() {
    oTable = $('#example').dataTable({


    });

} );

</script>

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="administracion.php">Anterior</a></li>
            </ul>
        </div>

        <h2 class="col-sm-11">Gestión de Usuario </h2>

        <div class="row col-md-10 col-md-offset-1 custyle">

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Cedula</th>
                <th class="text-center">Apellidos</th>
                <th class="text-center">Nombres</th>
                <th class="text-center">Tipo de Usuario</th>
                <th class="text-center">Nombre de Usuario</th>
                <th class="text-center">Contraseña</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="text-center">Cedula</th>
                <th class="text-center">Apellidos</th>
                <th class="text-center">Nombres</th>
                <th class="text-center">Tipo de Usuario</th>
                <th class="text-center">Nombre de Usuario</th>
                <th class="text-center">Contraseña</th>
            </tr>
        </tfoot>

        <?php

            /* Abrimos la base de datos */
              include 'ser.php';

            /* Realizamos la consulta SQL */
            $sql = "SELECT * FROM usuarios";
            $result1 = mysql_query($sql);
            $row = mysql_num_rows($result1);

            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result1))
            {
             echo "<tr>
                     <td> $row[cedula] </td>
                     <td> $row[appellidos] </td>
                     <td> $row[nombres] </td>
                     <td> $row[cargo] </td>
                     <td> $row[usuario] </td>
                     <td> $row[password] </td>
                  </tr>";
            }
            echo "</table>";

        ?>
    </div>


        </div>

    </div>

    <?php include "resources/views/footer.php"; ?>

</body>

</html>