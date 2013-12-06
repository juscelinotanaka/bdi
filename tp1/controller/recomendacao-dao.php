<?php
	include("conexao.php");
	include_once(ABSPATH."model/recomendacao-class.php");
	
	function cadastrarRecomendacao(Recomendacao $recomendacao){
		$qry = "INSERT INTO notebook.recomendacao (\"amizade_idAmizade\",\"produto_idProduto\") VALUES (".$recomendacao->getIdAmizade().", ".$recomendacao->getIdProduto().")";
		
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				
				if ($state==0 && (pg_affected_rows($result) > 0)) {
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
	
?>