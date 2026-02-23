<?php
/**
 * Script de inicialización - Crear tabla evaluaciones_control
 */

require "conexion.php";

try {
    $conexion->exec("
        CREATE TABLE IF NOT EXISTS evaluaciones_control (
            id INT AUTO_INCREMENT PRIMARY KEY,
            usuario VARCHAR(100),
            nombre VARCHAR(150),
            area VARCHAR(100),
            calificacion INT,
            aprobado BOOLEAN DEFAULT 0,
            bloqueado BOOLEAN DEFAULT 1,
            autorizado BOOLEAN DEFAULT 0,
            fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_usuario_fecha (usuario, fecha)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    echo "<div style='background:#d4edda; color:#155724; padding:20px; border-radius:5px; margin:20px;'>";
    echo "<h3>✅ Tabla creada exitosamente</h3>";
    echo "<p>La tabla <strong>evaluaciones_control</strong> ha sido creada correctamente.</p>";
    echo "<p><a href='index.php' style='background:#28a745; color:white; padding:10px 20px; text-decoration:none; border-radius:3px;'>Volver al inicio</a></p>";
    echo "</div>";
    
} catch (PDOException $e) {
    echo "<div style='background:#f8d7da; color:#721c24; padding:20px; border-radius:5px; margin:20px;'>";
    echo "<h3>❌ Error al crear la tabla</h3>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicialización - SECONT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f4f6f8; padding:40px 20px;">
<div class="container" style="max-width:600px;">
    <h1 style="color:#437e42; text-align:center; margin-bottom:30px;">Inicialización SECONT</h1>
</div>
</body>
</html>
