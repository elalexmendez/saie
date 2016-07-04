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
    <title>Actualizar Ingresos de Dinero</title>
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

        <div class="col-md-20 text-center">
            <h3>Actualizar Ingreso de Dinero</h3>
        </div><br>

        <?php
        include 'resources/config.php';

        $id_dinero = $_GET['id_dinero'];

        $id_ingreso = $_GET['id_ingreso'];

        $arancel = $_GET['arancel'];

        $sql2 = "SELECT * FROM ingresos_dinero WHERE id = '$id_dinero' ";
        $result2 = mysql_query($sql2);
        $row2 = mysql_fetch_array($result2);


        $sql1 = "SELECT * FROM ingresos WHERE id = '$id_ingreso' ";
        $result1 = mysql_query($sql1);
        $row1 = mysql_fetch_array($result1);

        ?>

        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" name="formu" action="actdinero.php">
                    
                    <input type="hidden" name="id2" value="<?= $row2['id'] ?>">
                    <input type="hidden" name="id1" value="<?= $row1['id'] ?>">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Contribuyente:</label>
                        <input type="number" name="cedula" class="form-control" value="<?= $row1['donador_id'] ?>" required autocomplete="off">
                        
                    </div>


                    <label for="exampleInputEmail1">Tipo de Arancel</label>

                    <select class="form-control"  name="estipendio">
                            <optgroup label="Aranceles"><option>Seleccionar Arancel</option>
                        <?php
                        require "resources/config.php";

                            $sql= "SELECT * FROM Estipendio  ORDER BY estipendio.Tipo ASC";

                            $result = mysql_query($sql);
                            while($campo = mysql_fetch_array($result)) {
                            echo "<option name='estipendio' value='".$campo['id']."'>".$campo['Tipo']."</option>";
                            }

                        ?>
                        </optgroup>
                    </select><br>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" value="<?= $row2['cantidad'] ?>" required  autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label><br>
                        <textarea class="span4 form-control" name="mensaje" cols="48" rows="5"  placeholder="Descripción de la Donación" ><?= $row1['descripcion'] ?></textarea>
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

<html>