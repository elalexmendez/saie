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

    <!-- DataTable -->
    <link rel="stylesheet" href="assets/css/dataTable.css"/>
    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script>

$(document).ready(function() {
    oTable = $('#example').dataTable({

    });

} );

</script>


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="dinconsulta.php">Anterior</a></li>
            </ul>
        </div>

         <h2 class="col-sm-11">Reusultado</h2>

        <div class="row col-md-10 col-md-offset-1 custyle">

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class='text-center'> Codigo </th>
                <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th width='100' class='text-center'> Arancel </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha</th>
                <th class="text-center">Imprimir</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class='text-center'> Codigo </th>
                <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Arancel </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha </th>
                <th class="text-center">Imprimir</th>
            </tr>
        </tfoot>

        <?php

            /* Abrimos la base de datos */
              include 'ser.php';

            /* Realizamos la consulta SQL */

            $sql = "SELECT * FROM ingrersos";
            $result1 = mysql_query($sql);

            $sql="SELECT ingrersos.id as id_ingreso, dinero.id as id_dinero, donadores.Nombre , donadores.Apellido , estipendio.Tipo , dinero.cantidad ,
            estipendio.Tipo , ingrersos.descripcion , ingrersos.Fecha
            FROM donadores INNER JOIN ingrersos ON ingrersos.id_donadores = donadores.id
            INNER JOIN estipendio ON estipendio.id = ingrersos.id_estipendio
            INNER JOIN dinero ON dinero.id = ingrersos.id_dinero ORDER BY 'id' ASC";
            $result= mysql_query($sql);

            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result))
            {
             echo "<tr>
                     <td> $row[id_dinero] </td>
                     <td> $row[Nombre] </td>
                     <td> $row[Apellido] </td>
                     <td> $row[Tipo] </td>
                     <td> $row[cantidad] bs. </td>
                     <td width='400'> $row[descripcion] </td>
                     <td> $row[Fecha] </td>
                     <td><a href='pdfdinero.php?id_ingreso=".$row['id_ingreso']."' target='_blank' ><span title='Imprimir' class='fa fa-print btn btn-primary btn-xs'></span></a>

                    </td>
                  </tr>";
            }
            echo "</table>";

        ?>

</div>

    </div>

    <?php include "resources/views/footer.php"; ?>
</body>
