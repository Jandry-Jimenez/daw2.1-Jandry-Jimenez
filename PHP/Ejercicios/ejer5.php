<DOCTYPE html>
    <html>
    <head>
        <title>Calculadora</title>
        <link rel="stylesheet" href="../css.css">
    </head>
    <body>
        <center><h1>CALCULADORA</h1></center>
        <div id="caja">
    <form action="calculadoraResultado.php" method="post">

    <!--Primer número-->
        <input type="number" name="operador1" placeholder="Escribe un número">
        <select name="codigoOperacion">
            <option value="" disabled>ELIGE</option>
            <option value="sum">Suma</option>
            <option value="res">Resta</option>
            <option value="mul">Multiplica</option>
            <option value="div">Divide</option>
        </select><br>

    <!-- Segundo número -->
        <input type="number" name="operador2" placeholder="Escribe un número">
        <input type="submit" name="enviar">
    </form>
    </div>
    </body>
    </html>
<?php

