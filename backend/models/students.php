<?php
/**
 * Ejecuta una consulta que obtiene todos los estudiantes
 * La unica entrada es la conexion a la bd.
 * @param mysqli $conn
 * @return mysqli_result|false Devuelve un objeto mysqli_result en caso de éxito, o false si la consulta falla.
 */
function getAllStudents($conn) {
    $sql = "SELECT * FROM students";
    return $conn->query($sql);
}

/**
 * Obtiene un estudiante a partir de su id
 * @param mysqli $conn
 * @param int $id 
 * @return mysqli_result|false Devuelve un objeto mysqli_result si la consulta tiene éxito, o false si ocurre un error.
 */
function getStudentById($conn, $id) {
    //Se crea la consulta con un marcador de posicion correspondiente al input 
    $sql = "SELECT * FROM students WHERE id = ?";
    //Asegura que la consulta a enviar no debe ser interpretada como codigo
    $stmt = $conn->prepare($sql);
    //Indica tipo de parametro y valor
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}
/**
 * Inserta un estudiante.
 * 
 * @param mysqli $conn
 * @param string $fullname
 * @param string $email
 * @param int $age
 * @return bool Devuelve true si la inserción fue exitosa, false en caso contrario.
 */
function createStudent($conn, $fullname, $email, $age) {
    $sql = "INSERT INTO students (fullname, email, age) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $fullname, $email, $age);
    return $stmt->execute();
}


/**
 * Actualiza estudiante por id.
 * 
 * @param mysqli $conn
 * @param int  $id 
 * @param string $fullname
 * @param string $email
 * @param int $age
 * @return bool Devuelve true si la actualización fue exitosa, false en caso contrario.
 */
function updateStudent($conn, $id, $fullname, $email, $age) {
    $sql = "UPDATE students SET fullname = ?, email = ?, age = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $fullname, $email, $age, $id);
    return $stmt->execute();
}
/**
 * Elimina estudiante por id
 * @param mysqli $conn
 * @param int $id
 * @return bool Devuelve true si la eliminación fue exitosa, false en caso contrario.
 */
function deleteStudent($conn, $id) {
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>