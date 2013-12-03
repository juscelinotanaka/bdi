<?php 
	
	include ("../funcoes.php"); 
	logado();
	
	if ($_POST['acao'] == 'cadastrar') {
		
		$produto = new Produto();
		
		$produto->setNome($_POST['nome']);
		$produto->setDescricao($_POST['descricao']);
		$produto->setTamanho($_POST['tamanho']);
		$produto->setProcessador($_POST['processador']);
		$produto->setRam($_POST['ram']);
		$produto->setHd($_POST['hd']);
		$produto->setVideo($_POST['video']);
		$produto->setPrecoReal($_POST['preco']);
		
		if ($_POST['preco']<1000){
			$produto->setPreco(1);
		}
		else if ($_POST['preco'] >= 1000 && $_POST['preco'] < 2000){
			$produto->setPreco(2);
		}
		else if ($_POST['preco'] >= 2000 && $_POST['preco'] < 3000){
			$produto->setPreco(3);
		}
		else {
			$produto->setPreco(4);
		}
		
		$cadastro = cadastrarProduto($produto);	
		
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