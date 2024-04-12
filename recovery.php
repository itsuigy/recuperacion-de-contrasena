<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];
    $token = $_SESSION['reset_token'];

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Las contraseñas no coinciden');</script>";
    } else {
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE usuarios SET contrasena = ?, token = NULL WHERE token = ?");
            $stmt->bind_param("ss", $hashedPassword, $token);
            if ($stmt->execute()) {
                echo "<script>alert('Contraseña actualizada exitosamente');</script>";
                header("refresh:1;url=index.php");
            } else {
                echo "<script>alert('Error al actualizar la contraseña');</script>";
            }
        } else {
            echo "<script>alert('Token inválido');</script>";
        }
    }
}