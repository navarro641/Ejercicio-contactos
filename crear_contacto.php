<?php
session_start();
include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"]) || empty($_POST["telefono"]) || empty($_POST["correo"])) {
        echo "Por favor, complete todos los campos.";
    } else {
        $id_usuario = $_SESSION["idUsuario"];

        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];

        $sql_contacto = "INSERT INTO contactos (nombre, telefono, correo) VALUES (:nombre, :telefono, :correo)";
        $stmt_contacto = $conexion->prepare($sql_contacto);
        $stmt_contacto->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt_contacto->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt_contacto->bindParam(':correo', $correo, PDO::PARAM_STR);

        if ($stmt_contacto->execute()) {
            $id_contacto = $conexion->lastInsertId();

            $sql_contactosxusuarios = "INSERT INTO contactosxusuario (id_usuario, id_contacto) VALUES (:id_usuario, :id_contacto)";
            $stmt_contactosxusuarios = $conexion->prepare($sql_contactosxusuarios);
            $stmt_contactosxusuarios->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt_contactosxusuarios->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);

            if ($stmt_contactosxusuarios->execute()) {
                echo "Contacto agregado correctamente.";
                header("location: contactos.php");
            } else {
                echo "Error al agregar el contacto a la tabla 'contactosxusuarios'.";
            }
        } else {
            echo "Error al agregar el contacto.";
        }
    }
}

