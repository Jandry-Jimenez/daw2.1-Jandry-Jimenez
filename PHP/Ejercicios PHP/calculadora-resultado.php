<?php

$operando1= (int)$_REQUEST["operando1"];
$operando2= (int)$_REQUEST["operando2"];
$codigoOperacion= $_REQUEST["codigoOperacion"];

$nombreOperacion= Null;

$errorDivCero= false;
$errorOperacionNoValido= false;

//Aqui dependiendo de la operacion que ocurra, se hara una cosa u otra
if ($operacion=="sum") {
	$resultado=(int)$operando1+(int)$operando2;
} else if ($operacion=="res") {
	$resultado=(int)$operando1-(int)$operando2;
} else if ($operacion=="mul") {
	$resultado=(int)$operando1*(int)$operando2;
} else if ($operacion== "div"){
	if($operando2 != 0){
		$resultado=(int)$operando1/(int)$operando2;
	}else{
		$errorDivCero= true;
    } 
}else {
        $errorOperacionNoValida = true;
    }

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; utf-8"/>
	<title>Resultado</title>
</head>

<body>
	<h1>Resultado</h1>
	<?php 
		if ($errorDivCero){
			echo "<p>No se puede divir entre 0</p>";
		} else if (errorOperacionNoValido) {
			echo "<p>Se ha solicitado una operacio invalida.</p>";
		} else {
	?>
				<p>El resultado de <?=$operacion?> entre<?=$operando1?> y <?=$operando2?> es: <?=$resultado?></p>
 		}
	<?php
		}
	 ?>
</body>
</html>x