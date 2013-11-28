<?php
	include("conexao.php");
	//include_once("../model/usuario-class.php");

	$qry = "INSERT INTO bd_tp1.usuario (nome, sobrenome, cpf, email, senha) VALUES ('HENRIQUE', 'HENRIQUE', 'HENRIQUE', 'HENRIQUE', 'HENRIQUE')";
	pg_query($qry);
	
	function cadastrarUsuario($usuario){
		$qry = 'INSERT INTO bd_tp1.usuario (null, "HENRIQUE", "HENRIQUE", "HENRIQUE", "HENRIQUE", "HENRIQUE")';
		pg_query($qry);
	}
	
	function consultarUsuario($usuario){
	}
	
?>