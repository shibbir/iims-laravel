$(function () {
	$(document).on('click', '.btn-login', function () {
		var base_url = window.location.protocol + '//' + window.location.host;
		$.ajax({
			url: base_url + 'sessions',
			type: 'POST',
			data: $('.user-login-form').serialize(),
			dataType: 'json',
			success: function (data) {
				if(data.status === 'error') {
					$(document).trigger('event/ajax-end');
					showNotification(data, '#notification-login');
				}
				else {
					window.location = base_url + 'dashboard';
				}
			}
		});
	});
});