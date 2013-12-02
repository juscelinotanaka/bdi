<?php
	include("conexao.php");
	include_once(ABSPATH."model/produto-class.php");
	include_once(ABSPATH."model/perfil-class.php");
	
	function cadastrarProduto(Produto $produto){
		$qry = "INSERT INTO notebook.produto (tamanho,processador,ram,hd,video,preco,\"fabricante_idFabricante\",\"fornecedor_idFornecedor\",\"loja_idLoja\") VALUES ('".$produto->getDescricao()."', ".$produto->getTamanho().", ".$produto->getProcessador().", ".$produto->getRam().", ".$produto->getHd().", ".$produto->getVideo().", ".$produto->getPreco().", ".$produto->getIdFabricante().", ".$produto->getIdFornecedor().", ".$produto->getIdLoja().")";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function consultarProdutoPorFabricante($idFabricante){
		$qry = "SELECT * FROM notebook.produto WHERE \"fabricante_idFabricante\" = ". $idFabricante ."";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$produto = new Produto();
			
			$produto->setId($row->idProduto);
			$produto->setNome($row->nome);
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
			$produto->setNome($row->nome);
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
			$produto->setNome($row->nome);
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
	
	function produtosRecomendados(Perfil $perfil){
		
		$caracteristica = explode("|",$perfil->getCaracteristicas());
		
		/*
			caratacteristica[0] => tamanho
			caratacteristica[1] => processador
			caratacteristica[2] => ram
			caratacteristica[3] => hd
			caratacteristica[4] => video
			caratacteristica[5] => preco
			caratacteristica[6] => fabricante
		*/
		
		$aux = "";
		$aux2 = "";
		$aux3 = "";
		
		if($caracteristica[0] != ""){
			
			$aux .= " (prod.tamanho - per.tamanho)*(prod.tamanho - per.tamanho) +";
			$aux2 .= " CAST (split_part(caracteristicas, '|', 1) AS INTEGER) AS tamanho,";
			$aux3 .= " rec.tamanho,";
		}
		if($caracteristica[1] != ""){
			
			$aux .= " (prod.processador - per.processador)*(prod.processador - per.processador) +";
			$aux2 .= " CAST (split_part(caracteristicas, '|', 2) AS INTEGER) AS processador,";
			$aux3 .= " rec.processador,";
		}
		if($caracteristica[2] != ""){
			
			$aux .= " (prod.ram - per.ram)*(prod.ram - per.ram) +";
			$aux2 .= " CAST (split_part(caracteristicas, '|', 3) AS INTEGER) AS ram,";
			$aux3 .= " rec.hd,";
		}
		if($caracteristica[3] != ""){
			
			$aux .= " (prod.hd - per.hd)*(prod.hd - per.hd) +";
			$aux2 .= " CAST (split_part(caracteristicas, '|', 4) AS INTEGER) AS hd,";
			$aux3 .= " rec.ram,";
		}
		if($caracteristica[4] != ""){
			
			$aux .= " (prod.video - per.video)*(prod.video - per.video) +";
			$aux2 .= " CAST (split_part(caracteristicas, '|', 5) AS INTEGER) AS video,";
			$aux3 .= " rec.video,";
		}
		if($caracteristica[5] != ""){
			
			$aux .= " (prod.preco - per.preco)*(prod.preco - per.preco) +";
			$aux2 .= " CAST (split_part(caracteristicas, '|', 6) AS INTEGER) AS preco,";
			$aux3 .= " rec.preco,";
		}
		if($caracteristica[6] != ""){
			
			$aux .= " (prod.\"fabricante_idFabricante\" - per.fabricante)*(prod.\"fabricante_idFabricante\" - per.fabricante)";
			$aux2 .= " CAST (split_part(caracteristicas, '|', 7) AS INTEGER) AS fabricante";
			$aux3 .= " rec.\"fabricante_idFabricante\",";
		}
		
		$aux = preg_replace("/\+$/", "", $aux);
		$aux2 = preg_replace("/,$/", "", $aux2);
		
		$qry = 'SELECT * FROM (
					SELECT 
						prod.*, 
						SQRT(
							'. $aux .'
						) AS soma
					FROM (
						SELECT 
						'. $aux2 .'
						FROM notebook.perfil
						WHERE "usuario_idUsuario" = 1
						) per 
					INNER JOIN (
						SELECT * 
						FROM notebook.produto
						) prod
					ON ( 1 = 1)
				) AS rec
				WHERE rec.soma < 2
				GROUP BY 
					rec."idProduto",
					rec.descricao, 
					rec."idProduto", 
					'. $aux3 . '
					rec."fornecedor_idFornecedor", 
					rec."loja_idLoja", 
					rec.imagem,
					rec.nome,
					rec.soma
				ORDER BY rec.soma ASC';
				
		$result = pg_query($qry)  or die("Cannot execute query: <br>$qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$produto = new Produto();
			
			$produto->setId($row->idProduto);
			$produto->setNome($row->nome);
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
			
			$produto->setImagem($row->imagem);
			$produto->setSoma($row->soma);
			
			$produtos[] = $produto;
		}
		
		return $produtos;
							
	}
	
?>