<?php
	include("conexao.php");
	include_once("../model/facricante-class.php");
	
	function cadastrarFabricante(Fabricante $fabricante){
		$qry = "INSERT INTO public.fabricante VALUES ('".$fabricante->getNome()."', '".$fabricante->getNacionalidade()."')";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if(pg_affected_rows($result)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
	
	function consultarFabricante($fabri){
		$qry = "SELECT * FROM public.fabricante WHERE nome = '". $fabri ."'";
		$result = pg_query($qry) or die("Cannot execute query: $qry\n");
		
		if (pg_num_rows($result) == 1){
			$row = pg_fetch_object($result);
			
			$fabricante = new Fabricante();
			
			$fabricante->setId($row->idFabricante);
			$fabricante->setNome($row->nome);
			$fabricante->setNacionalidade($row->nacionalidade);
			
			return $fabricante;
		}
		else{
			return 0;
		}
	}	
?>