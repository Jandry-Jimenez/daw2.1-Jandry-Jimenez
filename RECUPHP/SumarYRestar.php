<!-- PARTE PHP -->
<?php
 
// Comprobar si viene valor acumulado del formulario y, en caso de que no, inicializar a 0.
if (!isset($_REQUEST["acumulado"]) || isset($_REQUEST["reset"])) {
    $acumulado = 0;
    $diferencia = 1;
} else { // Viene valor acumulado. Recogerlo y sumar o restar 1.
    $diferencia = isset($_REQUEST["suma"]) ? 1 : -1;
    $acumulado = (int) $_REQUEST["acumulado"] + $diferencia;
}

?>



<!-- PARTE HTML -->
<html>
<body>
<h1>INCREMENTAR Y DECREMENTAR UN NÚMERO</h1>

<h1><?=$acumulado?></h1>

<form method = 'get'>

    <input type = "hidden"  name = "acumulado" value = <?=$acumulado?>>
    <input type = "submit" value = "+1" name = "suma">
    <input type = "hidden" name = "diferencia" value = <?=$diferencia?>>
    <input type = "submit" value = "-1" name = "resta">

    <input type = "submit" value = "Resetear" name = "reset">
    <br><br>
    <a href = '<?= $_SERVER["PHP_SELF"] ?>?reset'>Otra manera de resetear</a>
</form>

</body>
</html>

