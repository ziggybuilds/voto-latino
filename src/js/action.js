jQuery( document ).ready( function( $ ) {

"use strict";

// Helper function to check homepage
function checkHome() {
  if( document.body.classList.contains('home')) {
  	return true;
  }
}

// Hover State of the vertical boxes
function classOnHover(list) {
	list.forEach( function(item) {
		let color = item.querySelector('div.overlay');
		let content = item.querySelector('div.content');
		
		content.addEventListener('mouseenter', function(event) {
			TweenMax.to(color, .4, {css: {opacity: '.9'}});
		});
		content.addEventListener('mouseleave', function(event) {
			TweenMax.to(color, .4, {css: {opacity: '.6'}});
		});
	});
}

const vertBoxes = document.querySelectorAll('div.split-vertical');
classOnHover(vertBoxes);

// Ticker Tape hider
function hideTicker() {
	const ticker = document.getElementById('tickerHide');
	const tape = document.getElementById('tickerTape');
	const social = document.getElementById('socialCorner');
	ticker.addEventListener('click', (e) => {
		TweenMax.to(tape, .4, {css: {opacity: '0'}});

		let timeline = new TimelineMax();
		timeline.to(social, .4, {bottom: '20px'});
		timeline.to(tape, 0, {css: {display: 'none'}});
	});
}
hideTicker();

// Responsize menu

const menu = document.querySelector('.primary-menu');
const navbar = document.querySelector('.navbar');

function responsiveMenu() {
	let more = navbar.querySelector('li.menuDropCtrl');
	more.innerHTML = 'More <i class="fa fa-chevron-down" aria-hidden="true"></i>'

	const addMenu = document.querySelector('#addMenu');
	menu.addEventListener('mouseover', (e) => {
		if(addMenu.getAttribute('data-state') === 'closed') {
			TweenMax.to(addMenu, 0, {css: {opacity: '0'}});
			TweenMax.to(addMenu, 0, {css: {display: 'block'}});
			TweenMax.to(addMenu, .4, {css: {opacity: '1'}});
			addMenu.setAttribute('data-state', 'open');
		}
	});
	addMenu.addEventListener('mouseleave', (e) => {
		if(addMenu.getAttribute('data-state') === 'open') {
			TweenMax.to(addMenu, .4, {css: {opacity: '0'}});
			TweenMax.to(addMenu, .2, {css: {display: 'none'}});
			addMenu.setAttribute('data-state', 'closed');
		}
	});
}

responsiveMenu();

const videoModules = document.querySelectorAll('.video-module');
function stripIframe(list) {
	list.forEach(function(item) {
		let video = item.querySelector('iframe');
			video.removeAttribute("width");
			video.removeAttribute("height");
	});
}

stripIframe(videoModules);


window.addEventListener('resize', function() {

});

// Fix WP Caption width
$('.wp-caption').removeAttr('style');

function formControl() {
	let time = 5000;
	if( popUp.getAttribute('data-control') === 'active') {
		setTimeout(function(time){
			let tl = new TimelineMax();
				tl.to(popUp, 0, {
					css: {
						opacity: '0',
						display: 'block'
					}
				})
				tl.to(popUp, .2, {
					css: {
						opacity: '1'
					}
				})
		}, time);
	}
}

function formClose() {
	let button = popUp.querySelector('#formClose');
	button.addEventListener('click', function(e) {
		let tl = new TimelineMax();
				tl.to(popUp, .2, {
					css: {
						opacity: '0',
						display: 'none'
					}
				})
		this.classList.remove('is-active');
	});
}

// Set session
function cachedForm() {
	var test = sessionStorage.getItem('firstVisit');
	 if (test == null) {
	      if(checkHome() === true) {
	      	const popUp = document.getElementById('#popUp');
		formControl();
		formClose();
	      }
	      sessionStorage.setItem('firstVisit', '1');
	    }
}
cachedForm();


// Smooth scrolling behavior for video link
function smoothScroll() {
  if(checkHome() === true) {
  	let videoLink = document.querySelector('.video-link > a');
  	let anchor = document.querySelector('#home-page-video');
  	let posTop = anchor.offsetTop + 300;
  	videoLink.addEventListener('click', function(event) {
  		TweenMax.to(window, .5, {scrollTo: posTop});
  	});
  }
}
smoothScroll();

// Fade In Controls

const controllerViews = new ScrollMagic.Controller();

const targets = document.querySelectorAll('.anim-push');
function fadeIn(list) {
	list.forEach(function(item) {
		let elem = item.querySelector('.anim-target');
		TweenMax.to(elem, 0, {css: {opacity: '0'}});

		let scene = new ScrollMagic.Scene({
			triggerElement: item
		})
		.setTween(TweenMax.to(elem, .4, {css: {opacity: '1'}}))
		.addTo(controllerViews);

		scene.reverse(false);
	});
}
fadeIn(targets);

// Bottom of wrapper function
});