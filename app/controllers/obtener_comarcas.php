<?php
require_once '../models/Community.php';
// Obtener el id_comunidad de la solicitud GET
$idComunidad = isset($_GET['id_comunidad']) ? $_GET['id_comunidad'] : null;

// Validar el id_comunidad (ajusta según tus necesidades)
if (!is_numeric($idComunidad)) {
    // Manejo de errores, puedes devolver un JSON con un mensaje de error si es necesario
    die('Error: id_comunidad no válido.');
}
try {
    // Instanciar tu modelo y obtener las comarcas asociadas
    $modelo = new Community();
    $comarcas = $modelo->getComarcasByCA($idComunidad);

    // Devolver las comarcas como respuesta JSON
    header('Content-Type: application/json');
    echo json_encode($comarcas);
} catch (Exception $e) {
    // Manejo de errores
    http_response_code(500); // Código de estado HTTP 500
    echo json_encode(['error' => $e->getMessage()]);
}
