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
                        <li class="active">
                            <a href="ingresos.php"> <i class="fa fa-sign-in"></i> Ingresos</a>
                        </li>
                        <li>
                            <a href="egresos.php"> <i class="fa fa-sign-out"></i> Egresos</a>
                        </li>
                        <li>
                            <a href="inventario.php"> <i class="fa fa-list-alt"></i> Inventario</a>
                        </li>
                        <li>
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
        
        <br><br>


        <?php

        include 'ser.php';

        if (isset($_POST['cedula'])) {
        $Cedula = $_POST['cedula'];
        $sql = mysql_query("SELECT * FROM donadores WHERE id='".$_POST['cedula']."'");
        if (mysql_num_rows($sql)>0) {
        $row = mysql_fetch_array($sql);
        $_POST["cedula"] == $row['id'];

        $sql2= 'SELECT * FROM Estipendio  ORDER BY estipendio.Tipo ASC';
        $result2 = mysql_query($sql2);
        $row2 = mysql_fetch_array($result2);
        
        echo "
        <div class='col-md-20 text-center' >
            <h3>Control de Ingresos de Dinero</h3>
        </div><br>
        <div class='row'>
            <div class='col-md-offset-4'>
                <form method='post' class='col-sm-6 panel panel-primary panel-body' action='regdinero.php'>
                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Contribuyente:</label>
                        <input type='text' name='cedula' value='$row[id]' class='form-control' placeholder='Cedula del Contribuyente' required autocomplete='off'>
                    </div>

                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Nombre</label>
                        <input type='text' class='form-control' value='$row[Nombre]' placeholder='Nombre del Contribuyente' required autocomplete='off'>
                    </div>
                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Apeliido</label>
                        <input type='text' class='form-control' value='$row[Apellido]' placeholder='Apellido del Contribuyente' required autocomplete='off'>
                    </div>

                    <label for='exampleInputEmail1'>Tipo de Estipendio</label>

                    <select class='form-control'  name='estipendio' >
                            <optgroup label='Estipendios'><option>Seleccionar Estipendio</option>
                    
                             <option name='estipendio'>$row2[Tipo]</option>';

                        </optgroup>
                    </select><br>

                    <div class='form-group'>
                        <label for='exampleInputPassword1'>Cantidad</label>
                        <input type='number' name='cantidad' class='form-control' placeholder='Cantidad de Dinero' required autocomplete='off'>
                    </div>
                    
                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Descripción</label><br>
                        <textarea class='span4 form-control' name='mensaje' cols='48' rows='5'  placeholder='Descripción de la Donación' ></textarea>
                    </div>
                    <button type='submit' name='enviar' class='btn btn-default'>Registar</button>
                    <button type='reset' class='btn btn-default'>Limpiar</button>
                </form>
            </div>
        </div>";
    }else {
        echo '<script> alert("El Contribuyente no esta Registrado."); </script>';
        echo '<script> window.location="contribuyente.php"; </script>';
    }

}

        ?>
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

<html>