<?php
/**
 * DEBUG MODE
 */

// Habilita la visualización de errores y reporta todos los errores 
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configura los encabezados para permitir solicitudes desde cualquier origen 
header("Access-Control-Allow-Origin: *");
// Configura los métodos HTTP permitidos
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//Permite que el navegador envíe encabezados personalizados
header("Access-Control-Allow-Headers: Content-Type");

// Maneja las solicitudes OPTIONS (preflight) y responde con 200 OK
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Incluye las rutas relacionadas con los estudiantes
require_once("./routes/studentsRoutes.php");
?>