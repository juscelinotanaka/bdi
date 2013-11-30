<?php
	include("conexao.php");
	include_once(ABSPATH."model/produto-class.php");
	
	function cadastrarProduto(Produto $produto){
		$qry = "INSERT INTO notebook.produto VALUES ('".$produto->getDescricao()."', ".$produto->getTamanho().", ".$produto->getProcessador().", ".$produto->getRam().", ".$produto->getHd().", ".$produto->getVideo().", ".$produto->getPreco().", ".$produto->getIdFabricante().", ".$produto->getIdFornecedor().", ".$produto->getIdLoja().")";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function consultarProdutoPorFabricante($idFabricante){
		$qry = "SELECT * FROM notebook.produto WHERE fabricante_idFabricante = ". $idFabricante ."";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$produto = new Produto();
			
			$produto->setId($row->idProduto);
			$produto->setDescricao($row->descricao);
			$produto->setTamanho($row->tamanho);
			$produto->setProcessador($row->processador);
			$produto->setRam($row->ram);
			$produto->setHd($row->hd);
			$produto->setVideo($row->video);
			$produto->setPreco($row->preco);
			
			$produtos[] = $produto;
		}
		
		return $produtos;
	}
	
	function consultarProdutoPorFornecedor($idFornecedor){
		$qry = "SELECT * FROM notebook.produto WHERE fornecedor_idFornecedor = ". $idFornecedor ."";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$produto = new Produto();
			
			$produto->setId($row->idProduto);
			$produto->setDescricao($row->descricao);
			$produto->setTamanho($row->tamanho);
			$produto->setProcessador($row->processador);
			$produto->setRam($row->ram);
			$produto->setHd($row->hd);
			$produto->setVideo($row->video);
			$produto->setPreco($row->preco);
			
			$produtos[] = $produto;
		}
		
		return $produtos;
	}
	
	function consultarProdutoPorCaracteristica($caracteristica, $valor){
		$qry = "SELECT * FROM notebook.produto WHERE fabricante_idFabricante = ". $fabricante ."";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
		}
		else{
			return 0;
		}
	}
	
	function listarProdutos(){
		$qry = "SELECT * FROM notebook.produto";
		$result = pg_query($qry)  or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$produto = new Produto();
			
			$produto->setId($row->idProduto);
			$produto->setDescricao($row->descricao);
			$produto->setTamanho($row->tamanho);
			$produto->setProcessador($row->processador);
			$produto->setRam($row->ram);
			$produto->setHd($row->hd);
			$produto->setVideo($row->video);
			$produto->setPreco($row->preco);
			
			$produto->setIdFabricante($row->fabricante_idFabricante);
			$produto->setIdFornecedor($row->fornecedor_idFornecedor);
			$produto->setIdLoja($row->loja_idLoja);
			
			$produtos[] = $produto;
		}
		
		return $produtos;
	}
?>