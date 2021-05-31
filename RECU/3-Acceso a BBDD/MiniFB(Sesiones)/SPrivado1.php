<!-- PARTE PHP -->
<?php

require_once "Conexion.php";

session_start();

if (!haySesionRAMIniciada() && !intentarCanjearSesionCookie()) {
    redireccionar ("SInicio.php");
} // El else es que se muestre la parte HTML



?>

<!-- PARTE HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/pv.png" />
    <title>Página Privada 1</title>

    <style>
    h1 {color: darkorange; text-align: center;}
    a {text-decoration: none; color:darkorange}
    body {text-align: center;}
    </style>

</head>
<body>
    <left><?php pintarSesion(); ?></left>
    <h1>Página Privada 1</h1>
    <br><br>

    <img src="img/ts.png" width = "250px" height = "250px">

    <p>Tienes permisos para ver esta página, todo lo que estas viendo en está página es secreto. No puede decir nada de lo que veas aquí.</p>
    <p>Solo unos pocos pueden acceder a esta página</p>

    <br>
    <h4>Los ojos hacen más ejercicio que las piernas</h4>
    <h4>Los músculos de nuestros ojos se mueven mucho más de lo que imaginas… ¡Aproximadamente 100.000 veces al día!</h4>
    <br><br>

    <a href='SPublico1.php'>Ir a la página pública 1</a>
    <a href='SPrivado2.php'>Ir a la página privada 2</a>

</body>
</html>