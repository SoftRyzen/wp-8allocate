$(document).ready(function() {
	SetHeightOfLandTitle();

	$('#menu-burger').click(function() {
		var menuFirstPart = $('.menu-li.order-1');
		var menuSecondPart = $('.menu-li.order-3');

		menuFirstPart.css({'opacity':'1','position':'relative',"top":"0","background-color":"rgba(85,85,85,0.5)"});
		menuSecondPart.css({'opacity':'1','position':'relative',"top":"0","background-color":"rgba(85,85,85,0.5)"});

		$('#menu-burger').focus();

		if ($('.mobile-menu').length == 0)
		{
			var menu = "<div class=\"mobile-menu\"></div>";
			$('.header-menu').append(menu);
			$('.mobile-menu').prepend(menuSecondPart);
			$('.mobile-menu').prepend(menuFirstPart);
		}
		else if ($('.mobile-menu').css('opacity') == 1) {
			$('.mobile-menu').css('opacity','0');
		} else if ($('.mobile-menu').css('opacity') == 0) {
			$('.mobile-menu').css('opacity','1');
		}
		
	});

	$('#menu-burger').blur(function() {
		if ($('.mobile-menu').css('opacity') == 1) {
			$('.mobile-menu').css('opacity','0');
		} else if ($('.mobile-menu').css('opacity') == 0) {
			$('.mobile-menu').css('opacity','1');
		}
	});

	/*$('#menu-burger').mouseleave(function(event) {
		$('.menu-burger:focus').length == 1) {
			if ($('.mobile-menu').css('opacity') == 1) {
				$('.mobile-menu').css('opacity','0');
			} else if ($('.mobile-menu').css('opacity') == 0) {
				$('.mobile-menu').css('opacity','1');
			}
		}

	});*/

});

function SetHeightOfLandTitle() {
	
	var headerFlex = $('.block.content .flex-container.with-last-child-fill');

	for(i=0;i<headerFlex.length;i++){
		var headerChildren = $(headerFlex[i]).children();
	
		var menuHeight = parseInt($(headerChildren[0]).css('height')) + parseInt($(headerChildren[0]).css('margin-top'));

		var headerFlexHeight = parseInt($(headerFlex).css('height'));

		$(headerChildren[1]).css({'height': (headerFlexHeight - menuHeight) + "px"});
	}
};