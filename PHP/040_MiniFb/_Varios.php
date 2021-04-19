<?php

declare(strict_types=1);

session_start();

function obtenerPdoConexionBD(): PDO
{
    $servidor = "localhost";
    $bd = "MiniFb";
    $identificador = "root";
    $contrasenna = "";
    $opciones = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
    } catch (Exception $e) {
        error_log("Error al conectar: " . $e->getMessage()); // El error se vuelca a php_error.log
        exit('Error al conectar'); //something a user can understand
    }

    return $conexion;
}

function obtenerUsuario(string $identificador, string $contrasenna): ?array
{
   $pdo= obtenerPdoConexionBD();
   $sql = "SELECT * FROM Usuario WHERE identificador=? AND contrasenna=?";
   $select= $pdo->prepare($sql);
   $select->execute([$identificador, $contrasenna]);
   $rs= $select->fetchAll();
   //RS[0] Es la fila que viene, ya que es un array asociativo
   return  $rs[0];
}

function marcarSesionComoIniciada(array $arrayUsuario)
{
    // Anotar en el post-it como mínimo el id.
    $_SESSION["id"] = $arrayUsuario["id"];
    // Además, podemos anotar todos los datos que podamos querer tener a mano, sabiendo que pueden quedar obsoletos...
    $_SESSION["identificador"] = $arrayUsuario["identificador"];
    $_SESSION["tipoUsuario"] = $arrayUsuario["tipoUsuario"];
    $_SESSION["nombre"] = $arrayUsuario["nombre"];
    $_SESSION["apellidos"] = $arrayUsuario["apellidos"];
}

function haySesionRamIniciada(): bool
{
    // La sesión está iniciada si isset($_SESSION["id"])
    if(isset($_SESSION["id"])) {
        return true;
    }else{
        return false;
    }

}

function intentarCanjearSesionCookie():bool
{
    // TODO Comprobar si hay una "sesión-cookie" válida:
    //   - Ver que vengan DOS cookies "identificador" y "codigoCookie".
    //   - BD: SELECT ... WHERE identificador=? AND BINARY codigoCookie=?
    //   - ¿Ha venido un registro? (Igual que el inicio de sesión)
    //     · Entonces, se la canjeamos por una SESIÓN RAM INICIADA: marcarSesionComoIniciada($arrayUsuario)
    //     · Además, RENOVAMOS (re-creamos) la cookie.
    //   - IMPORTANTE: si las cookies NO eran válidas, tenemos que borrárselas.
    //   - En cualquier caso, devolver true/false.
}

function pintarInfoSesion(){
    if (haySesionRamIniciada()){
        //Esto indica el nombre y apellido del usuario que ha iniciado sesion que ha obtenido de la pagina VerPerfil.php y puede cerrar Session
        echo "<span>Sesión iniciado por <a href='UsuarioPerfilVer.php'> $_SESSION[indentificador]</a>($_SESSION[nombre] $_SESSION[apellidos]) <a href='SessionCerrar.php'>Cerrar Sesión</a></span>";
    } else {
        //Esto redirecciona a la pagina de iniciar sesión
        echo "<a href='SesionInicioFormulario.php>Iniciar Session'</a>";
    }
}
function º()
{
    session_destroy();
    unsset($_SESSION); //Esto es solo por si acaso
}
function generarCookieRecordar(array $arrayUsuario)
{
    // Creamos un código cookie muy complejo (no necesariamente único).
    // Genera una cadena Random de numeros y letras
    $codigoCookie = generarCadenaAleatoria(32);

    // TODO guardar código en BD

    // TODO Para una seguridad óptima convendría anotar en la BD la fecha de caducidad de la cookie y no aceptar ninguna cookie pasada dicha fecha.

    // TODO Enviamos al cliente, en forma de cookies, el identificador y el codigoCookie: setcookie(...) ...
}

function borrarCookieRecordar(array $arrayUsuario)
{
    // TODO Eliminar el código cookie de nuestra BD.

    // TODO Pedir borrar cookie (setcookie con tiempo time() - negativo...)
}

function generarCadenaAleatoria(int $longitud): string
{
    for ($rs= '', $i= 0, $z= strlen($a= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != $longitud; $x = rand(0,$z), $s .= $a[$x], $i++);
    return  $s;
}

// (Esta función no se utiliza en este proyecto pero se deja por si se optimizase el flujo de navegación.)
// Esta función redirige a otra página y deja de ejecutar el PHP que la llamó:
function redireccionar(string $url)
{
    header("Location: $url");
    exit;
}

function syso(string $contenido)
{
    file_put_contents('php://stderr', $contenido . "\n");
}