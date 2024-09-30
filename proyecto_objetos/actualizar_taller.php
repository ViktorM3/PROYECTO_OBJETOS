<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'conexion_proyecto.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];

    $sql = "UPDATE taller SET $campo ='$valor' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado con éxito.";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
    $conn->close();
}

?>

<h2>Actualizar taller</h2>

<form action="actualizar.php" method="POST">
    <label for="id">ID del carro a Actualizar:</label>
    <input type="text" id="id" name="id" required><br><br>

    <label for="campo">Campo a Actualizar:</label>
    <select id="campo" name="campo">
        <option value="cliente_id">Mecanico id</option>
        <option value="serie">Serie</option>
        <option value="placa">Placa</option>
        <option value="color">Color</option>
        <option value="area">Area</option>

    </select><br><br>

    <label for="valor">Nuevo Valor:</label>
    <input type="text" id="valor" name="valor" required><br><br>

    <input type="submit" value="Actualizar mecanico">
    <a href="index.php" class="nav-inicio">INICIO</a>

</form>