<?php

	class Recomendacao{
		
		private $id;
		private $idUsuario;
		private $idAmigo;
		private $idProduto;
		private $nome;
		private $sobrenome;
		private $apelido;
		private $recomendado;
		
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
		
		public function getIdProduto(){
			return $this->idProduto;
		}
		public function setIdProduto($id){
			$this->idProduto = $id;
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
		
		public function getApelido(){
			return $this->apelido;
		}
		public function setApelido($a){
			$this->apelido = $a;
		}
		
		public function getRecomendado(){
			return $this->recomendado;
		}
		public function setRecomendado($a){
			$this->recomendado = $a;
		}
	}

?>