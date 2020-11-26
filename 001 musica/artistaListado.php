<?php
    require_once "_Varios.php";

    $conexion = obtenerPdoConexionBD();

    $mostrarSoloEstrellas = isset($_REQUEST["soloEstrellas"]);

    $posibleClausulaWhere = $mostrarSoloEstrellas ? "WHERE a.estrella=1" : "";

    $sql = "
               SELECT
                    a.id        AS aId,
                    a.nombre    AS aNombre,
                    a.apellidos AS aApellidos,
                    a.estrella  AS aEstrella,
                    a.cancionId AS aCancionId,
                    c.id        AS cId,
                    c.nombre    AS cNombre
                FROM
                   artista      AS a INNER JOIN cancion AS c
                   ON a.cancionId = c.id
                $posibleClausulaWhere
                ORDER BY a.nombre
            ";

    $select = $conexion->prepare($sql);
    $select->execute([]); // Array vacío porque la consulta preparada no requiere parámetros.
    $rs = $select->fetchAll();


    // INTERFAZ:
    // $rs
    // $mostrarSoloEstrellas
?>



<html>

<head>
    <meta charset='UTF-8'>
</head>



<body>

<h1>Listado de Artistas</h1>

<table border='1'>

    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Cancion</th>
    </tr>

    <?php
    foreach ($rs as $fila) { ?>
        <tr>
            <td>
                <?php
                    echo "<a href='artistaFicha.php?id=$fila[aId]'>";
                    echo "$fila[aNombre]";
                    if ($fila["aApellidos"] != "") {
                        echo " $fila[aApellidos]";
                    }
                    echo "</a>";

                    if ($fila["aEstrella"]) {
                        $urlImagen = "img/estrellaRellena.png";
                        $parametroEstrella = "estrella";
                    } else {
                        $urlImagen = "img/estrellaVacia.png";
                        $parametroEstrella = "";
                    }
                    echo " <a href='artistaEstrella.php?$parametroEstrella'><img src='$urlImagen' width='16' height='16'></a>";
                ?>
            </td>
            <td><a href= '../001%20musica/artistaFicha.php?id=<?=$fila["aId"]?>'> <?= $fila["aApellidos"] ?> </a></td>
            <td><a href= 'CancionFicha.php?id=<?=$fila["cId"]?>'> <?= $fila["cNombre"] ?> </a></td>
            <td><a href='artistaEliminar.php?id=<?=$fila["aId"]?>'> (X)                      </a></td>
        </tr>
    <?php } ?>

</table>

<br />

<?php if (!$mostrarSoloEstrellas) {?>
    <a href='artistaListado.php?soloEstrellas'>Mostrar artistas favoritos</a>
<?php } else { ?>
    <a href='artistaListado.php'>Mostrar todos los artistas</a>
<?php } ?>

<br />
<br />

<a href='../001%20musica/artistaFicha.php?id=-1'>Agregar un nuevo artista</a>

<br />
<br />

<a href='CancionListado.php'>Gestiona el listado de Canciones</a>

</body>

</html>