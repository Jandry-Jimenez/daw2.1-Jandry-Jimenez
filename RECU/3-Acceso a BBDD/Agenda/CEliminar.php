<!-- PARTE PHP -->
<?php
    require_once "Conexion.php";

    // Recoge el parámetro "id"
    $id = (int)$_REQUEST["id"];

    $sql = "DELETE FROM Categoria WHERE id=?";
    
    $sentencia = $conexion -> prepare($sql);

    // Esta llamada devuelve true o false según si la ejecución de la sentencia ha ido bien o mal.
    $sqlConExito = $sentencia -> execute([$id]); // Se añade el parámetro a la consulta preparada.

    // Indica que todo ha ido bien si no ha habido errores, solo ha afectado a 1 fila
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
        <p>Se ha eliminado correctamente la categoría.</p>

    <?php } else  {?>
        <h1>¡Error al eliminar!</h1>
        <p>No se ha podido eliminar la categoría.</p<
    <?php } ?>

    <a href = 'CListado.php'>Volver al listado de Categorias</a>

</body>
</html>