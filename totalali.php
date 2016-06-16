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


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="totalalimentos.php">Anterior</a></li>
            </ul>
        </div>

        <div class="col-md-20 text-center" >
            <h3>Resultado de la Consulta</h3>
        </div><br>

        <div class="row col-md-4 col-md-offset-4 custyle">

        	<?php
	$conexion = mysql_connect("localhost", "root");
	mysql_select_db("saie", $conexion);

	$sql = "SELECT SUM(Cantidad) as total_sum FROM alimentos WHERE Alimento = '{$_POST['producto']}'";
	$result = mysql_query($sql);

	if(mysql_num_rows($result));

            /* Desplegamos cada uno de los registros dentro de una tabla */
            echo "<table class='table table-striped custab text-center' border=1>";

            /*Priemro los encabezados*/
             echo "<tr>
                     <th class='text-center' colspan=2> Datos de Ingresos </th>

                   <tr>
                     <th class='text-center' > Producto </th>
                     <th class='text-center'> Cantidad Total </th>

                  </tr>";

            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result))
            {
             echo "<tr>
                     <td> {$_POST['producto']} </td>
                     <td> $row[total_sum] </td>
                  </tr>";
            }
            echo "</table>";
?>

        </div>

</div>

    </div>

    <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

</body>