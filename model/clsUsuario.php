<?php

require_once('Conexion.php');

class Usuario extends Conexion {

    private $Idusuario; 
    private $Documentousuario; 
    private $Nodocumento;  
    private $Nombreusuario; 
    private $Apellidousuario; 
    private $Direccionusuario; 
    private $Telusuario; 
    private $Correousuario; 
    private $Claveusuario; 
    private $Estadousuario; 
    private $Idrolusuariofk; 
    private $conexion;

    public function __construct() {
        // Inicializamos la conexión usando el método conectar() de la clase padre
        $this->conexion = $this->conectar(); 
    }


    // Getters y Setters
    public function getIdusuario() {
        return $this->Idusuario;
    }

    public function setIdusuario($Idusuario) {
        $this->Idusuario = $Idusuario;
    }

    public function getDocumentousuario() {
        return $this->Documentousuario;
    }

    public function setDocumentousuario($Documentousuario) {
        $this->Documentousuario = $Documentousuario;
    }

    public function getNodocumento() {
        return $this->Nodocumento;
    }

    public function setNodocumento($Nodocumento) {
        $this->Nodocumento = $Nodocumento;
    }

    public function getNombreusuario() {
        return $this->Nombreusuario;
    }

    public function setNombreusuario($Nombreusuario) {
        $this->Nombreusuario = $Nombreusuario;
    }

    public function getApellidousuario() {
        return $this->Apellidousuario;
    }

    public function setApellidousuario($Apellidousuario) {
        $this->Apellidousuario = $Apellidousuario;
    }

    public function getDireccionusuario() {
        return $this->Direccionusuario;
    }

    public function setDireccionusuario($Direccionusuario) {
        $this->Direccionusuario = $Direccionusuario;
    }

    public function getTelusuario() {
        return $this->Telusuario;
    }

    public function setTelusuario($Telusuario) {
        $this->Telusuario = $Telusuario;
    }

    public function getCorreousuario() {
        return $this->Correousuario;
    }

    public function setCorreousuario($Correousuario) {
        $this->Correousuario = $Correousuario;
    }

    public function getClaveusuario() {
        return $this->Claveusuario;
    }

    public function setClaveusuario($Claveusuario) {
        $this->Claveusuario = $Claveusuario;
    }

    public function getEstadousuario() {
        return $this->Estadousuario;
    }

    public function setEstadousuario($Estadousuario) {
        $this->Estadousuario = $Estadousuario;
    }

   public function getIdrolusuariofk() {
       return $this->Idrolusuariofk;
   }

   public function setIdrolusuariofk($Idrolusuariofk) {
       $this->Idrolusuariofk = $Idrolusuariofk;
   }
   
   // Métodos CRUD
   public function getAllUsuarios() {
    // Modify this query to join with the roles table
    $sql = "SELECT u.*, r.Descripcionrol 
            FROM Usuario u 
            LEFT JOIN Rol r ON u.Idrolusuariofk = r.Idrolusuario"; // Adjust table and column names as necessary
    return $this->ejecutar($sql)->fetchAll(PDO::FETCH_ASSOC);
}

public function getUsuarioById($id) {
        return $this->ejecutar("SELECT u.*, r.Descripcionrol FROM Usuario u JOIN Rol r ON u.Idrolusuariofk = r.Idrolusuario WHERE u.Idusuario = ?", [$id])->fetch(PDO::FETCH_ASSOC);
    }

public function createUsuario($documento, $nodocumento, $nombre, $apellido, $direccion, $telefono, $correo, $clave, $estado, $idrol) {
	return $this->ejecutar("INSERT INTO Usuario (Documentousuario, Nodocumento, Nombreusuario, Apellidousuario, Direccionusuario, Telusuario, Correousuario, Claveusuario, Estadousuario, Idrolusuariofk) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [$documento, intval($nodocumento),$nombre,$apellido,$direccion,$telefono,$correo,$clave,$estado,intval($idrol)]);
}

public function updateUsuario($id, $documento, $nodocumento, $nombre, $apellido, $direccion, $telefono, $correo, $clave = null, $idrol) {
    if ($clave) { // If a new password is provided
        return $this->ejecutar("UPDATE Usuario SET Documentousuario=?, Nodocumento=?, Nombreusuario=?, Apellidousuario=?, Direccionusuario=?, Telusuario=?, Correousuario=?, Claveusuario=?, Idrolusuariofk=? WHERE Idusuario=?", 
        [$documento, intval($nodocumento),$nombre,$apellido,$direccion,$telefono,$correo,password_hash($clave,PASSWORD_DEFAULT),$idrol,$id]);
    } else { // If no new password is provided
        return $this->ejecutar("UPDATE Usuario SET Documentousuario=?, Nodocumento=?, Nombreusuario=?, Apellidousuario=?, Direccionusuario=?, Telusuario=?, Correousuario=?, Idrolusuariofk=? WHERE Idusuario=?", 
        [$documento,intval($nodocumento),$nombre,$apellido,$direccion,$telefono,$correo,$idrol,$id]);
    }
}
public function deleteUsuario($id) {
        return	$this->ejecutar("DELETE FROM Usuario WHERE Idusuario=?", [$id]);
}

public function getAllRoles() {
	// Fetch all roles from the database
	$sql = "SELECT * FROM Rol";
	return $this->ejecutar($sql)->fetchAll(PDO::FETCH_ASSOC);
}

public function login($correo, $clave) {
    // Prepare the SQL statement
    $sql = "SELECT * FROM Usuario WHERE Correousuario = ?";
    $stmt = $this->conexion->prepare($sql);
    
    // Execute the query with the provided email
    if ($stmt->execute([$correo])) {
        // Fetch the user data
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Verify password
        if ($usuario && password_verify($clave, $usuario['Claveusuario'])) {
            return $usuario; // Return user data if login is successful
        }
    }
    
    return false; // Return false if login fails
}

}
?>