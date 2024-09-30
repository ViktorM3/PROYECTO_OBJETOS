<?php
include "conexion_proyecto.php";
include "index.php";

$sql = "INSERT INTO clientes (nombre, apellido, direccion, telefono)
VALUES ('Juan' , 'Martha' , 'el salado', '3126988567' ),
       ('Manuel' , 'Juarez' , 'Totonilco' , '5598641532'),
       ('Jose' , 'Perez' , 'Nuevo Leon' , '5489632145' )";

if ($conn->query($sql) === TRUE) {
    echo "Datos de ejemplo insertados exitosamente";
} else {
    echo "Error al insertar datos de ejemplo: " . $conn->error;
}

$conn->close();
?>
