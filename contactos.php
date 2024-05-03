<?php
session_start();
include_once ("conexion.php");
$id_usuario = $_SESSION["idUsuario"];
$sql = "SELECT c.id, c.nombre, c.telefono, c.correo FROM contactos AS c
INNER JOIN contactosxusuario AS cu ON cu.id_contacto=c.id
INNER JOIN usuarios AS u ON u.id=cu.id_usuario
WHERE 
u.id=$id_usuario;";
$stmt = $conexion->query($sql);
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);

# Cerrar conexión
$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <style>
        .action-buttons form {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <!-- Lista de contactos -->
    <h1>Contactos Registrados</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>telefono</th>
            <th>Correo</th>
            <th>Gestion</th>

        </tr>
        <?php foreach ($contactos as $key => $contacto): ?>
            <tr>
                <td><?php echo ($key+1); ?></td>
                <td><?php echo $contacto['nombre']; ?></td>
                <td><?php echo $contacto['telefono']; ?></td>
                <td><?php echo $contacto['correo']; ?></td>
                <td class="action-buttons">
                    <form action="eliminar.php" method="POST">
                        <input type="hidden" name="id_contacto" value="<?php echo $contacto['id']; ?>">
                        <button type="submit" name="btneliminar">Eliminar</button>
                    </form>
                    <form action="editar_contactovi.php?upd" method="POST">
                        <input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">
                        <button type="submit">Editar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br />
    <a href="vista3contacto.php">Agregar nuevo contacto</a>
    <br>
    <a href="cerrar.php">Salir</a>
    <br />


</body>

</html>