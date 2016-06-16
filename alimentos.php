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

    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

    var MaxInputs       = 8; //Número Maximo de Campos
    var contenedor       = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos

    $(AddButton).click(function (e) {
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            //agregar campo
            $(contenedor).append('<div><input type="text" name="nombre[]" class="form-control" id="campo_'+ FieldCount +'" placeholder="Nombre '+ FieldCount +'"/><input type="text" name="cantidad[]" class="form-control" id="campo_'+ FieldCount +'" placeholder="Cantidad '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a></div>');
            x++; //text box increment

        }   

        return false;
    });

    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
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

        <div class="col-md-20 text-center" >
            <h3>Control de Ingresos de Alimentos</h3>
        </div><br>

        <div class="row">    
            <div class="col-md-offset-4 " >
              
                    <form method="post" class="col-sm-6 panel panel-primary panel-body" action="aliprueba.php">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Cedula del Contribuyente</label>
                            <input type="text" name="cedula" class="form-control" placeholder="Cedula" required autocomplete="off" onChange="setOptions(document.toolsubmit.action1.options[document.toolsubmit.action1.selectedIndex].value);">
                        </div>

                        <label for="exampleInputEmail1">Alimento</label><br>

                         <a id="agregarCampo" class="btn btn-default" href="#">Agregar Campo</a><br>

                        <div id="contenedor">
                            <div class="added">
                                
                            <select class="form-control" id="campo_1"   name="nombre[]">
                                    <optgroup label="Alimentos"><option>Seleccionar Alimento</option>
                                <?php
                                include 'ser.php';

                                    $sql= "SELECT Alimento FROM alimentos";
         
                                    $result = mysql_query($sql);
                                    while($campo = mysql_fetch_array($result)) {
                                    echo "<option name='alimento' value='".$campo['Alimento']."'>".$campo['Alimento']."</option>";
                                    }
         
                                ?>
                                </optgroup>
                                <br>
                                <input type="text" name="nombre[]" id="campo_1" class="form-control" placeholder="Nombre"/><br>
                                <input type="text" name="cantidad[]" id="campo_1" class="form-control" placeholder="Cantidad"/><br>
                                <a href="#" class="eliminar">&times;</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Descripción</label><br>
                            <textarea class="span4 form-control" name="descripcion" cols="48" rows="5"  placeholder="Descripción de la Donación" ></textarea>
                        </div>

                        <button type="submit" name="enviar" class="btn btn-default">Registar</button>
                        <button type="reset" class="btn btn-default">Limpiar</button>

                    </form>    
            </div>
        </div>
    </div>

     <footer class="footer">
        <div class="container">
            &copy; Iglesia Nuestra Señora del Rosario de Aranzazu
        </div>
    </footer>

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