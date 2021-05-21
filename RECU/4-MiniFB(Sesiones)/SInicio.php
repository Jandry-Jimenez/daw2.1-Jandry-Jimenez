<!--
    PARTE PHP
 -->


<?php
    require_once "Conexion.php";
?>

<!--
    PARTE HTML
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Iniciar Sesión</title>
 </head>
 <body>

<center><h1>Iniciar Sesión</h1></center>
<center><p>Por favor introduzca sus datos para acceder.</p></center>

 <!-- FORMULARIO -->
<form action = 'SComprobar.php' method = 'post'>
    <label for = 'identificador'>Usuario</label><br>
    <input type = 'text' name = 'identificador'>
    <br><br>

    <label for = 'contrasenna'>Contraseña</label><br>
    <input type = 'password' name = 'contrasenna'>
    <br><br>

    <input type = 'submit' value = 'Iniciar Sesión'>

</form>
 </body>
 </html>