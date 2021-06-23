<!-- PARTE PHP -->
<?php
    require_once "Conexion.php";
    
    $conexion = ConexionPDO();
    $id = (int)$_REQUEST["id"];

    $sql = "DELETE FROM Canciones WHERE id=?";
    
    $sentencia = $conexion -> prepare($sql);

    $sqlConExito = $sentencia -> execute([$id]); // Se añade el parámetro a la consulta preparada.

    $correctoNormal = ($sqlConExito && $sentencia -> rowCount() == 1);

    // Caso raro: 0 filas afectadas (No existia en la BD)
    $noExistia = ($sqlConExito && $sentencia -> rowCount() == 0);

?>

<!-- PARTE HTML -->

<html>
<head>
    <meta charset = 'UTF-8'></meta>
</head>

<body>

    <?php if($correctoNormal) { ?>

        <h1>Eliminación completada.</h1>
        <p>Se ha eliminado la canción correctamente.</p>

    <?php } else  {?>
        <h1>¡Error al eliminar!</h1>
        <p>No se ha podido eliminar la cancion.</p<
    <?php } ?>

    <a href = 'CancionesListado.php'>Volver al lista de canciones</a>

</body>
</html>