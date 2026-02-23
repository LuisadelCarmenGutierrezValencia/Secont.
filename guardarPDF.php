<?php
session_start();
if (!isset($_SESSION["usuario"]) || $_SESSION["rol"] !== "admin") {
    http_response_code(403);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}

header('Content-Type: application/json');

// Validar parámetros
if (!isset($_POST['paso']) || !isset($_POST['tipo']) || !isset($_FILES['archivo'])) {
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

// Validar archivo
$archivo = $_FILES['archivo'];
if ($archivo['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['error' => 'Error en la carga del archivo: ' . $archivo['error']]);
    exit;
}

// Validar que sea PDF
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $archivo['tmp_name']);
finfo_close($finfo);

if ($mimeType !== 'application/pdf') {
    echo json_encode(['error' => 'El archivo no es un PDF válido. Tipo detectado: ' . $mimeType]);
    exit;
}

// Crear carpeta si no existe
$carpeta = __DIR__ . '/recursos/pdfs';
if (!is_dir($carpeta)) {
    if (!mkdir($carpeta, 0755, true)) {
        echo json_encode(['error' => 'No se pudo crear la carpeta de PDFs']);
        exit;
    }
}

// Verificar que la carpeta es escribible
if (!is_writable($carpeta)) {
    echo json_encode(['error' => 'La carpeta de PDFs no tiene permisos de escritura']);
    exit;
}

// Nombre del archivo
$nombreArchivo = "paso{$paso}_{$tipo}.pdf";
$rutaArchivo = $carpeta . '/' . $nombreArchivo;

// Eliminar archivo anterior si existe
if (file_exists($rutaArchivo)) {
    unlink($rutaArchivo);
}

// Guardar archivo
if (move_uploaded_file($archivo['tmp_name'], $rutaArchivo)) {
    // Verificar que el archivo se guardó correctamente
    if (file_exists($rutaArchivo)) {
        echo json_encode([
            'success' => true,
            'mensaje' => "PDF de {$tipo} guardado exitosamente",
            'ruta' => "recursos/pdfs/{$nombreArchivo}",
            'rutaAbsoluta' => $rutaArchivo,
            'tamano' => filesize($rutaArchivo)
        ]);
    } else {
        echo json_encode(['error' => 'El archivo no se guardó correctamente']);
    }
} else {
    echo json_encode(['error' => 'Error al guardar el archivo en: ' . $rutaArchivo]);
}
?>
