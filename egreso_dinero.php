<?php
    session_start();
    require 'resources/config.php';

    if (isset($_SESSION['usuario'])) {
        echo "";
    
?>

<?php
    require "resources/config.php";

    $dinero = "SELECT id FROM egresos_dinero ORDER BY id DESC LIMIT 1";
        $resultado = mysql_query($dinero);
        $row2 = mysql_fetch_array($resultado);

    $sql = "SELECT * FROM egresos INNER JOIN egresos_dinero ON egreso_id = egresos.id WHERE egresos_dinero.id = '$row2[id]'";
    $result = mysql_query($sql, $conexion);
    $row = mysql_fetch_array($result);
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Control de Egresos</title>
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
            <h3>Registro de Egreso</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" action="sdinero.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Egreso:</label>
                        <input disabled type="text" class="form-control" value="<?= $row['titulo'] ?>" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Para:</label>
                        <input disabled type="text" class="form-control" value="<?= $row['nombre'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Cantidad de Dinero:</label>
                        <input disabled type="number" class="form-control" value="<?= $row['cantidad_dinero'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción:</label><br>
                        <textarea disabled class="span4 form-control" cols="48" rows="5"><?= $row['descripcion'] ?></textarea>
                    </div>
                    
                    <a href="edinero.php" class="btn btn-success pull-right"> <i class="fa fa-reply"></i> Volver</a>
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

<html>