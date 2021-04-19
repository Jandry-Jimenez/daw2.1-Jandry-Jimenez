<!DOCTYPE html>
<html>
      <?php
       $nombres= [
       17=> "Gustabo Garcia",
        8=> "Horacio Perez",
        4=> "Pepe Lopez",
        71=> "Tomás García",
        52=> "Algel Dominguez",
        47=> "Ramon Guzman"
        ];
       ?>
       
   <body>
       
       <select name='idPersona'>
           <option value='-1'>Elije</option>
           <?php
           foreach ($nombres as $id => $persona){
               echo "<option value='$id'>$persona</option>\n"
           }
           <?
       </select>
   </body>
        /*<label for= "nombres">Elige una persona: </label>
       <select name="nombres"
       <option value= "17">Gustabo Garcia</option>
       <option value= "71">Tomás García</option>
       <option value= "8">Horacio Peréz</option>
       <option value= "47">Ramon Guzman</option>
       <option value= "52">Angel Dominguez</option>*/
    </html>    