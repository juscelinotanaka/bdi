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
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarUsuario input[name="nome"]').focus();
		return false;
	}
	
	if($('.cadastrarUsuario input[name="sobrenome"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarUsuario input[name="nosobrenomeme"]').focus();
		return false;
	}
	
	if($('.cadastrarUsuario input[name="cpf"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarUsuario input[name="cpf"]').focus();
		return false;
	}
	
	if($('.cadastrarUsuario input[name="email"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarUsuario input[name="email"]').focus();
		return false;
	}
	
	if($('.cadastrarUsuario input[name="senha"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarUsuario input[name="senha"]').focus();
		return false;
	}
	
	return true;	
}

function perfilOK(){
	if($('.cadastrarPerfil input[name="descricao"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarPerfil input[name="descricao"]').focus();
		return false;
	}
	
	return true;
}

function fabricanteOK(){
	if($('.cadastrarFabricante input[name="nome"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarFabricante input[name="nome"]').focus();
		return false;
	}
	
	if($('.cadastrarFabricante input[name="nacionalidade"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarFabricante input[name="nacionalidade"]').focus();
		return false;
	}
	
	return true;
}

function fornecedorOK(){
	if($('.cadastrarFornecedor input[name="nome"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarFornecedor input[name="nome"]').focus();
		return false;
	}
	
	return true;
}

function produtoOK(){
	if($('.cadastrarProduto input[name="descricao"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarProduto input[name="descricao"]').focus();
		return false;
	}
	
	return true;
}

function lojaOK(){
	if($('.cadastrarLoja input[name="nome"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarLoja input[name="nome"]').focus();
		return false;
	}
	
	if($('.cadastrarLoja input[name="marca"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarLoja input[name="marca"]').focus();
		return false;
	}
	
	if($('.cadastrarLoja input[name="endereco"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarLoja input[name="endereco"]').focus();
		return false;
	}
	
	return true;
}

$(document).ready(function() {
	$('#btnClose').bind('click', close_notification);
});