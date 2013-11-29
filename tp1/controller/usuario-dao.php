<?php
	
	include("conexao.php");
	include_once("../model/usuario-class.php");

	function cadastrarUsuario(Usuario $usuario){
		$qry = "INSERT INTO public.usuario VALUES ('".$usuario->getNome()."', '".$usuario->getSobrenome()."', '".$usuario->getCpf()."', '".$usuario->getEmail()."', '".$usuario->getSenha()."', '".$usuario->getApelido()."')";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function consultarUsuario($email, $senha){
		$qry = "SELECT * FROM public.usuario WHERE email = '". $email ."' AND senha = ''". $senha ."'";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$usuario = new Usuario();
			
			$usuario->setId($row->idUsuario);
			$usuario->setNome($row->nome);
			$usuario->setSobrenome($row->apelido);
			$usuario->setCpf($row->cpf);
			$usuario->setEmail($row->email);
			$usuario->setApelido($row->apelido);
			
			return $usuario;
		}
		else{
			return 0;
		}
	}
	
	function listarUsuarios(){
		$qry = "SELECT * FROM public.usuario";
		$result = pg_query($qry)  or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$usuario = new Usuario();
			
			$usuario->setId($row->idUsuario);
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