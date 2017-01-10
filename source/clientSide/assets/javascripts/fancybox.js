import 'fancybox';

//http://fancyapps.com/fancybox/#instructions
jQuery(document).ready(function() {
	/*
	 *  Custom Button-thumb helper. Disable animations, hide close button, change title type and content, and Disable animations, hide close button, arrows and slide to next gallery item if clicked.
	 */
	jQuery('.fancybox-buttons-thumb').fancybox({
		openEffect  : 'none', // Disable animations.
		closeEffect : 'none', // Disable animations.

		prevEffect : 'none', // Disable animations.
		nextEffect : 'none', // Disable animations.

		closeBtn  : true,
		live	  : false,  // apply only to current files
		arrows    : true,  // navigation arrows
		nextClick : true, // on click show next image

		helpers : {
			title : { // change title type and content
				type : 'inside'
			},
			buttons	: {},
			thumbs : { // Thumbnails
				width  : 50,
				height : 50
			}
		},
		afterLoad : function() {
			this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});
});
