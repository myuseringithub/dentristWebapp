import 'viljamis/ResponsiveSlides.js';

jQuery(document).ready(function(jQuery) {
  jQuery(".rslides").responsiveSlides({
   auto: true,
   speed: 300,
   timeout: 5000,
   pager: true,
   pause: true,
   nav: false,
   pauseControls: true,
 });
});
