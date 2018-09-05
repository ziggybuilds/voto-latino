jQuery(document).ready(($) => {
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

	// Fullpage.js Init
	$('#fullpage').fullpage({
		//options here
		autoScrolling: true,
		licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',

	});

	//methods
	$.fn.fullpage.setAllowScrolling(true);

	// continue scroll actions
	const $continueLinks = $('.instruction__bottomBar__nav__content__link');
	for (let i = 0; i < $continueLinks.length; i += 1) {
		$($continueLinks[i]).on('click', (e) => {
			e.preventDefault();
			fullpage_api.moveSectionDown();
		});
	}
});
