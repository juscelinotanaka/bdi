<?php
	
	include("funcoes.php");
	
	$usuarios = listarUsuarios();
	
	foreach ($usuarios as $usu){
		print_r($usu);
	}

?>