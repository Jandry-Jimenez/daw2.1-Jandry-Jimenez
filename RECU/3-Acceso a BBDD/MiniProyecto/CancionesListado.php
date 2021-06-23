<?php
require_once "Conexion.php";
session_start();

if (!haySesionRAMIniciada() && !intentarCanjearSesionCookie()) {
    redireccionar ("SesionIniciar.php");
} // El else es que se muestre la parte HTML

$conexion = ConexionPDO();

//RECOGEMOS LOS PÁRAMETROS

    // SELECT con huecos vacíos
    $sql = "SELECT id,nombre FROM Canciones ORDER BY nombre";
    $select = $conexion->prepare($sql);
    $select -> execute([]);;
    $rs = $select->fetchAll();

    foreach ($rs as $fila) {
        $nombre = $fila["nombre"];
        $id = $fila["id"];
    }

?>

<html>
<head>
    <meta charset= utf8>
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

<h1>Listado de Canciones</h1>

<table>
    <tr>
        <th>Nombre</th>
    </tr>

    <?php foreach($rs as $fila) { ?>
        <tr>
            <td><a href='CancionFicha.php?id=<?=$fila["id"]?>'><?=$fila["nombre"]?></a></td>
            <td><a href='CancionEliminar.php?id=<?=$fila["id"]?>'><img src="img/papelera.png"></a></td>
        </tr>
    <?php } ?>

</table>

<br>

<a href = 'CancionFicha.php?id=-1'>Crear entrada</a>

<br />
<a href = 'ArtistasListado.php'>Gestionar Lista de artistas</a>


</body>
</html>