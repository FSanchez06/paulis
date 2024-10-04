<?php

require_once('Conexion.php');

class Producto extends Conexion {

    private $Idproducto; 
    private $Descripproducto; 
    private $Precioproducto; 
    private $Categoriaproducto; 
    private $Estadoproducto; 


    public function __construct() {
        // Acceder a la clase padre
        $this->db = parent::__construct();
    }

    public function getIdproducto(){
		return $this->Idproducto;
	}

	public function setIdproducto($Idproducto){
		$this->Idproducto = $Idproducto;
	}

	public function getDescripproducto(){
		return $this->Descripproducto;
	}

	public function setDescripproducto($Descripproducto){
		$this->Descripproducto = $Descripproducto;
	}

	public function getPrecioproducto(){
		return $this->Precioproducto;
	}

	public function setPrecioproducto($Precioproducto){
		$this->Precioproducto = $Precioproducto;
	}

	public function getCategoriaproducto(){
		return $this->Categoriaproducto;
	}

	public function setCategoriaproducto($Categoriaproducto){
		$this->Categoriaproducto = $Categoriaproducto;
	}

	public function getEstadoproducto(){
		return $this->Estadoproducto;
	}

	public function setEstadoproducto($Estadoproducto){
		$this->Estadoproducto = $Estadoproducto;
	}
}

?>