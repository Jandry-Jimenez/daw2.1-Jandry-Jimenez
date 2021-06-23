<?php

require_once "DAO.php";

$resultado = DAO::categoriaEliminarPorId($_REQUEST["id"]);

echo json_encode($resultado);