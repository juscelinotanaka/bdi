<?php

	class Recomendacao{
		
		private $id;
		private $idAmizade;
		private $idProduto;
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		
		public function getIdAmizade(){
			return $this->idAmizade;
		}
		public function setIdAmizade($id){
			$this->idAmizade = $id;
		}
		
		public function getIdProduto(){
			return $this->idProduto;
		}
		public function setIdProduto($id){
			$this->idProduto = $id;
		}	
	}

?>