<?php
    session_start();
    require 'resources/config.php';

    $sql = "SELECT * FROM usuarios WHERE cargo = 'administrador' AND usuario = '$_SESSION[usuario]' ";
    $result = mysql_query($sql);

    if (mysql_num_rows($result) > 0) {
        echo "";
    
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Actualizar Alimento</title>
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
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="gestionalimentos.php">Anterior</a></li>
            </ul>
        </div>

        <?php

            require 'resources/config.php';

            $id = $_GET['id'];

            $sql = "SELECT * FROM alimentos WHERE id = '$id' ";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);

        ?>

        <div class="col-md-20 text-center" >
            <h3>Actualizar Registro de Alimento</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" action="actalimento.php">

                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Alimento:</label>
                        <input type="text" name="alimento" class="form-control" placeholder="Nombre del Alimento" value="<?= $row['Alimento'] ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Cantidad:</label>
                        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad" value="<?= $row['Cantidad'] ?>">
                    </div>

                    <button type="submit" name="enviar" class="btn btn-success pull-right"><i class="fa fa-save"></i> Registrar</button>
                </form>
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
         echo "<script> alert('Tu usuario no tiene permiso para acceder a esta pagina'); </script>";
        echo '<script> window.location="index.php"; </script>';
    }
?>

</html>