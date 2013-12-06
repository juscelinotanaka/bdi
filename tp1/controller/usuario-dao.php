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
		$qry = "SELECT * FROM public.usuario WHERE email = '". $email ."' AND senha = md5('". $senha ."')";
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
	
	function listarUsuarios(){
		$qry = "SELECT * FROM public.usuario";
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
	
?>