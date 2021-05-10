<!-- PARTE PHP -->
<?php

    require_once "Conexion.php";

    // Se cogerá el parámetro "id" de la request
    $id = (int)$_REQUEST["id"];

    // Si "id = -1", quieren crear una nueva Entrada("$nuevaEntrada", será true)
    // Si "id" no es igual a -1, quieren ver una ficha de una categría existente
    // ("$nuevaEntrada" será false)
    $nuevaEntrada = ($id == -1);

    if ($nuevaEntrada) { // Quieren crear un anueva entrada, asi que no se cargarán datos
        $categoriaNombre = "Introduzca un nombre";
    } else { // Quiere ver la ficha de una categoría existente, cuyos datos se cargarán
        $sql = "SELECT nombre FROM Categoria Where id=?";

        $select = $conexion->prepare($sql);
        $select->execute([$id]); // Se añade el parámetro a la consulta preparada.
        $rs = $select->fetchAll();

        // Con esto, accedems a los datos de la primero (Y esperemos que única), fila que haya venido
        $categoriaNombre = $rs[0]["nombre"]; //Preguntar esto en clase
    }

?>

<!-- PARTE HTML -->
<html>
<head>
    <meta charset = 'UTF-8'>
</head>

<body>

<?php if ($nuevaEntrada) { ?>
    <h1>Nueva Entrada</h1>
<?php } else { ?>
    <h1>Ficha de Categoría</h1>
<?php } ?>

<!-- FORMULARIO -->
<form method = 'post' action = 'CGuardar.php'>
<input type = 'hidden' name = 'id' value = '<?=$id?>'/>

<!-- CREAR UNA CATEGORÍA -->
<ul>
    <li>
        <strong>Nombre:</strong>
        <input type = 'text' name = 'nombre' value = '<?=$categoriaNombre?>'/>
    </li>
</ul>

<?php if ($nuevaEntrada) {?>
    <input type = 'submit' name = 'crear'   value = 'Crear Categoría'/>
<?php } else { ?>
    <input type = 'submit' name = 'guardar' value = 'Guardar Cambios'/>
    <?php } ?>
</form>

<?php if ($nuevaEntrada) { ?>
    <br />
    <a href = 'CEliminar.php?id=<?=$id?>'>Eliminar Categoría</a>
<?php } ?>

<br />

<a href = 'CListado.php?id'>Volver al listado de Categorías</a>


</body>

</html>