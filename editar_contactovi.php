<?php
session_start();
include_once("conexion.php");
$id_contacto=$_POST['id'];



# Consultar la lista de contactos desde la base de datos
$sql = "SELECT * FROM contactos WHERE id=$id_contacto";
$stmt = $conexion->query($sql);
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);

# Cerrar conexión
$conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar contacto</title>
</head>
<body>

    <!-- Formulario para agregar un nuevo contacto -->
    <h2>Editar Contacto</h2>
  
    <form action="editar.php" method="POST">
        <?php foreach ($contactos as $contacto): ?>
            <tr>
            <input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">
            <input type="text" name="nombre"  value="<?php echo $contacto['nombre']?>">
            <br/>
            <input type="tel" name="telefono"  value="<?php echo $contacto['telefono']?>">
            <br/>
            <input type="email" name="correo" value="<?php echo $contacto['correo']?>">
            <br/>
            <input type="submit" value="Editar Contacto" name="btneditar"></input>
        <?php endforeach; ?>
    </form>
    <br>
    <a href="cerrar.php">salir</a>
    
</body>
</html>