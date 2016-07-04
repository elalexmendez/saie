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
    <title>Modificar Dinero</title>
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

        <h2 class="col-sm-11">Modificar o Eliminar Ingresos de Dinero</h2>

        <div class="row col-md-10 col-md-offset-1 custyle">

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Codigo</th>
                <th class="text-center">Titulo</th>
                <th class="text-center">Responsable</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Descripcion</th>
                <th width="150" class="text-center">Fecha</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
                <th class="text-center">Imprimir</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="text-center">Codigo</th>
                <th class="text-center">Titulo</th>
                <th class="text-center">Responsable</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Descripcion</th>
                <th width="150" class="text-center">Fecha</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
                <th class="text-center">Imprimir</th>
            </tr>
        </tfoot>

        <?php

            /* Abrimos la base de datos */
              require "resources/config.php";

            /* Realizamos la consulta SQL */

            $sql1 = "SELECT * FROM egresos";
            $result1 = mysql_query($sql1);
            $row1 = mysql_fetch_array($result1);

            $sql2 = "SELECT * FROM egresos_dinero";
            $result2 = mysql_query($sql2);
            $row2 = mysql_fetch_array($result2);

            $sql="SELECT *, egresos_dinero.id as ida 
            FROM egresos JOIN egresos_dinero ON egresos_dinero.egreso_id = egresos.id 
            ORDER BY ida ASC";
            $result= mysql_query($sql);
            if(mysql_num_rows($result)==0);

            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result))
            {
             echo "<tr>
                     <td> $row[ida] </td>
                     <td> $row[titulo] </td>
                     <td> $row[nombre] </td>
                     <td> $row[cantidad_dinero] </td>
                     <td width='400'> $row[descripcion] </td>
                     <td> $row[datatime] </td>
                     <td><a href='actualizardineroegreso.php?id_egreso=".$row['id']."&id_dinero=".$row['ida']."'><span title='Editar' class='fa fa-pencil-square-o btn btn-primary btn-xs'></span></a></td>
                     <td><form method='POST' action='eliminardineroegresos.php'> \n
                         <input type='hidden' name='eliminar' value='$row[id]' />
                         <input type='hidden' name='eliminar2' value='$row2[id]' />
                         <button type='submit' class='fa fa-trash-o fa-lg btn btn-danger btn-xs' title='Eliminar' ></<button>
                    </form></td>
                    <td><a href='pdfdinero.php?id_ingreso=".$row['id_ingreso']."' target='_blank' ><span title='Imprimir' class='fa fa-print btn btn-primary btn-xs'></span></a>

                    </td>
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

</html>