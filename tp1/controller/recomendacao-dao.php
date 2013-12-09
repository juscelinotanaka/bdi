<?php
	include("conexao.php");
	include_once(ABSPATH."model/recomendacao-class.php");
	include_once(ABSPATH."model/produto-class.php");
	
	function cadastrarRecomendacao(Recomendacao $recomendacao){
		$qry = "INSERT INTO notebook.recomendacao (\"amizade_idAmizade\",\"produto_idProduto\") VALUES (".$recomendacao->getIdAmizade().", ".$recomendacao->getIdProduto().")";
		
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				
				if ($state==0) {
					return 1;
				}
				else {
				  	return 0;
				}
			}
		}
	}
	
	function consultarRecomendacao($idUsuario, $idProduto){
		$qry = 
		'SELECT * FROM
		(
			SELECT *,
			CASE 
				WHEN a."idAmizade" IN (SELECT a."idAmizade"
										FROM notebook.recomendacao r 
										INNER JOIN public.amizade a ON r."amizade_idAmizade" = a."idAmizade"
										INNER JOIN public.usuario u ON a."usuario_idUsuario" = u."idUsuario"
										WHERE a."usuario_idUsuario" = '.$idUsuario.' AND "produto_idProduto" = '.$idProduto.'
									) 
				THEN
					1
				ELSE
					0
			END AS recomendado
			FROM public.amizade a WHERE "usuario_idUsuario" = '.$idUsuario.'
		) AS r
		INNER JOIN public.usuario u ON r."usuario_idAmigo" = u."idUsuario"
		';
			
		$result = pg_query($qry)  or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$recomendacao = new Recomendacao();
			
			$recomendacao->setIdAmizade($row->idAmizade);
			$recomendacao->setNome($row->nome);
			$recomendacao->setSobrenome($row->sobrenome);
			$recomendacao->setApelido($row->apelido);
			$recomendacao->setRecomendado($row->recomendado);
			
			
			$recomendacoes[] = $recomendacao;
		}
		
		return $recomendacoes;
	}
	
?>