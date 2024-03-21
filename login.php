<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["contrasena"];
        
        if (password_verify($password, $hashedPassword)) {
            $_SESSION["user"] = $email;
            if (!isset($_SESSION["id"])) {
                session_regenerate_id();
                $_SESSION["id"] = session_id();
            }
            header("Location: inicio.php");
            exit();
        } else {
            echo "Usuario o contraseña incorrectos";
        }
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}