<?php
	
	class Caracteristica{
		
		private $id;
		private $atributo;
		private $valor;
		private $valorMapeado;
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		
		public function getAtributo(){
			return $this->atributo;
		}
		public function setAtributo($a){
			$this->atributo = $a;
		}
		
		public function getValor(){
			return $this->valor;
		}
		public function setValor($v){
			$this->valor = $v;
		}
		
		public function getValorMapeado(){
			return $this->valorMapeado;
		}
		public function setValorMapeado($vm){
			$this->valorMapeado = $vm;
		}
	}

?>