<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($newPassword !== $confirmPassword) {
        echo "Las contraseñas no coinciden";
    } else {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE usuarios SET contrasena = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashedPassword, $email);
            if ($stmt->execute()) {
                echo "Contraseña actualizada exitosamente";
                header("refresh:1;url=index.php");
            } else {
                echo "Error al actualizar la contraseña";
            }
        } else {
            echo "El correo electrónico no está registrado";
        }
    }
}
?>
