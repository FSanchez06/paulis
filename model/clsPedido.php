<?php

require_once('Conexion.php');

class Pedido extends Conexion {

    private $Idpedido; 
    private $Fechapedido; 
    private $Horapedido; 
    private $Totalpedido; 
    private $Estadopedido; 
    private $Pedidodomicilio; 
    private $Idusuariofk; 

    public function __construct() {
        // Acceder a la clase padre
        $this->db = parent::__construct();
    }

    public function getIdpedido(){
		return $this->Idpedido;
	}

	public function setIdpedido($Idpedido){
		$this->Idpedido = $Idpedido;
	}

	public function getFechapedido(){
		return $this->Fechapedido;
	}

	public function setFechapedido($Fechapedido){
		$this->Fechapedido = $Fechapedido;
	}

	public function getHorapedido(){
		return $this->Horapedido;
	}

	public function setHorapedido($Horapedido){
		$this->Horapedido = $Horapedido;
	}

	public function getTotalpedido(){
		return $this->Totalpedido;
	}

	public function setTotalpedido($Totalpedido){
		$this->Totalpedido = $Totalpedido;
	}

	public function getEstadopedido(){
		return $this->Estadopedido;
	}

	public function setEstadopedido($Estadopedido){
		$this->Estadopedido = $Estadopedido;
	}

	public function getPedidodomicilio(){
		return $this->Pedidodomicilio;
	}

	public function setPedidodomicilio($Pedidodomicilio){
		$this->Pedidodomicilio = $Pedidodomicilio;
	}

	public function getIdusuariofk(){
		return $this->Idusuariofk;
	}

	public function setIdusuariofk($Idusuariofk){
		$this->Idusuariofk = $Idusuariofk;
	}
}

?>