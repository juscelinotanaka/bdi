<?php
	include("conexao.php");
	include_once(ABSPATH."model/produto-class.php");
	include_once(ABSPATH."model/perfil-class.php");
	
	function cadastrarProduto(Produto $produto){
		$qry = "INSERT INTO notebook.produto (nome,tamanho,processador,ram,hd,video,preco, \"precoReal\",\"fabricante_idFabricante\",\"fornecedor_idFornecedor\",\"loja_idLoja\") VALUES ('".$produto->getNome()."', ".$produto->getTamanho().", ".$produto->getProcessador().", ".$produto->getRam().", ".$produto->getHd().", ".$produto->getVideo().", ".$produto->getPreco().", ".$produto->getPrecoReal().", ".$produto->getIdFabricante().", ".$produto->getIdFornecedor().", ".$produto->getIdLoja().")";
		
		//echo $qry;
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				
				if ($state==0) {
					return 1;
				}
				else {
				  	
					if ($state=="23505") { 
						return 2;
					}
					
					return 0;
				}
			}
		}
	}
	
	function consultarProduto($idProduto){
		$qry = "SELECT p.\"idProduto\" as \"idProduto\", p.nome as nome, p.descricao as descricao, p.imagem as imagem, p.\"precoReal\" as preco,
					(SELECT \"valorMapeado\" FROM notebook.caracteristica c
					WHERE atributo = 'tamanho' AND c.valor = p.tamanho) AS tamanho,
					(SELECT \"valorMapeado\" FROM notebook.caracteristica c
					WHERE atributo = 'processador' AND c.valor = p.processador) AS processador,
					(SELECT \"valorMapeado\" FROM notebook.caracteristica c
					WHERE atributo = 'ram' AND c.valor = p.ram) AS ram,
					(SELECT \"valorMapeado\" FROM notebook.caracteristica c
					WHERE atributo = 'hd' AND c.valor = p.hd) AS hd,
					(SELECT \"valorMapeado\" FROM notebook.caracteristica c
					WHERE atributo = 'video' AND c.valor = p.video) AS video
				FROM notebook.produto p 
				WHERE \"idProduto\" = ". $idProduto ."";
		
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
		
			$row = pg_fetch_object($result);
			
			$produto = new Produto();
			
			$produto->setId($idProduto);
			$produto->setNome($row->nome);
			$produto->setDescricao($row->descricao);
			$produto->setTamanho($row->tamanho);
			$produto->setProcessador($row->processador);
			$produto->setRam($row->ram);
			$produto->setHd($row->hd);
			$produto->setVideo($row->video);
			$produto->setPreco($row->preco);
			$produto->setImagem($row->imagem);
			
			return $produto;
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
			$produto->setPreco($row->precoReal);
			$produto->setImagem($row->imagem);
			
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
			$produto->setPreco($row->precoReal);
			$produto->setImagem($row->imagem);
			
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
			$produto->setPreco($row->precoReal);
			
			$produto->setIdFabricante($row->fabricante_idFabricante);
			$produto->setIdFornecedor($row->fornecedor_idFornecedor);
			$produto->setIdLoja($row->loja_idLoja);
			
			$produtos[] = $produto;
		}
		
		return $produtos;
	}
	
	function produtosRecomendados($idUsuario){
		
		$qry = 'SELECT * FROM (
						SELECT 
							prod.*, 
							SQRT(
								CASE
									WHEN per.tamanho IS NOT NULL THEN
									(prod.tamanho - per.tamanho)*(prod.tamanho - per.tamanho)
									ELSE 0
								END +
								CASE
									WHEN per.processador IS NOT NULL THEN
									(prod.processador - per.processador)*(prod.processador - per.processador)
									ELSE 0
								END +
								CASE
									WHEN per.ram IS NOT NULL THEN
									(prod.ram - per.ram)*(prod.ram - per.ram)
									ELSE 0
								END +
								CASE
									WHEN per.hd IS NOT NULL THEN
									(prod.hd - per.hd)*(prod.hd - per.hd)
									ELSE 0
								END +
								CASE
									WHEN per.video IS NOT NULL THEN
									(prod.video - per.video)*(prod.video - per.video)
									ELSE 0
								END +
								CASE
									WHEN per.preco IS NOT NULL THEN
									(prod.preco - per.preco)*(prod.preco - per.preco)
									ELSE 0
								END +
								CASE
									WHEN per.fabricante IS NOT NULL THEN
									(prod."fabricante_idFabricante" - per.fabricante)*(prod."fabricante_idFabricante" - per.fabricante)
									ELSE 0
								END
							) AS soma
						FROM (
							SELECT 
							CASE 
								WHEN split_part(caracteristicas, \'|\', 1) <> \'\' THEN
									CAST (split_part(caracteristicas, \'|\', 1) AS INTEGER)
							END  AS tamanho,
							CASE 
								WHEN split_part(caracteristicas, \'|\', 2) <> \'\' THEN
									CAST (split_part(caracteristicas, \'|\', 2) AS INTEGER)
							END  AS processador,
							CASE 
								WHEN split_part(caracteristicas, \'|\', 3) <> \'\' THEN
									CAST (split_part(caracteristicas, \'|\', 3) AS INTEGER)
							END  AS ram,
							CASE 
								WHEN split_part(caracteristicas, \'|\', 4) <> \'\' THEN
									CAST (split_part(caracteristicas, \'|\', 4) AS INTEGER)
							END  AS hd,
							CASE 
								WHEN split_part(caracteristicas, \'|\', 5) <> \'\' THEN
									CAST (split_part(caracteristicas, \'|\', 5) AS INTEGER)
							END  AS video,
							CASE 
								WHEN split_part(caracteristicas, \'|\', 6) <> \'\' THEN
									CAST (split_part(caracteristicas, \'|\', 6) AS INTEGER)
							END  AS preco,
							CASE 
								WHEN split_part(caracteristicas, \'|\', 7) <> \'\' THEN
									CAST (split_part(caracteristicas, \'|\', 7) AS INTEGER)
							END  AS fabricante
					
							FROM notebook.perfil
							WHERE "usuario_idUsuario" = '.$idUsuario.'
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
						rec."descricao", 
						rec."idProduto", 
						rec.tamanho, 
						rec.processador, 
						rec.ram, 
						rec.hd, 
						rec.video,
						rec.preco, 
						rec."precoReal", 
						rec."fabricante_idFabricante", 
						rec."fornecedor_idFornecedor", 
						rec."loja_idLoja", 
						rec.nome,
						rec.imagem,
						rec."precoReal",
						rec.soma
					ORDER BY rec."soma" ASC';
				
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
			$produto->setPrecoReal($row->precoReal);
			$produto->setIdFabricante($row->fabricante_idFabricante);
			$produto->setIdFornecedor($row->fornecedor_idFornecedor);
			$produto->setIdLoja($row->loja_idLoja);
			
			$produto->setImagem($row->imagem);
			$produto->setSoma($row->soma);
			
			$produtos[] = $produto;
		}
		
		return $produtos;						
	}
	
	function produtosRecomendadosPorAmigos($idUsuario){
		
		$qry = 'SELECT p."idProduto" as "idProduto", p.nome as nome, p.descricao as descricao, p.imagem as imagem, p."precoReal" as "precoReal",
					(SELECT "valorMapeado" FROM notebook.caracteristica c
					WHERE atributo = \'tamanho\' AND c.valor = p.tamanho) AS tamanho,
					(SELECT "valorMapeado" FROM notebook.caracteristica c
					WHERE atributo = \'processador\' AND c.valor = p.processador) AS processador,
					(SELECT "valorMapeado" FROM notebook.caracteristica c
					WHERE atributo = \'ram\' AND c.valor = p.ram) AS ram,
					(SELECT "valorMapeado" FROM notebook.caracteristica c
					WHERE atributo = \'hd\' AND c.valor = p.hd) AS hd,
					(SELECT "valorMapeado" FROM notebook.caracteristica c
					WHERE atributo = \'video\' AND c.valor = p.video) AS video
				FROM notebook.produto p 
				WHERE p."idProduto" IN(
											SELECT "produto_idProduto" 
											FROM notebook.recomendacao 
											WHERE "amizade_idAmizade" IN (
																			SELECT "idAmizade" 
																			FROM public.amizade 
																			WHERE "usuario_idAmigo" = '.$idUsuario.'
																		 )
										)';
										
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
			$produto->setPrecoReal($row->precoReal);
			$produto->setImagem($row->imagem);
			
			$produtos[] = $produto;
		}
		
		return $produtos;
		
	}
	
?>