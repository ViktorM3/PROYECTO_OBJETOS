<form action="leer_taller.php" method="POST">
    <label for="filtro">Filtrar por:</label>
    <select id="filtro" name="filtro">
        <option value="todos">Todos</option>
        <option value="cliente_id">Mecánico</option>
        <option value="modelo">Modelo</option>
        <option value="serie">Serie</option>
        <option value="placa">Placa</option>
        <option value="color">Color</option>
        <option value="area">Área</option>
    </select>
    <input type="text" id="valor_filtro" name="valor_filtro" required value="Todos"> 
    <input type="submit" value="Filtrar">
    <a href="index.php" class="nav-inicio">INICIO</a>
</form>

<?php
include 'conexion_proyecto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filtro = $_POST["filtro"];
    $valor_filtro = $_POST["valor_filtro"];

    // Preparar la consulta
    if ($filtro === 'todos') {
        $sql = "SELECT t.*, c.nombre, c.apellido FROM taller t JOIN clientes c ON t.cliente_id = c.id";
    } else {
        $sql = "SELECT t.*, c.nombre, c.apellido FROM taller t JOIN clientes c ON t.cliente_id = c.id WHERE $filtro LIKE '%$valor_filtro%'";
    }
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Mecánico</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Placa</th>
                <th>Color</th>
                <th>Área</th>
            </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["nombre"] . ' ' . $row["apellido"] . "</td>
                <td>" . $row["modelo"]. "</td>
                <td>" . $row["serie"]. "</td>
                <td>" . $row["placa"]. "</td>
                <td>" . $row["color"]. "</td>
                <td>" . $row["area"]. "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron carros con el criterio de búsqueda especificado.";
    }
}

$conn->close();
?>
