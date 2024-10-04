<?php

require_once('../model/clsRol.php');

class RolController {

    private $rolModel;

    public function __construct() {
        // Instanciar el modelo de rol
        $this->rolModel = new Rol();
    }

    public function index() {
        // Cargar la vista principal con todos los roles
        include '../view/RolView.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recoger datos del formulario
            $descripcion = $_POST['descripcion'];
            $estado = $_POST['estado'];
            // Crear rol utilizando el modelo
            if ($this->rolModel->createRole($descripcion, $estado)) {
                header('Location: ../view/RolView.php'); // Redirigir a la vista de roles
                exit();
            }
        }
        // Cargar la vista para crear un nuevo rol
        include '../view/CreateRolView.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recoger datos del formulario
            $descripcion = $_POST['descripcion'];
            $estado = $_POST['estado'];
            // Actualizar rol utilizando el modelo
            if ($this->rolModel->updateRole($id, $descripcion, $estado)) {
                header('Location: ../view/RolView.php'); // Redirigir a la vista de roles
                exit();
            }
        }
        
        // Obtener rol por ID utilizando el modelo
        $role = $this->rolModel->getRoleById($id);
        include '../view/EditRolView.php'; // Cargar la vista para editar rol
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Eliminar rol utilizando el modelo
            if ($this->rolModel->deleteRole($id)) {
                header('Location: ../view/RolView.php'); // Redirigir a la vista de roles
                exit();
            }
        }
        
        // Cargar vista de confirmación de eliminación
        include '../view/DeleteRolView.php';
    }
}

// Manejo de acciones basadas en parámetros GET o POST.
$action = $_GET['action'] ?? null;
$controller = new RolController();

if ($action === 'create') {
    $controller->create();
} elseif ($action === 'edit') {
    $controller->edit($_GET['id']);
} elseif ($action === 'delete') {
    $controller->delete($_GET['id']);
} else {
    $controller->index();
}
?>