<?php

require_once "DAO.php";

$resultado = DAO::personaEliminarPorId($_REQUEST["id"]);

echo json_encode($resultado);