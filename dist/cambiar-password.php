<?php
    require 'database.php';
    session_start();
    $trabajador = $_SESSION['Trabajador'];
    $nuevaPass = $_POST['passwordOne'];
    echo $trabajador, $nuevaPass;
    mysqli_query($con, "UPDATE `login` SET `Password`='$nuevaPass' WHERE DNI='$trabajador'");
    header('Location: ./index.php?data=passok');
?>