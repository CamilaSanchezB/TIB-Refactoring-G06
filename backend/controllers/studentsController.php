<?php
//Incluye el modelo estudiantes
require_once("./models/students.php");

/**
 * Obtiene alumnos.
 * 
 * Si existe un parametro id no vacio en la url obtiene el estudiante correspondiente
 * Sino obtiene todos los estudiantes
 * Convierte cada fila del resultado en un array asociativo (clave => valor) y lo transforma en un JSON
 * @param mysqli $conn
 */
function handleGet($conn)
{
    if (isset($_GET['id'])) {
        $result = getStudentById($conn, $_GET['id']);
        echo json_encode($result->fetch_assoc());
    } else {

        $result = getAllStudents($conn);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    }
}

/**
 * Crea alumno.
 * 
 * Obtiene el cuerpo crudo de la solicitud en formato JSON y lo convierte en un array 
 * Si puede crear el estudiante devuelve un mensaje de exito, sino codigo 500 y el mensaje de error
 * @param mysqli $conn
 * 
 */
function handlePost($conn)
{
    $input = json_decode(file_get_contents("php://input"), true);
    if (createStudent($conn, $input['fullname'], $input['email'], $input['age'])) {
        echo json_encode(["message" => "Estudiante agregado correctamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo agregar"]);
    }
}

/**
 * Edita alumno.
 * 
 * Obtiene el cuerpo crudo de la solicitud en formato JSON y lo convierte en un array 
 * Require el id del estudiante y los nuevos valores
 * Si puede editarlo  devuelve un mensaje de exito, sino codigo 500 y el mensaje de error
 * @param mysqli $conn
 * 
 */
function handlePut($conn)
{
    $input = json_decode(file_get_contents("php://input"), true);
    if (updateStudent($conn, $input['id'], $input['fullname'], $input['email'], $input['age'])) {
        echo json_encode(["message" => "Actualizado correctamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo actualizar"]);
    }
}
/**
 * Elimina alumno.
 * 
 * Obtiene el id por JSON
 * Invoca deleteStudent.
 * Si resulta exitoso devuelve un mensaje de exito, sino codigo 500 y mensaje de error
 * @param mysqli $conn
 * 
 */
function handleDelete($conn)
{
    $input = json_decode(file_get_contents("php://input"), true);
    if (deleteStudent($conn, $input['id'])) {
        echo json_encode(["message" => "Eliminado correctamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo eliminar"]);
    }
}
