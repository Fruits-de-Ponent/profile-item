<?php
/////////////////////////////////////////////////////////////////////////////////////////
//creamos la conexion con la base de datos para nonmbrar este archivo desde cualquier otro y ahorramos muchas lineas de codigo
// Nombre del servidor
$servidor="localhost";
// Usuario de la base de datos (depende las funciones que quiera tener debera tener unos permisos u otros)
$usuario="root";
// Contraseña del usuario de la base de datos
$contraseña="ponent";
// Nombre de la base de datos a la que se conectara
$bd="gestor_vacacional";
//realizamos la conexión
$con=mysqli_connect($servidor,$usuario,$contraseña,$bd);

/////////////////////////////////////////////////////////////////////////////////////////
                ?>