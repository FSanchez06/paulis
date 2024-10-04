<?php 
require_once('../model/clsUsuario.php');
$usuarioModel = new Usuario();
$user = $usuarioModel->getUsuarioById($_GET['id']);

// Check if user data was returned
if (!$user) {
    // Redirect if no user found
    header('Location: ../view/UsuarioView.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="../applications/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white">Menu Principal</div>
            <!-- Add your menu items here -->
            ...
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Navigation Bar -->
            ...
            
            <!-- Main Content -->
            <div class="container-fluid" id="main-content">
                <!-- Confirmation Message -->
                <h2>Eliminar Usuario</h2>
                <?php echo '¿Estás seguro de que deseas eliminar al usuario "<strong>' . htmlspecialchars($user['Nombreusuario'] . ' ' . $user['Apellidousuario']) . '</strong>"?'; ?>

                <!-- Form to confirm deletion -->
                <form action="../controller/UsuarioController.php?action=delete&id=<?php echo htmlspecialchars($user['Idusuario']); ?>" method ="POST">
                    <!-- Delete button -->
                    <button type ='submit' class ='btn btn-danger'>
                        Eliminar
                    </button >
                    <!-- Cancel button -->
                    <?php echo '<a href="../view/UsuarioView.php" class ="btn btn-secondary">Cancelar</a>'; ?>
                </form >
            </div>
        </div>
    </div>

    <!-- Scripts -->
    ...
    
</body>

</html>