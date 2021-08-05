<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./pruebas/prueba.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>  
<?php 

require_once 'database.php';
session_start();

$dni=$_SESSION["Trabajador"];
// pasamos la imagen a una variable transformandola en binario
$img= addslashes(file_get_contents($_FILES['img']['tmp_name']));
// creamos la consulta para modificar la imagen por defecto que 
$consulta="UPDATE login SET`Imagen`='$img' WHERE DNI= '$dni'";

$result=$con->query($consulta);
if ($result) {
    // lo siguiente que hacemos es guardar la nueva imagen en una variable para mostrarla en el perfil 
    $consulta2 = "SELECT * from login WHERE DNI = '$dni'";
		$result2 = mysqli_query($con, $consulta2);

		while ($mostrar2 = mysqli_fetch_array($result2)) {
				  $mostrar2['Imagen'] ;
			//para poder utilizar estos datos en otras operaciones lo pasamos a una variable
	
			$_SESSION['img'] = $mostrar2['Imagen'];
		}?>
        <!-- si todo es correcto mostraremos un mensaje y redireccionaremos a la pagina principal -->
        <script> swal.fire({
            icon: 'succes',
            title: '¡Foto cambiada!',
            type: 'error',
        }).then(function() {
        window.location = "index.php";
        });</script>
        <?php
	}
    else{

        echo "algo esta mal";
    }
?>
</body>
</html>