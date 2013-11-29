<?php
	class Produto{
		
		private $id;
		private $tamanho;
		private $processador;
		private $ram;
		private $hd;
		private $video;
		private $preco;
		private $idFabricante;
		private $idFornecedor;
		private $idLoja;
		
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
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