<?php 
session_start();
include_once("conexion.php");


if (isset($_POST['btningresar'])) {
    if (empty($_POST["username"]) || empty($_POST["contrasena"])) {
        echo "Por favor, llene todos los campos.";
    } else {
        $usu = $_POST["username"];
        $con = $_POST["contrasena"];
        $sql = $conexion->query("SELECT id FROM usuarios WHERE username='$usu' AND contrasena='$con'");
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            $_SESSION['user_id'] = $usuario['id'];
            header("location: vista3contacto.php");
            exit();
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    }
}

