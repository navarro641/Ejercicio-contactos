<?php
# Conexión a la base de datos utilizando PDO
include_once("conexion.php");

# Recibir datos del formulario
$nombre = $_POST['nombre'];
$username = $_POST['username'];
$contrasena = $_POST['contrasena'];

# Insertar nuevo contacto en la base de datos
$sql = "INSERT INTO usuarios (nombre, username, contrasena) VALUES (:nombre, :username, :contrasena)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':username',$username, PDO::PARAM_STR);
$stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "<script>alert ('Usuario agregado exitosamente.')</script>";
    # Redireccionar a la página listar contactos para ver los contactos después de agregarlo
    header('Location: index.php');
} catch (PDOException $e) {
    echo "Error al agregar usuario: " . $e->getMessage();
}