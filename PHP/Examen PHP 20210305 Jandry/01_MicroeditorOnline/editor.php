<?php
    //PROCESO
    //Aqui se se guardaria lo que el usuario escriba
    if(isset($_REQUEST["oracion"])){
        $oracion= "";
        //Aqui se mostraria lo que el usuario ha escrito, pero no se muy bien como expresarlo
    } elseif(isset(["oracion"])) {?>
        <p>"Lo que has escrito es: <?=$oracion?></p>
    <?php }
    //Aqui devolvería un texto si no se has escrito nada, pero tampoco sé como expresarlo
    else (null !== $oracion){?>
        <p>"Escribe algo"</p>
    <?php}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
</head>
<body>
    <form action="editor.php" method="get">
        <input type="text" name="texto"> <br /><br />
        <input type="submit"  value="Guardar" />
    </form>
    <!-- Esto haría que se reinicie la página por defecto, es decir vacía-->
    <a href='<?= $_SERVER["PHP_SELF"] ?>'>Reiniciar</a>
    
</body>
</html>