<?php

require_once "Clases.php";
require_once "database.php";

class DAO
{
    private static $pdo = null;

    private static function obtenerPdoConexionBD()
    {
        $servidor = "localhost";
        $identificador = "root";
        $contrasenna = "";
        $bd = "coche"; 
        $opciones = [
            PDO::ATTR_EMULATE_PREPARES => false, // Modo emulación desactivado para prepared statements "reales"
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Que los errores salgan como excepciones.
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // El modo de fetch que queremos por defecto.
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

    // Devuelve:
    //   - null: si ha habido un error
    //   - 0, 1 u otro número positivo: OK (no errores) y estas son las filas afectadas.
    private static function ejecutarActualizacion(string $sql, array $parametros): ?int
    {
        if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();

        $actualizacion = self::$pdo->prepare($sql);
        $sqlConExito = $actualizacion->execute($parametros);

        if (!$sqlConExito) return null;
        else return $actualizacion->rowCount();
    }



    /* CATEGORÍA */

    private static function cocheCrearDesdeRs(array $fila): coche
    {
        return new coche($fila["id"], $fila["matricula"]);
    }

    public static function cocheObtenerPorId(int $id): ?coche
    {
        $rs = self::ejecutarConsulta(
            "SELECT * FROM coche WHERE id=?",
            [$id]
        );
        if ($rs) return self::crearcocheDesdeRs($rs[0]);
        else return null;
    }

    public static function cocheActualizar($id, $matricula)
    {
        self::ejecutarActualizacion(
            "UPDATE coche SET matricula=? WHERE id=?",
            [$matricula, $id]
        );
    }

    public static function cocheCrear(string $matricula)
    {
        self::ejecutarActualizacion(
            "INSERT INTO coche (matricula) VALUES (?)",
            [$matricula]
        );
    }

    public static function cocheObtenerTodas(): array
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
}