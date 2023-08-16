(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	function navbarRidge() {
    var $body = jQuery('body');
    var $navTrigger = jQuery('.nav-trigger');

    $navTrigger.on('click', function(e) {
        e.stopPropagation(); // Prevent the click from propagating to the body
        $body.toggleClass('menu-active');
    });

    // Close the menu when clicking outside
    jQuery(document).on('click', function(e) {
        if (!$navTrigger.is(e.target) && !$body.has(e.target).length) {
            $body.removeClass('menu-active');
        }
    });
	}

	jQuery(document).ready(function() {
	    navbarRidge();
	});


})( jQuery );
