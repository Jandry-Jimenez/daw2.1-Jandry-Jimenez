<?php
// CONEXION CON LA BASE DE DATOS

    $servidor = "localhost";
    $bd = "MiniFb";
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
        erro_log ("Error al conectar: ".$e->getMessage()); // El error se vuelca a php_error.log
        exit( 'Error al conectar'.$e->getMessage());
    }

?>