<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="../applications/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class='d-flex' id='wrapper'>
        <!-- Sidebar -->
        <div class='bg-dark border-right' id='sidebar-wrapper'>
            <div class='sidebar-heading text-white'>Menu Principal</div>
            <div class='list-group list-group-flush'>
                <a href='RolView.php' class='list-group-item list-group-item-action bg-dark text-white' id='crud-rol'>
                    <i class='fas fa-users'></i> Roles
                </a>
                <a href='#' class='list-group-item list-group-item-action bg-dark text-white' id='crud-usuarios'>
                    <i class='fas fa-user'></i> Usuarios
                </a>
                <a href='#' class='list-group-item list-group-item-action bg-dark text-white' id='crud-productos'>
                    <i class='fas fa-box'></i> Productos
                </a>
                <a href='#' class='list-group-item list-group-item-action bg-dark text-white' id='crud-pedido'>
                    <i class='fas fa-shopping-cart'></i> Pedidos
                </a>
                <a href='#' class='list-group-item list-group-item-action bg-dark text-white' id='crud-domicilio'>
                    <i class='fas fa-home'></i> Domicilios
                </a>
                <a href='#' class='list-group-item list-group-item-action bg-dark text-white' id='crud-detallepedido'>
                    <i class='fas fa-list'></i> Detalle Pedido
                </a>
                <a href='#' class='list-group-item list-group-item-action bg-dark text-white' id='reportes'>
                    <i class='fas fa-chart-line'></i> Reportes
                </a>
            </div>
        </div>

        <!-- Page Content -->
        <div id='page-content-wrapper'>
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <a href="../view/Dashboard.php">
                    <button type='button' id="menu-toggle" class="btn btn-primary">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </button>
                </a>
            </nav>

            <div class="container-fluid" id="main-content">
                <h2>Crea un Nuevo Usuario</h2>

                <form action='../controller/UsuarioController.php?action=create' method='POST'>
                    <div class='mb-3'>
                        <label for='documento'>Documento:</label><br />
                        <input type='text' name='documento' required placeholder='' class='form-control'/><br />

                        <label for='nodocumento'>Número de Documento:</label><br />
                        <input type='number' name='nodocumento' required placeholder='' class='form-control'/><br />

                        <label for='nombre'>Nombre:</label><br />
                        <input type='text' name='nombre' required placeholder='' class='form-control'/><br />

                        <label for='apellido'>Apellido:</label><br />
                        <input type='text' name='apellido' required placeholder='' class='form-control'/><br />

                        <label for='direccion'>Dirección:</label><br />
                        <input type='text' name='direccion' required placeholder='' class='form-control'/><br />

                        <label for='telefono'>Teléfono:</label><br />
                        <input type='text' name='telefono' required placeholder='' class='form-control'/><br />

                        <label for='correo'>Correo:</label><br />
                        <input type='email' name='correo' required placeholder='' class='form-control'/><br />

                        <!-- Removed password encryption -->
                        <label for='clave'>Clave:</label><br />
                        <input type='text' name='clave' required placeholder='' class='form-control'/><br /> <!-- Changed to text -->

                        <!-- New Role Selection -->
                        <label for='idrol'>Rol:</label><br />
                        <?php
                            // Fetch roles from database (assuming you have a method to get roles)
                            require_once('../model/clsRol.php');
                            $rolModel = new Rol();
                            $roles = $rolModel->getAllRoles(); // Method to get all roles
                        ?>
                        <select name="idrol" required class="form-select">
                            <?php foreach ($roles as $role): ?>
                                <option value="<?= $role['Idrolusuario'] ?>"><?= $role['Descripcionrol'] ?></option>
                            <?php endforeach; ?>
                        </select><br />

                        <!-- New Estado Selection -->
                        <label for="estado">Estado:</label><br />
                        <select name="estado" required class="form-select">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select><br />

                        <!-- Submit and Back Buttons -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Crea Usuario
                        </button>
                        <a href="../view/UsuarioView.php" class="btn btn-secondary">Volver a la lista de usuarios</a>
                    </div>
                </form>

            </div>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>