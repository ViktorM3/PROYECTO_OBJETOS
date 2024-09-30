<?php
include 'conexion_proyecto.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $serie = $_POST['serie'];
    $piezas = $_POST['piezas'];
    $precio = $_POST['precio'];


    $sql = "INSERT INTO partes (nombre, serie, piezas, precio) 
    VALUES ('$nombre', '$serie', '$piezas', '$precio')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado con éxito.";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
}

$conn->close();
?>

<body>
    <form method="post" action="crear_partes.php">
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="serie">Serie:</label>
        <input type="text" name="serie" id="serie" required>
        <br> 
        <label for="piezas">Piezas:</label>
        <input type="text" name="piezas" id="piezas" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" required>
        <br>

        <input type="submit" value="Crear partes">
        <a href="index.php" class="nav-inicio">INICIO</a>

    </form>
    <br>

<style>

        form {
            border: 2px solid #333; 
            padding: 20px;
            width: 400px; 
            margin: 0 auto; 
            background-color: pink;
        }
        label {
            display: block; 
        }
        input {
            width: 100%; 
            margin-bottom: 10px;
        }
    </style>
</body>



