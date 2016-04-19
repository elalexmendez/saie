<?php
    session_start();
    include 'ser.php';

    if (isset($_SESSION['usuario'])) {
        echo "";
    
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema Administrativo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="/assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
                        <img src="/assets/images/logo.png" class="image-responsive" style="max-width: 70px" alt="">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="index.php"> <i class="fa fa-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="ingresos.php"> <i class="fa fa-sign-in"></i> Ingresos</a>
                        </li>
                        <li>
                            <a href="egresos.php"> <i class="fa fa-sign-out"></i> Egresos</a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-list-alt"></i> Inventario</a>
                        </li>
                        <li>
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

        <!-- Main component for a primary marketing message or call to action -->
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for Slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('/assets/images/img1.jpg');"></div>

                </div>
                <div class="item">
                    <!-- Set the second background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('/assets/images/img2.jpg');"></div>

                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('/assets/images/img3.jpg');"></div>
                </div>
                <div class="item">
                    <!-- Set the third background image using inline CSS below. -->
                    <div class="fill" style="background-image:url('/assets/images/img4.jpg');"></div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>

        </div>

        <br>
        <br>
        <br>
        <br>

        <div class="row">
            <h2 class="col-sm-11">Sistema Administrativo para el Control de Ingresos y Egresos Aranzazu</h2>
            <div class="col-sm-3 ">
                <div class="thumbnail">
                    <img src="assets/images/img1.jpg" alt="...">
                    <div class="caption">
                        <h3>Ingresos</h3>
                        <p>Control de Ingresos de los Recursos y Bienes de la Iglesia Nuestra Señora del Rosario de Aranzazu</p>
                        <p><a href="ingresos.html" class="btn btn-primary" role="button">Ir</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-3 ">
                <div class="thumbnail">
                    <img src="assets/images/img2.jpg" alt="...">
                    <div class="caption">
                        <h3>Egresos</h3>
                        <p>Control de Egreros de la Iglesia Nuestra Señora del Rosario de Aranzazu</p>
                        <p><a href="egresos.html" class="btn btn-primary" role="button">Ir</a> 
                    </div>
                </div>
            </div>

            <div class="col-sm-3 ">
                <div class="thumbnail">
                    <img src="assets/images/img3.jpg" alt="...">
                    <div class="caption">
                        <h3>Inventario</h3>
                        <p>Descripción y Verificación de todos los Bienes de la Iglesia Nuestra Señora del Rosario de Aranzazu</p>
                        <p><a href="#" class="btn btn-primary" role="button">Ir</a> 
                    </div>
                </div>
            </div>

            <div class="col-sm-3 ">
                <div class="thumbnail">
                    <img src="assets/images/img4.jpg" alt="...">
                    <div class="caption">
                        <h3>Consulta</h3>
                        <p>Busqueda de lo almacenado en el Sistema de la Iglesia Nuestra Señora del Rosario de Aranzazu</p>
                        <p><a href="#" class="btn btn-primary" role="button">Ir</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->

    <footer class="footer">
        <div class="container">
            &copy; Iglesia Nuestra Señora del Rosario de Aranzazu
        </div>
    </footer>

    <script src="/assets/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/vendor/bootstrap.min.js"></script>

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