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
    <title>Inventario Materiales</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <br><br><br>

        <div class="row col-md-6 col-md-offset-3 custyle">

          <h2 class='col-sm-11'>Inventario de Materiales</h2>

        <?php
            /* Abrimos la base de datos */
            require "resources/config.php";  

            /* Realizamos la consulta SQL */
            $sql="select * from materiales";
            $result= mysql_query($sql) or die(mysql_error());
            if(mysql_num_rows($result)==0);

            /* Desplegamos cada uno de los registros dentro de una tabla */
            echo "<table class='table text-center table-bordered' cellpadding=4 cellspacing=0>";

            /*Priemro los encabezados*/
             echo "<thead>
                     <th class='text-center'> Codigo </th>
                     <th class='text-center'> Material </th>
                     <th class='text-center'> Cantidad </th>
                  </tr>
                  </thead>";

            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result))
            {
             echo "<tr>
                     <td class='text-center'> $row[id] </td>
                     <td class='text-center'> $row[material] </td>
                     <td class='text-center'> $row[cantidad] </td>
                  </tr>";
            }
            echo "</table>";


        ?>
        </div>

    </div>

    <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>


</body>

<?php
    }else{
        echo '<script> window.location="login.php"; </script>';
    }
?>
