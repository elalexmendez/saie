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
                <li><a href="fechadinero.php">Anterior</a></li>
            </ul>
        </div>

        <h2 class="col-sm-11">Reusultado</h2>

        <div class="row col-md-10 col-md-offset-1 custyle">

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
             <tr>
                <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Estipendio </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha </th>
                <th class="text-center">Imprimir</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Estipendio </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha </th>
                <th class="text-center">Imprimir</th>
            </tr>
        </tfoot>

            <?php

                include 'ser.php';
                if (isset($_POST['enviar'])) {

                    $fecha = $_POST['desde'];
                    $fecha = $_POST['hasta'];
                    /* Realizamos la consulta SQL */
                    $sql = "SELECT ingrersos.id as id_ingreso, dinero.id as id_dinero, donadores.Nombre , donadores.Apellido , estipendio.Tipo ,
                    dinero.cantidad , ingrersos.descripcion , ingrersos.Fecha
                    FROM donadores INNER JOIN ingrersos ON ingrersos.id_donadores = donadores.id
                    INNER JOIN estipendio ON estipendio.id = ingrersos.id_estipendio
                    INNER JOIN dinero ON dinero.id = ingrersos.id_dinero
                    WHERE ingrersos.Fecha BETWEEN '".$_POST['desde']."' AND '".$_POST['hasta']."' ";

                    $result = mysql_query($sql);

                        if(mysql_num_rows($result)==0);

                             /*Y ahora todos los registros */
                             while($row=mysql_fetch_array($result))
                                {
                             echo "<tr>
                                 <td class='text-center'> $row[Nombre] </td>
                                 <td class='text-center'> $row[Apellido] </td>
                                 <td class='text-center'> $row[Tipo] </td>
                                 <td class='text-center'> $row[cantidad] Bs. </td>
                                 <td width='400' class='text-center'> $row[descripcion] </td>
                                 <td class='text-center'> $row[Fecha] </td>
                                 <td><a href='pdffechadinero.php?id_ingreso=".$row['id_ingreso']."' target='_blank' ><span title='Imprimir' class='fa fa-print btn btn-primary btn-xs'></span></a>

                    </td>
                                 </tr>";
                             }
                            echo "</table>";

                 }
            ?>
        </div>

    </div>

    <?php include "resources/views/footer.php"; ?>
</body>

