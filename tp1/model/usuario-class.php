<?php
	
	class Usuario{
		
		private $id;
		private $nome;
		private $sobrenome;
		private	$cpf;
		private $email; 
		private $senha;
		private $apelido;
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		
		public function getSobrenome(){
			return $this->sobrenome;
		}
		public function setSobrenome($sn){
			$this->sobrenome = $sn;
		}
		
		public function getCpf(){
			return $this->cpf;
		}
		public function setCpf($cpf){
			$this->cpf = $cpf;
		}
		
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($s){
			$this->senha = $s;
		}
		
		public function getApelido(){
			return $this->apelido;
		}
		public function setApelido($a){
			$this->apelido = $a;
		}

	}
?>