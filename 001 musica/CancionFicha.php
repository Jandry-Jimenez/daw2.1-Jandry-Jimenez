<?php
	require_once "_Varios.php";

	$conexion = obtenerPdoConexionBD();
	
	// Se recoge el parámetro "id" de la request.
	$id = (int)$_REQUEST["id"];

	// Si id es -1 quieren CREAR una nueva entrada ($nueva_entrada tomará true).
	// Sin embargo, si id NO es -1 quieren VER la ficha de una categoría existente
	// (y $nueva_entrada tomará false).
	$nuevaEntrada = ($id == -1);

	if ($nuevaEntrada) { // Quieren CREAR una nueva entrada, así que no se cargan datos.
		$cancionNombre = "Nombre de la cancion";
	} else { // Quieren VER la ficha de una categoría existente, cuyos datos se cargan.
		$sql = "SELECT nombre FROM cancion WHERE id=?";

        $select = $conexion->prepare($sql);
        $select->execute([$id]); // Se añade el parámetro a la consulta preparada.
        $rs = $select->fetchAll();
		
		 // Con esto, accedemos a los datos de la primera (y esperemos que única) fila que haya venido.
		$cancionNombre = $rs[0]["nombre"];
	}



    $sql = "SELECT * FROM artista WHERE cancionId=? ORDER BY nombre";

    $select = $conexion->prepare($sql);
    $select->execute([$id]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rsArtistaDeLaCancion = $select->fetchAll();


	// INTERFAZ:
    // $nuevaEntrada
    // $cancionNombre
    // $rsPersonasDeLaCategoria
?>



<html>

<head>
	<meta charset='UTF-8'>
</head>



<body>

<?php if ($nuevaEntrada) { ?>
	<h1>Nueva ficha de cancion</h1>
<?php } else { ?>
	<h1>Ficha de cancion</h1>
<?php } ?>

<form method='post' action='CancionGuardar.php'>

<input type='hidden' name='id' value='<?=$id?>' />

<ul>
	<li>
		<strong>Nombre: </strong>
		<input type='text' name='nombre' value='<?=$cancionNombre?>' />
	</li>
</ul>

<?php if ($nuevaEntrada) { ?>
	<input type='submit' name='crear' value='Agregar Canción' />
<?php } else { ?>
	<input type='submit' name='guardar' value='Guardar cambios' />
<?php } ?>

</form>

<br />

<p>Artistas que tienen una canción:</p>

<ul>
<?php
    foreach ($rsArtistaDeLaCancion as $fila) {
        echo "<li>$fila[nombre] $fila[apellidos]</li>";
    }
?>
</ul>

<?php if (!$nuevaEntrada) { ?>
    <br />
    <a href='CancionEliminar.php?id=<?=$id?>'>Eliminar cancion</a>
<?php } ?>

<br />
<br />

<a href='CancionListado.php'>Volver al lista de canciones.</a>

</body>

</html>