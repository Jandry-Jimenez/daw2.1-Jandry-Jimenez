<!-- PARTE PHP -->
<?php
// CONEXION CON LA BASE DE DATOS

    $servidor = "localhost";
    $identificador = "root";
    $contrasenna = "";
    $bd = "Agenda";
    $opciones = [
        PDO::ATTR_EMULATE_PREPARES      => false, // Modo emulación desactivados para prepares statements "reales"
        PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION, //QUe los errores salgan como excepciones
        PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC, //Modo de Fetch, que queresmo por defecto
    ];
    
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8",$identificador,$contrasenna,$opciones);
    } catch (Exception $e) {
        error_log ("Error al conectar:" .$e -> getMessage());
        exit ('Error al conectar' .$e -> getMessage());
    }

?>