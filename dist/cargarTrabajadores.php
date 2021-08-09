<?php
error_reporting(0);
    require_once 'database.php';
// le damos el valor a la variable de una consulta para enviarla a la funcion
$sql  = "SELECT * FROM FDP_INFO_EMPLEADOS WHERE ACTIVO='Y' AND CODIGO_EMPRESA<=5";
// ejecutamos las dos funciones
ReadData($sql,$con);
Desactivar($con);

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
function ReadData($tsql,$con)  { 
    try  
    {  
        // pasamos a una variable la conexion con SAP
        $conn = OpenConnection();  
        $tsql ;  
        $getNames = sqlsrv_query($conn, $tsql);  
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
                    echo 'Actualizado!';
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
        // sqlsrv_free_stmt($getNames);  
        // sqlsrv_close($conn); 

    }  
    catch(Exception $e)  
    {  
        echo("Error!");  
    }  
} 
function Desactivar($con){
    
    try  
    { 
    $conn = OpenConnection(); 
    $sql2="SELECT * FROM login WHERE eliminado=0";
    $result = mysqli_query($con, $sql2);
    while ($mostrar = mysqli_fetch_array($result)) {
        $dni   =  $mostrar['DNI'];
        $getNames = sqlsrv_query($conn, "SELECT COUNT(NIF) FROM FDP_INFO_EMPLEADOS WHERE NIF='$dni' AND ACTIVO='Y'");  
        $productCount = 0; 
        while($row = sqlsrv_fetch_array($getNames, SQLSRV_FETCH_ASSOC))  
        {  
            $registro= $row['COUNT(NIF)']; 
            if($registro >=1){
                $qry2;
                $qry2="UPDATE `login` SET `eliminado`='1' WHERE DNI='$dni'";
                if (mysqli_query($con, $qry2)) {
                    echo 'Actualizado';
                }else {
                    echo 'errorr!!!';
                }
              
            }else{
                 
            }
            $productCount++;  
        }
    }
    sqlsrv_close($conn); 

    }  
    catch(Exception $e)  
    {  
        echo("Error!");  
    } 

}


?>