<?php
	include("conexao.php");
	include_once("../model/fornecedor-class.php");
	
	function cadastrarFornecedor(Fornecedor $fornecedor){
		$qry = "INSERT INTO public.fornecedor VALUES ('".$fornecedor->getNome()."')";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function consultarFornecedor($forn){
		$qry = "SELECT * FROM public.fornecedor WHERE nome = '". $forn ."'";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$fornecedor = new Fornecedor();
			
			$fornecedor->setId($row->id);
			$fornecedor->setNome($row->nome);
			
			return $fornecedor;
		}
		else{
			return 0;
		}
	}
?>