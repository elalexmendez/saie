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
    <title>Actualizar Usuario</title>
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

        <?php

            require 'resources/config.php';

            $id = $_GET['id'];

            $sql = "SELECT * FROM usuarios WHERE id = '$id' ";
            $result = mysql_query($sql);
            $row = mysql_fetch_array($result);

        ?>

        <div>
            <ul class="pager">
                <li><a href="gestiondeusuarios.php">Anterior</a></li>
            </ul>
        </div>

        <div class="col-md-20 text-center" >
            <h3>Actualizar datos de Contribuyente</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" action="actusuario.php">

                    <input type="hidden" name="id" value="<?= $row['id'] ?>">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Cedula:</label>
                        <input type="number" name="cedula" class="form-control" placeholder="Cedula del Contribuyente" value="<?= $row['cedula'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Apellidos:</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido del Contribuyente" value="<?= $row['apellidos'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombres:</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del Contribuyente" value="<?= $row['nombres'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Tipo de Usuario:</label>
                        <select class="form-control" name="tipo">

                            <optgroup label="Tipo">

                                <option>Seleccionar</option>
                                <option>Administrador</option>
                                <option>Operador</option>

                            </optgroup>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Nombre de Usuario:</label>
                        <input type="text" name="user" class="form-control" placeholder="Apellido del Contribuyente" value="<?= $row['usuario'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña:</label>
                        <input type="text" name="pass" class="form-control" placeholder="Apellido del Contribuyente" value="<?= $row['password'] ?>">
                    </div>

                    <button type="submit" name="enviar" class="btn btn-success pull-right"><i class="fa fa-save"></i> Actualizar</button>
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