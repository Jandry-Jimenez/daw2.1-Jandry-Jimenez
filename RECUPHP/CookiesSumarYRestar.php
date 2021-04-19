<!--PARTE PHP-->
<?php


setcookie("acumulado")





cookie("acumulado", $acumulado)

?>

<!--PARTE HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sumar y Restar COOKIES</title>
</head>
<body>

<h1>INCREMENTAR Y DECREMENTAR UN NÚMERO (CON COOKIES)</h1>

<h1><?=$acumulado?></h1>

<form method = "get">

<input type = "submit" name = "suma"        value = "+1">
<input type = "hidden" name = "acumulado"   value = "<?=$diferencia?>">
<input type = "submit" name = "resta"       value = "-1">
<input type = "submit" name = "reset"       value = "Resetear">
 
</form>
    
</body>
</html>