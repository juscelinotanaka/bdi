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

$(document).ready(function() {
	$('#btnClose').bind('click', close_notification);
});