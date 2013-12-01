<?php
	include("conexao.php");
	include_once(ABSPATH."model/perfil-class.php");
	
	function cadastrarPerfil(Perfil $perfil){
		$qry = "INSERT INTO notebook.perfil  (\"usuario_idUsuario\",descricao,caracteristicas) VALUES ('".$perfil->getIdUsuario()."','".$perfil->getDescricao()."','".$perfil->getCaracteristicas()."')";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
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