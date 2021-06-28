
<?php
session_start();
$trabajador=$_SESSION['Trabajador'];
require 'database.php';
$qry = mysqli_query($con,"UPDATE `login` SET `Password`='".$_POST['password']."' WHERE DNI='$trabajador'");


?>