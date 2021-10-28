<?php 
    require_once 'database.php';
    session_start();
    $dni=$_SESSION["Trabajador"];
    $img= addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $consulta="UPDATE login SET`Imagen`='$img' WHERE DNI= '$dni'";
    $result=$con->query($consulta);
    if ($result) {
        $consulta2 = "SELECT * from login WHERE DNI = '$dni'";
        $result2 = mysqli_query($con, $consulta2);
        while ($mostrar2 = mysqli_fetch_array($result2)) {
            $mostrar2['Imagen'];
            $_SESSION['img'] = $mostrar2['Imagen'];
        }
    }
    header('Location: ./index.php')
?>