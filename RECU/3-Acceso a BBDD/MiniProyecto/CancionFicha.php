<!-- PARTE PHP -->
<?php

    require_once "Conexion.php";
    $conexion = ConexionPDO();

    // Se cogerá el parámetro "id" de la request
    $id = (int)$_REQUEST["id"];
    $nuevaEntrada = ($id == -1);

    if ($nuevaEntrada) { // Quieren crear un anueva entrada, asi que no se cargarán datos
        $cancionNombre = "Nombre";
    } else { // Quiere ver la ficha de una categoría existente, cuyos datos se cargarán
        $sql = "SELECT nombre FROM Canciones Where id=?";

        $select = $conexion->prepare($sql);
        $select->execute([$id]); // Se añade el parámetro a la consulta preparada.
        $rs = $select->fetchAll();
        $cancionNombre = $rs[0]["nombre"]; 
    }

?>

<!-- PARTE HTML -->
<html>
<head>
    <meta charset = 'UTF-8'>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
<div class = "contenedor">
 
 <header class="cabecera">  <!-- Cabecera -->
   <h1>SoundPlay<img src="img/logo.png" alt=40px" width="40px"></h1>
 </header>

<?php if ($nuevaEntrada) { ?>
    <h1>Nueva Entrada</h1>
<?php } else { ?>
    <h1>Ficha de Canciones</h1>
<?php } ?>

<!-- FORMULARIO -->
<form method = 'post' action = 'CancionGuardar.php'>
<input type = 'hidden' name = 'id' value = '<?=$id?>'/>

<!-- CREAR UNA CATEGORÍA -->
<ul>
    <li>
        <strong>Nombre:</strong>
        <input type = 'text' name = 'nombre' value = '<?=$cancionNombre?>'/>
    </li>
</ul>

<?php if ($nuevaEntrada) {?>
    <input type = 'submit' name = 'crear'   value = 'Crear Canción'/>
<?php } else { ?>
    <input type = 'submit' name = 'guardar' value = 'Guardar Cambios'/>
    <?php } ?>
</form>

<?php if (!$nuevaEntrada) { ?>
    <br />
    <a href = 'CancionEliminar.php?id=<?=$id?>'>Eliminar Categoría</a>
<?php } ?>

<br />

<a href = 'CancionesListado.php?id'>Volver al lista de Canciones</a>

</div
</body>

</html>