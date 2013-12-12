<?php
	include("conexao.php");
	include_once(ABSPATH."model/fabricante-class.php");
	
	function cadastrarFabricante(Fabricante $fabricante){
		$qry = "INSERT INTO notebook.fabricante (nome,nacionalidade) VALUES ('".$fabricante->getNome()."', '".$fabricante->getNacionalidade()."')";
		
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
	
	function consultarFabricante($fabri){
		$qry = "SELECT * FROM notebook.fabricante 
				WHERE nome = '". $fabri ."'";
		
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$fabricante = new Fabricante();
			
			$fabricante->setId($row->idFabricante);
			$fabricante->setNome($row->nome);
			$fabricante->setNacionalidade($row->nacionalidade);
			
			return $fabricante;
		}
		else{
			return 0;
		}
	}
	
	function listarFabricantes(){
		$qry = "SELECT * FROM notebook.fabricante";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		while ($row = pg_fetch_object($result)){
			
			$fabricante = new Fabricante();
			
			$fabricante->setId($row->idFabricante);
			$fabricante->setNome($row->nome);
			$fabricante->setNacionalidade($row->nacionalidade);
			
			$fabricantes[] = $fabricante;
		}
		
		return $fabricantes;
	}	
	
	function alterarFabricante(Fabricante $fabricante){
		
		$qry = "UPDATE notebook.fabricante 
				SET 
					nome = '".$fabricante->getNome()."', 
					nacionalidade = '".$fabricante->getNacionalidade()."' 
				WHERE \"idFabricante = \"" . $fabricante->getId();
		
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
	
	function removerFabricante($idFabricante){
		
		/*
			DELETE FROM some_child_table WHERE some_fk_field IN SELECT some_id FROM some_Table;
			DELETE FROM some_table;
		*/
		
		$qry = "DELETE FROM notebook.fabricante 
				WHERE \"idFabricante\" = " . $idFabricante;
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			return 1;
		}
		else{
			return 0;
		}
	}
?>