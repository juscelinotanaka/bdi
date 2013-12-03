<?php
	
	class Produto{
		
		private $id;
		private $nome;
		private $descricao;
		private $tamanho;
		private $processador;
		private $ram;
		private $hd;
		private $video;
		private $preco;
		private $faixaPreco;
		private $idFabricante;
		private $idFornecedor;
		private $idLoja;
		private $imagem;
		private $soma;
		
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
		
		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescricao($d){
			$this->descricao = $d;
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
		
		public function getFaixaPreco(){
			return $this->faixaPreco;
		}
		public function setFaixaPreco($p){
			$this->faixaPreco = $p;
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
		
		public function getImagem(){
			return $this->imagem;
		}
		public function setImagem($i){
			$this->imagem = $i;
		}
		
		public function getSoma(){
			return $this->soma;
		}
		public function setSoma($s){
			$this->soma = $s;
		}
	}

?>