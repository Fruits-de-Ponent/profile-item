<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar imagen</title>
</head>

<body>
    <center>
        <table border="1">
            <thead>
<tr>
<th>Nombre</th>
<th>Imagen</th>
</tr>
            </thead>
            <tbody>
            <?php

require_once("database.php");
$consulta = "SELECT * from tabla_imagen ";
$result=$con->query($consulta);

while($row=$result->fetch_assoc()){
   ?> 
   <tr>
   <td><?php echo $row['Nombre'] ?></td>
   <td><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']);  ?> " /></td>
   </tr>
   
    <?php
    $imagen_encode=$row['Imagen'];
    
}


            ?>
            </tbody>
        </table>
    </center>
    <img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($imagen_encode);  ?> " />
</body>

</html>