<?php
	class Loja {
		
		private $id;
		private $nome;
		private $local;
		
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
		
		public function getLocal(){
			return $this->local;
		}
		public function setLocal($l){
			$this->local = $l;
		} 
	}
?>