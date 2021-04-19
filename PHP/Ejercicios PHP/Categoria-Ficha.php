<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="Persona-Listado.php">
	<input type="hidden" name="id" value="<?=$id?>" />

	<ul>
		<li>
			<strong>Nombre: </strong>
			<input type="text" name="nombre" value="<?=$categoria_nombre?>"/>
			<input type="text" name="nombre" value="<?=$categoria_telefono?>"/>
			<input type="text" name="nombre" value="<?=$categoria_categoria?>"/>
		</li>
	</ul>

	<input type="submit" name="Enviar">
</body>
</html>
