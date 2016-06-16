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

        <div class="col-md-20 text-center">
            <h3>Control de Ingresos de Materiales</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" action="material.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contribuyente:</label>
                        <input type="text" name="cedula" class="form-control" placeholder="Cedula del Contribuyente" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Material</label>
                        <input type="text" name="material" class="form-control" placeholder="Nombre del Material" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad de Material" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label><br>
                        <textarea class="span4 form-control" name="mensaje" cols="48" rows="5"  placeholder="Descripción del Material" ></textarea>
                    </div>
                    <button type="submit" name="enviar" class="btn btn-default">Registrar</button>
                    <button type="reset" name="enviar" class="btn btn-default">Limpiar</button>
                </form>
            </div>
        </div>
    </div>

    <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

</body>

<html>