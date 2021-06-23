<?php

require_once "DAO.php";
require_once "Clases.php";

$persona = new Persona($_REQUEST["id"], $_REQUEST["nombre"], $_REQUEST["apellidos"], $_REQUEST["telefono"], $_REQUEST["estrella"], $_REQUEST["categoriaId"]);

$persona = DAO::personaActualizar($persona);


echo json_encode($persona);