<?php
    require "resources/config.php";

    if(isset($_POST['action'])){

        $sql = "INSERT INTO ingresos (donador_id, descripcion, type) VALUES (".$_POST['cedula'].", '".$_POST['descripcion']."', 'alimentos')";

        if (mysql_query($sql, $conexion)) {
            $ingreso_id = mysql_insert_id();

            foreach($_POST['alimento'] as $key => $alimento){
                $a = $_POST['alimento'][$key];
                $c = $_POST['cantidad'][$key];

                $sql_ingresos = "INSERT INTO ingresos_alimentos (ingreso_id, alimento_id, cantidad) VALUES (".$ingreso_id.", ".$a.", ".$c.")";
                if (mysql_query($sql_ingresos, $conexion)) {
                    $sql_alimentos = "UPDATE alimentos SET Cantidad = Cantidad + {$c} WHERE id = {$a}";
                    mysql_query($sql_alimentos, $conexion);
                }else{
                    echo "Error: " . $sql . "<br>" . mysql_error($conn);
                }
            }
        }else{
            echo "Error: " . $sql . "<br>" . mysql_error($conexion);
        }
        header("Location: ingreso.php?id=" . $ingreso_id);
        exit();
    }
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

    <script type="text/javascript">

        $(document).ready(function() {

    var MaxInputs       = 8; //Número Maximo de Campos
    var contenedor       = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos

    $(AddButton).click(function (e) {
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            //agregar campo
            $(contenedor).append('<div><input type="text" name="nombre[]" class="form-control" id="campo_'+ FieldCount +'" placeholder="Nombre '+ FieldCount +'"/><input type="text" name="cantidad[]" class="form-control" id="campo_'+ FieldCount +'" placeholder="Cantidad '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a></div>');
            x++; //text box increment

        }

        return false;
    });

    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
});

    </script>

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div class="col-md-20 text-center" >
            <h3>Control de Ingresos de Alimentos</h3>
        </div>

        <button class="btn btn-primary pull-right" id="button-add"> <i class="fa fa-plus"></i> Agregar Alimento </button>

        <div class="clearfix"></div>
        <br>
        <form action="?" method="POST" accept-charset="utf-8">
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="panel panel-primary panel-body">
                        <div class="form-group">
                            <label for="ci">Cédula del Contribuyente</label>
                            <input id="ci" type="text" name="cedula" class="form-control" placeholder="Cedula" required>
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
                                <td>Alimento</td>
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
    <script src="/assets/js/alimentos.js"></script>
<html>