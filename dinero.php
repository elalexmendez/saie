<?php
    session_start();
    require 'resources/config.php';

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
        <?php include "resources/views/navbar.php"; ?>

        <div>
            <ul class="pager">
                <li><a href="ingresos.php">Anterior</a></li>
            </ul>
        </div>

        <div class="col-md-20 text-center" >
            <h3>Control de Ingresos de Dinero</h3>
        </div><br>
        <div class="row">
            <div class="col-md-offset-4">
                <form method="post" class="col-sm-6 panel panel-primary panel-body" name="formu" action="regdinero.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contribuyente:</label>
                        <input type="number" id="cedula" name="cedula" class="form-control" placeholder="Numero de Identificación" required autocomplete="off">
                        
                    </div>

                    <button type="button" id="btn-confirmar" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-check" aria-hidden="true"></i> Confirmar</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Contribuyente:</h4>
                                </div>
                                <div class="modal-body">
                                    
                                    <div id="mensaje"></div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>      
                    </div><br><br>

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
                        <input type="number" name="cantidad" class="form-control" placeholder="Cantidad de Dinero" required  autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label><br>
                        <textarea class="span4 form-control" name="mensaje" cols="48" rows="5"  placeholder="Descripción de la Donación" ></textarea>
                    </div>

                    <button type="submit" name="enviar" class="btn btn-success pull-right"><i class="fa fa-save"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>

     <?php include "resources/views/footer.php"; ?>

    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>


    <script>

           $(document).ready(function(){


               $('#btn-confirmar').click(function(){
                var cedula = $('#cedula').val();
                   $.ajax({
                       type: 'POST',
                       url: 'confirmarcedula.php',
                       data: {cedula},
                       success: function(mensaje){
                           $('#mensaje').html(mensaje);
                       }
                   })
               })
           })

       </script>

       <script src="assets/js/vendor/jquery.js"></script>

</body>

<?php
    }else{
        echo '<script> window.location="login.php"; </script>';
    }
?>

<html>