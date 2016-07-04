<?php
    session_start();
    require 'resources/config.php';

    if (isset($_SESSION['usuario'])) {
        echo "";
    
?>

<?php
    require "resources/config.php";

    if(isset($_POST['action'])){

        foreach($_POST['material'] as $key => $material){
                $m = $_POST['material'][$key];
                $c = $_POST['cantidad'][$key];

        $sql1 = "SELECT cantidad as can FROM materiales WHERE id = '$m' ";
        $result1 = mysql_query($sql1);
        $row1 = mysql_fetch_array($result1);

            if ($row1['can'] < $c) {
                echo"<script type=\"text/javascript\">alert('Cantidad no disponible'); window.location='materiales_egresos.php';</script>";
            }else{


            $sql = "INSERT INTO egresos (titulo, nombre , descripcion, type) VALUES ('".$_POST['titulo']."' , '".$_POST['nombre']."' , '".$_POST['descripcion']."', 'materiales')";
            }
        }

        if (mysql_query($sql, $conexion)) {
            $ingreso_id = mysql_insert_id();

            foreach($_POST['material'] as $key => $material){
                $m = $_POST['material'][$key];
                $c = $_POST['cantidad'][$key];

                $sql_ingresos = "INSERT INTO egresos_materiales (egreso_id, material_id, cantidad) VALUES ('".$ingreso_id."', '".$m."', '".$c."')";
                if (mysql_query($sql_ingresos, $conexion)) {
                    $sql_alimentos = "UPDATE materiales SET cantidad = cantidad - {$c} WHERE id = {$m}";
                    mysql_query($sql_alimentos, $conexion);

                    header("Location: materiales_egresos.php");

                }else{
                    echo "Error: " . $sql . "<br>" . mysql_error($conn);
                }
            }
            
        }else{
            echo "Error: " . $sql . "<br>" . mysql_error($conexion);
        }
       // header("Location: ingreso_alimento.php?id=" . $ingreso_id);
       exit();
    }
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

    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>

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
            <h3>Control de Egresos de Materiales</h3>
        </div>

        <button class="btn btn-primary pull-right" id="button-add"> <i class="fa fa-plus"></i> Agregar Material </button>

        <div class="clearfix"></div>
        <br>
        <form action="?" method="POST" accept-charset="utf-8">
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="panel panel-primary panel-body">
                        <div class="form-group">
                            <label for="ci">Titulo de Egreso:</label>
                            <input id="ci" type="text" name="titulo" class="form-control" placeholder="Titulo" autocomplete="OFF" required>
                        </div>

                        <div class="form-group">
                            <label for="ci">Responsable:</label>
                            <input id="ci" type="text" name="nombre" class="form-control" placeholder="Nombre y Apellido" autocomplete="OFF" required>
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

        <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-save"></i> Guardar</button>
        <input type="hidden" name="action" value="add">
        </form>

    </div>

    <?php include "resources/views/footer.php"; ?>


</body>
    <script src="assets/js/materiales.js"></script>

<?php
    }else{
        echo '<script> window.location="login.php"; </script>';
    }
?>
    
<html>