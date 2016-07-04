<?php
    session_start();
    require 'resources/config.php';

    $sql = "SELECT * FROM usuarios WHERE cargo = 'administrador' AND usuario = '$_SESSION[usuario]' ";
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
        echo "";
    
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gestion de Productos</title>
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
                <li><a href="administracion.php">Anterior</a></li>
            </ul>
        </div>

        <h2 class="col-sm-11">Gestión de Productos </h2>

        <div class="row">

            <a href="gestionmateriales.php" role="button">
                <div class="col-sm-6 ">
                <div class="thumbnail panel-primary">
                    <div class="caption">
                        <h1>Materiales</h1>
                    </div>
                </div></a>

            </div>

            <a href="gestionalimentos.php" role="button">
                <div class="col-sm-6 ">
                <div class="thumbnail panel-primary">
                    <div class="caption">
                        <h1>Alimentos</h1>

                    </div>
                </div></a>
            </div>

        </div>

    </div>

    <?php include "resources/views/footer.php"; ?>

</body>

<?php
    }else{
         echo "<script> alert('Tu usuario no tiene permiso para acceder a esta pagina'); </script>";
        echo '<script> window.location="index.php"; </script>';
    }
?>

</html>