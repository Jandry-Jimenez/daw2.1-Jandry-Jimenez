<?php

require_once "_com/DAO.php";
$coches= DAO::cochesObtenerTodos();

?>



<html>
<head>
	<meta charset='UTF-8'>
</head>
<body>
<center><h1 style="color: orange">Listado de coches</h1></center>

<table border="0">

    <tr>
        <th style="color: orange">Matricula</th>
        <th style="color: orange">Modelo</th>
        <th style="color: orange">Precio</th>
    </tr>
		<?php 
		foreach ($coches as $coche){?>

         <tr>
             <td><a style="color: black" href="CocheFicha.php?id=<?=$coche->getId()?>"> <?=$coche ->getMatricula()?></a></td>
             <td><a style="color: black" href="CocheFicha.php?id=<?=$coche->getId()?>"> <?=$coche ->getModelo()?></a></td>
             <td><a style="color: black" href="CocheFicha.php?id=<?=$coche->getId()?>"> <?=$coche ->getPrecio()?></a></td>
         </tr>
       <?php }?>

</table> <br>

<input type="text" id="cocheFiltrarPrecio" placeholder="Ver menores a este precio"><br><br>
<button id="botonFiltrar">Filtrar Precio</button>
<button id="botonNoFiltrar">Quitar Filtrado</button>
</body>
</html>