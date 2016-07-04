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
    <title>Consulta Alimentos</title>
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
                <li><a href="aliconsulta.php">Anterior</a></li>
            </ul>
        </div>

        

        <div class="row col-md-10 col-md-offset-1 custyle">

            <h2 class="col-sm-11">Resultado de Ingresos por Fecha</h2>

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
             <tr>
                <th class='text-center'> Codigo </th>
                <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Alimento </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class='text-center'> Codigo </th>
                <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Alimento </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha</th>
            </tr>
        </tfoot>

            <?php

                require "resources/config.php";
                if (isset($_POST['enviar'])) {

                    $fecha = $_POST['desde'];
                    $fecha = $_POST['hasta'];
                    /* Realizamos la consulta SQL */
                    $sql = "SELECT *, a.id as ida FROM ingresos i JOIN ingresos_alimentos a ON a.ingreso_id = i.id 
                    JOIN alimentos ali on ali.id = a.alimento_id 
                    JOIN donadores ON donadores.id = donador_id  
                    WHERE i.datetime BETWEEN '".$_POST['desde']."' AND '".$_POST['hasta']."'";
                    $result = mysql_query($sql);

                        if(mysql_num_rows($result)==0) ;

                             /*Y ahora todos los registros */
                             while($row=mysql_fetch_array($result))
                                {
                             echo "<tr>
                                 <td> $row[ida] </td>
                                 <td> $row[Nombre] </td>
                                 <td> $row[Apellido] </td>
                                 <td> $row[Alimento] </td>
                                 <td> $row[cantidad] </td>
                                 <td> $row[descripcion] </td>
                                 <td> $row[datetime] </td>
                                 </tr>";
                             }
                            echo "</table>";

                 }
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
