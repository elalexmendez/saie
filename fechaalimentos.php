<?php
    session_start();
    include 'ser.php';

    if (isset($_SESSION['usuario'])) {
        echo "";

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

        <link href="assets/css/jquery-ui.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- Nuestras etiquetas meta o archivos css -->

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">       

        <!-- Selector de Fechas -->
        <script src='scripts/modernizr.js'></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
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
            <!-- Static navbar -->

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/images/logo.png" class="image-responsive" style="max-width: 70px" alt="">
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="index.php"> <i class="fa fa-home"></i> Inicio</a>
                            </li>
                            <li>
                                <a href="ingresos.php"> <i class="fa fa-sign-in"></i> Ingresos</a>
                            </li>
                            <li>
                                <a href="egresos.php"> <i class="fa fa-sign-out"></i> Egresos</a>
                            </li>
                            <li>
                                <a href="inventario.php"> <i class="fa fa-list-alt"></i> Inventario</a>
                            </li>
                            <li class="active">
                                <a href="consultas.php"> <i class="fa fa-search"></i> Consultas</a>
                            </li>

                        </ul>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Buscar ">
                            </div>
                            <button type="submit" class="btn btn-default">Enviar</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#"> <i class="fa fa-wrench"></i> Configuración</a>
                            </li>
                            <li>
                                <a href="logout.php"> <i class="fa fa-external-link"></i> Salir</a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!--/.container-fluid -->
            </nav>

            <br>
            <br>

            <div>
                <ul class="pager">
                    <li><a href="aliconsulta.php">Anterior</a></li>
                </ul>
            </div>

            <div class="col-md-20 text-center">
                <h3>Consultas por Fecha de Ingresos de Alimentos</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-md-offset-4">
                    <form method="post" class="col-sm-6 panel panel-primary panel-body" action="resultadoalimentos.php">

                        <div class="form-horizontal">

                            <div class="control-group">
                                <label for="date-picker-2" class="control-label">Fecha Inicial</label>
                                <div class="controls">
                                    <div class="input-group">
                                        <input id="date-picker-2" name="desde" type="text" class="date-picker form-control" placeholder="aaaa-mm-dd" />
                                        <label for="date-picker-2" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

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
                                        <input id="date-picker-1" name="hasta" type="text" class="date-picker form-control" placeholder="aaaa-mm-dd" />
                                        <label for="date-picker-1" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <button type="submit" name="enviar" class="btn btn-default">Consultar</button>
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

        </div>

        <footer class="footer">
            <div class="container">
                &copy; Iglesia Nuestra Señora del Rosario de Aranzazu
            </div>
        </footer>

        <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <!-- Script to Activate the Carousel -->
        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
    </body>

    <?php
    }else{
        echo '<script> window.location="login.php"; </script>';
    }
?>