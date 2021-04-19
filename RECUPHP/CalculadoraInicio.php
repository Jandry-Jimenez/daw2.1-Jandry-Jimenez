<html>
<body>

<h1>CALCULADORA</h1>
<form action="CalculadoraResultado.php">
<input type= "number" name="operando1" placeholder="Número 1"> <br>
<input type="number" name="operando2" placeholder="Número 2"> 

<select name="operacion">
    <option value="" disabled>Elige una operación</option>
    <option value="sum">Suma</option>
    <option value="res">Resta</option>
    <option value="mul">Multiplicación</option>
    <option value="div">División</option>
</select>

<input type="submit" name="enviar">


</body>
</html>