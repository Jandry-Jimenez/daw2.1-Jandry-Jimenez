<?php

require_once "_com/DAO.php";
require_once "_com/Clases.php";

$coche = Coche($_REQUEST["id"], $_REQUEST["matricula"], $_REQUEST["modelo"], $_REQUEST["precio"])

$precio = DAO::cocheFiltrar($coche);