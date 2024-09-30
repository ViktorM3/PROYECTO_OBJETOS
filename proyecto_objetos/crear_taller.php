<?php
include 'conexion_proyecto.php'; 

// Verificar si se recibió un POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $modelo = $_POST['modelo'];
    $serie = $_POST['serie'];
    $placa = $_POST['placa'];
    $color = $_POST['color'];
    $area = $_POST['area'];

    // Insertar nuevo registro de carro
    $sql = "INSERT INTO taller (cliente_id, modelo, serie, placa, color, area) 
            VALUES ('$cliente_id', '$modelo', '$serie', '$placa', '$color', '$area')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado con éxito.";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
}

// Obtener clientes para el menú desplegable
$result = $conn->query("SELECT id, nombre, apellido FROM clientes");
?>

<body>
    <form method="post" action="crear_taller.php">
        <br>
        <label for="cliente_id">Mecanico:</label>
        <select name="cliente_id" id="cliente_id" required>
            <option value="">Seleccionar Mecanico</option>
            <?php while ($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['nombre'] . ' ' . $row['apellido']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <br>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" required>
        <br>
        <label for="serie">Serie:</label>
        <input type="text" name="serie" id="serie" required>
        <br> 
        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" required>
        <br>
        <label for="color">Color:</label>
        <input type="text" name="color" id="color" required>
        <br>
        
        <label for="area">Área:</label>
        <select id="area" name="area">
            <option value="Suspension">Suspensión</option>
            <option value="Frenos">Frenos</option>
            <option value="Pintura">Hojalatería y pintura</option>
        </select><br><br>    

        <input type="submit" value="Crear carro">
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
    input, select {
        width: 100%; 
        margin-bottom: 10px;
    }
</style>
</body>

<?php
$conn->close();
?>
