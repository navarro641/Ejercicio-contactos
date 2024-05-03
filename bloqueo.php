<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_COOKIE['nombre_usuario'])) {
    header('Location: login.php');
    exit;
}

// Verificar si se ha enviado el formulario de desbloqueo de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["password"])) {
        // Verificar la contraseña ingresada
        include_once("conexion.php");
        $username = $_COOKIE['nombre_usuario'];
        $stmt = $conexion->prepare("SELECT contrasena FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $contrasena_correcta = $usuario['contrasena']; // Obtener la contraseña almacenada
            if ($_POST["password"] == $contrasena_correcta) {
                // La contraseña es correcta, redirigir al usuario a la página de contactos
                header('Location: vista3contacto.php');
                exit;
            }
        }
    }
    // Si la contraseña es incorrecta o no se proporcionó, redirigir al formulario de bloqueo con un mensaje de error
    header('Location: bloqueo_vista.php?error=1');
    exit;
}
?>

