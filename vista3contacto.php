<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Contactos</title>
</head>
<body>
    
    <h2>Agregar Contacto</h2>
    <form action="crear_contacto.php" method="POST">
        <?php
        $id_usuario=$_SESSION['idUsuario'];
    
        ?>
        <br/>
        <input type="text" name="nombre" placeholder="Nombre del contacto" required>
        <br/>
        <input type="tel" name="telefono" placeholder="Número de telefono" required>
        <br/>
        <input type="email" name="correo" placeholder="Correo" required>
        <br/>
        <input type="submit" value="Agregar Contacto"></input>
    </form>
    <a href="cerrar.php">Salir</a> 
    <br/>
    <a href="bloqueo_vista.php">Bloquear Sesión</a>
</body>
</html>
