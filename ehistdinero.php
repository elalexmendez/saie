<?php
    session_start();
    require 'resources/config.php';

    if (isset($_SESSION['usuario'])) {
        echo "";
    
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Consulta Dinero</title>
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

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="edinconsulta.php">Anterior</a></li>
            </ul>
        </div>


        <div class="row col-md-10 col-md-offset-1 custyle">

            <h2 class="col-sm-11">Resultado de Egresos</h2>

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
             <tr>
                <th class='text-center'> Codigo </th>
                <th class='text-center'> Titulo </th>
                <th class='text-center'> Responsable </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha </th>
                <th class="text-center">Imprimir</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class='text-center'> Codigo </th>
                <th class='text-center'> Titulo </th>
                <th class='text-center'> Responsable </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha </th>
                <th class="text-center">Imprimir</th>
            </tr>
        </tfoot>

            <?php

                require "resources/config.php";
                

                    /* Realizamos la consulta SQL */
                    $sql ="SELECT *, egresos.id as id_egreso, egresos_dinero.id as id_dinero 
                    FROM egresos JOIN egresos_dinero ON egresos_dinero.egreso_id = egresos.id";
                    $result = mysql_query($sql);

                        if(mysql_num_rows($result)==0);

                             /*Y ahora todos los registros */
                             while($row=mysql_fetch_array($result))
                                {
                             echo "<tr>
                                 <td class='text-center'> $row[id_dinero] </td>
                                 <td class='text-center'> $row[titulo] </td>
                                 <td class='text-center'> $row[nombre] </td>
                                 <td class='text-center'> $row[cantidad_dinero] Bs. </td>
                                 <td width='400' class='text-center'> $row[descripcion] </td>
                                 <td class='text-center'> $row[datatime] </td>
                                 <td><a href='#'><span title='Imprimir' class='fa fa-print btn btn-primary btn-xs'></span></a>

                    </td>
                                 </tr>";
                             }
                            echo "</table><br><br><br><br>";
            ?>
        </div>

    </div>

    <?php include "resources/views/footer.php"; ?>
</body>

<?php
    }else{
        echo '<script> window.location="login.php"; </script>';
    }
?>
