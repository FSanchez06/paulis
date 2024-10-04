<?php

require_once('Conexion.php');

class Domicilio extends Conexion {

    private $IdDomicilio; 
    private $Horadomicilio; 
    private $Estadodomicilio; 
    private $Idpedidofk; 
    private $Idusuariofk; 

    public function __construct() {
        // Acceder a la clase padre
        $this->db = parent::__construct();
    }

    public function getIdDomicilio(){
		return $this->IdDomicilio;
	}

	public function setIdDomicilio($IdDomicilio){
		$this->IdDomicilio = $IdDomicilio;
	}

	public function getHoradomicilio(){
		return $this->Horadomicilio;
	}

	public function setHoradomicilio($Horadomicilio){
		$this->Horadomicilio = $Horadomicilio;
	}

	public function getEstadodomicilio(){
		return $this->Estadodomicilio;
	}

	public function setEstadodomicilio($Estadodomicilio){
		$this->Estadodomicilio = $Estadodomicilio;
	}

	public function getIdpedidofk(){
		return $this->Idpedidofk;
	}

	public function setIdpedidofk($Idpedidofk){
		$this->Idpedidofk = $Idpedidofk;
	}

	public function getIdusuariofk(){
		return $this->Idusuariofk;
	}

	public function setIdusuariofk($Idusuariofk){
		$this->Idusuariofk = $Idusuariofk;
	}
}

?>
