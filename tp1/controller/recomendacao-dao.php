<?php
	include("conexao.php");
	include_once(ABSPATH."model/recomendacao-class.php");
	
	function cadastrarRecomendacao(Recomendacao $recomendacao){
		$qry = "INSERT INTO notebook.recomendacao (\"amizade_idAmizade\",\"produto_idProduto\") VALUES (".$recomendacao->getIdAmizade().", ".$recomendacao->getIdProduto().")";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
?>