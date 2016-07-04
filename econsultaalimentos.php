<?php
    session_start();
    require 'resources/config.php';

    if (isset($_SESSION['usuario'])) {
        echo "";
    
?>

<!doctype html>
<html lang="es">

<head>
        <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Consultas de Egresos Alimentos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <script src='scripts/modernizr.js'></script>
    <link rel="stylesheet" href="assets/css/jquery-ui.css" />
    <script src="assets/js/vendor/jquery-1.9.1.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script>
            $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'yy/mm/dd',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            };
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $(function() {
                $("#fecha").datepicker();
            });
    </script>

</head>

<body>
    <div class="container">
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="econsulta.php">Anterior</a></li>
            </ul>
        </div>

        <div class="col-md-20 text-center">
                <h3>Consultas por Fecha de Egresos de Alimentos</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-md-offset-4">
                    <form method="post" class="col-sm-6 panel panel-primary panel-body" action="eresultadoalimentos.php">

                        <div class="form-horizontal">

                            <div class="control-group">
                                <label for="date-picker-2" class="control-label">Fecha Inicial</label>
                                <div class="controls">
                                    <div class="input-group">
                                        <input id="date-picker-2" name="desde" type="text" class="date-picker form-control" placeholder="aaaa-mm-dd" required />
                                        <label for="date-picker-2" class="input-group-addon btn"><span class="fa fa-calendar"></span>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-horizontal">

                            <div class="control-group">
                                <label for="date-picker-1" class="control-label">Fecha Final</label>
                                <div class="controls">
                                    <div class="input-group">
                                        <input id="date-picker-1" name="hasta" type="text" class="date-picker form-control" placeholder="aaaa-mm-dd" required />
                                        <label for="date-picker-1" class="input-group-addon btn"><span class="fa fa-calendar"></span>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <button type="submit" name="enviar" class="btn btn-primary pull-right"><i class="fa fa-search"></i> Consultar</button>
                    </form>
                </div>

                <script type="text/javascript">
                    $(".date-picker").datepicker();
                    $(".date-picker").on("change", function() {
                        var id = $(this).attr("id");
                        var val = $("label[for='" + id + "']").text();
                        $("#msg").text(val + " changed");

                    });
                </script>
            </div>
        </div>

        <br><br><br>

        <div class="col-md-20 text-center">
            <div class="row">
                <div class="row col-md-4 col-md-offset-4 custyle">
                    <a href="ehistalimentos.php" role="button">
                            <div class="thumbnail panel-primary">
                                <div class="caption">
                                    <h3>Historial de Egresos de Alimentos</h3>
                        </div></a>
                </div>
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