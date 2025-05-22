<?php
/**
 *  Incluye la configuracion de la base de datos
 *  Incluye el controlador que incluye las funciones utilizadas en el switch
 */
require_once("./config/databaseConfig.php");
require_once("./controllers/studentsController.php");

//Deriva en una función según el método de la petición
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        handleGet($conn);
        break;
    case 'POST':
        handlePost($conn);
        break;
    case 'PUT':
        handlePut($conn);
        break;
    case 'DELETE':
        handleDelete($conn);
        break;
    default:
        //Si no es uno de los metodos anteriores devuelve codigo 405 y un JSON con el mensaje de error
        http_response_code(405);
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>