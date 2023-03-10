$(document).ready(function() {

	$(".best-solution .slider").nerveSlider({
		sliderWidth: "100%",
    	sliderHeight: "inherit",
    	showTimer: false,
    	sliderAutoPlay: true,
    	waitForLoad: true,
    	showDots: false,
    	preDelay: 0,
    	slideTransitionDelay: 5000,
    	slideTransitionSpeed: 1000,
    	slideTransition: "slide",
    	showPause: false
	});

	$('.feat-slider').slick({
		centerMode: true,
		nextArrow:".feat-slider-btn.right",
		prevArrow:".feat-slider-btn.left",
		centerPadding: 0,
		slidesToShow: 3,
		responsive: [
    		{
	    		breakpoint: 1100,
		      	settings: {
		        	arrows: true,
		        	centerMode: true,
		        	slidesToShow: 2
		    	}
		    },
		    {
		      	breakpoint: 800,
		      	settings: {
		        	arrows: true,
		        	centerMode: true,
		        	slidesToShow: 1
		      	}
		    }
	  	]
	});

	$('.partners-items').slick({
		centerMode: true,
		autoplay: true,
		autoplaySpeed: 5000,
		centerPadding: 0,
		slidesToShow: 3,
		responsive: [
    		{
	    		breakpoint: 860,
		      	settings: {
		        	arrows: true,
		        	centerMode: true,
		        	slidesToShow: 2
		    	}
		    },
		    {
		      	breakpoint: 700,
		      	settings: {
		        	arrows: true,
		        	centerMode: true,
		        	slidesToShow: 1
		      	}
		    }
	  	]
	});

	$('.menu-item-1').click(function(){
		scrollToId('what-is-it');
		var isMobile = $(this).parent().hasClass('hidden-menu');
		if (isMobile) $('#hmt').prop('checked',false);
	});

	$('.menu-item-2').click(function(){
		scrollToId('why-profitably');
		var isMobile = $(this).parent().hasClass('hidden-menu');
		if (isMobile) $('#hmt').prop('checked',false);
	});

	$('.menu-item-3').click(function(){
		scrollToId('how-it-works');
		var isMobile = $(this).parent().hasClass('hidden-menu');
		if (isMobile) $('#hmt').prop('checked',false);
	});

	$('.menu-item-4').click(function(){
		scrollToId('advantages');
		var isMobile = $(this).parent().hasClass('hidden-menu');
		if (isMobile) $('#hmt').prop('checked',false);
	});

	$('.menu-item-5').click(function(){
		scrollToId('other-services');
		var isMobile = $(this).parent().hasClass('hidden-menu');
		if (isMobile) $('#hmt').prop('checked',false);
	});

	$('.menu-item-6').click(function(){
		scrollToId('contact-us');
		var isMobile = $(this).parent().hasClass('hidden-menu');
		if (isMobile) $('#hmt').prop('checked',false);
	});

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

function scrollToId(aid){
	var aTag = $("div#" + aid + "");
	$('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

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