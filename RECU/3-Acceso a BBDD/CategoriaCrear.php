<?php

require_once "DAO.php";

$categoria = DAO::categoriaCrear($_REQUEST["nombre"]);

echo json_encode($categoria);