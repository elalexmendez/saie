<?php
if($_GET['accion']=="registrar") {

   /*Esto quiere decir que se está enviando el formulario y hay que registrar */

   $user=$_POST['user'];
   $pass1=$_POST['pass1'];
   $pass2=$_POST['pass2'];


   if($pass1==$pass2) {
       /*Si las passwords coindicen registramos:*/

       $conexion = mysql_connect("localhost", "root");

       mysql_select_db("mibase", $conexion);

       $sql="INSERT INTO usuarios (user, password) VALUES ('".$user."', '".$pass1."')";

       mysql_query($sql, $conexion) or die ("Error al insertar datos ". mysql_error());

    
   } else {
       die("Error, las password no coinciden");
   }
} else { ?><html><head><title>Registro</title></head>
<body>
Formulario de registro de usuarios
<form action="registro.php?accion=registrar" method="POST">
Introduce usuario: <input type="text" name="user"><br>
Introduce password: <input type="password" name="pass1"><br>
Confirma password: <input type="password" name="pass2"><br>

<input type="submit" value="Registrar">
</form>
</body>
</html>
<?php 
}
?>