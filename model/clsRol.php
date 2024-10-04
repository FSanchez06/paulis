<?php

require_once('Conexion.php');

class Rol extends Conexion {

    private $Idrolusuario; 
    private $Descripcionrol; 
    private $Estadorol;  

    public function __construct() {
        // No es necesario llamar al constructor de la clase padre aquí
    }

    // Getters y Setters
    public function getIdrolusuario() {
        return $this->Idrolusuario;
    }

    public function setIdrolusuario($Idrolusuario) {
        $this->Idrolusuario = $Idrolusuario;
    }

    public function getDescripcionrol() {
        return $this->Descripcionrol;
    }

    public function setDescripcionrol($Descripcionrol) {
        $this->Descripcionrol = $Descripcionrol;
    }

    public function getEstadorol() {
        return $this->Estadorol;
    }

    public function setEstadorol($Estadorol) {
        $this->Estadorol = $Estadorol;
    }

    // Métodos CRUD
    public function getAllRoles() {
        return $this->ejecutar("SELECT * FROM Rol")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getRoleById($id) {
        return $this->ejecutar("SELECT * FROM Rol WHERE Idrolusuario = ?", [$id])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createRole($descripcion, $estado) {
        return $this->ejecutar("INSERT INTO Rol (Descripcionrol, Estadorol) VALUES (?, ?)", [$descripcion, $estado]);
    }

    public function updateRole($id, $descripcion, $estado) {
        return $this->ejecutar("UPDATE Rol SET Descripcionrol = ?, Estadorol = ? WHERE Idrolusuario = ?", [$descripcion, $estado, $id]);
    }

    public function deleteRole($id) {
        return $this->ejecutar("DELETE FROM Rol WHERE Idrolusuario = ?", [$id]);
    }
}
?>