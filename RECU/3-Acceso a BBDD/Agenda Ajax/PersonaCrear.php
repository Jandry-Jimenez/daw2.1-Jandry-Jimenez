<?php

require_once "DAO.php";

$persona = DAO::personaCrear($_REQUEST["nombre"], $_REQUEST["apellidos"], $_REQUEST["telefono"], false, $_REQUEST["categoriaId"]);

echo json_encode($persona);