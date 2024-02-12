<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "agenda";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Puedes implementar el código para borrar datos según el campo seleccionado
    // Ejemplo: $sql = "DELETE FROM tu_tabla WHERE campo = :valor";
    // Luego, ejecutas la consulta y muestras un mensaje de éxito o error

    echo "Datos borrados correctamente.";
} catch(PDOException $e) {
    echo "Error al borrar datos: " . $e->getMessage();
}
?>
