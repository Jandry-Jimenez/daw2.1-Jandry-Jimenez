<?php
require_once "_Varios.php";

$conexion = obtenerPdoConexionBD();

$id = $_REQUEST["id"];

$sql = "UPDATE artista SET estrella = (NOT (SELECT estrella FROM artista WHERE id=?)) WHERE id=?";
$sentencia = $conexion->prepare($sql);
$sentencia->execute([$id, $id]);

redireccionar("artistaListado.php");
?>