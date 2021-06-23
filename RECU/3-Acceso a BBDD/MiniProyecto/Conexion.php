<?php
// CONEXION CON LA BASE DE DATOS

function ConexionPDO():PDO 
{
    $servidor = "localhost";
    $bd = "Proyecto";
    $identificador = "root";
    $contrasenna = "";
    $opciones = [
        PDO::ATTR_EMULATE_PREPARES  => false, // Modo emulación desactivados para prepares statements "reales"
        PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION, //Que los errores salgan como excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC,//Modo de Fetch, que queremos por defecto
    ];

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8",$identificador,$contrasenna,$opciones);
    } catch (Exception $e) {
        error_log ("Error al conectar: ".$e->getMessage()); // El error se vuelca a php_error.log
        exit( 'Error al conectar'.$e->getMessage());
    }
    return $conexion;
}

function obtenerDatosUsuario(string $identificador, string $contrasenna) : ?array
{
    $conexion = ConexionPDO();
    $sql = "SELECT * FROM Usuario WHERE identificador=? AND contrasenna=?";
    $select = $conexion->prepare($sql);
    $select->execute([$identificador, $contrasenna]);
    $rs = $select->fetchAll();

    // $rs[0] (Primera vez y esperemos que única fila que ha podido venir) Array asociativo.
    return $select->rowCount()==1 ? $rs[0] : null;
    
}

function establecerSesionRAM(array $arrayUsuario)
{
    // Anotar el "id" como minímo, aunque se pueden poner más
    $_SESSION["id"] = $arrayUsuario["id"];

    // Otros datos por si los queremos tener a mano (Se pueden quedar obsoletos)
    $_SESSION["identificador"]  = $arrayUsuario["identificador"];
    $_SESSION["nombre"]         = $arrayUsuario["nombre"];
    $_SESSION["apellidos"]      = $arrayUsuario["apellidos"];

}

function haySesionRAMIniciada() 
{
    // La sesión está iniciada si se cumple esta función
    return isset($_SESSION["id"]);

}

function redireccionar(string $url)
{
    header("Location: $url");
    exit;
}

function pintarSesion()
{
    if(haySesionRAMIniciada()) {
        echo "<span>Sesión iniciada por $_SESSION[nombre] $_SESSION[apellidos]</span>";
    } else {
        echo "<a href = 'SInicio.php'>Iniciar Sesión</a>";
    }
}
   
function obtenerUsuarioCodigoCookie(string $identificador, string $codigoCookie): ?array
{
    $conexion = obtenerDatosUsuario();

    $sql = "SELECT * FROM Usuario WHERE identificador=? AND codigoCookie=?";
    $sql = $conexion->prepare();
    $select->execute([$identificador, $codigoCookie]);
    $rs = $select->fetchAll();

    return $select->rowCount()==1 ? $rs[0]: null;
}


function generarCadenaAleatoria()
{
    for ($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789') -1; $i != $longitud; $x = rand(0,$z), $s .= $a[$x], $i++)
    return $s;
}

function establecerSesionCookie()
{
    // Creamos un código cookie muy complejo (no necesariamente único).
    $codigoCookie = generarCadenaAleatoria(32); // Número aleatorio
}

function actualizarCodigoCookieEnBD(?string $codigoCookie)
{
    $conexion = ConexionPDO();
    $sql = "UPDATE Usuario SET codigoCookie=? WHERE id=?";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([$codigoCookie, $_SESSION["id"]]); // TODO Comprobar si va bien con null
    
    // TODO Para una seguridad óptima convendría anotar en la BD la fecha de caducidad de la cookie y no aceptar ninguna cookie pasada dicha fecha.
}


function intentarCanjearSesionCookie()
{
    if (isset($_COOKIE["identificador"]) && isset($_COOKIE["codigoCookie"])) {
        $arrayUsuario = obtenerUsuarioCodigoCookie($_COOKIE["identificador"], $_COOKIE["codigoCookie"]);

        if($arrayUsuario){
            establecerSesionRAM($arrayUsuario);
            establecerSesionCookie($arrayUsuario); // Para re-generar el numerito.
            return true;
        } else {  // Venían cookies pero los datos no estaban bien.
            borrarCookie(); // Las borramos para evitar problemas.
            return false;
        }
    }  else { // No vienen ambas cookies.
        borrarCookie(); // Las borramos por si venía solo una de ellas, para evitar problemas.
        return false;
    } 
}

function borrarCookie()
{
    setcookie("identificador",  "", time() -3600); // Tiempo en el pasado, para (pedir) borrar la cookie.
    setcookie("codigoCookie",   "", time() -3600); // Tiempo en el pasado, para (pedir) borrar la cookie.
}

function destruirSesionRAMYCookie()
{
    session_destroy();
    actualizarCodigoCookieEnBD(Null);
    borrarCookie();
    unset($_SESSION); //Por si acaso
}

function syso(string $contenido)
{
    file_put_contents ('php://stderr', $contenido . "\n");
}


?>