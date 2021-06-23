<!-- PARTE PHP -->
<?php
    require_once "Conexion.php";
    $conexion = ConexionPDO();


// Se recogen los datos del formuario de la request
    $id = (int)$_REQUEST["id"];
    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];
    $edad = $_REQUEST["edad"];

    $nuevaEntrada = ($id == -1);

    if ($nuevaEntrada) {
        // Quiere registrar a una persona nueva, colocamos un INSERT
        $sql = "INSERT INTO Artista (nombre, apellidos, edad VALUES (?, ?, ?)";
        $parametros = [$nombre, $apellidos, $edad];
    } else {
        // // Quieren MODIFICAR una persona existente y es un UPDATE.
        $sql = "UPDATE Artista SET nombre=?, apellidos=?, edad=? WHERE id=?";
        $parametros = [$nombre, $apellidos, $edad, $id];
    }

    $sentencia = $conexion->prepare($sql);
    // Esta llamada devuelve true o false según si la ejecución de la sentencia ha ido bien o mal.
    $sqlConExito = $sentencia->execute($parametros);  // Se añaden los parámetros a la consulta preparada.

    //Se consulta la cantidad de filas afectadas por la ultima sentencia SQL.
    $numFilasAfectadas = $sentencia->rowCount();
    $unaFilaAfectada = ($numFilasAfectadas == 1);
    $ningunaFilaAfectada = ($numFilasAfectadas == 0);

    // Está todo correcto de forma NORMAL si NO ha habido errores y se ha visto afectada UNA fila.
    $correcto = ($sqlConExito && $unaFilaAfectada);

    // Si los datos no se habían modificado, también está correcto, pero de otra manera.
    $datosNoModificados = ($sqlConExito && $ningunaFilaAfectada);

?>

<!-- PARTE HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

    <?php
        // Todo bien tanto si se han guardado los datos nuevos como si no se habían modificado.
        if ($correcto || $datosNoModificados) { ?>

            <?php if ($id == -1) { ?>
                <h1>Inserción completada</h1>
			    <p>Se ha insertado correctamente la nueva entrada de <?php echo $nombre; ?>.</p>
            <?php } else { ?>
                <h1>Guardado completado</h1>
			    <p>Se han guardado los datos correctamente de <?php echo $nombre; ?>.</p>

                <?php if ($datosNoModificados) { ?>
                    <p>En realidad, no había modificado nada, pero no está de más que se haya asegurado pulsando el botón de guardar :)</p>
                <?php } ?>
            <?php } ?>

        <?php } else { ?>
            <h1>Error en la modificación.</h1>
	        <p>No se han podido guardar los datos del artista.</p>
        <?php } ?>


    <a href='ArtistasListado.php'>Volver al listado de Artistas.</a>

</body>
</html>