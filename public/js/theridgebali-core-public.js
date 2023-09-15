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

	// Select the header element with the class .nav-sticky
	const navSticky = document.querySelector('.nav-sticky');

	// Function to add the .navigation-sticky-active class
	function addStickyClass() {
	  // Check if the user has scrolled 50 pixels or more
	  if (window.scrollY >= 50) {
	    // Add the .navigation-sticky-active class
	    navSticky.classList.add('theridge-sticky-active');
	  } else {
	    // Remove the .navigation-sticky-active class if not scrolled 50 pixels
	    navSticky.classList.remove('theridge-sticky-active');
	  }
	}

	// Add an event listener to the window's scroll event
	window.addEventListener('scroll', addStickyClass);

	document.addEventListener('DOMContentLoaded', function() {
	    const menuHoverArrows = document.querySelectorAll('.menu-hover-arrow');

	    menuHoverArrows.forEach(menuItem => {
	        const svgElem = document.createElementNS("http://www.w3.org/2000/svg", "svg");
	        svgElem.setAttribute("width", "15");
	        svgElem.setAttribute("height", "50");
	        svgElem.setAttribute("viewBox", "0 0 15 50");
	        svgElem.setAttribute("fill", "none");

	        const pathElem = document.createElementNS("http://www.w3.org/2000/svg", "path");
	        pathElem.setAttribute("d", "M8.07692 -3.6606e-07L8.07692 46.7334L14.1346 39.4057L15 40.3269L7.5 49.3992L-1.45724e-06 40.3269L0.865384 39.4057L6.92307 46.7334L6.92308 -4.2707e-07L8.07692 -3.6606e-07Z");
	        pathElem.setAttribute("fill", "white");

	        svgElem.appendChild(pathElem);
	        menuItem.appendChild(svgElem);
	    });
	});

	document.addEventListener("DOMContentLoaded", function() {
		if (document.body.classList.contains('page-id-1276')) {
			const herofloorplanBtn = document.querySelector("#BtntoTrbiFloorplan a");
			const spesificationBtn = document.querySelector("#toTrbiSpesification a");
		    const floorplanBtn = document.querySelector("#toTrbiFloorplan a");
		    const amenitiesBtn = document.querySelector("#toTrbiAmenities a");
		    
		    const spesificationSection = document.querySelector("#trbi-Spesification");
		    const floorplanSection = document.querySelector("#trbi-Floorplan");
		    const amenitiesSection = document.querySelector("#trbi-Amenities");

		    herofloorplanBtn.addEventListener("click", function(e) {
		        e.preventDefault(); // Mencegah perilaku default anchor
		        spesificationSection.style.display = "block"; 
		        floorplanSection.style.display = "block"; // Tampilkan floorplan section
		        amenitiesSection.style.display = "none"; // Sembunyikan amenities section
		    });

		    spesificationBtn.addEventListener("click", function(e) {
		    	spesificationSection.style.display = "block";
		    });

		    floorplanBtn.addEventListener("click", function(e) {
		        e.preventDefault(); // Mencegah perilaku default anchor
		        floorplanSection.style.display = "block"; // Tampilkan floorplan section
		        amenitiesSection.style.display = "none"; // Sembunyikan amenities section
		    });

		    amenitiesBtn.addEventListener("click", function(e) {
		        e.preventDefault(); // Mencegah perilaku default anchor
		        amenitiesSection.style.display = "block"; // Tampilkan amenities section
		        floorplanSection.style.display = "none"; // Sembunyikan floorplan section
		    });
		}
	});

	// Get the <a> element
	var linkElement = document.querySelector(".elementor-icon-list-item .elementor-post-info__item--type-custom a");

	// Check if the <a> element exists
	if (linkElement) {
	  // Create a new text node with the same text content as the <a> element
	  var newText = document.createTextNode(linkElement.textContent);
	  
	  // Replace the <a> element with the new text node
	  linkElement.parentNode.replaceChild(newText, linkElement);
	}

})( jQuery );