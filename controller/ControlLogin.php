<?php
session_start();
include_once '../model/Conexion.php';  // Incluir la clase de conexión

if (isset($_POST['login'])) {
    // Manejar el inicio de sesión
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Crear una instancia de la clase Conexion
    $db = new Conexion();
    $conn = $db->conectar();

    if ($conn) {
        // Llamada al procedimiento almacenado LoginUser
        $sql = "CALL LoginUser(:correo, :clave)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':clave', $clave);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Guardar información del usuario en la sesión
            $_SESSION['usuario_id'] = $usuario['Idusuario'];
            $_SESSION['rol'] = $usuario['Descripcionrol'];  // Guardar el rol en la sesión

            // Redirigir según el rol
            if ($_SESSION['rol'] == 'Administrador') {
                header("Location: ../view/Dashboard.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Correo o contraseña incorrectos";
            header("Location: ../view/LoginRegister.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error de conexión a la base de datos";
        header("Location: ../view/LoginRegister.php");
        exit();
    }
}

// Manejar el registro de usuarios
if (isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $confirmar_clave = $_POST['confirmar_clave'];

    // Verificar que las contraseñas coincidan
    if ($clave !== $confirmar_clave) {
        $_SESSION['error'] = "Las contraseñas no coinciden";
        header("Location: ../view/LoginRegister.php");
        exit();
    }

    // Crear una instancia de la clase Conexion
    $db = new Conexion();
    $conn = $db->conectar();

    if ($conn) {
        // Verificar si el correo ya está registrado
        $sql_check = "SELECT * FROM Usuario WHERE Correousuario = :correo";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bindParam(':correo', $correo);
        $stmt_check->execute();

        if ($stmt_check->rowCount() > 0) {
            $_SESSION['error'] = "El correo ya está registrado";
            header("Location: ../view/LoginRegister.php");
            exit();
        }

        // Llamada al procedimiento almacenado RegisterUser (asignar rol Cliente por defecto)
        $rol_defecto = 1;  // Cliente
        $sql_register = "CALL RegisterUser('TI', 1234, :nombre, 'Apellido', 'Cra 54 N2', '1234567890', :correo, :clave, :rol)";
        $stmt = $conn->prepare($sql_register);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':clave', $clave);
        $stmt->bindParam(':rol', $rol_defecto);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Usuario registrado exitosamente. Ahora puede iniciar sesión.";
            header("Location: ../view/LoginRegister.php");
            exit();
        } else {
            $_SESSION['error'] = "Ocurrió un error durante el registro";
            header("Location: ../view/LoginRegister.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Error de conexión a la base de datos";
        header("Location: ../view/LoginRegister.php");
        exit();
    }
}
?>
