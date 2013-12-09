<?php
	
	include("funcoes.php");
	
	$usuarios = listarUsuarios();
	
	foreach ($usuarios as $usu){
		echo "ID: ".$usu->idUsuario."<br>";
		echo "Nome: ".$usu->nome."<br>";
		echo "Sobrenome: ".$usu->sobrenome."<br>";
		echo "CPF: ".$usu->cpf."<br>";
		echo "E-mail: ".$usu->email."<br>";
		echo "Apelido: ".$usu->apelido."<br><br>";
	}

?>