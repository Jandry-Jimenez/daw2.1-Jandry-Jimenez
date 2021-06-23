<!--PARTE PHP -->
<?php
    session_start();
    require_once "Conexion.php";
    destruirSesionRAMYCookie();
    redireccionar("SesionCerrarMensaje.php");
?>
