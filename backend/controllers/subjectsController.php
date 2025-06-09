<?php

/**
 *    File        : backend/controllers/subjectsController.php
 *    Project     : CRUD PHP
 *    Author      : Tecnologías Informáticas B - Facultad de Ingeniería - UNMdP
 *    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
 *    Date        : Mayo 2025
 *    Status      : Prototype
 *    Iteration   : 3.0 ( prototype )
 */

require_once("./models/subjects.php");

function handleGet($conn)
{
    $input = json_decode(file_get_contents("php://input"), true);

    if (isset($input['id'])) {
        $subject = getSubjectById($conn, $input['id']);
        echo json_encode($subject);
    } else {
        $subjects = getAllSubjects($conn);
        echo json_encode($subjects);
    }
}

function handlePost($conn)
{
    $input = json_decode(file_get_contents("php://input"), true);
    $subjects = getAllSubjects($conn);
    
    /**
     * Filtra el array de materias en un array booleano que verifica si el nombre de la materia ya existe.
     * Si el nombre ya existe, se devuelve un error 409 (conflicto).
     */
    
    $row = array_filter($subjects, function ($subject) use ($input) {
        return strtoupper($subject['name']) === strtoupper($input['name']);
    });

    if (count($row) > 0) {

        echo json_encode(["error" => "La materia '" . $input['name'] . "' ya existe"]);
        http_response_code(409); // Conflicto
    } else {
        $result = createSubject($conn, $input['name']);
        if ($result['inserted'] > 0) {
            echo json_encode([
                "message" => "Materia creada correctamente",

            ]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "No se pudo crear"]);
        }
    }
}

function handlePut($conn)
{
    $input = json_decode(file_get_contents("php://input"), true);

    $result = updateSubject($conn, $input['id'], $input['name']);
    if ($result['updated'] > 0) {
        echo json_encode(["message" => "Materia actualizada correctamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo actualizar"]);
    }
}

function handleDelete($conn)
{
    $input = json_decode(file_get_contents("php://input"), true);

    $result = deleteSubject($conn, $input['id']);
    if ($result['deleted'] > 0) {
        echo json_encode(["message" => "Materia eliminada correctamente"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo eliminar"]);
    }
}
