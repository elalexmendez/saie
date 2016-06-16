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

        <?php
        include 'ser.php';

        $id = $_GET['id'];

        $sql = "SELECT * FROM mteriales WHERE id = $id";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);

        echo "<div class='row'>
            <div class='col-md-offset-4'>
                <form method='POST' action='actmateriales.php' class='col-sm-6 panel panel-primary panel-body'>
                	<div class='form-group'>
                        <input type='hidden' name='id' value='$row[id]' class='form-control'  required autocomplete='off'>
                    </div>

                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Contribuyente:</label>
                        <input type='text' name='cedula' value='$row[id_donadores]' class='form-control'  required autocomplete='off'>
                    </div>
                    <div class='form-group'>
                        <label for='exampleInputPassword1'>Material</label>
                        <input type='text' name='material' value='$row[material]' class='form-control'  required autocomplete='off'>
                    </div>

                    <div class='form-group'>
                        <label for='exampleInputPassword1'>Cantidad</label>
                        <input type='number' name='cantidad' value='$row[cantidad]' class='form-control'  required autocomplete='off'>
                    </div>

                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Descripción</label><br>
                        <textarea class='span4 form-control' value='$row[descripcion]' name='mensaje' cols='48' rows='5' ></textarea>
                    </div>
                    <button type='submit' class='btn btn-default'>Actualizar</<button>
                </form>
            </div>
        </div>
        "?>
    </div>

    <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

</body>

<html>