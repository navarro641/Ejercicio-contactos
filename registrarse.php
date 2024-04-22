<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO DE USUARIO</title>
</head>
<body>
    <h1>USUARIOS</h1>
    
    <!-- Formulario para agregar un nuevo contacto -->
    <h2>Registro</h2>
    <form action="crear_usuario.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <br>
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <br/>
        <input type="password" name="contrasena" placeholder="Ingrese su contrasena" required>
        <br/>
        <input type="submit" value="Registrarse"></input>
    </form>
    <br>
    <a href="cerrar.php">salir</a>
    
</body>
</html>