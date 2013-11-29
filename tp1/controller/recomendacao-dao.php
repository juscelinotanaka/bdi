<?php
	include("conexao.php");
	include_once("../model/recomendacao-class.php");
	
	function cadastrarRecomendacao(Recomendacao $recomendacao){
		$qry = "INSERT INTO notebook.recomendacao VALUES (".$recomendacao->getIdAmizade().", ".$produto->getIdProduto().")";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
?>