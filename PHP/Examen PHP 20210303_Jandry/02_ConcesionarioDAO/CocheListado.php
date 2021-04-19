<?php
	require_once "_com/database.php";

	//$coches = DAO::cocheObtenerTodas();
?>


<html>

<head>
	<meta charset='UTF-8'>
</head>



<body>

<h1>Listado de Coches</h1>

<table border='1'>

	<tr>
		<th>Nombre</th>
		<th>Modelo</th>
	</tr>

	<?php foreach ($coches as $coche) { ?>
        <tr>
            <td><a href='CocheFicha.php?id=<?=$coche->getId()?>'>    <?=$coche->getNombre()?> </a></td>
            <td><a href='CocheEliminar.php?id=<?=$coche->getId()?>'> (X)                            </a></td>
        </tr>
	<?php } ?>

</table>

<br />

<a href='CocheRebaja.php?'>Rebajar</a>

<br />
<br />

<a href='CocheListado.php'>Gestionar listado de Coches</a>

</body>

</html>