<?php

//datos de conexion
$host= 'localhost';
$usuario= 'root';
$pass= '';
$bd= 'consultorio';

//crear conexion
$conn= new mysqli($host, $usuario, $pass, $bd);

//verificar si hay errores de conexion
if ($conn -> connect_error){
    die("Error al conectar a la base de datos: " . $conn -> connect_error);
}
?>