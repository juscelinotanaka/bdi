function close_notification() {
	$('#notification').hide();
}

$(document).ready(function() {
	$('#btnClose').bind('click', close_notification);
});