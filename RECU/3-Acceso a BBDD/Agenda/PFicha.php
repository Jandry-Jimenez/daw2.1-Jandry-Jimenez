<!-- PARTE PHP -->
<?php

require_once "Conexion.php";
    
	// Se recoge el parámetro "id" de la request.
	$id = (int)$_REQUEST["id"];

	// Si id es -1 quieren CREAR una nueva entrada ($nueva_entrada tomará true).
	// Sin embargo, si id NO es -1 quieren VER la ficha de una persona existente
	// (y $nueva_entrada tomará false).
	$nuevaEntrada = ($id == -1);

    if ($nuevaEntrada) { // Cuando el usuario quiere crear una nueva entrada (No se cargan datos)
		$personaNombre = "<introduzca nombre>";
        $personaApellidos = "<introduzca apellidos>";
		$personaTelefono = "<introduzca teléfono>";
		$personaCategoriaId = 0;
    } else { // Cuando el usuario quiere acceder a una entrada ya resgistrada (Los datos se cargarán)
        $sqlPersona = "SELECT nombre, apellidos, telefono, categoriaId FROM Persona WHERE id=?";

        // Realizamos una conexion con la base de datos
        $select = $conexion->prepare($sqlPersona);
        $select->execute([$id]);
        $rsPersona = $select->fetchAll();

        // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
		$personaNombre = $rsPersona[0]["nombre"];
        $personaApellidos = $rsPersona[0]["apellidos"];
		$personaTelefono = $rsPersona[0]["telefono"];
		$personaCategoriaId = $rsPersona[0]["categoriaId"];
    }

    // Con lo siguiente se deja preparado un recordset con todas las categorías.
    $sqlCategoria = "SELECT id, nombre FROM Categoria ORDER BY nombre";
    $select = $conexion->prepare($sqlCategoria);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rsCategoria = $select->fetchAll();
?>

<!-- PARTE HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

    <?php if ($nuevaEntrada) { ?>   <!-- Si es una nueva entrada -->
        <h1>Nueva Ficha de Persona</h1>
    <?php } else { ?>               <!-- Si es una entrada registrada -->
        <h1>Ficha de Persona</h1>
    <?php } ?>

<!-- FORMULARIO -->
<form method='post' action='PGuardar.php'>

<input type = 'hidden' name = 'id' vale = '<?=$id?>' />

<ul>
    <li>
        <b>Nombre:</b>
        <input type = 'text' name = 'nombre' value = '<?=$personaNombre?>' />
    </li>

    <li>
        <b>Apellidos:</b>
        <input type = 'text' name = 'apellidos' value = '<?=$personaApellidos?>' />
    </li>

    <li>
        <b>Teléfono: </b>
        <input type = 'number' name = 'telefono' value = '<?=$personaTelefono?>' />
    </li>

    <li>
        <b>Categoría: </b>
        <select  name='categoriaId'>
            <?php
                foreach ($rsCategoria as $filaCategoria) {
                    $categoriaId        = (int) $filaCategoria["id"];
                    $categoriaNombre    = $filaCategoria["nombre"];


                    if($categoriaId == $personaCategoriaId) $seleccion = " selected='true'";
                    else                                    $seleccion = "";

                    echo "<option value = '$categoriaId' $seleccion>$categoriaNombre</option>";
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
    <a href = 'PEliminar.php=?id=<?=$id?>'>Eliminar Persona.</a>
<?php } ?>

<br />
<br />

<a href = 'PListado.php'>Volver al Listado de Persona.</a>

</body>
</html>