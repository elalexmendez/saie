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
                <li><a href="iconsulta.php">Anterior</a></li>
            </ul>
        </div>

        <div class="row">
            <h2 class="col-sm-11">Consultas sobre Ingresos de Alimentos</h2>
            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/alimentos.jpg" alt="...">
                    <div class="caption">
                        <p>Consulta por Fecha</p>
                        <a class="btn btn-primary" href="fechaalimentos.php" role="button">ir</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/alimentos.jpg" alt="...">
                    <div class="caption">
                        <p>Consulta sobre total de Producto</p>
                       <a class="btn btn-primary" href="totalalimentos.php" role="button">ir</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/alimentos.jpg" alt="...">
                    <div class="caption">
                        <p>Consulta acerca de Historial de Ingresos</p>
                        <a class="btn btn-primary" href="histalimentos.php" role="button">ir</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

</body>