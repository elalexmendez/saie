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
    <title>Consultas</title>
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

        <br><br>

        <h2 class="col-sm-11">Seleccionar </h2>
        <div class="row">

            <a href="iconsulta.php" role="button">
                <div class="col-sm-6 ">
                <div class="thumbnail panel-primary">
                    <div class="caption">
                        <h1>Ingresos</h1>
                    </div>
                </div></a>

            </div>

            <a href="econsulta.php" role="button">
                <div class="col-sm-6 ">
                <div class="thumbnail panel-primary">
                    <div class="caption">
                        <h1>Egresos</h1>

                    </div>
                </div></a>
            </div>

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