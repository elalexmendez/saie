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
            <h3>Actualizar Ingreso de Dinero</h3>
        </div><br>

        <?php
        include 'ser.php';

        $id = $_GET['id'];

        $sql = "SELECT * FROM donadores WHERE id = '$id' ";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);

        echo "<div class='row'>
            <div class='col-md-offset-4'>
                <form method='POST' action='actcontribuyente.php' class='col-sm-6 panel panel-primary panel-body'>

                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Cedula:</label>
                        <input type='text' name='cedula' value='$row[id]' class='form-control'  required autocomplete='off'>
                    </div>

                    <div class='form-group'>
                        <label for='exampleInputPassword1'>Nombre:</label>
                        <input type='text' name='nombre' value='$row[Nombre]' class='form-control'  required autocomplete='off'>
                    </div>

                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Apellido:</label><br>
                        <input type='text' name='apellido' value='$row[Apellido]' class='form-control'  required autocomplete='off'>
                    </div>
                    <button type='submit' class='btn btn-default'>Actualizar</<button>
                </form>
            </div>
        </div>

        "  ?>
    </div>

    <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

</body>

<html>