<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'crud';

//Conexion a la base de datos
$conexion = new mysqli($host, $username, $password, $dbname);
$conexion->set_charset("utf8"); // Establecer el conjunto de caracteres a UTF-8 para evitar problemas con caracteres especiales

//Comprobar errrores de conexion
if ($conexion->connect_error) {
    die("Error de conexion: " . $conexion->connect_error);
}

echo "Conexion exitosa a la base de datos";

?>