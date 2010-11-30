$(document).ready(function() {
	
});

function createAccount(e) {
	var accountName = $.trim( $('#AccountName').val() );
	if(accountName != ''){
		$.ajax({
			url : context + '/accounts/create',
			data : { name : accountName },
			type: 'POST',
			dataType: 'json',
			success: function(obj) {
				if(obj.status){
					
				} else {
					alert(obj.message)
				}
			}
		});
		
		$('#AccountCreateForm').dialog('close');
	}
	return false;
}

function showCreateAccountDialog(e) {
	$('#AccountCreateForm').dialog({ title: 'Create Account' });
}