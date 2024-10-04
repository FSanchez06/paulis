<?php 
require_once('../model/clsUsuario.php');

$usuariomodel = new Usuario();
$usuarios = $usuariomodel->getAllUsuarios(); // This now includes role descriptions
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
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

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <a class="navbar-brand" href="../view/Dashboard.php"><button class='btn btn-primary' id='menu-toggle'><i class='fas fa-tachometer-alt'></i> Dashboard</button></a>
            </nav>

            <div class="container-fluid" id="main-content">
                <h1 class="mt-4">Lista de Usuarios</h1>

                <a href="../controller/UsuarioController.php?action=create" class='btn btn-primary mb-3'>
                    <i class='fas fa-plus-circle'></i> Crear Nuevo Usuario
                </a>

                <!-- Tabla de usuarios -->
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Documento</th>
                            <th>Número Documento</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Rol</th> <!-- Nueva columna para mostrar el rol -->
                            <th>Contraseña</th> <!-- Nueva columna para mostrar la contraseña -->
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['Idusuario']); ?></td>
                            <td><?php echo htmlspecialchars($user['Documentousuario']); ?></td>
                            <td><?php echo htmlspecialchars($user['Nodocumento']); ?></td>
                            <td><?php echo htmlspecialchars($user['Nombreusuario']); ?></td>
                            <td><?php echo htmlspecialchars($user['Apellidousuario']); ?></td>
                            <td><?php echo htmlspecialchars($user['Direccionusuario']); ?></td>
                            <td><?php echo htmlspecialchars($user['Telusuario']); ?></td>
                            <td><?php echo htmlspecialchars($user['Correousuario']); ?></td>
                            <td><?php echo htmlspecialchars($user['Estadousuario']); ?></td>

                            <!-- Mostrar el rol -->
                            <?php 
                                // Aquí se muestra el rol del usuario.
                                $rolDescripcion = htmlspecialchars($user['Descripcionrol']);
                             ?>
                             <!-- Displaying role in a separate column -->
                             <td><?php echo $rolDescripcion; ?></td>

                             <!-- Mostrar la contraseña -->
                             <?php 
                                // Displaying password (not recommended for security reasons)
                                $passwordDisplay = htmlspecialchars($user['Claveusuario']); // Assuming this is how you retrieve it
                             ?>
                             <!-- Displaying password in a separate column -->
                             <td><?php echo $passwordDisplay; ?></td>

                             <!-- Acciones -->
                             <td>
                                <a href="../controller/UsuarioController.php?action=edit&id=<?php echo htmlspecialchars($user['Idusuario']); ?>" 
                                   class='btn btn-warning'>
                                    <i class='fas fa-edit'></i> Editar
                                </a>

                                <!-- Botón de eliminar con confirmación -->
                                <a href="../controller/UsuarioController.php?action=delete&id=<?php echo htmlspecialchars($user['Idusuario']); ?>" 
                                   class='btn btn-danger' onclick='return confirm("¿Estás seguro de que deseas eliminar este usuario?");'>
                                   <i class='fas fa-trash-alt'></i> Eliminar
                                </a>

                             </td>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>

                <!-- Barra de búsqueda -->
                <!-- Assuming you want to search by user ID -->
                <!-- You can modify this to search by other fields as needed -->
                <form action="../controller/UsuarioController.php?action=search" method='GET' class='mb-3'>
                    <input type='text' name='search' placeholder='Buscar por ID' required class='form-control' />
                    <button type='submit' class='btn btn-info mt-2'><i class='fas fa-search'></i> Buscar </button >
                </form >

            </div> <!-- Fin del main-content -->

        </div> <!-- Fin del page-content-wrapper -->

    </div> <!-- Fin del wrapper -->


</body >
</html >