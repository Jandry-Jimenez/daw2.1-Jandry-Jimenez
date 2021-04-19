<?php
?>


<html xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset='UTF-8'>
</head>

<body>

<center><h1>Iniciar Sesión</h1></center>
<form method="post" action="SesionInicioComprobar.php" name="iniciosSesion">
        <label>Usuario: </label>
        <input type="text" name="usuario" required/><br /> <br />

        <label>Contraseña: </label>
        <input type="password" name="contrasena" required /><br>
        <button type="submit" name="register" value="register">Entrar</button>

        <label>Recuérdame</label>
        <input type="checkbox" id="recordar" type="submit" value="Recordar">

        </form>

</body>
</html>