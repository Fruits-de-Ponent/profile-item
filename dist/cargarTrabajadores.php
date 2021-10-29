<?php
require_once 'database.php';
// le damos el valor a la variable de una consulta para enviarla a la funcion
$sql  = "SELECT * FROM FDP_INFO_EMPLEADOS WHERE ACTIVO='Y' AND CODIGO_EMPRESA<=5";
// ejecutamos las dos funciones

ReadData($sql,$con);
Desactivar($con);

// Creamos la funcion donde generamos la conexion con la base de datos de SAP
function OpenConnection() {  
    try {  
        // asignamos los valores de el servidor, base de datos, usuario y contraseña
        $serverName = "SERVERSAP"; 
        $connectionOptions = array("Database"=>"FRUITSDEPONENT",  
            "Uid"=>"it", "PWD"=>"FdP1234"); 
        //Creamos la conexion y se la asignamos a una variable para ser mas eficientes 
        $conn = sqlsrv_connect($serverName, $connectionOptions);  
        return $conn;
    }  
    catch(Exception $e) {  
        echo("Error!");  
    }  
}  
//Esta función recoge los valores de las otras y ejecuta las consultas.
function ReadData($tsql,$con)  { 
    try {   
        // pasamos a una variable la conexion con SAP
        $conn = OpenConnection();  

        // ejecutamos la conexion y la sentencia sql  
        $getNames = sqlsrv_query($conn, $tsql);  
        // Recoreremos toda la tabla con este bucle
        while($row = sqlsrv_fetch_array($getNames, SQLSRV_FETCH_ASSOC)) {  
            // Recogemos en variables la consulta en sql
            $dni=$row['NIF'];
            $nombre=$row['NOMBRE'];
            $apellido=$row['APELLIDOS'];
            $DNI=$row['NIF'];
            $empresa=$row['CODIGO_EMPRESA'];
            // Cada registro que tiene lo comprueba con la tabla de login(Programa de vacaciones) 
            $consulta="SELECT COUNT(DNI) FROM `login` WHERE DNI='$dni'";
            $qry = mysqli_query($con,$consulta);
            while ($mostrar = $qry->fetch_assoc()) { 
                $registro= $mostrar['COUNT(DNI)'];
            }
            // Si el resultado de la tabla de login es 1 quiere decir que ya existe ese trabajador en la tabla y no es necesario crearlo
            if($registro >=1){
               
            }else{
                // Si no esta introducido en la tabla entrara en este else para hacer un insert con los datos del trabajador
                $qry2="INSERT INTO `login`(`Nombre`, `Apellido`, `DNI`,`Password`, `Empresa`) VALUES ('$nombre','$apellido','$DNI','1234','$empresa')";
                if (mysqli_query($con, $qry2)) {
                    // Si la sentencia es correcta mostrara este mensaje
                    update();
                }else {
                    echo 'errorr!!!';
                }
            }
        }  
        // Cerramos la conexion
         sqlsrv_close($conn); 
    }  
    catch(Exception $e) {  
        echo("Error!");  
    }  
} 
// Esta funcion comprueba que los trabajadores activos sean los mismos en las dos tablas
function Desactivar($con){
    try { 
        $conn = OpenConnection(); 
        // Lo primero es saber qu trabajadores que no estan eliminados en la tabla login
        $sql2="SELECT * FROM login WHERE eliminado=0";
        $result = mysqli_query($con, $sql2);
        while ($mostrar = mysqli_fetch_array($result)) {
            $dni   =  $mostrar['DNI'];
            $apellido   =  $mostrar['Apellido'];
            echo '<br>'.$apellido.' '.$dni.' - ' ;
            // Cogemos los dnis activos de la tabla login y comprobamos que tambien lo esten en latabla sap
            $getNames = sqlsrv_query($conn, "SELECT ACTIVO FROM FDP_INFO_EMPLEADOS WHERE NIF='$dni' ");//  
            while($row = sqlsrv_fetch_array($getNames, SQLSRV_FETCH_ASSOC)) {  
                // si el Registro es nulo es porque se encuentra ese dni activo por lo tanto estara inactivo
                echo $registro= $row['ACTIVO']; 
                
                if($registro=='N'){
                    echo 'Dni del trabajador inactivo'.$dni.' - '.$registro; 
                    // Actualizamos al trabajador de la tbla login introduciendo un 1 en la columna eliminado
                    $qry2="UPDATE `login` SET `eliminado`='1' WHERE DNI='$dni'";
                    if (mysqli_query($con, $qry2)) {
                        update();
                    }
                }else{
                    update();
                }
            }
        }
        //Cerramos la conexion
        sqlsrv_close($conn); 
    }  
    catch(Exception $e) {  
        echo("Error!");  
    } 
}
    function update() {
        header('Location: ./index.php?data=updateok');
    };
?>