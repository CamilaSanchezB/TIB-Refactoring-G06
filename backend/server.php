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

function obtenerRutas() {
    $nombresRutas = [];

    // glob para buscar todos los archivos que terminen con 'Routes.php' en la carpeta dada.
    // glob devuelve un arreglo con las rutas completas a esos archivos.
    foreach (glob(__DIR__ . '/routes' . '/*Routes.php') as $archivo) {
        // Extrae sólo el nombre del archivo, sin la ruta ni la extensión '.php'
        $nombreBase = basename($archivo, '.php');

        // Verifica si el nombre del archivo termina con la palabra 'Routes'
        if (substr($nombreBase, -strlen('Routes')) === 'Routes') {
            $nombre = substr($nombreBase, 0, -strlen('Routes'));
            $nombresRutas[] = $nombre;
        }
    }
    return $nombresRutas;
}
$rutas = obtenerRutas();
$ruta_solicitada = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[4];
if (in_array($ruta_solicitada, $rutas)) {
    // Si la ruta solicitada está en la lista de rutas, se carga el archivo correspondiente
    require_once(__DIR__ . '/routes/' . $ruta_solicitada . 'Routes.php');
} else {
    // Si no se encuentra la ruta, se devuelve un error 404
    http_response_code(404);
    echo json_encode(["error" => "Ruta no encontrada"]);
}

?>