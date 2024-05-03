<?php
include_once("conexion.php");

if(isset($_POST['nombre'], $_POST['username'], $_POST['contrasena'])) {
    // Obtén los datos del formulario
    $nombre = $_POST['nombre'];
    $username = $_POST['username'];
    $contrasena = $_POST['contrasena'];

    // Verifica si el nombre de usuario ya está registrado
    $stmt_username_ocupado = $conexion->prepare("SELECT COUNT(*) AS count FROM usuarios WHERE username = :username");
    $stmt_username_ocupado->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt_username_ocupado->execute();
    $resultado = $stmt_username_ocupado->fetch(PDO::FETCH_ASSOC);

    // Si count es mayor que 0, significa que el nombre de usuario ya está registrado
    if($resultado['count'] > 0) {
        echo "<script>alert('El nombre de usuario ya está ocupado. Por favor, elija otro nombre de usuario.');</script>";
        echo "<script>window.location.href = 'registrarse.php';</script>";
        exit;
        
    } else {

        
            // El nombre de usuario no está registrado, procede con la inserción
            $sql = "INSERT INTO usuarios (nombre, username, contrasena) VALUES (:nombre, :username, :contrasena)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
    
            try {
                $stmt->execute();
                echo "<script>alert('Usuario agregado exitosamente.');</script>";
                header('Location: index.php');
                exit;
            } catch (PDOException $e) {
                echo "Error al agregar usuario: " . $e->getMessage();
            }
        }
    }
else {
    echo "Todos los campos son obligatorios.";
}
?>
