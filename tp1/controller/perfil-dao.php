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
	
	function consultarPerfil($usuario){
		$qry = "SELECT * FROM notebook.perfil WHERE usuario_idUsuario = ". $usuario ."";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$perfil = new Perfil();
			
			$perfil->setId($row->idPerfil);
			$perfil->setIdUsuario($row->usuario_idUsuario);
			$perfil->setSobrenome($row->descricao);
			$perfil->setCaracteristicas($row->caracteristicas);
			
			return $usuario;
		}
		else{
			return 0;
		}
	}
	
?>