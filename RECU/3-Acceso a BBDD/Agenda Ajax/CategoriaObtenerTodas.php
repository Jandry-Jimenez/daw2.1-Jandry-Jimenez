<?php
    require_once "DAO.php";

    $resultado = DAO::categoriaObtenerTodas();

    echo json_encode($resultado);