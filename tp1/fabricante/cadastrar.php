<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$fabricante = new Fabricante();
		$fabricante->setNome($_POST['nome']);
		$fabricante->setNacionalidade($_POST['nacionalidade']);
		
		$cadastro = cadastrarFabricante($fabricante);	
		
		if($cadastro){
			echo '<script type="text/javascript">alert("Cadastro realizado com sucesso!");</script>';
		}
		else{
			echo '<script type="text/javascript">alert("Erro no cadastro!");</script>';
		}
	}
	
	getHeader();
	getFooter();
?>