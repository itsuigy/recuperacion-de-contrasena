<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    function generateToken() {
        return bin2hex(random_bytes(32));
    }

    if(isset($_POST["send"])) {
        $mail = new PHPMailer(true);

        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pedravi.avi@gmail.com';
        $mail->Password = 'ngzhuxmqqdcfikmc';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('pedravi.avi@gmail.com');

        $email = $_POST["email"];
        $token = generateToken();

        $mysqli = new mysqli('localhost', 'root', 'root', 'passwords');
        if ($mysqli->connect_error) {
            die('Error de conexión: ' . $mysqli->connect_error);
        }

        $stmt = $mysqli->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id);
            $stmt->fetch();

            date_default_timezone_set('America/Chihuahua');

            // Fecha de expiración
            $token_expiration = date('Y-m-d H:i:s', strtotime('+30 minutes'));

            $stmt = $mysqli->prepare("UPDATE usuarios SET token = ?, token_expiracion = ? WHERE id = ?");
            $stmt->bind_param("ssi", $token, $token_expiration, $id);
            $stmt->execute();

            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = 'Hola, hemos recibido una solicitud para recuperar tu contraseña. Si no has sido tú, ignora este mensaje. Si has sido tú, haz clic en el siguiente enlace para recuperar tu contraseña, tienes 30 minutos para ingresar: <a href="http://localhost/recuperacion-de-contrasena/reset.php?token=' . $token . '">Recuperar contraseña</a>';
            $mail->send();

            echo "<script>alert('Se ha enviado un correo electrónico con instrucciones para recuperar tu contraseña.'); document.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('El correo electrónico no se encuentra registrado. Por favor, ingrese un correo válido o inténtalo más tarde.'); document.location.href = 'index.php';</script>";
    }

    $stmt->close();
    $mysqli->close();
}