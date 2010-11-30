$(document).ready(function() {
	$('#footer').click(footerClick);
	$('#quick_link').click(quickLinkClick);
	
	//popup
	$('#btnCancel').click(closePopup);
	$('#addSection form').submit(popupSubmit);
	
	$('form input[type=text], form input[type=textarea]')
		.focus(function() {
			$(this).prev()[0].className = 'focus';
		})
		.focusout(function() {
			if($(this).val() == ''){
				$(this).prev()[0].className = '';
			}
		})
		.keydown(function() {
			$(this).prev()[0].className = 'has_text';
		});
});

function footerClick(e) {
	switch (e.target.className) {
		case 'page_menu':
			$('#quick_link').fadeToggle();
			break;
	
		default:
			break;
	}	
}

function quickLinkClick(e) {
	switch (e.target.id) {
		case 'insert':
			$('#addSection').fadeIn();
			break;
		case 'home':
			window.location = $(e.target).attr('href');
			break;
		default:
			break;
	}	
	
	$(this).fadeOut();
	return false;	
}

function closePopup(e) {
	$('#addSection').fadeOut();
}

function popupSubmit(e) {
	var data = $(this).serializeArray();
	
	//valid data at client
	hideError();
	
	$.ajax({
		url: context + '/' + controller + '/add',
		type: 'POST',
		dataType: 'json',
		data: data,
		success: function(data) {
			if(data.success){
				//success
			} else {
				for (var key in data.message) {     					
				    showError( $('#' + key).parent(), 'error', data.message[key] );
				}				
			}
		}
	});
	
	return false;
}

function showError(container, type, message) {
	var className = type + '-message msg';
	var div = container.children('.' + className).first();
	if( div.size() > 0 ){
		div.html(message)
			.get(0)
				.className = className;
		div.show();
	} else {
		$('<div class="'+ className +'">'+ message +'</div>').appendTo(container);
	}	
}

function hideError() {
	$('.msg').hide();
}