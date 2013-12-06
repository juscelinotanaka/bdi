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
	
	if($('#cadastrarUsuario input[name="sobrenome"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarUsuario input[name="nosobrenomeme"]').focus();
		return false;
	}
	
	if($('#cadastrarUsuario input[name="cpf"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarUsuario input[name="cpf"]').focus();
		return false;
	}
	
	if($('#cadastrarUsuario input[name="email"]').val() == ""){
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

function produtoOK(){
	if($('#cadastrarProduto input[name="descricao"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarProduto input[name="descricao"]').focus();
		return false;
	}
	
	if($('#cadastrarProduto input[name="preco"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarProduto input[name="preco"]').focus();
		return false;
	}
	
	return true;
}

function perfilOK(){
	if($('#cadastrarPerfil input[name="descricao"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarPerfil input[name="descricao"]').focus();
		return false;
	}
	
	return true;
}

function lojaOK(){
	if($('#cadastrarLoja input[name="nome"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarLoja input[name="nome"]').focus();
		return false;
	}
	
	if($('#cadastrarLoja input[name="endereco"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarLoja input[name="endereco"]').focus();
		return false;
	}
	
	return true;
}

function fornecedorOK(){
	if($('#cadastrarFornecedor input[name="nome"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarFornecedor input[name="nome"]').focus();
		return false;
	}
	
	return true;
}

function fabricanteOK(){
	if($('#cadastrarFabricante input[name="nome"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('.cadastrarFabricante input[name="nome"]').focus();
		return false;
	}
	
	if($('#cadastrarFabricante input[name="nacionalidade"]').val() == ""){
		alert('Preencha todos os campos obrigatórios!');
		$('#cadastrarFabricante input[name="nacionalidade"]').focus();
		return false;
	}
	
	return true;
}

function validaFloat(e){
	var NON_CHAR_KEY_CODES = [8,9,16,17,18,19,20,27,33,34,35,36,37,38,39,40,45,46,91,92,93,188];
		var c = String.fromCharCode(e.keyCode);
		var regexp = /[^0-9`-i\,n]/;
		return !regexp.test(c)||$.inArray(e.keyCode,NON_CHAR_KEY_CODES)!=-1||((e.ctrlKey||e.metaKey) && $.inArray(e.keyCode,[67,88])!=-1);
}

function formataDouble(obj) { 
        var expressao = /^([0-9]+)(\.([0-9]+)?)?$/; 
        if(!expressao.test(obj.value)) { 
                if(obj.value.indexOf(".") > 0) { 
                        var value = obj.value.split("."); 
                        obj.value = value[0] + "." + value[1]; 
                } 
        } 
} 

function validateDecimal(value)    {
        var RE = /^\d*\.?\d*$/;
        if(RE.test(value)){
           return true;
        }else{
           return false;
        }
    }


$(document).ready(function() {
	$('#btnClose').bind('click', close_notification);
});