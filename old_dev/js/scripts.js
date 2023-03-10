$('document').ready(function(){
	$('body').on('click', '.not-active-circle', function(){
		$('body').find('.active-circle').removeClass('active-circle').addClass('not-active-circle');
		var currentCircle = $(this);
		$('body').find('.not-active-text').each(function(index, value){
			if ($(value).attr('data-id') == $(currentCircle).attr('data-id')) {
				$('body').find('.active-text').removeClass('active-text').addClass('not-active-text');
				$(value).removeClass('not-active-text').addClass('active-text');
			}
 
		});
		$(this).removeClass('not-active-circle');
		$(this).addClass('active-circle');
	});

	$('#navbarDropdownMenuLink').on('click', function(){
		$('#navbarDropdownMenuLink').css('visibility','hidden');
	})
	$('body').on('click', function(){
		$('#navbarDropdownMenuLink').css('visibility', 'visible');
	})

	$('.img-sm').on('mouseover', function(){
		$(this).find('.button').show({duration:'10000'});
	})
	$('.img-sm').on('mouseout', function(){
		$(this).find('.button').hide({duration:'10000'});
	})
	$('.button-item').on('click', function () {
		$('.nav__select__menu__our__container').css('display','none');
		$('.hidden-text').css('display','block');
	})
	$('#back-to-buttons').on('click', function(){
		$('.hidden-text').css('display','none');
		$('.nav__select__menu__our__container').css('display','block');
	})
		$(".card-block").on('click', function(){
			$(".section__cards").css('display','none');
			$(".section__inform").css('display','block');
		})
		$(".back-to-cards").on('click', function(){
			$(".section__inform").css('display','none');
			$(".section__cards").css('display','block');
		})
		$(".buttonApply").on('click', function(){
			$(".section__inform").css('display','none');
			$(".section__form").css('display','block');
		})
		$(".back-to-inform").on('click', function(){
			$(".section__form").css('display','none');
			$(".section__inform").css('display','block');
		})	
		$("#our_work_left").on('click', function(){
			$(".first_page").css('display','block');
			$(".second_page").css('display','none');
		})	
		$("#our_work_right").on('click', function(){
			$(".second_page").css('display','block');
			$(".first_page").css('display','none');
		})
});