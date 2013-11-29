<?php
	
	class Amizade{
		
		private $id;
		private $idUsuario;
		private $idAmigo;
		private $grau;
		
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
		
		public function getIdAmigo(){
			return $this->idAmigo;
		}
		public function setIdAmigo($id){
			$this->idAmigo = $id;
		}
		
		public function getGrau(){
			return $this->grau;
		}
		public function setGrau($g){
			$this->grau = $g;
		}
	}

?>