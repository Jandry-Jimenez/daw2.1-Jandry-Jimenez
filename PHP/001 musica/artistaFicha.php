<?php
	require_once "_Varios.php";

	$conexion = obtenerPdoConexionBD();
	
	// Se recoge el parámetro "id" de la request.
	$id = (int)$_REQUEST["id"];

	// Si id es -1 quieren CREAR una nueva entrada ($nueva_entrada tomará true).
	// Sin embargo, si id NO es -1 quieren VER la ficha de una persona existente
	// (y $nueva_entrada tomará false).
	$nuevaEntrada = ($id == -1);
	
	if ($nuevaEntrada) { // Quieren CREAR una nueva entrada, así que no se cargan datos.
		$artistaNombre = "<introduzca nombre>";
        $artistaApellidos = "<introduzca apellidos>";
		$artistaEdad = "<introduzca edad>";
        $artistaEstrella = false;
		$artistaCancionId = 0;
	} else { // Quieren VER la ficha de una persona existente, cuyos datos se cargan.
        $sqlArtista = "SELECT * FROM artista WHERE id=?";

        $select = $conexion->prepare($sqlArtista);
        $select->execute([$id]); // Se añade el parámetro a la consulta preparada.
        $rsArtista = $select->fetchAll();

        // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
		$artistaNombre = $rsArtista[0]["nombre"];
        $artistaApellidos = $rsArtista[0]["apellidos"];
		$artistaEdad = $rsArtista[0]["edad"];
        $artistaEstrella = ($rsArtista[0]["estrella"] == 1); // En BD está como TINYINT. 0=false, 1=true. Con esto convertimos a booolean.
		$artistaCancionId = $rsArtista[0]["cancionId"];
	}

	
	
	// Con lo siguiente se deja preparado un recordset con todas las categorías.
	
	$sqlCanciones = "SELECT id, nombre FROM cancion ORDER BY nombre";

    $select = $conexion->prepare($sqlCanciones);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rsCanciones = $select->fetchAll();



    // INTERFAZ:
    // $artistaNombre
    // $artistaApellidos
    // $artistaEdad
    // $artistaEstrella
    // $artistaCategoriaId
    // $rsCategorias
?>




<html>

<head>
	<meta charset='UTF-8'>
</head>



<body>

<?php if ($nuevaEntrada) { ?>
	<h1>Nueva ficha de artista</h1>
<?php } else { ?>
	<h1>Ficha de artista</h1>
<?php } ?>

<form method='post' action='artistaGuardar.php'>

<input type='hidden' name='id' value='<?= $id ?>' />

    <label for='nombre'>Nombre</label>
    <input type='text' name='nombre' value='<?=$artistaNombre ?>' />
    <br/>

    <label for='apellidos'> Apellidos</label>
    <input type='text' name='apellidos' value='<?=$artistaApellidos ?>' />
    <br/>

    <label for='edad'> Edad</label>
    <input type='number' name='edad' value='<?=$artistaEdad ?>' />
    <br/>

    <label for='cacionId'>Cancion</label>
    <select name='cancionId'>
        <?php
            foreach ($rsCanciones as $filaCancion) {
                $cancionId = (int) $filaCancion["id"];
                $cancionNombre = $filaCancion["nombre"];

                if ($cancionId == $artistaCancionId) $seleccion = "selected='true'";
                else                                     $seleccion = "";

                echo "<option value='$cancionId' $seleccion>$cancionNombre</option>";

                // Alternativa (peor):
                // if ($cancionId == $artistaCancionId) echo "<option value='$cancionId' selected='true'>$cancionNombre</option>";
                // else                                     echo "<option value='$cancionId'                >$cancionNombre</option>";
            }
        ?>
    </select>
    <br/>

    <label for='estrella'>Favorito</label>
    <input type='checkbox' name='estrella' <?= $artistaEstrella ? "checked" : "" ?> />
    <br/>

    <br/>

<?php if ($nuevaEntrada) { ?>
	<input type='submit' name='crear' value='Agregar Artista' />
<?php } else { ?>
	<input type='submit' name='guardar' value='Guardar cambios' />
<?php } ?>

</form>

<?php if (!$nuevaEntrada) { ?>
    <br />
    <a href='artistaEliminar.php?id=<?=$id ?>'>Eliminar artistas</a>
<?php } ?>

<br />
<br />

<a href='artistaListado.php'>Volver al lista de artistas.</a>

</body>

</html>