<?php
session_start();
if (!isset($_COOKIE['nombre_usuario'])) {
    header('Location: bloqueo.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloqueo de Sesión</title>
</head>
<body>
    <h1>Bloqueo de Sesión</h1>
    <p>¡Hola, <?php echo $_COOKIE['nombre_usuario']; ?>!</p>
    <p>Para continuar, ingrese su contraseña:</p>
    
    <!-- Formulario para desbloquear sesión -->
    <form action="bloqueo.php" method="POST">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <br/>
        <input type="submit" value="Desbloquear">
    </form>
</body>
</html>
