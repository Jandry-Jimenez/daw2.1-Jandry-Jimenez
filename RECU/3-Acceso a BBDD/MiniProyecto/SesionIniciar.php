<!-- PARTE PHP -->

<?php
    require_once "Conexion.php";

?>

<!-- PATE HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>SoundPlay</title>
</head>

<body>

<div class = "contenedor">
    
<header class="cabecera">  <!-- Cabecera -->
    <h1>SoundPlay<img src="img/logo.png" alt=40px" width="40px"></h1>
  </header>
    
    <h1>Iniciar Sesión</h1>
<img src="img/ac.png" withd = '70px' height = '70px'>
<p>Por favor introduzca sus datos para acceder.</p>


 <!-- FORMULARIO -->
<form action = 'SesionComprobar.php' method = 'post'>
    <label for = 'identificador'><b>Usuario</b></label><br>
    <input type = 'text' name = 'identificador'>
    <br><br>

    <label for = 'contrasenna'><b>Contraseña</b></label><br>
    <input type = 'password' name = 'contrasenna'>

    <br><br>
    <input type = 'submit' value = 'Iniciar Sesión'>

</form>

</div>

</body>
</html>