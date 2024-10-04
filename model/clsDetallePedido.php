<?php

require_once('Conexion.php');

class DetallePedido extends Conexion {

    private $IdDetallepedido; 
    private $Cantidadproducto; 
    private $Precioproducto; 
    private $Subtotalproducto; 
    private $Idproductofk; 
    private $Idpedidofk; 

    public function __construct() {
        // Acceder a la clase padre
        $this->db = parent::__construct();
    }

    public function getIdDetallepedido(){
		return $this->IdDetallepedido;
	}

	public function setIdDetallepedido($IdDetallepedido){
		$this->IdDetallepedido = $IdDetallepedido;
	}

	public function getCantidadproducto(){
		return $this->Cantidadproducto;
	}

	public function setCantidadproducto($Cantidadproducto){
		$this->Cantidadproducto = $Cantidadproducto;
	}

	public function getPrecioproducto(){
		return $this->Precioproducto;
	}

	public function setPrecioproducto($Precioproducto){
		$this->Precioproducto = $Precioproducto;
	}

	public function getSubtotalproducto(){
		return $this->Subtotalproducto;
	}

	public function setSubtotalproducto($Subtotalproducto){
		$this->Subtotalproducto = $Subtotalproducto;
	}

	public function getIdproductofk(){
		return $this->Idproductofk;
	}

	public function setIdproductofk($Idproductofk){
		$this->Idproductofk = $Idproductofk;
	}

	public function getIdpedidofk(){
		return $this->Idpedidofk;
	}

	public function setIdpedidofk($Idpedidofk){
		$this->Idpedidofk = $Idpedidofk;
	}
    

}
?>