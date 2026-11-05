<?php
$host = "postgres";      // ← Nombre del servicio en docker-compose, NO localhost
$port = "5432";          // ← Puerto interno del contenedor, NO 3254
$dbname = "deber_1";
$user = "postgres";
$password = "uniandes";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ ¡Conectado a PostgreSQL exitosamente!";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>