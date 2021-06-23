<?php

require_once "Clases.php";
require_once "DAO.php";

$categoria = new Categoria($_REQUEST["id"], $_REQUEST["nombre"]);

$categoria = DAO::categoriaActualizar($categoria);

echo json_encode($categoria);