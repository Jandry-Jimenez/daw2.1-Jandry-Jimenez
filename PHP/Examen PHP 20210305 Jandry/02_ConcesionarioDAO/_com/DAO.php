<?php

require_once "Clases.php";
require_once "Varios.php";

class DAO
{
    private static $pdo = null;

    private static function obtenerPdoConexionBD()
    {
        $servidor = "localhost";
        $identificador = "root";
        $contrasenna = "";
        $bd = "concesionario";
        $opciones = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        ];

        try {
            $pdo = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
        } catch (Exception $e) {
            error_log("Error al conectar: " . $e->getMessage());
            exit("Error al conectar" . $e->getMessage());
        }
        return $pdo;
    }

    private static function ejecutarConsulta(string $sql, array $parametros): array
    {
        if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();

        $select = self::$pdo->prepare($sql);
        $select->execute($parametros);
        $rs = $select->fetchAll();

        return $rs;
    }

    public static function cochesObtenerTodos(): array
    {
        $datos = [];

        $rs = self::ejecutarConsulta(
            "SELECT * FROM coche ORDER BY matricula",
            []
        );

        foreach ($rs as $fila) {
            $coche = self::cocheCrearDesdeRs($fila);
            array_push($datos, $coche);
        }
        return $datos;
    }

    public static function cocheFicha()
    {
        $id = (int)$_REQUEST["id"];

        if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();
        $rs = self::ejecutarConsulta("SELECT * FROM coche WHERE id=?", [$id]);

        return $rs;
    }

    public static function cocheCrearDesdeRs($fila): Coche
    {
        return new Coche($fila["id"], $fila["matricula"], $fila["modelo"], $fila["precio"]);
    }

    public static function obtenercochePorId(): Coche
    {
        $coche = 0;
        $id = $_REQUEST["id"];

        $rs = self::ejecutarConsulta(
            "SELECT * FROM coche WHERE id=?",
            [$id]
        );

        foreach ($rs as $fila) {
            $coche = self::cocheCrearDesdeRs($fila);
        }
        return $coche;
    }

    //Esto debería poder filtrar los precios de los coches, pero no sé como hacer que funcione
    //No sé si la sintaxis es correcta
    public static function cocheFiltrar( coche $coche): Coche
    {
        $rs = self::ejecutarConsulta("SELECT * FROM coche WHERE precio=?", [$precio]);

        if(!$rs){
        return 0;
        }else{
            return $rs[$getPrecios]["precios"];
        }
    }
}