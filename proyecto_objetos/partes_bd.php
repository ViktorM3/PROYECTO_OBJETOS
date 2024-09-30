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
$sql = "CREATE TABLE IF NOT EXISTS partes (
    id INT(6) SIGNED AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(50) NOT NULL, 
    serie VARCHAR(50) NOT NULL, 
    piezas VARCHAR(10) NOT NULL,
    precio DECIMAL(10,2) NOT NULL
    )";

if ($conn->query($sql) === TRUE){
echo "Tabla de partes creada exitosamente.\n";
} else{
    echo"Error al crear tabla carros:" . $conn->error;
}
$conn->close();
?>
