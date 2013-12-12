<?php
	include("conexao.php");
	include_once(ABSPATH."model/fornecedor-class.php");
	
	function cadastrarFornecedor(Fornecedor $fornecedor){
		$qry = "INSERT INTO public.fornecedor (nome) VALUES ('".$fornecedor->getNome()."')";
		
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
	
	function consultarFornecedor($idFornecedor){
		$qry = "SELECT * FROM public.fornecedor 
				WHERE \"idFornecedor\" = '". $idFornecedor ."'";
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$fornecedor = new Fornecedor();
			
			$fornecedor->setId($row->idFornecedor);
			$fornecedor->setNome($row->nome);
			
			return $fornecedor;
		}
		else{
			return 0;
		}
	}
	
	function listarFornecedores(){
		$qry = "SELECT * FROM public.fornecedor";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$fornecedor = new Fornecedor();
			
			$fornecedor->setId($row->idFornecedor);
			$fornecedor->setNome($row->nome);
			
			$fornecedores[] = $fornecedor;
		}
			
		return $fornecedores;
	}
	
	function alterarFornecedor(Fornecedor $fornecedor){
		$qry = "UPDATE public.fornecedor 
				SET 
					nome = '".$fornecedor->getNome()."' 
				WHERE \"idFornecedor\" = " .$fornecedor->getId();
		
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
	
	function removerFornecedor($idFornecedor){
		
		/*
			DELETE FROM some_child_table WHERE some_fk_field IN SELECT some_id FROM some_Table;
			DELETE FROM some_table;
		*/
		
		$qry = "DELETE FROM public.fornecedor 
				WHERE \"idFornecedor\" = " . $idFornecedor;
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			return 1;
		}
		else{
			return 0;
		}
	}
?>