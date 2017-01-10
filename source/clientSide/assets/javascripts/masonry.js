import "desandro/masonry";

// Masonry Initiation
(function($){
	//set body width for IE8
	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
		var ieversion=new Number(RegExp.$1)
		if (ieversion==8) {
			$('body').css('max-width', $(window).width());
		}
	}

	// Change thumb to visible and show loader
	var $masonry = $('.masonry');
	$('#navigation').css({'visibility':'hidden', 'height':'1px'});
	// if ($(document).width() <= 480) {}
	$masonry.imagesLoaded( function(){
		$masonry.masonry({
			itemSelector : '.thumb',
			isFitWidth: true
		}).css('visibility', 'visible');
		$('#ajax-loader-masonry').hide();
		$('.ajax-loader').hide();

	});

//------------------------ ID is used here instead of class masonry, because the old templates used masonry ID so in order not to have current problems used both. But after changing all ID to Class dependent masonry this section should be deleted !!!
/*
	// Change thumb to visible and show loader
	var $masonry = $('#masonry');
	$('#navigation').css({'visibility':'hidden', 'height':'1px'});
	// if ($(document).width() <= 480) {}
	$masonry.imagesLoaded( function(){
		$masonry.masonry({
			itemSelector : '.thumb',
			isFitWidth: true
		}).css('visibility', 'visible');
		$('#ajax-loader-masonry').hide();
	});
*/

})(jQuery);
