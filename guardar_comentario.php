<?php
// === Guardar comentario enviado desde JavaScript ===

// Permitir peticiones desde el mismo dominio
header("Content-Type: application/json; charset=UTF-8");

// Archivo donde se guardarán los comentarios
$archivo = "comentarios.json";

// Leer el cuerpo del mensaje (JSON)
$input = file_get_contents("php://input");
$data = json_decode($input, true);

if (!$data || !isset($data["nombre"]) || !isset($data["mensaje"])) {
    http_response_code(400);
    echo json_encode(["error" => "Datos inválidos"]);
    exit;
}

// Crear nuevo comentario con fecha
$nuevo = [
    "nombre" => htmlspecialchars($data["nombre"]),
    "mensaje" => htmlspecialchars($data["mensaje"]),
    "fecha" => date("d/m/Y H:i")
];

// Leer los comentarios actuales (si existen)
$comentarios = [];
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    if ($contenido) {
        $comentarios = json_decode($contenido, true) ?? [];
    }
}

// Agregar el nuevo comentario
$comentarios[] = $nuevo;

// Guardar todo nuevamente
if (file_put_contents($archivo, json_encode($comentarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
    echo json_encode(["ok" => true]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "No se pudo guardar el comentario"]);
}
?>
