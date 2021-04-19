<!DOCTYPE html>
<html>
      <?php
       $nombres= [
       17=> "Gustabo Garcia",
        8=> "Horacio Perez",
        4=> "Pepe Lopez",
        71=> "Tomás García",
        52=> "Ángel Dominguez",
        47=> "Ramón Guzman"
        ];
       ?>
       
   <body>
       <select name='personaId'>
          //Esto es para que cuando el usuario elja un nombre no se quede en blanco
           <option value='-1'>Elija un nombre</option>
           
           //Aqui se mezcla PHP con HTML
           <?php
           foreach ($nombres as $id => $persona){
               echo "<option value= '$id'>$persona</option>\n";
           }
           ?>
       </select>
</body>
</html>    