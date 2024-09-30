<form action="leer.php" method="POST">
    <label for="filtro">Filtrar por:</label>
    <select id="filtro" name="filtro">
        <option value="todos">Todos</option>
        <option value="nombre">Nombre</option>
        <option value="apellido">Marca/Modelo</option>
        <option value="direccion">Serie</option>
        <option value="numero">Precio</option>
    </select>
    <input type="text" id="valor_filtro" name="valor_filtro" required value="Todos"> 
    <input type="submit" value="Filtrar">
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
                <th>ID</th>
                <th>Nombre</th>
                <th>modelo</th>
                <th>serie</th>
                <th>precio</th>
                <th>color</th>
            </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["nombre"]. "</td>
                <td>" . $row["apellido"]. "</td>
                <td>" . $row["direccion"]. "</td>
                <td>" . $row["numero"]. "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron estudiantes con el criterio de búsqueda especificado.";
    }
}

$conn->close();
?>
