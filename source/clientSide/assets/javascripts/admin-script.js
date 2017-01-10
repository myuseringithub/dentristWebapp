// SC Question postcontrol - Change select box to radio type
jQuery(document).ready(function(){
	// Change Selectbox to Radio type only for single choice question ("#acf-answer")
	jQuery("#acf-answer input").click(function() {
		jQuery("#acf-answer input").attr('checked', false);
		jQuery(this).attr('checked', true);
	});

});
