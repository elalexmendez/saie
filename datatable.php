<?php
    session_start();
    include 'ser.php';

    if (isset($_SESSION['usuario'])) {
        echo "";
    
?>

<!doctype html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Modificacion</title>


    <link rel="icon" href="assets/favicon.ico">
    <!-- Place favicon.ico in the root directory -->
    <!-- DataTable -->
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"/>
    <script src="assets/js/vendor/jquery-1.11.3.min.js"></script>
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <script>

$(document).ready(function() {
    oTable = $('#example').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",

        "oLanguage": {
        "sEmptyTable": "No hay datos",//tabla vacia
          "sInfo": "Mostrando  (_START_ - _END_) de _TOTAL_ registros",
        "sLengthMenu": 'Mostrar <select>'+
        '<option value="10">10</option>'+
        '<option value="20">20</option>'+
        '<option value="30">30</option>'+
        '<option value="40">40</option>'+
        '<option value="50">50</option>'+
        '<option value="-1">Todo</option>'+
        '</select> registros',
          "sLoadingRecords": "Espere un momento, cargando...",
          "sSearch": "Buscar:",
          "sZeroRecords": "No hay datos con esa busqueda",
         "oPaginate": {
         "sFirst": "<button class='btn btn-default'>Primero</button>",
           "sLast": "<button class='btn btn-default'>Ultimo</button>",
           "sNext": "<button class='btn btn-default'>Siguiente</button>",
           "sPrevious": "<button class='btn btn-default'>Anterior</button>",
        }
        }

    });

} );

</script>

</head>

<body>
    <div class="container">
        <!-- Static navbar -->

        <br><br><br><br>

        <div class="row col-md-10 col-md-offset-1 custyle">

        <table id="example" class="display text-center" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Clasificacion</th>
                <th class="text-center">Alimento</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center">Fecha</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido</th>
                <th class="text-center">Clasificacion</th>
                <th class="text-center">Alimento</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center">Fecha</th>
            </tr>
        </tfoot>
         <?php

            /* Abrimos la base de datos */
              $conx = mysql_connect ("localhost","root","");
              if (!$conx) die ("Error al abrir la base <br/>". mysql_error()); 
              mysql_select_db("saie") OR die("Connection Error to Database");    

            /* Realizamos la consulta SQL */
            $sql="SELECT donadores.Nombre , donadores.Apellido , categorias.clasificacion , 
            alimentos.Alimento , ingrersos.cantidad_alimento , ingrersos.descripcion , ingrersos.Fecha 
            FROM donadores 
            INNER JOIN ingrersos ON ingrersos.id_donadores = donadores.id 
            INNER JOIN categorias ON categorias.id = ingrersos.id_categoria 
            INNER JOIN alimentos ON alimentos.Alimento = ingrersos.id_alimento";
            $result= mysql_query($sql) or die(mysql_error());
            if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

            /* Desplegamos cada uno de los registros dentro de una tabla */  

            /*Y ahora todos los registros */
            while($row=mysql_fetch_array($result))
            {
             echo "<tr>
                     <td class='text-center'> $row[Nombre] </td>
                     <td class='text-center'> $row[Apellido] </td>
                     <td class='text-center'> $row[clasificacion] </td>
                     <td class='text-center'> $row[Alimento] </td>
                     <td class='text-center'> $row[cantidad_alimento] </td>
                     <td class='text-center'> $row[descripcion] </td>
                     <td class='text-center'> $row[Fecha] </td>
                  </tr>";
            }
            echo "</table>";

        ?>

   <br>
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
</html>