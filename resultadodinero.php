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

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="dinconsulta.php">Anterior</a></li>
            </ul>
        </div>


        <div class="row col-md-10 col-md-offset-1 custyle">

            <h2 class="col-sm-11">Resultado de Ingresos por Fecha</h2>

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

                require "resources/config.php";
                
                if (isset($_POST['enviar'])) {

                    $fecha = $_POST['desde'];
                    $fecha = $_POST['hasta'];
                    /* Realizamos la consulta SQL */
                    $sql = "SELECT *, ingresos.id as id_ingreso, ingresos_dinero.id as id_dinero, 
                    donadores.Nombre , donadores.Apellido , ingresos_dinero.cantidad , ingresos.descripcion , 
                    ingresos.datetime , estipendio.Tipo 
                    FROM donadores INNER JOIN ingresos ON donador_id = donadores.id 
                    INNER JOIN ingresos_dinero ON ingreso_id = ingresos.id 
                    INNER JOIN estipendio ON estipendio.id = ingresos_dinero.estipendio_id
                    WHERE ingresos.datetime BETWEEN '".$_POST['desde']." ' AND '".$_POST['hasta']."' ";

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
                                 <td class='text-center'> $row[datetime] </td>
                                 <td><a href='pdfdinero.php?id_ingreso=".$row['id_ingreso']."' target='_blank' ><span title='Imprimir' class='fa fa-print btn btn-primary btn-xs'></span></a>

                    </td>
                                 </tr>";
                             }
                            echo "</table><br><br><br><br>";

                 }
            ?>
        </div>



        <?php

            $sql4 = "SELECT SUM(cantidad) as total 
            FROM ingresos_dinero JOIN ingresos ON ingresos.id = ingresos_dinero.ingreso_id 
            WHERE ingresos.datetime BETWEEN '".$_POST['desde']." ' AND '".$_POST['hasta']."' ";
            $result4 = mysql_query($sql4);
            $row4 = mysql_fetch_array($result4);
        ?>


        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" action="sdinero.php">
                    <div class="form-group"><br>
                        <label for="exampleInputEmail1">Cantidad Total Ingresada en la Fecha: <?= $row4['total'] ?> Bs.</label>
                    </div>
            </div>
        </div>

    </div>

    <?php include "resources/views/footer.php"; ?>
</body>

<?php
    }else{
        echo '<script> window.location="login.php"; </script>';
    }
?>

