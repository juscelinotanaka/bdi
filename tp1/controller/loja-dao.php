<?php
	include("conexao.php");
	include_once(ABSPATH."model/loja-class.php");
	
	function cadastrarLoja(Loja $loja){
		$qry = "INSERT INTO public.loja VALUES ('".$loja->getNome()."', '".$loja->getFisico()."', '".$loja->getEndereco()."')";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function consultarLoja($loj){
		$qry = "SELECT * FROM public.loja WHERE nome = '". $loj ."'";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$loja = new Fornecedor();
			
			$loja->setId($row->idLoja);
			$loja->setNome($row->nome);
			$loja->setFisico($row->fisico);
			$loja->setEndereco($row->endereco);
			
			return $loja;
		}
		else{
			return 0;
		}
	}
?>