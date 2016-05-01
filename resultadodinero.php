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

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
        <br>
        <br>

        <div>
            <ul class="pager">
                <li><a href="fechadinero.php">Anterior</a></li>
            </ul>
        </div>

        <div class="row col-md-8 col-md-offset-2 custyle">
            <?php

                include 'ser.php';
                if (isset($_POST['enviar'])) {
                    
                    $fecha = $_POST['desde'];
                    $fecha = $_POST['hasta'];
                    /* Realizamos la consulta SQL */
                    $sql = "SELECT * FROM dinero WHERE fecha BETWEEN  '".$_POST['desde']."' AND '".$_POST['hasta']."'";
                    $result = mysql_query($sql) or die("Error");
             
                        if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

                             /* Desplegamos cada uno de los registros dentro de una tabla */  
                            echo "<table class='table table-striped custab text-center' border=1 cellpadding=4 cellspacing=0>";

                            /*Priemro los encabezados*/
                             echo "<tr>
                                    <th class='text-center' colspan=5> Resultado de Consulta por Fecha </th>
                                   <tr>
                                     <th class='text-center'> ID </th>
                                     <th class='text-center'> Nombre </th>
                                     <th class='text-center'> Cantidad </th>
                                     <th class='text-center'> Descripcion </th>
                                     <th class='text-center'> Fecha de Ingreso </th>
                                  </tr>";

                             /*Y ahora todos los registros */
                             while($row=mysql_fetch_array($result))
                                {
                             echo "<tr>
                                 <td class='text-center' align='right'> $row[id] </td>
                                 <td class='text-center'> $row[nombre] </td>
                                 <td class='text-center'> $row[cantidad] Bs. </td>
                                 <td class='text-center'> $row[mensaje] </td>
                                 <td class='text-center'> $row[fecha] </td>
                                 </tr>";
                             }
                            echo "</table>";

                 }
            ?>
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
