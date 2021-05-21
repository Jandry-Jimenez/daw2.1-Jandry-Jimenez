<!-- PARTE PHP-->
<?php

require_once "Conexion.php";

$identificador = $_REQUEST["identificador"];
$contrasenna = $_REQUEST["contrasenna"];


$sql = "SELECT * FROM Usuario WHERE identificador=? AND contrasenna=?";

$select = $conexion->prepare($sql);
$select->execute([$identificador, $contrasenna]);
$rs = $select->fetchAll();



?>

<!-- PARTE HTML-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comprobación</title>
</head>
<body>

    <?php if (count($rs)===0){ ?>  <!-- Si el identificador exístia y la contraseña era correcta. -->
        <h1>Error al acceder. Usuario o Contraseña incorrectos. =(</h1>
    <?php } else { ?>
        <h1>Has accedido correctamente =)</h1>
    <?php } ?>

</body>
</html>