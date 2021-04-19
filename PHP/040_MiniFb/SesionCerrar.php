<?php

    // TODO cerrar utilizando la función de _Varios.php y redirigir a contenido público 1.

session_start();
unset ($_SESSION['usuario']);
$_SESSION["conectado"] == false;
session_destroy();
?>
