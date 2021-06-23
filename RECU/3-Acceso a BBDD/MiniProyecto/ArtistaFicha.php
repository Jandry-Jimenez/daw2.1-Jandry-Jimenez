<!-- PARTE PHP -->
<?php

require_once "Conexion.php";
$conexion = ConexionPDO();

    
	$id = (int)$_REQUEST["id"];
	$nuevaEntrada = ($id == -1);

    if ($nuevaEntrada) { 
		$artistaNombre = "Nombre";
        $artistaApellidos = "Apellidos";
		$artistaEdad = "Edad";
    } else { // Cuando el usuario quiere acceder a una entrada ya resgistrada
        $sqlArtista = "SELECT nombre, apellidos, edad FROM Artista WHERE id=?";

        // Realizamos una conexion con la base de datos
        $select = $conexion->prepare($sqlArtista);
        $select->execute([$id]);
        $rsArtista = $select->fetchAll();

		$artistaNombre = $rsArtista[0]["nombre"];
        $artistaApellidos = $rsArtista[0]["apellidos"];
		$artistaEdad = $rsArtista[0]["edad"];
    }

    // Con lo siguiente se deja preparado un recordset con todas las categorías.
    $sqlCancion = "SELECT id, nombre FROM Canciones ORDER BY nombre";
    $select = $conexion->prepare($sqlCancion);
    $select->execute([]); // Array vacío no requiere parámetros.
    $rsCancion = $select->fetchAll();
?>

<!-- PARTE HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

    <?php if ($nuevaEntrada) { ?>   <!-- Si es una nueva entrada -->
        <h1>Nueva Ficha de Artista</h1>
    <?php } else { ?>               <!-- Si es una entrada registrada -->
        <h1>Ficha de Artista</h1>
    <?php } ?>

<!-- FORMULARIO -->
<form method='post' action='ArtistaGuardar.php'>

<input type = 'hidden' name = 'id' vale = '<?=$id?>' />

<ul>
    <li>
        <b>Nombre:</b>
        <input type = 'text' name = 'nombre' value = '<?=$artistaNombre?>' />
    </li>

    <li>
        <b>Apellidos:</b>
        <input type = 'text' name = 'apellidos' value = '<?=$artistaApellidos?>' />
    </li>

    <li>
        <b>Edad: </b>
        <input type = 'number' name = 'edad' value = '<?=$artistaEdad?>' />
    </li>
        </select>
    </li>

</ul>

<?php  // BOTONES PARA CREAR UNA PERSONA O GUARDAR LOS CAMBIOS ?>
<?php if ($nuevaEntrada) { ?>
    <input type = 'submit' name = 'crear' value = 'Crear Persona' />
<?php } else {?>
    <input type = 'submit' name = 'guardar' value = 'Guardar Cambios' />
<?php } ?>

</form>

<?php if (!$nuevaEntrada) { ?>
    <br>
    <a href = 'ArtistaEliminar.php=?id=<?=$id?>'>Eliminar Persona.</a>
<?php } ?>

<br />
<br />

<a href = 'PListado.php'>Volver al Listado de Artistas.</a>

</body>
</html>