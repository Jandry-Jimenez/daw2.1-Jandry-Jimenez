<!-- PARTE PHP -->
<?php
    require_once "Conexion.php";

// RECOGE PARÁMETROS

    // Es un SELECT con huecos vacíos
    $sql    = "SELECT id,nombre FROM Categoria ORDER BY nombre";
    // Preparo la conexion por seguridad (Convierte el String a objeto)
    $select = $conexion->prepare($sql);

    // Se ejececuta pasando un array en los huecos vacíos del SELECT
    $select -> execute([]);
    // $select -> execute(["jlopez", "abcd123"]);

    // En esta variables se guardan y muestra los datos (Es un array asociativo, como una "tabla")
    $rs     =  $select->fetchAll();

    foreach ($rs as $fila) {
        $nombre = $fila["nombre"];
        $id = $fila["id"];
        // echo ($nombre.$id); 
    }
?>

<!-- PARTE HTML -->
<html>
<head>
    <meta charset= utf8>
</head>

<body>

<h1>Listado de Categorias</h1>

<table border = '1'>
    <tr>
        <th>Nombre</th>
    </tr>

    <?php foreach ($rs as $fila) { ?>
        <tr>
            <td><a href = 'CFicha.php?id=<?=$fila["id"]?>'><?=$fila["nombre"] ?>    </a></td>
            <td><a href = 'CEliminar.php?id=<?=$fila["id"]?>'>[X]                   </a></td>
        </tr>
    <?php } ?>
</table>
 <br>

 <a href = 'CFicha.php?id=-1'>Crear entrada</a>

 <br />
 <a href = 'PListado.php'>Gestionar Listado de Personas</a>
 
</body>
</html>