<?php
// Iniciar la sesión si no está iniciada
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Finalmente, destruir la sesión
session_destroy();

// Redirigir a la página de inicio o a cualquier otra página después de cerrar sesión
header("Location: index.php");
exit();
