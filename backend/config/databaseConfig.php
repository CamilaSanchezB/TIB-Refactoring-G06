<?php
/**
 * Definicion de variables que contienen las credenciales
 */
$host = "localhost";
$user = "students_user";
$password = "12345";
$database = "students_db";

//Instancia de mysqli
$conn = new mysqli($host, $user, $password, $database);

//Si hubo un error 
if ($conn->connect_error) {
    http_response_code(500); //Devuelve codigo 500 Internal Server Error
    die(json_encode(["error" => "Database connection failed"]));//Envia mensaje de error y detiene la ejecución
}
?>