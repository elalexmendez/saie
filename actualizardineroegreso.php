<?php
    session_start();
    require 'resources/config.php';

    $sql = "SELECT * FROM usuarios WHERE cargo = 'administrador' AND usuario = '$_SESSION[usuario]' ";
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
        echo "";
    
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

        <div>
            <ul class="pager">
                <li><a href="modidineroegreso.php">Anterior</a></li>
            </ul>
        </div>


        <?php

            $egreso_id = $_GET['id_egreso'];
            $dinero_id = $_GET['id_dinero'];

            $sql1 = "SELECT * FROM egresos WHERE id = '$egreso_id' ";
            $result1 = mysql_query($sql1);
            $row1 = mysql_fetch_array($result1);

            $sql2 = "SELECT * FROM egresos_dinero WHERE id = '$egreso_id' ";
            $result2 = mysql_query($sql2);
            $row2 = mysql_fetch_array($result2);

        ?>

        <div class="col-md-20 text-center" >
            <h3>Control de Egresos de Dinero</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" action="actdineroegreso.php">

                    <input type="hidden" name="egreso_id" value="<?= $row1['id'] ?>">
                    <input type="hidden" name="dinero_id" value="<?= $row2['id'] ?>">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Titulo de Egreso:</label>
                        <input type="text" name="titulo" class="form-control" value="<?= $row1['titulo'] ?>" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Responsable:</label>
                        <input type="text" name="nombre" class="form-control" value="<?= $row1['nombre'] ?>" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Cantidad:</label>
                        <input type="number" name="cantidad" class="form-control" value="<?= $row2['cantidad_dinero'] ?>" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label><br>
                        <textarea class="span4 form-control" name="descripcion" cols="48" rows="5"  ><?= $row1['descripcion'] ?></textarea>
                    </div>
                    <button type="submit" name="enviar" class="btn btn-success pull-right"><i class="fa fa-check" ></i> Actualizar</button>
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
         echo "<script> alert('Tu usuario no tiene permiso para acceder a esta pagina'); </script>";
        echo '<script> window.location="index.php"; </script>';
    }
?>

<html>