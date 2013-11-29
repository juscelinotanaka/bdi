<?php
	include("controller/conexao.php");
	include_once("model/fornecedor-class.php");
	
	function cadastrarFornecedor(Fornecedor $fornecedor){
		$qry = "INSERT INTO public.fornecedor VALUES ('".$fornecedor->getNome()."', '".$fornecedor->getFisico()."', '".$fornecedor->getEndereco()."')";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function consultarFornecedor($forn){
		$qry = "SELECT * FROM public.fabricante WHERE nome = '". $forn ."'";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$fornecedor = new Fornecedor();
			
			$fornecedor->setId($row->id);
			$fornecedor->setNome($row->nome);
			$fornecedor->setFisico($row->fisico);
			$fornecedor->setEndereco($row->endereco);
			
			return $fabricante;
		}
		else{
			return 0;
		}
	}
?>