<?php
	include("conexao.php");
	include_once("../model/amizade-class.php");
	
	function cadastrarAmizade(Amizade $amizade){
		$qry = "INSERT INTO public.amizade VALUES ('".$amizade->getIdUsuario()."','".$amizade->getIdAmigo()."','".$amizade->getGrau()."')";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function consultarAmizade($idU, $idA){
		$qry = "SELECT * FROM public.amizade WHERE idusuario = '". $idU ."' AND idamigo = '". $idA ."'";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$amizade = new Amizade();
			
			$amizade->setId($row->id);
			$amizade->setIdUsuario($row->idusuario);
			$amizade->setIdAmigo($row->idamigo);
			$amizade->setGrau($row->grau);
			
			return $amizade;
		}
		else{
			return 0;
		}
	}
	
	function listarAmigos($id){
		$qry = "SELECT * FROM public.amizade WHERE idusuario = '". $id ."'";
		$result = pg_query($qry)  or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$amizade = new Amizade();
			
			$amizade->setId($row->id);
			$amizade->setIdUsuario($row->idusuario);
			$amizade->setIdAmigo($row->idamigo);
			$amizade->setGrau($row->grau);
			
			$amigos[] = $amizade;
		}
		
		return $amigos;
	}
?>