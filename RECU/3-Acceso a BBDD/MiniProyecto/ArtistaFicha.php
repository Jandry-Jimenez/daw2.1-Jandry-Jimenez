<!-- PARTE PHP -->
<?php

require_once "Conexion.php";
    
	$id = (int)$_REQUEST["id"];
	$nuevaEntrada = ($id == -1);

    if ($nuevaEntrada) { 
		$artistaNombre = "<introduzca nombre>";
        $artistaApellidos = "<introduzca apellidos>";
		$artistaTelefono = "<introduzca teléfono>";
		$artistaCancionId = 0;
    } else { // Cuando el usuario quiere acceder a una entrada ya resgistrada (Los datos se cargarán)
        $sqlArtista = "SELECT nombre, apellidos, edad, cancionId FROM Artista WHERE id=?";

        // Realizamos una conexion con la base de datos
        $select = $conexion->prepare($sqlArtista);
        $select->execute([$id]);
        $rsArtista = $select->fetchAll();

        // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
		$artistaNombre = $rsArtista[0]["nombre"];
        $artistaApellidos = $rsArtista[0]["apellidos"];
		$artistaTelefono = $rsArtista[0]["telefono"];
		$artistaCancionId = $rsArtista[0]["cancionId"];
    }

    // Con lo siguiente se deja preparado un recordset con todas las categorías.
    $sqlCancion = "SELECT id, nombre FROM Canciones ORDER BY nombre";
    $select = $conexion->prepare($sqlCancion);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
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
        <artistaype = 'text' name = 'nombre' value = '<?=$artistaNombre?>' />
    </li>

    <li>
        <b>Apellidos:</b>
        <input type = 'text' name = 'apellidos' value = '<?=$artistaApellidos?>' />
    </li>

    <li>
        <b>Edad: </b>
        <trtistaype = 'number' name = 'edad' value = '<?=$artistaEdad?>' />
    </li>

    <li>
        <b>Genero: </b>
        <select  name='cancionId'>
            <?php
                foreach ($rsCancion as $filaCancion) {
                    $cancionId        = (int) $filaCancion["id"];
                    $CancionNombre    = $filaCancion["nombre"];


                    if($generod == $generoCancionId) $seleccion = " selected='true'";
                    else                                    $seleccion = "";

                    echo "<option value = '$cancionId' $seleccion>$CancionNombre</option>";
                }
            ?>
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

<a href = 'PListado.php'>Volver al Listado de Persona.</a>

</body>
</html>