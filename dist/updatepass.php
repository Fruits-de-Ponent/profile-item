
<?php
// Recogemos el dni del trabajador que lo tenemos previamente guardado desde el login.
session_start();
$trabajador=$_SESSION['Trabajador'];
require 'database.php';
// creamos la consulta y la contraseña la recogemos de la pagina anterior
$qry = mysqli_query($con,"UPDATE `login` SET `Password`='".$_POST['password']."' WHERE DNI='$trabajador'");
?>