<!--PARTE PHP -->
<?php

    if (isset($_REQUEST["oculto"])) { // Primera vez con el formulario
        $oculto = (int) $_REQUEST["oculto"];
        $intento = null;
        $numIntentos = 0;
    } else if (!isset($_COOKIE["oculto"])) { // Querian continuar, pero no hay cookie; no se puede
        header("Location: CookiesAdivinarNumeroInicio.php");
        exit;
    } else if (isset($_REQUEST["intento"])) { // Segunda y siguientes veces con "$intento"
        $oculto = (int) $_COOKIE["oculto"];
        $intento = (int) $_REQUEST["intento"];
        $numIntentos = (int) $_COOKIE["numIntentos"] + 1;
    } else { // Querian continuar y es posible porque hay cookie
        $oculto = (int) $_COOKIE["oculto"];
        $intento = null;
        $numIntentos = (int) $_COOKIE["numIntentos"];
    }
    
    // Aqui se generan las cookies para usarlas
    setcookie("oculto", $oculto, time() + 30);
    setcookie("numIntentos", $numIntentos, time() + 30);
?>


<!--PARTE HTML -->
<html>
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8" />
</head>
<body>

<center><h1>ADIVINAR EL NÚMERO CON COOKIES</h1></center>

<h2>ADIVINA EL NÚMERO</h2>

<!-- Condiciones cuando el usuario este adivinando -->
<?php
    if($intento == null) {
        // No informamos de nada, el juego acaba de empezar.
    } else if($intento < $oculto) {
        echo "<p>El número que buscas en mayor.</p>";

    } else if($intento > $oculto) {
        echo "<p>El número que buscas es menor.</p>";
    } else {
        echo "<h2>¡GENIAL! Has adivinado el número. Era $oculto.</h2>";
        echo "<p> Has gastado $numIntentos</p>";
    }
?>

<!--FORMULARIO -->
<h3>Jugador 2: Adivina el número. Llevas <?= $numIntentos ?> intento(s).</h3>

<form method = "post">        
    <input type = "number" name = "intento">
    <input type = "submit" value = "Intentar">

</form>

</body>
</html>