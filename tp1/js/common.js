function close_notification() {
	$('#notification').hide(200);
}

$(document).ready(function() {
	$('#btnClose').bind('click', close_notification);
});