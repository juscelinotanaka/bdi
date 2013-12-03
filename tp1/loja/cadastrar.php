<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$loja = new Loja();
		$loja->setNome($_POST['nome']);
		$loja->setFisico($_POST['fisico']);
		$loja->setEndereco($_POST['endereco']);
		
		$cadastro = cadastrarLoja($loja);	
		
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