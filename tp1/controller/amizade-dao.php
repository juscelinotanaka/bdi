<?php
	include("conexao.php");
	include_once(ABSPATH."model/amizade-class.php");
	
	function cadastrarAmizade(Amizade $amizade){
		$qry = "INSERT INTO public.amizade  (\"usuario_idUsuario\",\"usuario_idAmigo\",grau) VALUES ('".$amizade->getIdUsuario()."','".$amizade->getIdAmigo()."','".$amizade->getGrau()."')";
		
		global $db;
		
		if (pg_send_query($db, $qry)) {
			$res=pg_get_result($db);
			
			if ($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				
				if ($state==0) {
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
	
	function consultarAmizade($idU, $idA){
		$qry = "SELECT * FROM public.amizade WHERE usuario_idUsuario = '". $idU ."' AND idamigo = '". $idA ."'";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$amizade = new Amizade();
			
			$amizade->setId($row->idAmizade);
			$amizade->setIdUsuario($row->usuario_idUsuario);
			$amizade->setIdAmigo($row->usuario_idAmigo);
			$amizade->setGrau($row->grau);
			
			return $amizade;
		}
		else{
			return 0;
		}
	}
	
	function listarAmigos($id){
		$qry = "SELECT * FROM public.amizade WHERE usuario_idUsuario = '". $id ."'";
		$result = pg_query($qry)  or die("Cannot execute query: $qry\n");
		
		while($row = pg_fetch_object($result)){
			
			$amizade = new Amizade();
			
			$amizade->setId($row->idAmizade);
			$amizade->setIdUsuario($row->usuario_idUsuario);
			$amizade->setIdAmigo($row->usuario_idAmigo);
			$amizade->setGrau($row->grau);
			
			$amigos[] = $amizade;
		}
		
		return $amigos;
	}
?>