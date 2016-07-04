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
    <title>Consultas de Egresos</title>
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

        <h2 class="col-sm-11">Modulo a Consultar </h2>
        <div class="row">

            <a href="edinconsulta.php" role="button">
                <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <div class="caption">
                        <h1>Dinero</h1>
                    </div>
                </div></a>

            </div>

            <a href="econsultamateriales.php" role="button">
                <div class="col-sm-4 ">
                    <div class="thumbnail panel-primary">
                    <div class="caption">
                        <h1>Materiales</h1>
                    </div>
                </div></a>
            </div>

            <a href="econsultaalimentos.php" role="button">
                <div class="col-sm-4 ">
                <div class="thumbnail panel-primary">
                    <div class="caption">
                        <h1>Alimentos</h1>

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

