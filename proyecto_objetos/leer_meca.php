<form action="leer_meca.php" method="POST">
    <label for="filtro">Filtrar por:</label>
    <select id="filtro" name="filtro">
        <option value="todos">Todos</option>
        <option value="nombre">Nombre</option>
        <option value="apellido">Apellido</option>
        <option value="direccion">Direccion</option>
        <option value="telefono">Telefono</option>
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
        $sql = "SELECT * FROM clientes";
    } else {
        $sql = "SELECT * FROM clientes WHERE $filtro LIKE '%$valor_filtro%'";
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>direccion</th>
                <th>telefono</th>
            </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["nombre"]. "</td>
                <td>" . $row["apellido"]. "</td>
                <td>" . $row["direccion"]. "</td>
                <td>" . $row["telefono"]. "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron mecanicos con el criterio de búsqueda especificado.";
    }
}

$conn->close();
?>
