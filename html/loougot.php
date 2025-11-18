<?php
session_start();
session_destroy(); // Destruye toda la sesión (carrito, usuario, etc.)
header('Location: login.php'); // Lo manda al login
exit;
?>