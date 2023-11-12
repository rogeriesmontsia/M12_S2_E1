<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
session_unset();
session_destroy();

// Redirige al usuario a la página de inicio de sesión u otra página
header('Location: ../index.php');
exit;
?>
