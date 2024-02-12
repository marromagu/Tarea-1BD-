<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "agenda";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Seleccionar y mostrar los datos en forma de tabla
    $stmt = $conn->query("SELECT nombre, apellidos, fecha_nacimiento, estudios, telefono FROM tabla_agenda");

    echo "<h2>Datos en la Agenda</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Apellidos</th><th>Fecha de Nacimiento</th><th>Estudios</th><th>Teléfono</th></tr>";

    // Bucle para mostrar resultados
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['apellidos']}</td>";
        echo "<td>{$row['fecha_nacimiento']}</td>";
        echo "<td>{$row['estudios']}</td>";
        echo "<td>{$row['telefono']}</td>";
        echo "</tr>";
    }

    echo "</table>";

} catch(PDOException $e) {
    echo "Error al mostrar datos: " . $e->getMessage();
}
?>
