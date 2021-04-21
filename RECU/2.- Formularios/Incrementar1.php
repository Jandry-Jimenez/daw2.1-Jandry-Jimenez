<!-- PARTE PHP -->
<?php

// Comprobar si viene valor acumulado del formulario y, en caso de que no, inicializar a 0.
if (!isset($_REQUEST["acumulado"])) {
    $acumulado = 0;
} else { // Viene valor acumulado. Recogerlo y sumarle 1.
    $acumulado = (int) $_REQUEST["acumulado"] + 1;
}

?>

<!-- PARTE HTML -->
<html>
<body>
<h1>INCREMENTAR UN NÚMERO</h1>

<form method = 'get'>
<input type = "number" name = "acumulado" value ='<?=$acumulado?>' placeholder ="Escribe un número"> <!---->
<input type = "submit" name = "suma" value = "Incrementar +1">

</form>
</body>
</html>