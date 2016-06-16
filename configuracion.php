<?php
    require "resources/config.php";
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Configuración</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- Alertas de Alertify-->
    <link rel="stylesheet" type="text/css" href="assets/alertify/themes/alertify.core.css">
    <link rel="stylesheet" type="text/css" href="assets/alertify/themes/alertify.default.css">
    <script src="assets/alertify/lib/alertify.js"></script>

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

          <div class="row">
            <h2 class="col-sm-11">Configuración SAIE</h2>
            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/admin.png" alt="...">
                    <div class="caption">
                        <h3>Administracion</h3>
                        <p>Administracion SAIE</p>
                        <p><a href="administracion.php" class="btn btn-primary" role="button">Ir</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/modificar.png" alt="...">
                    <div class="caption">
                        <h3>Modificación - Eliminar</h3>
                        <p>Modificar o Eliminar los Registros SAIE</p>
                        <p><a href="moditipo.php" class="btn btn-primary" role="button">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <img src="assets/images/manual.png" alt="...">
                    <div class="caption">
                        <h3>Manual de Usuario</h3>
                        <p>Ayuda de uso SAIE</p>
                        <p><a href="#" class="btn btn-primary" role="button">Ir</a>
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

</html>