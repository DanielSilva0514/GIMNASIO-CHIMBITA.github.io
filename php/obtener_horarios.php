<?php
include ('conexion_be.php');

// Verifica si se recibió el ID del entrenador
if (!isset($_GET['entrenador_id']) || empty($_GET['entrenador_id'])) {
    http_response_code(400); // Código de error 400: solicitud incorrecta
    echo json_encode(['error' => 'No se recibió el ID del entrenador.']);
    exit;
}

$entrenador_id = intval($_GET['entrenador_id']); // Sanitiza el valor recibido

// Inicializa la respuesta
$response = [];

try {
    // Consulta a la base de datos
    $query = "SELECT hora FROM hora WHERE id_entrenador = $entrenador_id";
    $result = $conexion->query($query);

    // Verifica si la consulta tuvo éxito
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $response['horas'][] = $row['hora'];
            }
        } else {
            // No se encontraron horarios para ese entrenador
            $response['horas'] = [];
        }
    } else {
        // Error en la consulta SQL
        throw new Exception("Error en la consulta: " . $conexion->error);
    }
} catch (Exception $e) {
    // Manejo de errores en el servidor
    http_response_code(500); // Código de error 500: error interno del servidor
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}

// Envía la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
exit;
