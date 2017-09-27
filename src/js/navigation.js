jQuery( document ).ready( function( $ ) {

"use strict";
	function mobileMenu() {
		let mobileBtn = document.getElementById('mobileBtn');
		if( mobileBtn != undefined ) {
			let menu = document.querySelector('.menu-primary-container');
			menu.classList.toggle('hide');

			mobileBtn.addEventListener('click', function() {
				menu.classList.toggle('hide');
				menu.classList.toggle('menu-open');
				console.log('clicked');
			});
		}
	}
	mobileMenu();

} );