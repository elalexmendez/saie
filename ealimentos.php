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
    <title>Control de Egresos</title>
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
                        <li>
                            <a href="ingresos.php"> <i class="fa fa-sign-in"></i> Ingresos</a>
                        </li>
                        <li class="active">
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

        <div>
            <ul class="pager">
                <li><a href="egresos.php">Anterior</a></li>
            </ul>
        </div>

        <div class="col-md-20 text-center" >
            <h3>Control de Egresos de Alimentos</h3>
        </div><br>

        <div class="row">    
            <div class="col-md-offset-4 ">
              
                    <form method="post" class="col-sm-6 panel panel-primary panel-body" action="salimentos.php">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Titulo de Egreso" required autocomplete="off" onChange="setOptions(document.toolsubmit.action1.options[document.toolsubmit.action1.selectedIndex].value);">
                        </div>

                        <label for="exampleInputEmail1">Alimento</label>
                        <select class="form-control" name="nombre">
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
                            <textarea class="span4 form-control" name="mensaje" cols="48" rows="5"  placeholder="Descripción del Egreso" ></textarea>
                        </div>

                        <button type="submit" name="enviar" class="btn btn-default">Aceptar</button>
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