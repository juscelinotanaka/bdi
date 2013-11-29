<?php
	class Fornecedor{
		
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
	}
?>