<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Datos</title>
</head>
<body>
    <h2>Insertar Datos</h2>

    <form action="insertar_datos.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br>

        <label for="estudios">Estudios:</label>
        <input type="text" id="estudios" name="estudios"><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono"><br>

        <input type="submit" value="Insertar">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "agenda";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si los datos del formulario están presentes
    if (isset($_POST['nombre'], $_POST['apellidos'], $_POST['fecha_nacimiento'], $_POST['estudios'], $_POST['telefono'])) {
        // Recoger datos del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $estudios = $_POST['estudios'];
        $telefono = $_POST['telefono'];

        // Preparar la consulta de inserción
        $sql = "INSERT INTO tabla_agenda (nombre, apellidos, fecha_nacimiento, estudios, telefono) 
                VALUES (:nombre, :apellidos, :fecha_nacimiento, :estudios, :telefono)";
        
        $stmt = $conn->prepare($sql);

        // Asignar valores a los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':estudios', $estudios);
        $stmt->bindParam(':telefono', $telefono);

        // Ejecutar la consulta
        $stmt->execute();

        echo "Datos insertados correctamente.";
    } else {
        echo "Error: No se han recibido todos los datos del formulario.";
    }
} catch(PDOException $e) {
    echo "Error al insertar datos: " . $e->getMessage();
}
?>



