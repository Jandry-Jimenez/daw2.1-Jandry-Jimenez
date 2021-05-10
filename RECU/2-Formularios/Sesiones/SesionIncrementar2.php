<!-- PARTE PHP -->
<?php
 
session_start();

// Comprobar si viene valor acumulado del formulario y, en caso de que no, inicializar a 0.
if (!isset($_SESSION["acumulado"]) || isset($_REQUEST["reset"])) {
    $acumulado = 0;
    $incremento = 1;
} else { // Viene valor acumulado. Recogerlo y sumarle 1.
    $incremento = (int) $_REQUEST["incremento"];
    $acumulado = (int) $_SESSION["acumulado"] + (int) $incremento;
}
    $_SESSION["acumulado"]  = $acumulado;

?>

<!-- PARTE HTML -->
<html>
<body>

<h1>INCREMENTAR UN NÚMERO</h1>
<p><?=$acumulado?></p>

<form method = 'get'>
<!--<input type = "number" name = "acumulado" value ='<?=$acumulado?>' placeholder ="Escribe un número"> -->

<input type = "number" name = "incremento" value ='<?=$incremento?>'>
<input type = "submit" value = "Sumar" name = "suma">
<input type = "submit" value = "Resetear" name = "reset">

<br><br>
<a style{text-decoration: none;} href='<?= $_SERVER["PHP_SELF"] ?>?reset'>Otra manera de resetear</a>
</form>

</body>
</html>
