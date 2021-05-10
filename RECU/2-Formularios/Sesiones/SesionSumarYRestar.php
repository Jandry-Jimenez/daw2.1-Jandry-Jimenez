<!-- PARTE PHP -->
<?php
 
    session_start();

    // Comprobar si viene valor acumulado de la sesión y, en caso de que no, inicializar a 0.
    if (!isset($_SESSION["acumulado"]) || isset($_REQUEST["reset"])) {
        $acumulado = 0;
        $diferencia = 1;
    } else { // Viene valor acumulado. Recogerlo y sumar o restar 1.
        $diferencia = isset($_REQUEST["suma"]) ? 1 : -1;
        $acumulado = (int) $_SESSION["acumulado"] + $diferencia;
    }

    $_SESSION["acumulado"] = $acumulado;
?>



<!-- PARTE HTML -->
<html>
<body>
<h1>INCREMENTAR Y DECREMENTAR UN NÚMERO CON SESIONES</h1>

<h2><?=$acumulado?></h2>

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

