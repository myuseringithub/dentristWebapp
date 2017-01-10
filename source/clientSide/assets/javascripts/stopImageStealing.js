import jQuery from "jqueryOne";

jQuery.fn.extend({ // for backward compatibility used to reenable "live" function that is used in the code.
    live: function (event, callback) {
       if (this.selector) {
            jQuery(document).on(event, this.selector, callback);
        }
    }
});

// http://www.dwuser.com/education/content/stop-the-thieves-strategies-to-protect-your-images/
// Stop image stealing.
jQuery(function() {
    var pixelSource = 'http://upload.wikimedia.org/wikipedia/commons/c/ce/Transparent.gif';
    var useOnAllImages = false;
    // Preload the pixel
    var preload = new Image();
    preload.src = pixelSource;
    jQuery('img').live('mouseenter touchstart', function(e) {
        // Only execute if this is not an overlay or skipped
        var img = jQuery(this);
        if (img.hasClass('protectionOverlay')) return;
        if (!useOnAllImages && !img.hasClass('protectMe')) return;
        // Get the real image's position, add an overlay
        var pos = img.offset();
        var overlay = jQuery('<img class="protectionOverlay" src="' + pixelSource + '" width="' + img.width() + '" height="' + img.height() + '" />').css({position: 'absolute', zIndex: 9999999, left: pos.left, top: pos.top}).appendTo('body').bind('mouseleave', function() {
            setTimeout(function(){ overlay.remove(); }, 0, jQuery(this));
        });
        if ('ontouchstart' in window) jQuery(document).one('touchend', function(){ setTimeout(function(){ overlay.remove(); }, 0, overlay); });
    });
});
