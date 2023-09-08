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
    jQuery('.nav-trigger').on('click', function(e) {
        jQuery('body').toggleClass('menu-active');
        e.stopPropagation(); // Prevent the click event from propagating to the document
    });

    jQuery('#navigation').on('click', function(e) {
        e.stopPropagation(); // Prevent the click event from propagating to the document
    });

    // Close the menu when clicking outside
    jQuery(document).on('click', function(e) {
        if (!jQuery(e.target).closest('.nav-trigger').length && jQuery('body').hasClass('menu-active')) {
            jQuery('body').removeClass('menu-active');
        }
    });
	}

	jQuery(document).ready(function() {
	    navbarRidge();
	});

	window.addEventListener('scroll', function() {
	    const header = document.getElementById('navSticky');
	    const scrollPosition = window.scrollY;

	    if (scrollPosition > 98) {
	      header.classList.add('sticky-header');
	    } else {
	      header.classList.remove('sticky-header');
	    }
	  });


})( jQuery );
