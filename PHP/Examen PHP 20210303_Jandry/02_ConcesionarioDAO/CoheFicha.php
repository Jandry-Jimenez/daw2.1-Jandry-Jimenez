<?php
	require_once "_com/database.php";

	$conexion = obtenerPdoConexionBD();
	
	$id = (int)$_REQUEST["id"];
	$nuevaEntrada = ($id == -1);
	
	if ($nuevaEntrada) { 
		$cocheModelo = "<introduzca modelo>";
        $cocheMatricula = "<introduzca matricua>";
		$cochePrecio = "<introduzca precio>";
	} else { 
        $sqlcoche = "SELECT * FROM coche WHERE id=?";

        $select = $conexion->prepare($sqlcoche);
        $select->execute([$id]); 
        $rscoche = $select->fetchAll();

        
		$cocheMatricula = $rscoche[0]["matricula"];
        $cocheModelo = $rscoche[0]["modelo"];
		$cochePrecio = $rscoche[0]["precio"];
	}

	
	$sqlcoche = "SELECT id, matricula FROM coche ORDER BY matricula";

    $select = $conexion->prepare($sqlcoche);
    $select->execute([]); 
    $rscoches = $select->fetchAll();

?>

<html>

<head>
	<meta charset='UTF-8'>
</head>
<body>

<?php if ($nuevaEntrada) { ?>
	<h1>Nueva ficha de coche</h1>
<?php } else { ?>
	<h1>Ficha de coche</h1>
<?php } ?>

<form method='post' action='CocheGuardar.php'>

<input type='hidden' name='id' value='<?= $id ?>' />

    <label for='matricula'>matricula</label>
    <input type='text' name='matricula' value='<?=$cocheMatricula ?>' />
    <br/>

    <label for='modelo'> modelo</label>
    <input type='text' name='modelo' value='<?=$cocheModelo ?>' />
    <br/>

    <label for='precio'> Precio</label>
    <input type='text' name='precio' value='<?=$cochePrecio ?>' />
    
    <br/>

<?php if ($nuevaEntrada) { ?>
	<input type='submit' name='crear' value='Crear coche' />
<?php } else { ?>
	<input type='submit' name='guardar' value='Guardar cambios' />
<?php } ?>

</form>

<?php if (!$nuevaEntrada) { ?>
    <br />
    <a href='CocheEliminar.php?id=<?=$id ?>'>Eliminar coche</a>
<?php } ?>

<br />
<br />

<a href='CocheListado.php'>Volver al listado de coches.</a>

</body>
</html>