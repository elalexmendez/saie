<?php
    session_start();
    require 'resources/config.php';

    $sql = "SELECT * FROM usuarios WHERE cargo = 'administrador' AND usuario = '$_SESSION[usuario]' ";
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
        echo "";
    
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eliminar Ingresos de Materiales</title>
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
                <li><a href="modiegresos.php">Anterior</a></li>
            </ul>
        </div>

        <h2 class="col-sm-11">Eliminar Ingresos de Materiales</h2>

        <div class="row col-md-10 col-md-offset-1 custyle">

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
             <tr>
                <th class='text-center'> Codigo </th>
                <th class='text-center'> Titulo </th>
                <th class='text-center'> Responsable </th>
                <th class='text-center'> Material </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha  </th>
                <th class='text-center'> Eliminar </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class='text-center'> Codigo </th>
                <th class='text-center'> Titulo </th>
                <th class='text-center'> Responsable </th>
                <th class='text-center'> Material </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha </th>
                <th class='text-center'> Eliminar </th>
            </tr>
        </tfoot>


        <?php

            /* Abrimos la base de datos */
              require 'resources/config.php';

            /* Realizamos la consulta SQL */

            $sql="SELECT *, m.id as ida , m.cantidad as can FROM egresos e JOIN egresos_materiales m ON m.egreso_id = e.id 
            JOIN materiales mate on mate.id = m.material_id";
            $result= mysql_query($sql) or die(mysql_error());
            if(mysql_num_rows($result)==0);


            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result))
            {
             echo "<tr>
                     <td> $row[ida] </td>
                     <td> $row[titulo] </td>
                     <td> $row[nombre] </td>
                     <td> $row[material] </td>
                     <td> $row[can] </td>
                     <td width='400'> $row[descripcion] </td>
                     <td> $row[datatime] </td>
                     <td><form method='POST' action='eliminarmaterialegresos.php'> \n
                         <input type='hidden' name='eliminar' value='$row[ida]' />
                         <input type='hidden' name='cantidad' value='$row[can]' />
                         <input type='hidden' name='material' value='$row[material]' />
                         <button type='submit' class='fa fa-trash-o fa-lg btn btn-danger btn-xs'></span></<button>
                    </form></td>
                  </tr>";
            }
            echo "</table>";

        ?>
    </div>

</div>

    </div>

    <?php include "resources/views/footer.php"; ?>
</body>

<?php
    }else{
         echo "<script> alert('Tu usuario no tiene permiso para acceder a esta pagina'); </script>";
        echo '<script> window.location="index.php"; </script>';
    }
?>