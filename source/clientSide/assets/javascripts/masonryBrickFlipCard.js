import jQuery from "jqueryOne";

jQuery.fn.extend({ // for backward compatibility used to reenable "live" function that is used in the code.
    live: function (event, callback) {
       if (this.selector) {
            jQuery(document).on(event, this.selector, callback);
        }
    }
});

// Flip brick toggle - Onclick flip post
jQuery(document).ready(function(){
	// Element on click - For thr FRONT div
	jQuery('.post-title').live("click",function(e){
	e.preventDefault();
	//add class or remove for parent #flip-toggle
	jQuery(this).parents(".flip-toggle").toggleClass('hover');
	});

	// Element on click - For thr BACK div
	jQuery('.back').live("click", function(e){
	e.preventDefault();
	//add class or remove for parent #flip-toggle
	jQuery(this).parents(".flip-toggle").toggleClass('hover');
	});
});
