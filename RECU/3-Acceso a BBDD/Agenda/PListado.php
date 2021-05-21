<!-- PARTE PHP -->
<?php
    require_once "Conexion.php";
    
    $sql = "
        SELECT
            p.id        AS  pId,
            p.nombre    AS  pNombre,
            c.id        AS  cId,
            c.nombre    AS  cNombre
        FROM 
            Persona AS p INNER JOIN Categoria AS c
            ON p.categoriaId = c.Id
        ORDER BY p.nombre

    ";

    $select = $conexion->prepare($sql);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rs = $select->fetchAll();

?>

<!-- PARTE HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<h1>Listado de Personas</h1>

<table border = '1'>
<tr>
    <th>Nombre</th>
    <th>Categoría</th>
</tr>

<?php
    foreach ($rs as $fila) { ?>
        <tr>
            <td><a href = 'PFicha.php?id=<?=$fila["pId"]?>'> <?=$fila["pNombre"]?> </a> </td>
            <td><a href = 'CFicha.php?id=<?=$fila["cId"]?>'> <?=$fila["cNombre"]?> </a> </td>
        </tr>
    
    <?php } ?>
</table>

<br />

<a href = 'PFicha.php?id=-1?>'>Crear Entrada</a>

<br />

<a href = 'CListado.php'>Gestionar Listado de Categorías</a>

</body>
</html>