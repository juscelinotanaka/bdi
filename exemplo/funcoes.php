<?php

	include("conexao.php");
	
	conectarBD();
	
	function cadastrarUsuario($nome, $sobrenome, $cpf, $email, $senha, $apelido){
		$qry = "INSERT INTO public.usuario (nome,sobrenome,\"CPF\",email,senha,apelido)  		VALUES ('".$nome."', '".$sobrenome."', '".$cpf."', '".$email."', md5('".$senha."'), '".$apelido."')";
		
		//echo $qry;
		
		$db = conectarBD();
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				if ($state==0 && (pg_affected_rows($result) > 0)) {
					return 1;
				}
				else {
				  // some error happened
					if ($state=="23505") { // unique_violation
						// process specific error
						echo "unique:  " . $state;
						return 0;
					}
				}
			}
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