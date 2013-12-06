<?php

	include("conexao.php");
	
	function cadastrarUsuario($nome, $sobrenome, $cpf, $email, $senha, $apelido){
		$qry = "INSERT INTO public.usuario (nome,sobrenome,\"CPF\",email,senha,apelido)  		VALUES ('".$nome."', '".$sobrenome."', '".$cpf."', '".$email."', md5('".$senha."'), '".$apelido."')";
		
		echo $qry;
		
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function listarUsuarios(){
		$qry = "SELECT * FROM public.usuario";
		$result = pg_query($qry)  or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			$usuarios[] = $row;
		}
		
		return $usuarios;
	}

?>