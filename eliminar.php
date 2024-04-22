<?php
session_start();
include_once("conexion.php");

if (isset($_POST['btneliminar'])) {
    $id_contacto = $_POST['id_contacto'];

    // Eliminar el registro en la tabla contactosxusuario
    $sql_delete_cxu = "DELETE FROM contactosxusuario WHERE id_contacto = :id_contacto";
    $stmt_cxu = $conexion->prepare($sql_delete_cxu);
    $stmt_cxu->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);
    $stmt_cxu->execute();

    // Verificar si se eliminó el registro en contactosxusuario
    $affected_rows_cxu = $stmt_cxu->rowCount();
    if ($affected_rows_cxu > 0) {
        // Si se eliminó correctamente, ahora eliminar el contacto de la tabla contactos
        $sql_delete_contacto = "DELETE FROM contactos WHERE id = :id_contacto";
        $stmt_contacto = $conexion->prepare($sql_delete_contacto);
        $stmt_contacto->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);
        $stmt_contacto->execute();

        // Verificar si se eliminó el contacto
        $affected_rows_contacto = $stmt_contacto->rowCount();
        if ($affected_rows_contacto > 0) {
            
            header("Location: contactos.php");
            exit();
        } else {
            echo "Error al eliminar el contacto de la tabla 'contactos'.";
        }
    } else {
        echo "Error al eliminar en la tabla 'contactosxusuario'.";
    }
}


