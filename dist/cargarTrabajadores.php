<?php

  

$sql  = "SELECT * FROM FDP_INFO_EMPLEADOS WHERE ACTIVO='Y' AND CODIGO_EMPRESA<=5";

ReadData($sql);

function ConnectionLogin(){
    $servidor="localhost";
    $usuario="root";
    $contraseña="ponent";
    $bd="gestor_vacacional";
    //con esto podemos printar los dias trabajados exrtraidos de una funcion.       
    //realizamos la conexión
    $con=mysqli_connect($servidor,$usuario,$contraseña,$bd);
}
function OpenConnection()  
{  
    try  
    {  
        $serverName = "SERVERSAP"; 
        $connectionOptions = array("Database"=>"FRUITSDEPONENT",  
            "Uid"=>"it", "PWD"=>"FdP1234"); 
        $conn = sqlsrv_connect($serverName, $connectionOptions);  
        return $conn;
    }  
    catch(Exception $e)  
    {  
        echo("Error!");  
    }  
}  
//Esta función genera ejecuta una consulta cualquiera
    function ReadData($tsql)  
{ 
    require_once 'database.php';
    try  
    {  
        $conn = OpenConnection();  
        $tsql ;  
        $getNames = sqlsrv_query($conn, $tsql);  
        /*if ($getNames == FALSE)  
            die(FormatErrors(sqlsrv_errors()));  */
        $productCount = 0; 
        ?>
        <table class="table table-bordered table-hover">
        <thead class="thead-light"><tr>
        <th class="text-center text-dark-custom">Apellido</th>
        <th class="text-center text-dark-custom">Nombre</th>
        <th class="text-center text-dark-custom">NIF</th>
        <th class="text-center text-dark-custom">activo</th>
        <th class="text-center text-dark-custom">CODIGO_EMPRESA</th>

    </tr>
        </thead>
        <tbody>
        <?php 
        while($row = sqlsrv_fetch_array($getNames, SQLSRV_FETCH_ASSOC))  
        {  
            $dni=$row['NIF'];
            $nombre=$row['NOMBRE'];
            $apellido=$row['APELLIDOS'];
            $DNI=$row['NIF'];
            $empresa=$row['CODIGO_EMPRESA'];
            $consulta="SELECT COUNT(DNI) FROM `login` WHERE DNI='$dni'";
            $qry = mysqli_query($con,$consulta);
            while ($mostrar = $qry->fetch_assoc()) { 
                $registro= $mostrar['COUNT(DNI)'];
            }
            if($registro >=1){
                echo $dni.'Ya existe';
            }else{
                $qry2;
                $qry2="INSERT INTO `login`(`Nombre`, `Apellido`, `DNI`,`Password`, `Empresa`) VALUES ('$nombre','$apellido','$DNI','1234','$empresa')";
                if (mysqli_query($con, $qry2)) {
                    echo 'Inseeeert!!!';
                }else {
                    echo 'errorr!!!';
                
                }
            }
            ?>
            <tr>
            <td><?php echo $row['APELLIDOS'] ?></td>
            <td><?php echo $row['NOMBRE'] ?></td>
            <td><?php echo $row['NIF'] ?></td>
            <td><?php echo $row['ACTIVO'] ?></td>
            <td><?php echo $row['CODIGO_EMPRESA'] ?></td>

            </tr>
        </tbody>
            <?php
            $productCount++;  
        }  
        sqlsrv_free_stmt($getNames);  
        sqlsrv_close($conn); 

    }  
    catch(Exception $e)  
    {  
        echo("Error!");  
    }  
} 



?>