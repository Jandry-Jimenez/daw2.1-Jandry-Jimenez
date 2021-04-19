<!-- PARTE PHP -->
<?php
 
// Comprobar si viene valor acumulado del formulario y, en caso de que no, inicializar a 0.
if (!isset($_REQUEST["acumulado"])) {
    $acumulado = 0;
    $incremento = 1;
} else { // Viene valor acumulado. Recogerlo y sumarle 1.
    $incremento = (int) $_REQUEST["incremento"];
    $acumulado = (int) $_REQUEST["acumulado"] + $incremento;
}

?>

<!-- PARTE HTML -->
<html>
<body>
<h1>INCREMENTAR UN NÚMERO</h1>

<form method = 'get'>
<input type = "number" name = "acumulado" value ='<?=$acumulado?>' placeholder ="Escribe un número"> <!---->
<input type = "number" name = "incremento" value ='<?=$incremento?>' placeholder ="número a sumar"> <!---->
<input type = "submit" value = "Incrementar">

</form>
</body>
</html>
