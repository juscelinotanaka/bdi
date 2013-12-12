<?php
	include("conexao.php");
	include_once(ABSPATH."model/recomendacao-class.php");
	include_once(ABSPATH."model/produto-class.php");
	
	function cadastrarRecomendacao(Recomendacao $recomendacao){
		
		$qry = "INSERT INTO notebook.recomendacao (\"amizade_idUsuario\",\"amizade_idAmigo\",\"produto_idProduto\") VALUES (".$recomendacao->getIdUsuario().", ".$recomendacao->getIdAmigo().", ".$recomendacao->getIdProduto().")";
		
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
				WHEN a."usuario_idAmigo" IN (SELECT r."amizade_idAmigo"
										FROM notebook.recomendacao r 
										INNER JOIN public.amizade a ON r."amizade_idAmigo" = a."usuario_idAmigo"
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
			
			$recomendacao->setIdUsuario($row->usuario_idUsuario);
			$recomendacao->setIdAmigo($row->usuario_idAmigo);
			$recomendacao->setNome($row->nome);
			$recomendacao->setSobrenome($row->sobrenome);
			$recomendacao->setApelido($row->apelido);
			$recomendacao->setRecomendado($row->recomendado);
			
			
			$recomendacoes[] = $recomendacao;
		}
		
		return $recomendacoes;
	}
	
?>