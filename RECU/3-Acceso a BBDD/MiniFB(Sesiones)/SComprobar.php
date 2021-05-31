<!-- PARTE PHP-->
<?php
require_once "Conexion.php";

session_start();


$arrayUsuario = obtenerDatosUsuario($_REQUEST["identificador"], $_REQUEST["contrasenna"]);


if ($arrayUsuario) { // Identificador existía y contraseña era correcta.
    establecerSesionRAM($arrayUsuario);
    // Redirigiriamos a una página privada
    redireccionar("SPrivado1.php");
} else {
    echo "adios";
    // Redirigiriamos al formulario de inicio de sesión
    redireccionar ("SInicio.php");
}

?>