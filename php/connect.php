<?php
$host = "mysql.railway.internal";
$dbname = "railway";
$username = "root";
$password = "gDDLTJUMZTJEUygxRkrKiQdPBskacirc";
$port = 3306;

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa!";
?>
