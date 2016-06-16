<?php
    require "resources/config.php";
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modificar Materiales</title>
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
                <li><a href="modi.php">Anterior</a></li>
            </ul>
        </div>

        <h2 class="col-sm-11">Modificar o Eliminar Ingresos de Materiales</h2>

        <div class="row col-md-10 col-md-offset-1 custyle">

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
             <tr>
               <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Clasificacion </th>
                <th class='text-center'> Material </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha de I </th>
                <th class='text-center'> Editar </th>
                <th class='text-center'> Eliminar </th>
            </tr>>
        </thead>
        <tfoot>
            <tr>
               <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Clasificacion </th>
                <th class='text-center'> Material </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha de I </th>
                <th class='text-center'> Editar </th>
                <th class='text-center'> Eliminar </th>
            </tr>
        </tfoot>


        <?php

            /* Abrimos la base de datos */
              include 'ser.php';

            /* Realizamos la consulta SQL */
            $sql = "SELECT * FROM ingrersos";
            $result = mysql_query($sql);

            $sql = "SELECT * FROM mteriales";
            $result = mysql_query($sql);
            $row2 = mysql_fetch_array($result);

            $sql="SELECT ingrersos.id , donadores.Nombre , donadores.Apellido , categorias.clasificacion , mteriales.material ,
            ingrersos.descripcion , ingrersos.Fecha
            FROM donadores INNER JOIN ingrersos ON ingrersos.id_donadores = donadores.id
            INNER JOIN mteriales ON mteriales.material = ingrersos.id_material
            INNER JOIN categorias ON categorias.id = ingrersos.id_categoria";
            $result= mysql_query($sql) or die(mysql_error());
            if(mysql_num_rows($result)==0);




            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result))
            {
             echo "<tr>
                     <td> $row[Nombre] </td>
                     <td> $row[Apellido] </td>
                     <td> $row[clasificacion] </td>
                     <td> $row[material] </td>
                     <td width='400'> $row[descripcion] </td>
                     <td> $row[Fecha] </td>
                     <td><a href='actualizarmateriales.php?id=".$row['id']."'><span title='Editar' class='fa fa-pencil-square-o btn btn-primary btn-xs'></span></a></td>
                     <td><form method='POST' action='eliminarmaterial.php'> \n
                         <input type='hidden' name='eliminar' value='$row[id]' />
                         <input type='hidden' name='eliminar2' value='$row2[id]' />
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
