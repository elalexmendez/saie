<?php

$conexion = mysql_connect("localhost", "root");

mysql_select_db("mibase", $conexion);

if($_POST['user'] && $_POST['pass']) {

     $sql="SELECT * FROM usuarios WHERE user='".$_POST['user']."' AND password='".$_POST['pass']."'";

     $resultado=mysql_query($sql, $conexion) or die ("Error");

     $numRegistros=mysql_num_rows($resultado);

     if($numRegistros==0) {

        echo"<script type=\"text/javascript\">alert('Nombre de Usuario o Contraseña Incorrectos'); window.location='index.html';</script>";

     } else {

     echo"<script type=\"text/javascript\">alert('Usted esta siendo redireccionado a la pagina principal'); window.location='inicio.html';</script>";
       

     }
} else {

   echo "Introduce user y password para loguearte";

}

?>