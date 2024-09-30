<?php
include 'conexion_proyecto.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $numero = $_POST['numero'];


    $sql = "INSERT INTO clientes (nombre, apellido, direccion, numero) 
    VALUES ('$nombre', '$apellido', '$direccion', '$numero')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado con éxito.";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
}

$conn->close();
?>

<body>
    <form method="post" action="crear.php">
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
        <br>
        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion" id="direccion" required>
        <br> 
        <label for="numero">Numero:</label>
        <input type="text" name="numero" id="numero" required>
        <br>
  

        <input type="submit" value="Crear mecanico">
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



