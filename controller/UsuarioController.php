<?php

require_once('../model/clsUsuario.php');

class UsuarioController {

    private $usuariomodel;

    public function __construct() {
        // Instantiate the user model
        $this->usuariomodel = new Usuario();
    }

    public function index() {
        // Load the main view with all users
        include '../view/UsuarioView.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Collect form data
            list($documento, $nodocumento, $nombre, $apellido, $direccion, $telefono, $correo, $clave, $estado, $idrol) = [
                $_POST['documento'],
                $_POST['nodocumento'],
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['direccion'],
                $_POST['telefono'],
                $_POST['correo'],
                $_POST['clave'], // No hashing here
                $_POST['estado'], // Ensure this is captured correctly
                $_POST['idrol']
            ];
            // Create user using the model
            if ($this->usuariomodel->createUsuario($documento, $nodocumento, $nombre, $apellido, $direccion, $telefono, $correo, $clave, $estado, $idrol)) {
                header('Location: ../view/UsuarioView.php'); // Redirect to the user view
                exit();
            }
        }
        // Load the view to create a new user
        include '../view/CreateUsuarioView.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Collect form data
            list($documento, $nodocumento, $nombre, $apellido, $direccion, $telefono, $correo, $idrol) = [
                $_POST['documento'],
                $_POST['nodocumento'],
                $_POST['nombre'],
                $_POST['apellido'],
                $_POST['direccion'],
                $_POST['telefono'],
                $_POST['correo'],
                $_POST['idrol'] // Include role ID here
            ];
            // Update user using the model
            if ($this->usuariomodel->updateUsuario($id, $documento, $nodocumento, $nombre, $apellido, $direccion, $telefono, $correo, null, $idrol)) {
                header('Location: ../view/UsuarioView.php'); // Redirect to the user view
                exit();
            }
        }
        
        // Get user by ID using the model
        $user = $this->usuariomodel->getUsuarioById($id);
        
        // Check if user data was returned
        if (!$user || count($user) === 0) {
            header('Location: ../view/UsuarioView.php'); // Redirect if no user found
            exit();
        }

        // Get all roles for dropdown
        $roles = $this->usuariomodel->getAllRoles(); 
        include '../view/EditUsuarioView.php'; // Load edit user view
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Delete user using the model
            if ($this->usuariomodel->deleteUsuario($id)) { 
                header('Location: ../view/UsuarioView.php'); // Redirect to the user view
                exit();
            }
        }
        
        // Load confirmation view for deletion
        include '../view/DeleteUsuarioView.php';
    }

    public function search() {
        if (isset($_GET['search'])) {
            // Get role ID from search input
            $idrol = $_GET['search'];
            // Search users by role using the model
            $usuarios = $this->usuariomodel->getUsuariosByRol($idrol);
            include '../view/UsuarioSearchView.php'; // Load view with search results
        } else {
            header('Location: ../view/UsuarioView.php'); // Redirect if no valid ID is provided
            exit();
        }
    }
}

// Handling actions based on GET or POST parameters.
$action = $_GET['action'] ?? null;
$controller = new UsuarioController();

if ($action === 'create') { 
    $controller->create();
} elseif ($action === 'edit') { 
    if (isset($_GET['id'])) {
        $controller->edit($_GET['id']);
    } else {
        header('Location: ../view/UsuarioView.php'); // Redirect if no ID is provided
    }
} elseif ($action === 'delete') { 
    if (isset($_GET['id'])) {
        $controller->delete($_GET['id']);
    } else {
        header('Location: ../view/UsuarioView.php'); // Redirect if no ID is provided
    }
} elseif ($action === 'search') { 
    $controller->search();
} else { 
    $controller->index();
}
?>