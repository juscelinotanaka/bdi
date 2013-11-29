<?php
	
	class Loja {
		
		private $id;
		private $nome;
		private $fisico;
		private $endereco;
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		
		public function getNome(){
			return $this->nome;
		}
		public function setNome($n){
			$this->nome = $n;
		}
		
		public function getFisico(){
			return $this->fisico;
		}
		public function setFisico($f){
			$this->fisico = $f;
		}
		
		public function getEndereco(){
			return $this->endereco;
		}
		public function setEndereco($e){
			$this->endereco = $e;
		}
	}
?>