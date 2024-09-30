<form action="leer_partes.php" method="POST">
    <label for="filtro">Filtrar por:</label>
    <select id="filtro" name="filtro">
        <option value="todos">Todos</option>
        <option value="nombre">Nombre</option>
        <option value="serie">Serie</option>
        <option value="Piezas">Piezas</option>
        <option value="Precip">Precio</option>
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

    if ($filtro === 'todos') {
        $sql = "SELECT * FROM partes";
    } else {
        $sql = "SELECT * FROM partes WHERE $filtro LIKE '%$valor_filtro%'";
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>serie</th>
                <th>piezas</th>
                <th>precio</th>
            </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["nombre"]. "</td>
                <td>" . $row["serie"]. "</td>
                <td>" . $row["piezas"]. "</td>
                <td>" . $row["precio"]. "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron mecanicos con el criterio de búsqueda especificado.";
    }
}

$conn->close();
?>
