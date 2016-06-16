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

     <!-- DataTable -->
    <link rel="stylesheet" href="assets/css/dataTable.css"/>
    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script>

$(document).ready(function() {
    oTable = $('#example').dataTable({

    });

} );

</script>

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

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
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="configuracion.php"> <i class="fa fa-wrench"></i> Configuración</a>
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
                <li><a href="fechaalimentos.php">Anterior</a></li>
            </ul>
        </div>

        <h2 class="col-sm-11">Reusultado</h2>

        <div class="row col-md-10 col-md-offset-1 custyle">

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
             <tr>
                <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Clasificacion </th>
                <th class='text-center'> Alimento </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha de I </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class='text-center'> Nombre </th>
                <th class='text-center'> Apellido </th>
                <th class='text-center'> Clasificacion </th>
                <th class='text-center'> Alimento </th>
                <th class='text-center'> Cantidad </th>
                <th class='text-center'> Descripcion </th>
                <th width='100' class='text-center'> Fecha de I </th>
            </tr>
        </tfoot>

            <?php

                include 'ser.php';
                if (isset($_POST['enviar'])) {
                    
                    $fecha = $_POST['desde'];
                    $fecha = $_POST['hasta'];
                    /* Realizamos la consulta SQL */
                    $sql = "SELECT donadores.Nombre , donadores.Apellido , categorias.clasificacion , 
                    alimentos.Alimento , ingrersos.cantidad_alimento , ingrersos.descripcion , ingrersos.Fecha 
                    FROM donadores INNER JOIN ingrersos ON ingrersos.id_donadores = donadores.id 
                    INNER JOIN categorias ON categorias.id = ingrersos.id_categoria 
                    INNER JOIN alimentos ON alimentos.Alimento = ingrersos.id_alimento
                    WHERE ingrersos.fecha BETWEEN '".$_POST['desde']."' AND '".$_POST['hasta']."'";
                    $result = mysql_query($sql);
             
                        if(mysql_num_rows($result)==0) ;

                             /*Y ahora todos los registros */
                             while($row=mysql_fetch_array($result))
                                {
                             echo "<tr>
                                 <td> $row[Nombre] </td>
                                 <td> $row[Apellido] </td>
                                 <td> $row[clasificacion] </td>
                                 <td> $row[Alimento] </td>
                                 <td> $row[cantidad_alimento] </td>
                                 <td> $row[descripcion] </td>
                                 <td> $row[Fecha] </td>
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
</body>

<?php
    }else{
        echo '<script> window.location="login.php"; </script>';
    }
?>
