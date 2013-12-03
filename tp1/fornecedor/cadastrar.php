<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$fornecedor = new Fornecedor();
		$fornecedor->setNome($_POST['nome']);
		
		$cadastro = cadastrarFornecedor($fornecedor);	
		
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