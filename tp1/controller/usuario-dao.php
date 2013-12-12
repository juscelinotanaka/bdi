<?php
	
	include("conexao.php");
	include_once(ABSPATH."model/usuario-class.php");
	
	function cadastrarUsuario(Usuario $usuario){
		$qry = "INSERT INTO public.usuario (nome,sobrenome,\"CPF\",email,senha,apelido)  VALUES ('".$usuario->getNome()."', '".$usuario->getSobrenome()."', '".$usuario->getCpf()."', '".$usuario->getEmail()."', md5('".$usuario->getSenha()."'), '".$usuario->getApelido()."')";
		
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
	
	function consultarUsuario($email, $senha){
		$qry = "SELECT * FROM public.usuario 
				WHERE email = '". $email ."' AND senha = md5('". $senha ."')";
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$usuario = new Usuario();
			
			$usuario->setId($row->idUsuario);
			$usuario->setNome($row->nome);
			$usuario->setSobrenome($row->sobrenome);
			$usuario->setCpf($row->cpf);
			$usuario->setEmail($row->email);
			$usuario->setApelido($row->apelido);
			
			return $usuario;
		}
		else{
			return 0;
		}
	}
	
	function pesquisarUsuario($idUsuario){
		$qry = 'SELECT * FROM public.usuario 
				WHERE "idUsuario" = '.$idUsuario.'';
				
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$usuario = new Usuario();
			
			$usuario->setId($row->idUsuario);
			$usuario->setNome($row->nome);
			$usuario->setSobrenome($row->sobrenome);
			$usuario->setCpf($row->CPF);
			$usuario->setEmail($row->email);
			$usuario->setApelido($row->apelido);
			
			return $usuario;
		}
		else{
			return 0;
		}
	}
	
	function listarUsuarios($idUsuario){
		$qry = 'SELECT * FROM public.usuario 
				WHERE "idUsuario" <> '.$idUsuario.'';
				
		$result = pg_query($qry)  or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$usuario = new Usuario();
			
			$usuario->setId($row->idUsuario);
			$usuario->setNome($row->nome);
			$usuario->setSobrenome($row->sobrenome);
			$usuario->setCpf($row->cpf);
			$usuario->setEmail($row->email);
			$usuario->setApelido($row->apelido);
			
			$usuarios[] = $usuario;
		}
		
		return $usuarios;
	}
	
	function alterarUsuario(Usuario $usuario){
		
		$qry = "UPDATE public.usuario 
				SET 
					nome = '".$usuario->getNome()."', 
					sobrenome = '".$usuario->getSobrenome()."', 
					\"CPF\" = '".$usuario->getCpf()."', 
					email = '".$usuario->getEmail()."', 
					senha = md5('".$usuario->getSenha()."'), 
					apelido = '".$usuario->getApelido()."' 
				WHERE \"idUsuario\" = " . $usuario->getId();
		
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
	
	function removerUsuario($idUsuario){
		
		$qry = "DELETE FROM public.amizade a 
				WHERE a.\"usuario_idUsuario\" =  " . $idUsuario." OR a.\"usuario_idAmigo\" =  " . $idUsuario.";
				
				DELETE FROM notebook.perfil p 
				WHERE p.\"usuario_idUsuario\" =  " . $idUsuario.";
				
				DELETE FROM notebook.recomendacao r 
				WHERE r.\"amizade_idUsuario\" =  " . $idUsuario.";
				
				DELETE FROM public.usuario u
				WHERE u.\"idUsuario\" = " . $idUsuario.";";
				
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