jQuery(document).ready(($) => {
	// pop up functionality
	if ($('.popUp')) {
		const $popUp = $('.popUp');
		$popUp.hide();

		$('#popUpTrigger').on('click', () => {
			if ($popUp.is(":visible") === false) {
				$popUp.fadeIn('fast');
			}
		});

		$('#popUpClose').on('click', (e) => {
			e.preventDefault();
			if ($popUp.is(":visible") === true) {
				// reloads the iframe to stop the video
				const iframes = $('iframe');
				if (iframes != null) {
				    for (let i = 0; i < iframes.length; i++) {
				        iframes[i].src = iframes[i].src;
				    }
				}
				$popUp.fadeOut('fast');
			}
		});
	}

	// animation controls
	const controller = new ScrollMagic.Controller();
	function scrollReveal(elem) {
		TweenMax.to(elem, 0, {css: {'opacity': '0'}});
		new ScrollMagic.Scene({
			triggerElement: elem,
			offset: '-50px',
			reverse: false,
		})
		.setTween(elem, 1, {css: {'opacity': '1'}})
		.addTo(controller);
	}

	// feed__articles__article
	(function() {
		const $articles = $('.feed__articles__article');
		for (let i = 0; i < $articles.length; i += 1) {
			scrollReveal($articles[i]);
		}
	})();
});
