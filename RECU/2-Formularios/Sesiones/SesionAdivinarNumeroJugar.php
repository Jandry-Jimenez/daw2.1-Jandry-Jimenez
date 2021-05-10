<!--PARTE PHP -->
<?php

    session_start();

    if (isset($_REQUEST["oculto"])) { // Primera vez con el formulario
        $oculto = (int) $_REQUEST["oculto"];
        $intento = null;
        $numIntentos = 0;
    } else if (!isset($_SESSION["oculto"])) { // Querian continuar, pero no hay sesion; no se puede
        header("Location: SesionCookiesAdivinarNumeroInicio.php");
        exit;
    } else if (isset($_REQUEST["intento"])) { // Segunda y siguientes veces con "$intento"
        $oculto = (int) $_SESSION["oculto"];
        $intento = (int) $_REQUEST["intento"];
        $numIntentos = (int) $_SESSION["numIntentos"] + 1;
    } else { // Querian continuar y es posible porque hay sesion
        $oculto = (int) $_SESSION["oculto"];
        $intento = null;
        $numIntentos = (int) $_SESSION["numIntentos"];
    }
    
    // Aquí se crean las sesiones para usarlas
    $_SESSION["oculto"] = $oculto;
    $_SESSION["numIntentos"] =  $numIntentos;

?>


<!--PARTE HTML -->
<html>
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8" />
</head>
<body>

<center><h1>ADIVINAR EL NÚMERO CON SESIONES</h1></center>

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
        echo "<p>Has adivinado el número. Era $oculto.</p>";
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