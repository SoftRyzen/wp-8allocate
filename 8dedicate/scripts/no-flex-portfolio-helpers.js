$(document).ready(function() {

	$(function() {
    	$(".contact-form").click(function(){
    		$('.form_window').fadeIn().addClass("windactiv");
    		$(".overlay").fadeIn();
	  	});
	  	$(".overlay, .bw_close").click(function(){
	  		$(".windactiv").fadeOut();
	  		$(".overlay").fadeOut();
	  });
	});
});

function sendRequest(){

	var form = $('.form_just')[0];
	if (!validateForm(form)) return;

	$.ajax({
		type: "POST",
		url: "scripts/sendRequest.php",
		data: {
			name: $('.form_just input[name="name"]').val(),
			comp: $('.form_just input[name="comp"]').val(),
			spec: $('.form_just input[name="spec"]').val(),
			email: $('.form_just input[name="email"]').val(),
			phone: $('.form_just input[name="phone"]').val()
		},
		error: function(xhr, ajaxOptions, thrownError){
			alert(xhr.responseText);
			alert(thrownError);
		},
		beforeSend: function() {
			$('.form_just').css({"height":"0","opacity":"0"});
			$('.form-loader').css({"height":"64px","opacity":"1"});
		},
		complete: function(response) {
			$('.form-loader').css({"height":"0","opacity":"0"});
		},
		success: function(response) {
			$('.form-loader').css({"height":"0","opacity":"0"});
			$('.form_just').trigger('reset');
			$('.form_just').css({"height":"100%","opacity":"1"});
			$('#form-message').html(response);
			$('#form-message').slideDown('fast', function() {
				setTimeout(function(){$('#form-message').slideUp()}, 3000);	
			});
		}
	})
}

function validateForm(form){
	var result = true;
	var fieldCount = form.length;
	for(i=0; i < fieldCount; i++){
		if (form[i].type == "text" && form[i].required == true) {
			if (form[i].value == undefined || form[i].value == "") {
				$(form[i]).addClass('emptyField');
				result = false;
			} else {
				if ($(form[i]).hasClass('emptyField'))
					$(form[i]).removeClass('emptyField');
			}
		}
	}
	return result;
}
