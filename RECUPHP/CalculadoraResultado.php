<?php
    $operando1 = (int)$_REQUEST["operando1"];
    $operando2 = (int)$_REQUEST["operando2"];
    $operacion = $_REQUEST["operacion"];
    $errorEntreCero = false;
    $errorNoValido = false;

    //echo $operando1;
    //echo $operando2;
    //echo $operacion;

    if ($operacion == "sum") {
        $resultado= $operando1+$operando2;

    } else if ($operacion == "res"){
        $resultado= $operando1-$operando2;

    } else if ($operacion == "mul") {
        $resultado= $operando1*$operando2;

    } else if ($operacion == "div"){
        if($operando2 != 0){
            $resultado= $operando1/$operando2;
        } else {
            $errorEntreCero = true;
        }
    } else {
        $errorNoValido = true;
    }
?>

<html>
<body>

<h1>RESULTADO</h1>
    <?php
    if ($errorEntreCero) {
        echo "<p>No se puede dividir entre cero</p>";
    } else if ($errorNoValido) {
        echo "<p>Has intentado hacer una operacion que no está bien</p>";
    } else {
        echo "<p>El resultado es: $resultado </p>";
    }

   ?>
</body>
</html>