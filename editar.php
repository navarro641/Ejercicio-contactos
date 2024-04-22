<?php 

include_once("conexion.php");


if (isset($_POST['btneditar'])) {
    if (empty($_POST["nombre"]) || empty($_POST["telefono"]) || empty($_POST["correo"])) {
        echo "Por favor, llene todos los campos.";
    } else {
        $id_contacto = $_POST['id'];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        
        // Preparar la consulta SQL de actualización
        $sql = "UPDATE contactos SET nombre=:nombre, telefono=:telefono, correo=:correo WHERE id=:id_contacto";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redireccionar si la actualización fue exitosa
            header("location: contactos.php");
            exit();
        } else {
            // Mostrar mensaje de error si la actualización falló
            echo "Error al actualizar contacto.";
        }
    }
}
