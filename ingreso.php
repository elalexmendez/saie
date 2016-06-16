<?php
    require "resources/config.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $data = ['list' => []];

        $sql = "SELECT *, a.cantidad as cant, ali.cantidad as total FROM ingresos i JOIN ingresos_alimentos  a ON a.ingreso_id = i.id JOIN alimentos ali on ali.id = a.alimento_id WHERE i.id = " . $id;

        if ($result = mysql_query($sql, $conexion)) {
            while($r = mysql_fetch_assoc($result)){
                $data['donador'] = $r['donador_id'];
                $data['descripcion'] = $r['descripcion'];
                array_push($data['list'], ['alimento' => $r['Alimento'], 'cantidad' => $r['cantidad'], 'total' => $r['total']]);
            }

        }else{
            echo "Error: " . $sql . "<br>" . mysql_error($conexion);
        }

        //echo json_encode($data); exit();
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

        <div class="clearfix"></div>
        <br>
            <div class="row">
                <div class="col-sm-4 ">
                    <div class="panel panel-primary panel-body">
                        <div class="form-group">
                            <label for="ci">Cédula del Contribuyente</label>
                            <input disabled id="ci" type="text" name="cedula" class="form-control" placeholder="Cedula" required value="<?= $data['donador'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label><br>
                            <textarea disabled id="description" class="form-control" name="descripcion" rows="7" placeholder="Descripción de la Donación" ><?= $data['descripcion'] ?></textarea>
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
                                <td>Total</td>
                            </tr>
                            <tbody id="table-content">
                                <?php foreach($data['list'] as $key => $val){ ?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $val['alimento'] ?></td>
                                    <td><?= $val['cantidad'] ?></td>
                                    <td><?= $val['total'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <a href="alimentos.php" class="btn btn-success pull-right"> <i class="fa fa-back-o"></i> Volver</a>

    </div>

    <?php include "resources/views/footer.php"; ?>


</body>
    <script src="/assets/js/alimentos.js"></script>
<html>