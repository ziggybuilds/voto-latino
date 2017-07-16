jQuery( document ).ready( function( $ ) {

"use strict";

const twUser = "Iam_J_Ellis";
const twCount = '1';
const twUrl = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' + twUser + '&count=' + twCount;


function twitterAjax() {

	$.ajax({
		method: "GET",
		url: twUrl,
		dataType: "JSON",
		beforeSend: function(xhr) {
			xhr.setRequestHeader('OAuth', '6CFKNHE1v2jtzMW29pfV8zRm5');
		}
	})
	.done(function(response) {
		console.log(response);
	})
	.fail(function() {
		console.log('failed');
	})
	.always(function() {
		console.log('complete')
	})
}

//twitterAjax();

// Hover State of tegh vertical boxes
function classOnHover(list) {
	list.forEach( function(item) {
		let color = item.querySelector('div.overlay');
		let content = item.querySelector('div.content');
		item.addEventListener('mouseenter', function(event) {
			TweenMax.to(color, .4, {css: {opacity: '.9'}});
		});
		item.addEventListener('mouseleave', function(event) {
			TweenMax.to(color, .4, {css: {opacity: '.6'}});
		});
		content.addEventListener('mouseenter', function(event) {
			TweenMax.to(color, .4, {css: {opacity: '.9'}});
		});
		content.addEventListener('mouseleave', function(event) {
			TweenMax.to(color, .4, {css: {opacity: '.6'}});
		});
	});
}

const vertBoxes = document.querySelectorAll('div.split-vertical');
console.log(vertBoxes);
classOnHover(vertBoxes);


});