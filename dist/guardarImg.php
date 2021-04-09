<?php 
require_once 'database.php';
session_start();

$dni=$_SESSION["Trabajador"];
$img= addslashes(file_get_contents($_FILES['img']['tmp_name']));

$consulta="UPDATE login SET`Imagen`='$img' WHERE DNI= '$dni'";

$result=$con->query($consulta);

if ($result) {

	echo "<br>Imagen insertada";
/////////////////




////////////////

  
	}
    else{

        echo "algo esta mal";
    }



?>