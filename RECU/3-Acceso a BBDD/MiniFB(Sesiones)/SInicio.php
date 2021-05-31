<!--
    PARTE PHP
 -->

<?php
    require_once "Conexion.php";

    if (haySesionRAMIniciada()) redireccionar ("SPublico1.php");
?>

<!--
    PARTE HTML
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <link rel="icon" type="image/png" href="img/lg.png" />
     <title>Iniciar Sesión</title>

     <style>
        body {text-align: center}
     </style>
     
 </head>
 <body>

<h1>Iniciar Sesión</h1>
<img src="img/ac.png" withd = '70px' height = '70px'>
<p>Por favor introduzca sus datos para acceder.</p>


 <!-- FORMULARIO -->
<form action = 'SComprobar.php' method = 'post'>
    <label for = 'identificador'><b>Usuario</b></label><br>
    <input type = 'text' name = 'identificador'>
    <br><br>

    <label for = 'contrasenna'><b>Contraseña</b></label><br>
    <input type = 'password' name = 'contrasenna'>
    <br><br>

    <input type = 'submit' value = 'Iniciar Sesión'>

</form>
<br> <br>

<footer>© 2021 All rights reserved</footer>
 </body>
 </html>