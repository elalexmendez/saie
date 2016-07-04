<?php
    session_start();
    require 'resources/config.php';

    $sql = "SELECT * FROM usuarios WHERE cargo = 'administrador' AND usuario = '$_SESSION[usuario]' ";
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
        echo "";
    
?>

<?php
    require "resources/config.php";

        $id_material = $_GET['id_material'];
        $id_ingreso = $_GET['id_ingreso'];

        $sql = "SELECT *, m.id as ida, m.cantidad as can  FROM ingresos i JOIN ingresos_materiales m ON m.ingreso_id = i.id 
            JOIN materiales mate on mate.id = m.material_id 
            JOIN donadores ON donadores.id = donador_id WHERE i.id = '$id_ingreso' ";
        $result = mysql_query($sql);
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

    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div class="col-md-20 text-center" >
            <h3>Registro de Ingresos de Alimentos</h3>
        </div>

        <div class="clearfix"></div>
        <br>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="panel panel-primary panel-body">
                        <div class="form-group">
                            <label for="ci">Cédula del Contribuyente:</label>
                            <input id="ci" type="text" name="cedula" class="form-control"  required value="<?= $row['donador_id'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Descripción:</label><br>
                            <textarea  id="description" class="form-control" name="descripcion" rows="7" placeholder="Descripción de la Donación" ><?= $row['descripcion'] ?></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-sm-8 ">
                    <div class="panel panel-primary panel-body">
                        <table class="table table-hover">
                            <tr>
                                <td> # </td>
                                <td>Material</td>
                                <td>Cantidad</td>
                            </tr>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><?= $row['material'] ?></td>
                                    <td><?= $row['can'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="col-md-20 text-center" >
            <h3>Ingresar Datos para Actualizar</h3>
        </div>

            
            <button class="btn btn-primary pull-right" id="button-add"> <i class="fa fa-plus"></i> Agregar Material </button>

        <div class="clearfix"></div>
        <br>
        <form action="?" method="POST" accept-charset="utf-8">
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="panel panel-primary panel-body">
                        <div class="form-group">
                            <label for="ci">Cédula del Contribuyente</label>
                            <input id="ci" type="text" name="cedula" class="form-control" placeholder="Cedula" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label><br>
                            <textarea id="description" class="form-control" name="descripcion" rows="7" placeholder="Descripción de la Donación" ></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-sm-8 ">
                    <div class="panel panel-primary panel-body">
                        <table class="table table-hover">
                            <tr>
                                <td> # </td>
                                <td>Material</td>
                                <td>Cantidad</td>
                                <td>Acciones</td>
                            </tr>
                            <tbody id="table-content">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            </div>

        <a href="modimateriales.php" class="btn btn-success pull-right"> <i class="fa fa-reply"></i> Volver</a>
        <br><br><br>
    </div>

    <?php include "resources/views/footer.php"; ?>


</body>

<?php
    }else{
         echo "<script> alert('Tu usuario no tiene permiso para acceder a esta pagina'); </script>";
        echo '<script> window.location="index.php"; </script>';
    }
?>
    <script src="assets/js/materiales.js"></script>
<html>