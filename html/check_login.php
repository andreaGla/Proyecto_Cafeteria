<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Conectar a la base de datos
        $db = new PDO('sqlite:db/cafeteria.db');
        
        // Preparar la consulta para buscar al usuario
        // Ojo: Esto es inseguro para un proyecto real (se usa password_hash), 
        // pero funciona con las contraseñas 'admin123', 'Max123' que creamos.
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = ? AND password = ?');
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // ¡Usuario encontrado! Guardamos sus datos en la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirigir según el rol
            if ($user['role'] == 'admin') {
                header('Location: admin.php');
            } else { // 'cajero'
                header('Location: index.php'); // A la caja registradora
            }
            exit;

        } else {
            // Error, no se encontró el usuario o la contraseña es incorrecta
            header('Location: login.php?error=1');
            exit;
        }

    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
?>