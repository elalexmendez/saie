<?php
    session_start();
    require 'resources/config.php';

    if (isset($_SESSION['usuario'])) {
        echo "";
    
?>

<?php
    require "resources/config.php";

    if(isset($_POST['action'])){

        if (isset($_POST['cedula'])) {
    $Cedula = $_POST['cedula'];
    $sql = mysql_query("SELECT * FROM donadores WHERE id='".$_POST['cedula']."'");
    if (mysql_num_rows($sql)>0) {
        $row = mysql_fetch_array($sql);
        $_POST["cedula"] == $row['id'];

        $sql = "INSERT INTO ingresos (donador_id, descripcion, type) VALUES (".$_POST['cedula'].", '".$_POST['descripcion']."', 'materiales')";

         }
    else{
        echo '<script> alert("El Contribuyente no esta Registrado."); </script>';
        echo '<script> window.location="contribuyente.php"; </script>';
    }

        if (mysql_query($sql, $conexion)) {
            $ingreso_id = mysql_insert_id();

            foreach($_POST['material'] as $key => $material){
                $m = $_POST['material'][$key];
                $c = $_POST['cantidad'][$key];

                $sql_ingresos = "INSERT INTO ingresos_materiales (ingreso_id, material_id, cantidad) VALUES (".$ingreso_id.", ".$m.", ".$c.")";
                if (mysql_query($sql_ingresos, $conexion)) {
                    $sql_alimentos = "UPDATE materiales SET cantidad = Cantidad + {$c} WHERE id = {$m}";
                    mysql_query($sql_alimentos, $conexion);

                    header("Location: ingreso_materiales.php?id=" . $ingreso_id);

                }else{
                    echo "Error: " . $sql . "<br>" . mysql_error($conn);
                }
            }
            
        }else{
            echo "Error: " . $sql . "<br>" . mysql_error($conexion);
        }
       // header("Location: ingreso_alimento.php?id=" . $ingreso_id);
       exit();
    }}
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

        <div>
            <ul class="pager">
                <li><a href="ingresos.php">Anterior</a></li>
            </ul>
        </div>

        <div class="col-md-20 text-center" >
            <h3>Control de Ingresos de Materiales</h3>
        </div>

        <button class="btn btn-primary pull-right" id="button-add"> <i class="fa fa-plus"></i> Agregar Material </button>

        <div class="clearfix"></div>
        <br>
        <form action="?" method="POST" accept-charset="utf-8">
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="panel panel-primary panel-body">
                        <div class="form-group">
                            <label for="ci">Contribuyente:</label>
                            <input id="ci" type="number" name="cedula" class="form-control" placeholder="Numero de Identificacion" required autocomplete="off">
                        </div>

                        <button type="button" id="btn-confirmar" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-check" aria-hidden="true"></i> Confirmar</button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Contribuyente:</h4>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div id="mensaje"></div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>      
                        </div><br><br>

                    
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

    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>


    <script>

           $(document).ready(function(){


               $('#btn-confirmar').click(function(){
                var cedula = $('#ci').val();
                   $.ajax({
                       type: 'POST',
                       url: 'confirmarcedula.php',
                       data: {cedula},
                       success: function(mensaje){
                           $('#mensaje').html(mensaje);
                       }
                   })
               })
           })

       </script>

<?php
    }else{
        echo '<script> window.location="login.php"; </script>';
    }
?>

<html>