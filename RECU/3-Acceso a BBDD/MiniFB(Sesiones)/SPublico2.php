<!--PARTE PHP-->
<?php
require_once "Conexion.php";

session_start();

?>

<!--PARTE HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Púbica</title>
    <style>
    body {text-align: center}
    h1 {color: darkorange}
    a {text-decoration: none; color:darkorange}
    </style>

</head>
<body>

<?php pintarSesion(); ?>

    <center><h1>Página Pública 2</h1>

    <p>Esta página es pública.</p>
    <p>No hace falta tener una sesión iniciada para ver esta página.</p></p>
    <p>=)</p>
    <br><br>

    <a href = 'SPublico1.php'>Ir a página publica 1</a>
    <a href='SPrivado2.php'>Ir a página privada 2</a>

</center>

</body>
</html>