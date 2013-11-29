<?php
	
	class Fabricante {
		
		private $id;
		private $nome;
		private $nacionalidade;
		
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
		
		public function getNacionalidade(){
			return $this->nacionalidade;
		}
		public function setNacionalidade($nac){
			$this->nacionalidade = $nac;
		} 
	}
?>