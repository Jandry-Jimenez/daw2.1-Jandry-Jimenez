<!--PARTE PHP-->
<?php
    require_once "Conexion.php";

    session_start();
    
if (!haySesionRAMIniciada() && !intentarCanjearSesionCookie()) {
    redireccionar ("SInicio.php");
} // El else es que se muestre la parte HTML

?>

<!--PARTE HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" type = "image/png" href = "img/pv.png"></link>
    <title>Página Privada 2</title>

    <style>
    h1 {color: darkorange}
    a {text-decoration: none; color:darkorange}
    body {text-align: center;}
    </style>

</head>
<body>
    <?php pintarSesion();?>

    <h1>Página Privada 2</h1>
    <br>
    <br>

    <img src = "img/ts.png" width = "250px" height = "250px">

    <p>Tienes permisos para ver esta página, todo lo que estas viendo en está página es secreto. No puede decir nada de lo que veas aquí.</p>
    <p>Solo unos pocos pueden acceder a esta página</p>

    <br>
    <h4>El cuerpo humano contiene en promedio unos 37 litros de agua</h4>
    <h4>Esto que equivale al 66 por ciento de la masa corporal de un adulto. Todo el cerebro está compuesto por un 75 por ciento de agua, mientras que, los huesos contienen un 25 por ciento y la sangre un 83 por ciento.</h4>
    <br><br>

    <a href='SPublico2.php'>Ir a la página pública 2</a>
    <a href='SPrivado1.php'>Ir a la página privada 1</a>

    
</body>
</html>