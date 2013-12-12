<?php
	include("conexao.php");
	include_once(ABSPATH."model/loja-class.php");
	
	function cadastrarLoja(Loja $loja){
		$qry = "INSERT INTO public.loja (nome,fisico,endereco) VALUES ('".$loja->getNome()."', ".$loja->getFisico().", '".$loja->getEndereco()."')";
		
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				
				if ($state==0) {
					return 1;
				}
				else {
				  	
					//erro de sintaxe
					if ($state=="42601") { 
						return 2;
					}
					
					return 0;
				}
			}
		}
	}
	
	function consultarLoja($idLoja){
		$qry = "SELECT * FROM public.loja 
				WHERE \"idLoja\" = ". $idLoja;
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$loja = new Loja();
			
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
	
	function listarLojas(){
		$qry = "SELECT * FROM public.loja";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		while ($row = pg_fetch_object($result)){
			
			$loja = new Loja();
			
			$loja->setId($row->idLoja);
			$loja->setNome($row->nome);
			$loja->setFisico($row->fisico);
			$loja->setEndereco($row->endereco);
			
			$lojas[] = $loja;
		}
		return $lojas;
	}
	
	function alterarLoja(Loja $loja){
		
		$qry = "UPDATE public.loja 
				SET 
					nome = '".$loja->getNome()."', 
					fisico = ".$loja->getFisico().", 
					endereco = '".$loja->getEndereco()."' 
				WHERE \"idLoja\" = ".$loja->getId();
		
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				
				if ($state==0) {
					return 1;
				}
				else {
				  	
					//erro de sintaxe
					if ($state=="42601") { 
						return 2;
					}
					
					return 0;
				}
			}
		}
	}
	
	function removerLoja($idLoja){
		
		$qry = "DELETE FROM public.loja 
				WHERE \"idLoja\" = " . $idLoja;
				
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				if ($state==0) {
					return 1;
				}
				else {
				  	
					if ($state=="23503") { 
						return 2;
					}
					
					return 0;
				}
			}
		}
	}
?>