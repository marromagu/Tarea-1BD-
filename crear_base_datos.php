<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear base de datos
    $sqlCreateDB = "CREATE DATABASE IF NOT EXISTS agenda";
    $conn->exec($sqlCreateDB);

    // Seleccionar la base de datos recién creada
    $conn->exec("USE agenda");

    // Crear tabla
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS tabla_agenda (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(255) NOT NULL,
        apellidos VARCHAR(255) NOT NULL,
        fecha_nacimiento DATE,
        estudios VARCHAR(255),
        telefono VARCHAR(20)
    )";
    $conn->exec($sqlCreateTable);

    echo "Base de datos y tabla creadas correctamente.";
} catch(PDOException $e) {
    echo "Error al crear la base de datos y la tabla: " . $e->getMessage();
}
?>
