<?php
header('Content-Type: application/json');

// Validar parámetros
if (!isset($_GET['paso']) || !isset($_GET['tipo'])) {
    http_response_code(400);
    echo json_encode(['exists' => false, 'error' => 'Parámetros incompletos']);
    exit;
}

$paso = intval($_GET['paso']);
$tipo = strtolower($_GET['tipo']);

// Validar paso y tipo
if ($paso < 1 || $paso > 10 || !in_array($tipo, ['ema', 'secont', 'iso'])) {
    http_response_code(400);
    echo json_encode(['exists' => false, 'error' => 'Paso o tipo inválido']);
    exit;
}

// Ruta del PDF
$rutaPDF = __DIR__ . '/recursos/pdfs/paso' . $paso . '_' . $tipo . '.pdf';

// Verificar si el archivo existe
$exists = file_exists($rutaPDF);

// Generar URL absoluta desde la raíz del servidor
$baseURL = 'http://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$urlAbsoluta = $exists ? $baseURL . 'recursos/pdfs/paso' . $paso . '_' . $tipo . '.pdf' : null;

echo json_encode([
    'exists' => $exists,
    'paso' => $paso,
    'tipo' => $tipo,
    'ruta' => $urlAbsoluta
]);
?>
