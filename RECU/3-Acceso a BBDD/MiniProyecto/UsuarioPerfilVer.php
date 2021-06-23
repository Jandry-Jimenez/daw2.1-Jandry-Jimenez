<?php

require_once "Conexion.php";
$conexion = ConexionPDO();

$identificador = (int)$_REQUEST["identificador"];
$sql = "SELECT nombre FROM Usuario Where id=1";

        $select = $conexion->prepare($sql);
        $select->execute([$identificador]); // Se añade el parámetro a la consulta preparada.
        $rs = $select->fetchAll();

session_start();

if (!haySesionRAMIniciada() && !intentarCanjearSesionCookie()) {
    redireccionar ("SesionIniciar.php");
} // El else es que se muestre la parte H

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Perfil</title>
</head>

<body>
<div class = "contenedor">
 
  <header class="cabecera">  <!-- Cabecera -->
    <h1>SoundPlay<img src="img/logo.png" alt=40px" width="40px"></h1>
    <h1>Mi Perfil</h1>
  </header>
  <?php pintarSesion(); ?>
<br>
 

  <br>

    <form action="usuarioFicha.php">
            Usuario:<input type="text" name="nombre" value="<?=$identificador?>"><br>
            Nombre:<input type="text" name="nombre" value="<?=$nombre?>"><br>
            Apellidos:<input type="text" name="apellidos" value="<?=$apellidos?>"><br>
    </form>
  <br><br>
    <a href="SoundPlay.php">Volver a inicio</a>
</div>
</body>
</html>