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
    <title>Nuevo Contribuyente</title>
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

        <div class="col-md-20 text-center" >
            <h3>Registro de Contribuyente</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" action="contribuyenteregistro.php">
                    <div class="funkyradio">
                        <label for="exampleInputEmail1">Tipo de Identificación:</label>
                        <div class="funkyradio-default">
                            <input type="radio" name="radio" value="V" />
                            <label for="radio1">V</label>
                            <input type="radio" name="radio" value="E" />
                            <label for="radio1">E</label>
                            <input type="radio" name="radio" value="J" />
                            <label for="radio1">J</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Numero de Identificación:</label>
                        <input type="number" name="cedula" class="form-control" placeholder="Cedula del Contribuyente" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del Contribuyente" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Apellido:</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido del Contribuyente" required autocomplete="off">
                    </div>

                    <button type="submit" name="enviar" class="btn btn-success pull-right"><i class="fa fa-save"></i> Registrar</button>
                </form>
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

</html>