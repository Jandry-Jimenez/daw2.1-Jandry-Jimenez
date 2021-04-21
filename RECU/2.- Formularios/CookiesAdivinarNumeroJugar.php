<!--PARTE PHP -->
<?php

$oculto = (int) $_COOKIE["oculto"];

 if (!isset($_REQUEST["intento"])) { // Primera vez. Solo viene oculto.
     $intento = null;
     $numIntentos = 0;

 } else {
     $intento = (int) $_REQUEST["intento"];
     $numIntentos = (int) $_COOKIE["numIntentos"] + 1;

 }

setcookie ("oculto", $oculto, time() + 10);
setcookie ("intento", $numIntentos, time() + 10);

?>


<!--PARTE HTML -->
<html>
<head>
    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8" />
</head>
<body>

<h1>ADIVINA EL NÚMERO</h1>

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


<form method = "post">
        <h2>Jugador 2: Adivina el número. Llevas <?= $numIntentos ?> intento(s).</h2>
        
        <input type = "number" name = "intento">
        <input type = "submit"                  value = "Intentar">
</form>


</body>
</html>