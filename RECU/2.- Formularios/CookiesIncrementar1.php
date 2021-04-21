<?php
    if (!isset($_COOKIE["acumulado"]) || isset($_REQUEST["reset"])) { // Si NO hay formulario enviado (1ª vez), o piden resetear.
        $acumulado = 0;
    } else { // Sí hay formulario enviado (2ª ó siguientes veces).
        $acumulado = (int) $_COOKIE["acumulado"];

        if(isset($_REQUEST["suma"])) {
            $acumulado++;
        }
    }
//ESTO CREO LA COOKIES Y LO GUARDA
    setcookie("acumulado", $acumulado, time() +30)
?>



<html>

<h1>INCREMENTAR CON COOKIES</h1>
<p><?=$acumulado?></p>

<form method='get'>

    <!-- ESTO ES LA MEMORIA DONDE SE ALMACENA EL VALOR
     <input type='hidden' name='acumulado' value='<?=$acumulado?>'> -->
    
    <input type = 'submit' value = '+1' name = 'suma'>

    <br /><br />

    <input type='submit' value='Resetear' name='reset'>

    <br /><br />

    <a href='<?= $_SERVER["PHP_SELF"] ?>?reset'>Otra manera de resetear</a>
    <span> (Esta parece la mejor)</span>

</form>

</html>