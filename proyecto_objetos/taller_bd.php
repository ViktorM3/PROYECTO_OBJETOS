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
$sql = "CREATE TABLE IF NOT EXISTS taller (
    id INT(6) SIGNED AUTO_INCREMENT PRIMARY KEY, 
    cliente_id int(6) UNSIGNED, 
    modelo VARCHAR(50) NOT NULL, 
    serie VARCHAR(10) NOT NULL,
    placa VARCHAR(50) NOT NULL,
    color VARCHAR(50) NOT NULL,
    area VARCHAR(50) NOT NULL
    )";
if ($conn->query($sql) === TRUE){
echo "Tabla de taller creada exitosamente.\n";
} else{
    echo"Error al crear tabla carros:" . $conn->error;
}
$conn->close();
?>
