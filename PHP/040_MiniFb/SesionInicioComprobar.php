<?php
require_once "_Varios.php";

$identificador=(string)$_POST['usuario'];
$contrasenna=(string)$_POST['contrasena'];

$arrayUsuario = obtenerUsuario($identificador,$contrasenna);
// Vienen datos: si el identificador existía y contraseña era correcta.
if ($arrayUsuario) {
   marcarSesionComoIniciada($arrayUsuario);
   redireccionar("ContenidoPrivado1.php");

} else {
  redireccionar("SesionInicioFormulario.php");
}