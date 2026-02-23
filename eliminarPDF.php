<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "admin") {
    http_response_code(403);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

header('Content-Type: application/json');

// Validar parámetros
if (!isset($_POST['paso']) || !isset($_POST['tipo'])) {
    echo json_encode(['error' => 'Parámetros incompletos']);
    exit;
}

$paso = intval($_POST['paso']);
$tipo = strtolower($_POST['tipo']);

// Validar paso y tipo
if ($paso < 1 || $paso > 10 || !in_array($tipo, ['ema', 'secont', 'iso'])) {
    echo json_encode(['error' => 'Paso o tipo inválido']);
    exit;
}

// Ruta del archivo
$nombreArchivo = "paso{$paso}_{$tipo}.pdf";
$rutaArchivo = __DIR__ . '/recursos/pdfs/' . $nombreArchivo;

// Eliminar archivo si existe
if (file_exists($rutaArchivo)) {
    if (unlink($rutaArchivo)) {
        echo json_encode([
            'success' => true,
            'mensaje' => "PDF de {$tipo} eliminado exitosamente"
        ]);
    } else {
        echo json_encode(['error' => 'Error al eliminar el archivo']);
    }
} else {
    echo json_encode([
        'success' => true,
        'mensaje' => "El archivo no existe"
    ]);
}
?>
