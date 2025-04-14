<?php 
require_once __DIR__ . '/../config/conexion.php';

function registerUser($nombre, $apellido, $email, $telefono, $dni, $password) {
    global $conn;

    // Cifrado de la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Modificar la consulta para incluir la contraseña cifrada
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, telefono, dni, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nombre, $apellido, $email, $telefono, $dni, $hashedPassword); // Incluir password en los parámetros

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function loginUser($email, $password) {
    global $conn;

    // Obtener los datos del usuario (incluyendo la contraseña)
    $stmt = $conn->prepare("SELECT u.*, m.id_medico, u.es_admin, u.password FROM usuarios u LEFT JOIN medicos m ON u.id_usuario = m.id_usuario WHERE email= ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['password'])) {
        session_start();
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['es_admin'] = $usuario['es_admin'];
        $_SESSION['es_medico'] = !empty($usuario['id_medico']);
        return true;
    } else {
        return false;
    }
}