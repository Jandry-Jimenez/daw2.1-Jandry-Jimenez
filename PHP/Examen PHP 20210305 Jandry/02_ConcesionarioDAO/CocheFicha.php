<?php

require_once "_com/DAO.php";
$id = (int)$_REQUEST["id"];

$nuevaEntrada = ($id== -1);

if($nuevaEntrada =$id=-1){

    $matricula = "<introduzca una matricula>";
    $modelo = "<Introduzca el modelo>";
    $precio= "<Introduzca el precio>";
}else{
    $rs=DAO::cocheFicha();

    $matricula= $rs[0]["matricula"];
    $modelo= $rs[0]["modelo"];
    $precio= $rs[0]["precio"];
}
?>

<html>

<head></head>
<?php if($nueva_Entrada){ ?>
    <h1>Nuevo coche</h1>
<?php }else{ ?>
    <h1>Ficha del coche</h1>
<?php } ?>

<form action="" method="post">
    <ul>
        <li>
            <p>Coche</p>
            <input type="text" name="matricula" value="<?=$matricula?>">
            <input type="text" name="modelo" value="<?=$modelo?>">
            <input type="text" name="precio" value="<?=$precio?>">

        </li>
    </ul>
</form>
</html>