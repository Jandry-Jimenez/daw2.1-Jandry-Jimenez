<!-- PARTE PHP -->
<?php

    session_start();

    // Comprobar si viene valor acumulado de la sesión y, en caso de que no, inicializar a 0.
    if (!isset($_SESSION["acumulado"]) || isset($_REQUEST["reset"])) {
        $acumulado = 0;
    } else { // Viene valor acumulado. Recogerlo y sumarle 1.
        $acumulado = (int) $_SESSION["acumulado"] + 1;
    }
    // Aqui se guarda en session el valor de "acumulado"
    $_SESSION["acumulado"] = $acumulado;

?>

<!-- PARTE HTML -->
<html>
<body>

<h1>INCREMENTAR UN NÚMERO CON SESSIONES</h1>
<h3><?=$acumulado?></h3>

<form method = 'get'>

<input type = "submit" name = "suma"    value = "Incrementar +1">
<input type = "submit" name = "reset"   value = "Resetear">

</form>

</body>
</html>