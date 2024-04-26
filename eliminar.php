<?php
session_start();
include_once("conexion.php");

if (isset($_POST['btneliminar'])) {
    $id_contacto = $_POST['id_contacto'];

    $sql_delete_cxu = "DELETE FROM contactosxusuario WHERE id_contacto = :id_contacto";
    $stmt_cxu = $conexion->prepare($sql_delete_cxu);
    $stmt_cxu->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);
    $stmt_cxu->execute();

    $affected_rows_cxu = $stmt_cxu->rowCount();
    if ($affected_rows_cxu > 0) {
        $sql_delete_contacto = "DELETE FROM contactos WHERE id = :id_contacto";
        $stmt_contacto = $conexion->prepare($sql_delete_contacto);
        $stmt_contacto->bindParam(':id_contacto', $id_contacto, PDO::PARAM_INT);
        $stmt_contacto->execute();

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


