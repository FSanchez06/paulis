<?php 
require_once('../model/clsRol.php');
$rolModel = new Rol();
$role = $rolModel->getRoleById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Rol</title>
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
                <a href="RolView.php" class="list-group-item list-group-item-action bg-dark text-white" id="crud-rol">
                    <i class="fas fa-users"></i> Roles
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" id="crud-usuario">
                    <i class="fas fa-user"></i> Usuarios
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" id="crud-producto">
                    <i class="fas fa-box"></i> Productos
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" id="crud-pedido">
                    <i class="fas fa-shopping-cart"></i> Pedidos
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" id="crud-domicilio">
                    <i class="fas fa-home"></i> Domicilios
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" id="crud-detallepedido">
                    <i class="fas fa-list"></i> Detalle Pedido
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white" id="reportes">
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
                <h2 class="mt-4">Eliminar Rol</h2>

                <!-- Mensaje de confirmación -->
                <p>¿Estás seguro de que deseas eliminar el rol "<strong><?php echo htmlspecialchars($role[0]['Descripcionrol']); ?></strong>"?</p>

                <!-- Formulario para confirmar eliminación -->
                <form action="../controller/RolController.php?action=delete&id=<?php echo htmlspecialchars($role[0]['Idrolusuario']); ?>" method='POST' class='mt-4'>
                    <!-- Botón para eliminar -->
                    <button type='submit' class='btn btn-danger'>
                        <i class='fas fa-trash-alt'></i> Eliminar
                    </button>
                    <!-- Enlace para cancelar -->
                    <a href="../view/RolView.php" class='btn btn-secondary'>
                        <i class='fas fa-arrow-left'></i> Cancelar
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../applications/js/dashboard.js"></script> 
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>

</body>

</html>