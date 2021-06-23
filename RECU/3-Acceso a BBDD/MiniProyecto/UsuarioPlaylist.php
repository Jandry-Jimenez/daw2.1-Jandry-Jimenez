<!-- PARTE PHP -->
<?php

require_once "Conexion.php";

session_start();

if (!haySesionRAMIniciada() && !intentarCanjearSesionCookie()) {
    redireccionar ("SesionIniciar.php");
} // El else es que se muestre la parte HTML

$conexion = ConexionPDO();

$sql = "
        SELECT
          p.id        AS pId,
          p.nombre    AS pNombre,
          p.usuarioId AS pUsuarioId,
          c.id        AS cId,
          c.cancionId AS cCancionId
        FROM
          Playlist AS p INNER JOIN PlaylistCancion AS c
          ON p.usuarioId = c.id
          ORDER BY p.nombre
";

    $select = $conexion->prepare($sql);
    $select->execute([]); //ARRAY VACÍO, PERO CON LA CONSULTA PREPARADA
    $rs = $select->fetchAll();



?>

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
  <?php pintarSesion(); ?>

  <div class = "lateral">
    <nav class="menu1"> <!-- Enlances Usuario -->
      <ul>
      <a href="UsuarioPerfilVer.php"> Ver mi Perfil</a>   
      <a href="SesionCerrar.php">Cerrar Sesión</a>
      </ul>
    </nav>

    <nav class="menu2"> <!-- Enlances Menú -->
      <ul>
        <li><a href="SoundPlay.php">Inicio</a></li>
        <li><a href="UsuarioPlaylist.php">Mis Playlist</a></li>
        <li><a href="CancionesListado.php">Ver Canciones</a></li>
        <li><a href="ArtistasListado.php">Ver Artistas</a></li>
      </ul>
    </nav>
  </div>

  <h1>Mis Playlist</h1>

<table>

    <tr>
        <th>Nombre Playlist</th>
        <th>Canción</th>
    </tr>

    <?php
    foreach ($rs as $fila) { ?>
        <tr>
            <td> <?= $fila["pNombre"] ?></td>
            <td><a href= 'CancionFicha.php?id=<?=$fila["cId"]?>'> <?= $fila["cId"] ?> </a></td>
        </tr>
    <?php } ?>

</table>

<br><br>

<footer> ©2021  SoundPlay</footer>

</body>
</html>