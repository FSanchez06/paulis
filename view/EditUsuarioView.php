<?php 
require_once('../model/clsUsuario.php');
$usuarioModel = new Usuario();
$user = $usuarioModel->getUsuarioById($_GET['id']);
$roles = $usuarioModel->getAllRoles(); // Get all roles for the dropdown
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../applications/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-white">Menu Principal</div>
            <div class="list-group list-group-flush">
                <a href="../view/UsuarioView.php" class="list-group-item list-group-item-action bg-dark text-white" id="crud-usuario">
                    <i class="fas fa-user"></i> Usuarios
                </a>
                <a href="../view/RolView.php" class="list-group-item list-group-item-action bg-dark text-white" id="crud-rol">
                    <i class="fas fa-users"></i> Roles
                </a>
                <a href="../view/ProductoView.php" class="list-group-item list-group-item-action bg-dark text-white" id="crud-producto">
                    <i class="fas fa-box"></i> Productos
                </a>
                <a href="../view/PedidoView.php" class="list-group-item list-group-item-action bg-dark text-white" id="crud-pedido">
                    <i class="fas fa-shopping-cart"></i> Pedidos
                </a>
                <a href="../view/DomicilioView.php" class="list-group-item list-group-item-action bg-dark text-white" id="crud-domicilio">
                    <i class="fas fa-home"></i> Domicilios
                </a>
                <a href="../view/DetallePedidoView.php" class="list-group-item list-group-item-action bg-dark text-white" id="crud-detallepedido">
                    <i class="fas fa-list"></i> Detalle Pedido
                </a>
                <a href="../view/ReportesView.php" class="list-group-item list-group-item-action bg-dark text-white" id="reportes">
                    <i class="fas fa-chart-line"></i> Reportes
                </a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <a class="navbar-brand" href="../view/Dashboard.php"><button class="btn btn-primary" id="menu-toggle"><i class="fas fa-tachometer-alt"></i> Dashboard</button></a>
            </nav>

            <div class="container-fluid" id="main-content">
                <h2 class="mt-4">Editar Usuario</h2>

                <!-- Formulario para editar el usuario -->
                <form action="../controller/UsuarioController.php?action=edit&id=<?php echo htmlspecialchars($user['Idusuario']); ?>" method="POST" class='mt-4'>
                    <div class='mb-3'>
                        <label for='documento' class='form-label'>Documento:</label>
                        <input type='text' id='documento' name='documento' value="<?php echo htmlspecialchars($user['Documentousuario']); ?>" required class='form-control'>
                    </div>

                    <div class='mb-3'>
                        <label for='nodocumento' class='form-label'>No. Documento:</label>
                        <input type='number' id='nodocumento' name='nodocumento' value="<?php echo htmlspecialchars($user['Nodocumento']); ?>" required class='form-control'>
                    </div>

                    <div class='mb-3'>
                        <label for='nombre' class='form-label'>Nombre:</label>
                        <input type='text' id='nombre' name='nombre' value="<?php echo htmlspecialchars($user['Nombreusuario']); ?>" required class='form-control'>
                    </div>

                    <div class='mb-3'>
                        <label for='apellido' class='form-label'>Apellido:</label>
                        <input type='text' id='apellido' name='apellido' value="<?php echo htmlspecialchars($user['Apellidousuario']); ?>" required class='form-control'>
                    </div>

                    <div class='mb-3'>
                        <label for='direccion' class='form-label'>Dirección:</label>
                        <input type='text' id='direccion' name='direccion' value="<?php echo htmlspecialchars($user['Direccionusuario']); ?>" required class='form-control'>
                    </div>

                    <div class='mb-3'>
                        <label for='telefono' class='form-label'>Teléfono:</label>
                        <input type='text' id='telefono' name='telefono' value="<?php echo htmlspecialchars($user['Telusuario']); ?>" required class='form-control'>
                    </div>

                    <div class='mb-3'>
                        <label for='correo' class='form-label'>Correo:</label>
                        <input type='email' id='correo' name='correo' value="<?php echo htmlspecialchars($user['Correousuario']); ?>" required class='form-control'>
                    </div>

                    <!-- Rol selection -->
                    <div class='mb-3'>
                        <label for='idrol' class='form-label'>Rol:</label>
                        <select id='idrol' name='idrol' required class='form-select'>
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= htmlspecialchars($role['Idrolusuario']) ?>" <?= ($role['Idrolusuario'] == $user['Idrolusuariofk']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($role['Descripcionrol']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Button to update user -->
                    <button type='submit' class='btn btn-warning'>
                        <i class='fas fa-save'></i> Actualizar Usuario
                    </button>
                </form>

                <!-- Link to return to user list -->
                <a href="../view/UsuarioView.php" class='btn btn-secondary mt-3'>
                    <i class='fas fa-arrow-left'></i> Volver a la lista de usuarios
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../applications/js/dashboard.js"></script> 
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>

</body>

</html>