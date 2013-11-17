<?php
	class Produto{
		private $id;
		private $descricao;
		private $idFabricante;
		private $idFornecedor;
		private $idLoja;	
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		
		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescrica($d){
			$this->descricao = $d;
		}
		
		public function getIdFabricante(){
			return $this->idfabricante;
		}
		public function setIdFabricante($id){
			$this->idFabricante = $id;
		}
		
		public function getIdFornecedor(){
			return $this->idFornecedor;
		}
		public function setIdFornecedor($id){
			$this->idFornecedor = $id;
		}
		
		public function getIdLoja(){
			return $this->idLoja;
		}
		public function setIdLoja($id){
			$this->idLoja = $id;
		}
	}

?>