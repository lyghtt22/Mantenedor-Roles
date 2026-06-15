<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);

    echo json_encode([
        'success' => false,
        'message' => 'No autorizado. Debe iniciar sesión.'
    ]);

    exit();
}

require_once __DIR__ . '/../../config/db.php';

try {
    if (!isset($pdo)) {
        throw new Exception('La conexión $pdo no existe. Revisa config/db.php');
    }

    $sql = "SELECT id, nombre, activo 
            FROM roles 
            ORDER BY id ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'success' => true,
        'data' => $roles
    ]);

} catch (Exception $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Error al listar los roles.',
        'error' => $e->getMessage()
    ]);
}