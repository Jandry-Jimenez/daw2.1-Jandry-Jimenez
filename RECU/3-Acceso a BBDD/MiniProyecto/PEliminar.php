<!-- PARTE PHP -->
<?php
    require_once "Conexion.php";
    $conexion = ConexionPDO();


    $id = (int)$_REQUEST["$id"];

    $sql = "DELETE FROM Artista WHERE id=?";
    $sentencia = $conexion->prepare($sql);
    $sqlConExito = $sentencia->execute([$id]);

    //Se consulta la cantidad de filas afectadas por la ultima sentencia sql.
    $unaFilaAfectada     = ($sentencia->rowCount() == 1);
    $ningunaFilaAfectada = ($sentencia->rowCount() == 0);

    $correcto   = ($sqlConExito && $unaFilaAfectada);
    $noExistia  = ($sqlConExito && $ningunaFilaAfectada);

?>

<!-- PARTE HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php if($correcto) {?>
        <h1>Eliminación hecha correctamente.</h1>
        <p>Se ha eliminado correctamente la persona.</p>

    <?php } else if ($noExistia){ ?>
        <h1>Eliminación imposible</h1>
        <p>No existe la persona que quiere eliminar.</p>

    <?php } else {?>
        <h1>Error al eliminar</h1>
        <p>No se puede eliminar a la persona que quiere.</p>

    <?php } ?>
    <a href = 'ArtistasListado.php'>Volver al lista de artistas.</a>

    
</body>
</html>