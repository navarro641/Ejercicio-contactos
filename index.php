<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO DE SESION</title>
</head>
<body>
    <h1>USUARIOS</h1>
    
    <h2>Iniciar Sesion</h2>
    <form action="login.php" method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <br/>
        <input type="password" name="contrasena" placeholder="Ingrese su contrasena" required>
        <br/>
        <input type="submit"  value="Ingresar" name="btningresar"></input>
    </form>
    <a href="registrarse.php">Registrarse</a>  
   
</body>
</html>
