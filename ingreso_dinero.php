<?php
    session_start();
    require 'resources/config.php';

    if (isset($_SESSION['usuario'])) {
        echo "";
    
?>

<?php
    require "resources/config.php";

        $dinero = "SELECT id FROM ingresos_dinero ORDER BY id DESC LIMIT 1";
        $resultado = mysql_query($dinero);
        $row2 = mysql_fetch_array($resultado);

        $sql = "SELECT *, ingresos.id as id_ingreso, ingresos_dinero.id as id_dinero, 
            donadores.Nombre , donadores.Apellido , ingresos_dinero.cantidad , 
            ingresos.descripcion , ingresos.datetime , estipendio.Tipo 
            FROM donadores INNER JOIN ingresos ON donador_id = donadores.id 
            INNER JOIN ingresos_dinero ON ingreso_id = ingresos.id 
            INNER JOIN estipendio ON estipendio.id = ingresos_dinero.estipendio_id WHERE ingresos_dinero.id = '$row2[id]'";
        $result = mysql_query($sql, $conexion);
        $row = mysql_fetch_array($result);
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

        <div class="col-md-20 text-center" >
            <h3>Registro de Ingresos de Dinero</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="POST" class="col-sm-6 panel panel-primary panel-body" action="?" accept-charset="utf-8">
                    <div class="form-group">
                        <label for="ci">Contribuyente:</label>
                        <input disabled id="ci" type="text" value="<?= $row['donador_id'] ?>" class="form-control"  required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="ci">Nombre:</label>
                        <input disabled id="ci" type="text" value="<?= $row['Nombre'] ?>" class="form-control"  required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="ci">Apellido:</label>
                        <input disabled id="ci" type="text" value="<?= $row['Apellido'] ?>" class="form-control"  required autocomplete="off">
                    </div>

                    <label for="exampleInputEmail1">Tipo de Arancel</label>

                    <select disabled class="form-control" >
                        <option value="<?= $row['Tipo'] ?>"><?= $row['Tipo'] ?></option>
                    </select><br>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Cantidad</label>
                        <input disabled type="number" class="form-control" value="<?= $row['cantidad'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label><br>
                        <textarea disabled class="span4 form-control" cols="48" rows="5"><?= $row['descripcion'] ?></textarea>
                    </div>

                    <a href="dinero.php" class="btn btn-success pull-right"> <i class="fa fa-reply"></i> Volver</a>
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