<?php
    session_start();
    require 'resources/config.php';

    $sql = "SELECT * FROM usuarios WHERE cargo = 'administrador' AND usuario = '$_SESSION[usuario]' ";
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
        echo "";
    
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gestion de Alimentos</title>
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
                <li><a href="gestionproductos.php">Anterior</a></li>
            </ul>
        </div>

        <div class="row col-md-10 col-md-offset-1 custyle">

            <h2 class="col-sm-11">Gestión de Alimentos </h2>
        
        <a href="nuevoalimento.php" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i> Agregar Alimento </a><br><br><br><br><br><br>

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Codigo</th>
                <th class="text-center">Material</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="text-center">Codigo</th>
                <th class="text-center">Material</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
            </tr>
        </tfoot>

        <?php

            /* Abrimos la base de datos */
            require "resources/config.php";

            /* Realizamos la consulta SQL */
            $sql = "SELECT * FROM alimentos";
            $result1 = mysql_query($sql);
            $row = mysql_num_rows($result1);

            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result1))
            {
             echo "<tr>
                     <td> $row[id] </td>
                     <td> $row[Alimento] </td>
                     <td> $row[Cantidad] </td>
                     <td><a href='actualizaralimento.php?id=".$row['id']."'><span title='Editar' class='fa fa-pencil-square-o btn btn-primary btn-xs'></span></a></td>
                     <td><form method='POST' action='eliminaralimento.php'> \n
                         <input type='hidden' name='eliminar' value='$row[id]' />
                         <button type='submit' class='fa fa-trash-o fa-lg btn btn-danger btn-xs' title='Eliminar' ></<button>
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

</html>