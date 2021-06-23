

<?php



include("Conexion.php");

$buscador= mysqli_query("SELECT * FROM Canciones WHERE nombre LIKE LOWER('%".$_POST["buscar"]."%')"); 

$numero = mysqli_num_rows($buscador); ?>

<h5>Resultados encontrados (<?php echo $numero; ?>):</h5>

<?php while($resultado = mysqli_fetch_assoc($buscador)){ ?>


<p><?php echo $resultado["nombre"]; ?> - <?php echo $resultado["tema"] ?></p>


<?php } ?>

<label class="form-label">Palabra a buscar</label>
<input type="text" class="form-control" id="buscar" name="buscar">

<input onkeyup="buscando($('#buscar_1').val());" type="text" id="buscar_1" name="buscar_1">

<button onclick="buscando($('#buscar').val());">Buscar</button>

<div id="datosBuscados"></div>

<script type="text/javascript">
        function buscando(buscar)
        {
          var parametros = {"buscar":buscar};
          $.ajax({
            data:parametros,
            type: 'POST',
            url: 'buscador.php',
            success: function(data) {
              document.getElementById("datosBuscados").innerHTML = data;
            }
          });
        }
     //   buscando();
</script>


<table>
  <tr>
    <td>id</td>
    <td>nombre</td>
    <td>ArtistaId</td>
  </tr>

<?php
$sql = "SELECT * FROM Canciones";
$result = mysqli_query($conexion, $sql); 

while($mostrar=$mysqli_fetch_array($result)){
 ?>

  <tr>
    <td><?php echo $mostrar['id'] ?></td>
    <td><?php echo $mostrar['nombre'] ?></td>
    <td><?php echo $mostrar['ArtistaId'] ?></td>
  </tr>

<?php } ?>
</table>