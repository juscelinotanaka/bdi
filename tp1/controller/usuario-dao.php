<?php
	
	include("conexao.php");
	include_once("../model/usuario-class.php");

	function cadastrarUsuario($usuario){
		$qry = "INSERT INTO public.usuario ('".$usuario->getNome()."', '".$usuario->getSobrenome()."', '".$usuario->getCpf()."', '".$usuario->getEmail()."', '".$usuario->getSenha()."', '".$usuario->getApelido()."')";
		$result = pg_query($qry);
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
		
	}
	
	function consultarUsuario($id){
		$qry = "SELECT * FROM public.usuario WHERE id =". $id ."";
		$result = pg_query($qry);
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$usuario = new Usuario();
			
			$usuario->setId($row->id);
			$usuario->setNome($row->nome);
			$usuario->setSobrenome($row->apelido);
			$usuario->setCpf($row->cpf);
			$usuario->setEmail($row->email);
			$usuario->setApelido($row->apelido);
			
			return $usuario;
		}
	}
	
	function listarUsuarios(){
		$qry = "SELECT * FROM public.usuario";
		$result = pg_query($qry);
		
		while($row = pg_fetch_object($result)){
			
			$usuario = new Usuario();
			
			$usuario->setId($row->id);
			$usuario->setNome($row->nome);
			$usuario->setSobrenome($row->apelido);
			$usuario->setCpf($row->cpf);
			$usuario->setEmail($row->email);
			$usuario->setApelido($row->apelido);
			
			$usuarios[] = $usuario;
		}
		
		return $usuarios;
	}
	
?>