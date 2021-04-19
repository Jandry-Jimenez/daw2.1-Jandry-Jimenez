<!DOCTYPE html>
<html>
<head>
	<title>CALCULADORA</title>
</head>
<body>
	<h1>CALCULADORA</h1>
<form action="calculadora-resultado.php" method="post">

	<!-- Aqui el usuario introduciria el primer numero y elegiria la operacion a realizar -->
	<input type="text" name="operando1">
	<select name="codigoOperacion">
		<option>-Elije una operación-</option>
		<option value="sum">Suma</option>
		<option value="res">Resta</option>
		<option value="div">Division</option>
		<option value="mul">Multiplicación</option>
	</select>

</br>
	<!-- Aqui el usuario introducidiria el segundo numero -->
	<input type="text" name="operando2">

	<!--  Esto es el boton de Enviar-->
</br> </br>
	<input type="submit" name="enviar">
</form>
	<!-- <p>&copy; Jandry Jimenez<p> -->

</body>
</html>

  