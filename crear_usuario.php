<?php
include_once("conexion.php");

$nombre = $_POST['nombre'];
$username = $_POST['username'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO usuarios (nombre, username, contrasena) VALUES (:nombre, :username, :contrasena)";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt->bindParam(':username',$username, PDO::PARAM_STR);
$stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

try {
    $stmt->execute();
    echo "<script>alert ('Usuario agregado exitosamente.')</script>";
    header('Location: index.php');
} catch (PDOException $e) {
    echo "Error al agregar usuario: " . $e->getMessage();
}