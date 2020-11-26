<?php
//Esto es un aray de frutas, donde colocamos las frutas que el usuario va a elegir
    $fruta=[
        1=> "manzana",
        6=> "pera",
        16=>"naranja"
    ];
?>

<html>
<head><meta charset='UTF-8'></head>
<body>
<!-- Esto un boton donde al usuario le apareceran las frutas elegir -->
    <select name='frutaId'>
        <option value='-1'>Elige</option>
        <?php
        foreach ($fruta as $id=> $denominacion){
            echo "<option value='$id'>$denominacion</option>\n";
        };
        ?>
    </select>
</body>
</html>