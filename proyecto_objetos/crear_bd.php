<?php
include "conexion_proyecto.php";

$sql = "CREATE DATABASE IF NOT EXISTS proyecto_poo";
if ($conn->query($sql) === TRUE){
    echo " Base de datos creada exitosamente";
} else {
    echo "Error al crear la base de datos" . $conn->error;
}
// Seleccionar base de datos 
$conn->select_db($dbname);
    
// Crear tabala de estudiantes
$sql = "CREATE TABLE IF NOT EXISTS carros (
    id INT(6) SIGNED AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(50) NOT NULL, 
    modelo VARCHAR(50) NOT NULL, 
    serie VARCHAR(10) NOT NULL,
    precio VARCHAR(50) NOT NULL,
    color VARCHAR(50) NOT NULL,
    categoria VARCHAR(50) NOT NULL
    )";
if ($conn->query($sql) === TRUE){
echo "Tabla de carros creada exitosamente.\n";
} else{
    echo"Error al crear tabla carros:" . $conn->error;
}
$conn->close();
?>
