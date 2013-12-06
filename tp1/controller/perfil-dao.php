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
		$qry = "SELECT * FROM notebook.perfil WHERE \"usuario_idUsuario\" = ". $idUsuario ."";
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
	
	
?>