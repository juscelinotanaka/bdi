function close_notification() {
	$('#notification').hide(200);
}

function alertar(mensagem, tipo) {
	$('#mensagem').html(mensagem);
	$('#notification').removeClass();
	$('#notification').addClass(tipo);
	$('#notification').addClass('contentCenter');
	$('#notification').css('display','block');
}

function usuarioOK(){
	
	if($('#cadastrarUsuario input[name="nome"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarUsuario input[name="nome"]').focus();
		return false;
	}
	
	if($('#cadastrarUsuario input[name="sobrenome"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarUsuario input[name="nosobrenomeme"]').focus();
		return false;
	}
	
	if($('#cadastrarUsuario input[name="cpf"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('.cadastrarUsuario input[name="cpf"]').focus();
		return false;
	}
	
	if($('#cadastrarUsuario input[name="email"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarUsuario input[name="email"]').focus();
		return false;
	}
	
	if($('#cadastrarUsuario input[name="senha"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarUsuario input[name="senha"]').focus();
		return false;
	}
	
	return true;	
}

function produtoOK(){
	if($('#cadastrarProduto input[name="descricao"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarProduto input[name="descricao"]').focus();
		return false;
	}
	
	if($('#cadastrarProduto input[name="preco"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarProduto input[name="preco"]').focus();
		return false;
	}
	
	return true;
}

function amigoOK(){
	if($('#adicionarAmigo select[name="grau"]').val() == ""){
		alertar('Informe o grau de amizade!', 'warning');
		$('#cadastrarPerfil input[name="descricao"]').focus();
		return false;
	}
	
	return true;
}

function perfilOK(){
	if($('#cadastrarPerfil input[name="descricao"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarPerfil input[name="descricao"]').focus();
		return false;
	}
	
	return true;
}

function lojaOK(){
	if($('#cadastrarLoja input[name="nome"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarLoja input[name="nome"]').focus();
		return false;
	}
	
	if($('#cadastrarLoja input[name="endereco"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarLoja input[name="endereco"]').focus();
		return false;
	}
	
	return true;
}

function fornecedorOK(){
	if($('#cadastrarFornecedor input[name="nome"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarFornecedor input[name="nome"]').focus();
		return false;
	}
	
	return true;
}

function fabricanteOK(){
	if($('#cadastrarFabricante input[name="nome"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('.cadastrarFabricante input[name="nome"]').focus();
		return false;
	}
	
	if($('#cadastrarFabricante input[name="nacionalidade"]').val() == ""){
		alertar('Preencha todos os campos obrigatórios!', 'warning');
		$('#cadastrarFabricante input[name="nacionalidade"]').focus();
		return false;
	}
	
	return true;
}

$(document).ready(function() {
	$('#btnClose').bind('click', close_notification);
});