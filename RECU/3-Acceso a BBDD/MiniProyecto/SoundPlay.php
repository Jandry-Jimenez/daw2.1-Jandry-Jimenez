<!-- PARTE PHP -->
<?php

require_once "Conexion.php";

session_start();

if (!haySesionRAMIniciada() && !intentarCanjearSesionCookie()) {
    redireccionar ("SesionIniciar.php");
} // El else es que se muestre la parte HTML

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
<br>
  <H1>Últimos Lanzamientos</H1>

  <div class = "imagenes">

  <a href="https://open.spotify.com/album/2Yx8KX2FcQsFfHhOLpKr77">
    <img src="https://images.genius.com/de2880e5fbf4df46067fa418a4b586df.1000x1000x1.jpg">
  </a>

  <a href="https://open.spotify.com/album/4n4lMf9EzPbSItJrAXMq9o">
    <img src="https://images.genius.com/2c9a9fb03a18dc33e50af05fcf992985.1000x1000x1.jpg">
  </a>

  <a href="https://open.spotify.com/album/66CKi5xW25u7gIsJ2S20zc">
    <img src="https://images.genius.com/44cf8d721e7a3a646c8cb45f0719267a.1000x1000x1.jpg"> 
  </a>

  <a href="https://open.spotify.com/album/5LuoozUhs2pl3glZeAJl89">
    <img src="https://t2.genius.com/unsafe/773x0/https%3A%2F%2Fimages.genius.com%2F92fe61edad0376f8f51e5f839be31465.1000x1000x1.png">
  </a>

  <a href="https://open.spotify.com/album/6s84u2TUpR3wdUv4NgKA2j">
    <img src="https://t2.genius.com/unsafe/773x0/https%3A%2F%2Fimages.genius.com%2Feae7745edb096f44cccfd9123e52a4f1.1000x1000x1.png">
  </a>
    
  </div>

</div>

<footer> ©2021  SoundPlay</footer>

</body>
</html>