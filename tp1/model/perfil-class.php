<?php

	class Perfil{
		
		private $id;
		private $idUsuario;
		private $descricao;
		private $caracteristicas;
		
		private $tamanho;
		private $processador;
		private $ram;
		private $hd;
		private $video;
		private $preco;
		private $fabricante;
		
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
		
		
		public function getTamanho(){
			return $this->tamanho;
		}
		public function setTamanho($t){
			$this->tamanho = $t;
		}
		
		public function getProcessador(){
			return $this->processador;
		}
		public function setProcessador($p){
			$this->processador = $p;
		}
		
		public function getRam(){
			return $this->ram;
		}
		public function setRam($r){
			$this->ram = $r;
		}
		
		public function getHd(){
			return $this->hd;
		}
		public function setHd($h){
			$this->hd = $h;
		}
		
		public function getVideo(){
			return $this->video;
		}
		public function setVideo($v){
			$this->video = $v;
		}
		
		public function getPreco(){
			return $this->preco;
		}
		public function setPreco($p){
			$this->preco = $p;
		}
		
		public function getFabricante(){
			return $this->fabricante;
		}
		public function setFabricante($id){
			$this->fabricante = $id;
		}
	}

?>