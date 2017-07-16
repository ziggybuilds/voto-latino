"use strict";

jQuery(document).ready(function ($) {

	"use strict";

	var twUser = "Iam_J_Ellis";
	var twCount = '1';
	var twUrl = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' + twUser + '&count=' + twCount;

	function twitterAjax() {

		$.ajax({
			method: "GET",
			url: twUrl,
			dataType: "JSON",
			beforeSend: function beforeSend(xhr) {
				xhr.setRequestHeader('OAuth', '6CFKNHE1v2jtzMW29pfV8zRm5');
			}
		}).done(function (response) {
			console.log(response);
		}).fail(function () {
			console.log('failed');
		}).always(function () {
			console.log('complete');
		});
	}

	//twitterAjax();

	// Hover State of tegh vertical boxes
	function classOnHover(list) {
		list.forEach(function (item) {
			var color = item.querySelector('div.overlay');
			var content = item.querySelector('div.content');
			item.addEventListener('mouseenter', function (event) {
				TweenMax.to(color, .4, { css: { opacity: '.9' } });
			});
			item.addEventListener('mouseleave', function (event) {
				TweenMax.to(color, .4, { css: { opacity: '.6' } });
			});
			content.addEventListener('mouseenter', function (event) {
				TweenMax.to(color, .4, { css: { opacity: '.9' } });
			});
			content.addEventListener('mouseleave', function (event) {
				TweenMax.to(color, .4, { css: { opacity: '.6' } });
			});
		});
	}

	var vertBoxes = document.querySelectorAll('div.split-vertical');
	console.log(vertBoxes);
	classOnHover(vertBoxes);
});
jQuery(document).ready(function ($) {

	"use strict";

	var $menuPrim = document.getElementById('menuDropdown'),
	    $triggerBtn = document.getElementById('menuBtn'),
	    $navCon = document.getElementById('navContainer'),
	    $hamburger = $(".hamburger");

	$($triggerBtn).click(function () {
		// Check if target has open class
		if ($($menuPrim).hasClass('overlay-open')) {
			$($menuPrim).removeClass('overlay-open');
			$($menuPrim).addClass('overlay-closed');
			$hamburger.toggleClass("is-active");
			setTimeout(function () {
				$($navCon).toggleClass('viewport-fill');
			}, 1000);
			//remove open classn
		} else if (!$($menuPrim).hasClass('overlay-open')) {
			$($navCon).toggleClass('viewport-fill');
			$($menuPrim).removeClass('overlay-closed');
			$($menuPrim).addClass('overlay-open');
			$hamburger.toggleClass("is-active");
			// add open class
		}
	});

	// Smooth scrolling behavior

	$(document).ready(function () {
		// Add smooth scrolling to all links
		$("a").on('click', function (event) {

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
				}, 500, function () {

					// Add hash (#) to URL when done scrolling (default click behavior)
					window.location.hash = hash;
				});
			} // End if
		});
	});
});