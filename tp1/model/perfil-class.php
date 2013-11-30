<?php

	class Perfil{
		
		private $id;
		private $idUsuario;
		private $descricao;
		private $caracteristicas;
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		
		public function getIdUsuario(){
			return $this->idUsuario;
		}
		public function setIdUsuario($id){
			$this->idUsuario = $id;
		}
		
		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescricao($d){
			$this->descricao = $d;
		}
		
		public function getCaracteristicas(){
			return $this->caracteristicas;
		}
		public function setCaracteristicas($c){
			$this->caracteristicas = $c;
		}
	}

?>