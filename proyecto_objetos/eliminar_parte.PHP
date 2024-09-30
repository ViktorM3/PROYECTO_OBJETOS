<?php

include 'conexion_proyecto.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['id'];

    // Preparar la consulta SQL para la eliminación.
    $sql = "DELETE FROM partes WHERE id='$nombre'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado con éxito.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

$conn->close();
?>

<body>
    <h2>Eliminar parte</h2>
    <form method="post" action="eliminar_parte.php">
        <label for="id">ID de la parte a eliminar:</label>
        <input type="text" name="id" required>
        <p>Dar ENTER para eliminar</p>
        <a href="index.php" class="nav-inicio">INICIO</a>

    </form>
<style>

        form {
            border: 2px solid #333; /* Cambiar el contorno (borde) del formulario */
            padding: 20px; /* Espaciado interno para separar el contenido del borde */
            width: 400px; /* Ancho del formulario */
            margin: 0 auto; /* Centrar el formulario en la página */
        }
        label {
            display: block; /* Colocar etiquetas en una nueva línea */
        }
        input {
            width: 100%; /* Ancho completo de los campos de entrada */
            margin-bottom: 10px; /* Espacio entre campos de entrada */
        }
    </style>
</body>