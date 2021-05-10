<!--PARTE HTML-->
<?php

    require_once "Conexion.php";

    // Se recogen los datos del formulario de la request.
    $id     = (int)$_REQUEST[("id")];
    $nombre = $_REQUEST[("nombre")];

    // Si id es -1 quieren CREAR una nueva entrada ($nueva_entrada tomará true).
	// Sin embargo, si id NO es -1 quieren VER la ficha de una categoría existente
	// (y $nueva_entrada tomará false).
    $nuevaEntrada = ($id == -1);

    if ($nuevaEntrada) {
        // Quieren crear una nueva entrada, pondremos un "INSERT"
        $sql = "INSERT INTO Categoria(nombre) VALUES (?)";
        $parametros = [$nombre];
    } else {
        // Quieren modificar una Categoría, podremos un "UPDATE"
        $sql = "UPDATE Categoria set nombre=? WHERE id=?";
        $parametros = [$nombre, $id];
    }

    $sentencia = $conexion->prepare($sql);

    // Esta llamada devuelve "True o False", según la ejecución de la sentencia ha ido bien o mal
    $sqlConExito = $sentencia->execute($parametros); // Se añaden los parámetros a la consulta preparada.

    // Está todo correcto de forma normal si NO ha habido errores y se ha visto afectada UNA fila.
    $correcto = ($sqlConExito && $sentencia->rowCount() == 1);

    // Si los datos no se habían modificado, también es correcto, pero no "raro"
    $datosNoModificados = ($sqlConExito && $sentencia->rowCount() == 0);

?>

<!-- PARTE HTML -->
<html>
<head>
    <meta charset= 'UFT-8'>
</head>

<body>


<?php 
    // Todo bien tanto si se han guardado los datos nuevos, como si no se habían modificado.
    if ($correcto || $datosNoModificados) { ?> 
        <?php if ($nuevaEntrada) { ?>
            <h1>Inserción Completada</h1>
            <p>Se ha guardado correctamente los datos de <?=$nombre?>.</p>
        <?php } else { ?>
            <h1>Guardado Completado</h1>
            <p>Se ha guardado correctamente los datos de <?=$nombre?>.</p>

            <?php if ($datosNoModificados) { ?> <!-- DATOS NO MODIFICADOS -->
                <p>En realidad, no había modificado nada, pero no está de más que se haya asegurado pulsando el botón de guardar :)</p>
            <?php } ?>
        <?php } ?>

<?php } else{ ?>

    <?php if ($nuevaEntrada) { ?>
            <p>¡ERROR AL CREAR!</p>
            <p>No se ha podido crear la categoría.</p>
        <?php } else { ?>
            <p>!ERROR AL MODIFICAR¡</p>
            <p>No se han podido guardar los datos de la categoría.</p>
        <?php } ?>

<?php } ?>

<a href = 'CListado.php'>Volver al listado de Categorías</a>

</body>

</html>