<?php

//ESTO ES LA PARTE DE PHP
// Si el formulario es enviado por primera o se le pide resetear
if (!isset($_REQUEST["acumulado"]) || isset($_REQUEST["reset"])){
    $acumulado = 0;
    $diferecnia = 1;
} else { // Si el formulario se ha enviado 2 veces o mas
    $acumulado= (int) $_REQUEST["acumulado"];
    $diferencia= (int) $_REQUEST["diferencia"];
    
    //Se encarga de reaizar las operaciones que vamos hacer de sumar y restar
    if (isset($_REQUEST["resta"])){
        $acumulado= $acumulado - $diferencia;
    } else if (isset($_REQUEST["suma"])){
        $acumulado= $acumulado + $diferencia;
    } else {
        //ERROR
    }
}
?>

<!-- Aqui empieza el codigo en HTML -->
<html>
<!-- Esto hace que se en la pagina se vea el resultado del acumulado-->
<h1><?=$acumulado?></h1>

<form method='get'>
   <!-- Este type esta oculto para que el resultado de acumulado se quede en la pagina y no se vea duplicado en la pagina-->
    <input type='hidden' name='acumulado' value='<?=$acumulado?>' readonly>
    
    <!-- Aqui muestra el resultado de las operaciones echas anteriormente -->
    <input type='submit' value=' - ' name= 'resta'>
    <input type='number' name='diferencia' value='<?=$diferencia?>'>
    <input type='submit' value=' + ' name= 'suma'>
    <br /> <br />
    
    <!-- Este boton esta para que se cumpla la funcion de la primera linea que hemos puesto y as deje el contador por defecto -->
    <input type='submit' value='Resetear' name='reset'>
    <br /> <br />
    <!-- Esto hace que el boton de reset funciona y cargue el formulario por defecto-->
    <a href='<?= $_SERVER['PHP_SELF']?>'></a>
    
</form>
</html>
