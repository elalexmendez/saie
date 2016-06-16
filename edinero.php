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
                <li><a href="egresos.php">Anterior</a></li>
            </ul>
        </div>

        <div class="col-md-20 text-center" >
            <h3>Control de Egresos de Dinero</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" action="sdinero.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Egreso:</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del Egreso" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <?php
                            include 'ser.php';
                            $sql = "SELECT SUM(cantidad) as total_suma FROM dinero";
                            $result = mysql_query($sql) or die(mysql_error());
                            $row = mysql_fetch_array($result);

                            $sql = "SELECT SUM(cantidad_dinero) as total_suma2 FROM egresos";
                            $result = mysql_query($sql) or die(mysql_error());
                            $row2 = mysql_fetch_array($result);

                            $disponible = $row['total_suma'] - $row2['total_suma2'];
                            {
                            echo "<label for='exampleInputPassword1'>Cantidad disponible: $disponible bs.</label>";
                        };
                        ?>
                        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad a Egresar" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label><br>
                        <textarea class="span4 form-control" name="mensaje" cols="48" rows="5"  placeholder="Descripción del Egreso" ></textarea>
                    </div>
                    <button type="submit" name="enviar" class="btn btn-default">Aceptar</button>
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