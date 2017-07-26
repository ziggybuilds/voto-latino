jQuery( document ).ready( function( $ ) {

"use strict";

const $mobileNav = document.getElementById('mobileNav'),
	$mobileBtn = document.getElementById('mobileMenuBtn'),
	$mobileMenu = document.getElementById('menuDropdown');


$($mobileBtn).click(function() {
	// Check if target has open class
	if(  $($mobileMenu).hasClass('mobile-overlay-closed') ) {
		TweenMax.to($mobileMenu, 1, {top: '0'});

		$($mobileMenu).removeClass('mobile-overlay-closed');

		$($mobileBtn).toggleClass("is-active");

	} else if ( !$($mobileMenu).hasClass('mobile-overlay-closed') ) {
		TweenMax.to($mobileMenu, 1, {top: '-200%'});

		$($mobileMenu).addClass('mobile-overlay-closed');
		
		$($mobileBtn).toggleClass("is-active");
	}
});

// Smooth scrolling behavior
function smoothScroll() {
  $(document).ready(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 500, function(){
     
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });
}

smoothScroll();



} );