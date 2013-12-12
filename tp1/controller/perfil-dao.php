<?php
	include("conexao.php");
	include_once(ABSPATH."model/perfil-class.php");
	
	function cadastrarPerfil(Perfil $perfil){
		$qry = "INSERT INTO notebook.perfil  (\"usuario_idUsuario\", descricao, caracteristicas) VALUES ('".$perfil->getIdUsuario()."','".$perfil->getDescricao()."','".$perfil->getCaracteristicas()."')";
		
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				
				if ($state==0){
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
	
	function consultarPerfil($idUsuario){
		$qry = "SELECT * FROM notebook.perfil 
				WHERE \"usuario_idUsuario\" = ". $idUsuario ."";
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");

		
		while($row = pg_fetch_object($result)){
			
			$perfil = new Perfil();
			
			$perfil->setId($row->idPerfil);
			$perfil->setIdUsuario($row->usuario_idUsuario);
			$perfil->setDescricao($row->descricao);
			$perfil->setCaracteristicas($row->caracteristicas);
			
			
			$perfis[] = $perfil;
		}
		return $perfis;
			
	}
	
	function consultarPerfilAlteracao($idPerfil){
		$qry = "SELECT * FROM notebook.perfil 
				WHERE \"idPerfil\" = ". $idPerfil;
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");

		if (pg_num_rows($result) > 0){
			$row = pg_fetch_object($result);
			
			$perfil = new Perfil();
			
			$perfil->setId($row->idPerfil);
			$perfil->setIdUsuario($row->usuario_idUsuario);
			$perfil->setDescricao($row->descricao);
			$perfil->setCaracteristicas($row->caracteristicas);
			
			return $perfil;
		}
		else{
			return 0;
		}
		
			
	}
	
	function listarPerfis($idUsuario){
		$qry = "SELECT * FROM notebook.\"viewPerfil\" 
				WHERE \"usuario_idUsuario\" = ". $idUsuario ."";
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");

		
		while($row = pg_fetch_object($result)){
			
			$perfil = new Perfil();
			
			$perfil->setId($row->idPerfil);
			$perfil->setIdUsuario($row->usuario_idUsuario);
			$perfil->setDescricao($row->descricao);
			$perfil->setCaracteristicas($row->caracteristicas);
			$perfil->setTamanho($row->tamanho);
			$perfil->setProcessador($row->processador);
			$perfil->setRam($row->ram);
			$perfil->setHd($row->hd);
			$perfil->setVideo($row->video);
			$perfil->setPreco($row->preco);
			$perfil->setFabricante($row->fabricante);
			
			$perfis[] = $perfil;
		}
		return $perfis;
			
	}
	
	function alterarPerfil(Perfil $perfil){
		
		$qry = "UPDATE notebook.perfil 
				SET 
					descricao = '".$perfil->getDescricao()."', 
					caracteristicas = '".$perfil->getCaracteristicas()."' 
				WHERE \"idPerfil\" = ".$perfil->getId()."";
		
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				
				if ($state==0){
					return 1;
				}
				else {
				  	
					//unique
					if ($state=="23505") { 
						return 2;
					}
					
					return 0;
				}
			}
		}
	}
	
	function removerPerfil($idUsuario, $idPerfil){
		
		/*
			DELETE FROM some_child_table WHERE some_fk_field IN SELECT some_id FROM some_Table;
			DELETE FROM some_table;
		*/
		
		$qry = "DELETE FROM notebook.perfil 
				WHERE \"usuario_idUsuario\" = " . $idUsuario . " AND \"idPerfil\" = " . $idPerfil;
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_affected_rows($result) == 1){
			return 1;
		}
		else{
			return 0;
		}
	}
?>