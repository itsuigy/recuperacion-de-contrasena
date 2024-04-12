<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['contrasena']; // Se cambió 'password' a 'contrasena'
    
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "El correo ya está registrado";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, contrasena, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $email);
        if ($stmt->execute()) {
            echo "<script>alert('Usuario registrado exitosamente');</script>";
            header("refresh:1;url=index.php");
        } else {
            echo "<script>alert('Error al registrar usuario');document.location.href = 'index.php';</script>";
        }
    }
}