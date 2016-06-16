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
                <li><a href="consultas.php">Anterior</a></li>
            </ul>
        </div>

        <div class="row">
            <h2 class="col-sm-11">Consulta sobre Ingresos</h2>
            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/dinero.jpg" alt="...">
                    <div class="caption">
                        <h3>Dinero</h3>
                        <p><a href="dinconsulta.php" class="btn btn-primary" role="button">Ir</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/materiales.jpg" alt="...">
                    <div class="caption">
                        <h3>Materiales</h3>
                        <p><a href="consultamateriales.php" class="btn btn-primary" role="button">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/alimentos.jpg" alt="...">
                    <div class="caption">
                        <h3>Alimentos</h3>
                        <p><a href="aliconsulta.php" class="btn btn-primary" role="button">Ir</a>
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

