<?php

$objeto = json_decode('{"tabla":"lista"}'); // PARA PROBAR QUE FUNCIONA
//$objeto = json_decode($_POST["objeto"], false);

// PARÁMETROS PARA CONECTAR A LA BBDD
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "supermercado";

$conexion = new mysqli($servidor,$usuario,$password,$bd);

if ($conexion->connect_error) {
    die("Error al conectar" + $conexion->connect_error);
} else {
    // CONEXION CORRECTA
}

$sql = "SELECT *  FROM $objeto->tabla";

$resultado = $conexion -> query($sql);
$salida = array(); // ARRAY VACÍO
$salida = mysqli_fetch_all($resultado, MYSQLI_ASSOC); //DEVOLVERA LOS OBJETOS [{objeto1 con fila1}, {objeto2 con fila2}, etc]
echo json_encode($salida);
?>