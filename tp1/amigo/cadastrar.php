<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'adicionar') {
		
		$amizade = new Amizade();
		$amizade->setIdUsuario($_SESSION['idUsuario']);
		$amizade->setIdAmigo($_POST['idAmigo']);
		$amizade->setGrau($_POST['grau']);
		
		$cadastro = cadastrarAmizade($amizade);	
		
		if($cadastro){
			echo '<script type="text/javascript">alert("Amigo adicionado com sucesso!");</script>';
		}
		else{
			echo '<script type="text/javascript">alert("Erro no cadastro!");</script>';
		}
	}
	
	getHeader();
	getFooter();
?>