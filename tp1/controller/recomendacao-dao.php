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
	
?>