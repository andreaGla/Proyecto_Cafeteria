<?php
session_start();
// Si el usuario YA está logueado, lo mandamos a la página correcta
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location: admin.php');
    } else {
        header('Location: index.php'); // A la caja registradora
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Cafetería Aroma</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="body-login">

    <div class="login-container">
        <form action="check_login.php" method="POST">
            <h2>☕ Cafetería Aroma ☕</h2>
            <p>Por favor, inicia sesión.</p>
            
            <?php
            // Si el login falla, 'check_login.php' nos regresa aquí con un error
            if (isset($_GET['error'])) {
                echo '<p class="error-login">Usuario o contraseña incorrectos.</p>';
            }
            ?>
            
            <div class="form-grupo">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-grupo">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-login">Entrar</button>
        </form>
    </div>

</body>
</html>