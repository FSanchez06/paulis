
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../applications/css/login.css">
    <title>Login</title>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<p class='success-message'>{$_SESSION['message']}</p>";
        unset($_SESSION['message']);
    }
    if (isset($_SESSION['error'])) {
        echo "<p class='error-message'>{$_SESSION['error']}</p>";
        unset($_SESSION['error']);
    }
    ?>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="../controller/ControlLogin.php" method="POST">
                <h1>Crear Cuenta</h1>
                <span>Ingresa tus datos para crear una cuenta</span>
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="clave" placeholder="Contraseña" required>
                <input type="password" name="confirmar_clave" placeholder="Confirmar contraseña" required>
                <button type="submit" name="register">Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="../controller/ControlLogin.php" method="POST">
                <h1>Iniciar Sesión</h1>
                <span>Inicia sesión con tus datos</span>
                <input type="email" name="correo" placeholder="Correo" required>
                <input type="password" name="clave" placeholder="Contraseña" required>
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button type="submit" name="login">Iniciar Sesión</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>¡Hola de nuevo!</h1>
                    <p>Ingresa tus datos para comenzar a navegar</p>
                    <button class="hidden" id="login">Iniciar Sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hola, Bienvenido</h1>
                    <p>Regístrate con tus datos para comenzar a navegar nuestra web</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../applications/js/form.js"></script>
</body>
</html>