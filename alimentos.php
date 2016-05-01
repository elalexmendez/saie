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

    <script type="text/javascript">
        // Last updated 2006-02-21
        function addRowToTable()
        {
        // just get some info and elements
          var tbl = document.getElementById('tblSample');
          var rows = tbl.getElementsByTagName('tr');
          var l = rows.length;
          var lastRow = rows[l-1];
          var clone = lastRow.cloneNode(true);
        // now to fill in row data.
          clone.getElementsByTagName('select')[0].selectedIndex = lastRow.getElementsByTagName('select')[0].selectedIndex;
        // and finaly fix up names
          clone.getElementsByTagName('select')[0].name = 'action'+l;
        // add the row
          tbl.appendChild(clone);
        }
        function removeRowFromTable()
        {
          var tbl = document.getElementById('tblSample');
          var lastRow = tbl.rows.length;
          if (lastRow > 1) tbl.deleteRow(lastRow - 1);
        }
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
        
        <br><br>

        <div class="col-md-20 text-center" >
            <h3>Control de Ingresos de Alimentos</h3>
        </div><br>

        <div class="row">    
            <div class="col-md-offset-4 ">
              
                    <form method="post" class="col-sm-6 panel panel-primary panel-body" action="regalimentos.php">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Donado por:</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del Donante" required autocomplete="off">
                        </div>

                        <label for="sel1 text-center">Tipo de Alimento:</label>   
                        <table id="tblSample" class="table table-striped custab cellspacing=0">
                            <tr>
                            <td>
                        <select class="form-control" name="alimentos" onChange="setOptions(document.toolsubmit.action1.options[document.toolsubmit.action1.selectedIndex].value);">
                            <option value="" selected="selected">- selecciona -</option>
                            <optgroup label="Viveres">
                                <option value="Harina">Harina</option>
                                <option value="Arroz">Arroz</option>
                                <option value="Pasta">Pasta</option>
                                <option value="Azucar">Azucar</option>
                                <option value="Leche">Leche</option>
                                <option value="Café">Café</option>
                                <option value="Aceite">Aceite</option>
                                <option value="Mantequilla">Mantequilla</option>
                                <option value="Caraotas">Caraotas</option>
                                <option value="Frijoles">Frijoles</option>
                                <option value="Mayonesa">Mayonesa</option>
                                <option value="Salsa de Tomate">Salsa de Tomate</option>
                                <option value="Salsa de Ajo">Salsa de Ajo</option>
                                <option value="Salsa Inglesa">Salsa Inglesa</option>
                                <option value="Salsa China">Salsa China</option>
                                <option value="Salsa 59">Salsa 59</option>
                                <option value="Cereales">Cereales</option>
                                <option value="Galletas">Galletas</option>
                                <option value="Chicha">Chicha</option>
                            </optgroup>

                            <optgroup label="Panaderia">
                                <option value="Pan">Pan</option>
                                <option value="Pan Arabe">Pan Arabe</option>
                            </optgroup>
                            
                            <optgroup label="Charcuteria">
                                <option value="Mortadela">Mortadela</option>
                                <option value="Jamon">Jamon</option>
                                <option value="Queso">Queso</option>
                                <option value="Salchica">Salchica</option>
                            </optgroup>

                            <optgroup label="Carniceria">
                                <option value="Carne">Carne</option>
                                <option value="Pollo">Pollo</option>
                                <option value="Chuleta">Chuleta</option>
                                <option value="Chorizo">Chorizo</option>
                                <option value="Costilla">Costilla</option>
                                <option value="Puerco">Puerco</option>
                            </optgroup>
                        </select><br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cantidad</label>
                            <input type="text" name="cantidad" class="form-control" placeholder="Cantidad de Alimento" required autocomplete="off" onChange="setOptions(document.toolsubmit.action1.options[document.toolsubmit.action1.selectedIndex].value);">
                        </div>
                        </td>
                        </tr>
                        </table>

                        <input type="button" class="btn btn-default" value="Agregar" onclick="addRowToTable();" />
                        <input type="button" class="btn btn-default" value="Remover" onclick="removeRowFromTable();" /><br><br>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Descripción</label><br>
                            <textarea class="span4" name="descripcion" cols="48" rows="5"  placeholder="Descripción de la Donación" ></textarea>
                        </div>

                        <button type="submit" name="enviar" class="btn btn-default">Registar</button>
                        <button type="reset" name="enviar" class="btn btn-default">Borrar</button>

                    </form>    
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

<html>