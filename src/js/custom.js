jQuery( document ).ready( function( $ ) {
	$('iframe').wrap('<div class="video-embed"></div>');

	$('#tweeterCloser').click(function() {
		$('#tweeter').fadeOut('fast');
	});

	//Initialiaze wow.js
	new WOW().init();

	var timeline = $('#timeline-container');
	$(timeline).addClass('condensed');

	var timelineBtn = $('#timelineExp');
	$(timelineBtn).click(function() {
		if(!$(timeline).hasClass('condensed') === true) {
			$(timeline).addClass('condensed');
			$(timelineBtn).html('Learn More' + '</br>' + '<i class="fa fa-caret-down" aria-hidden="true"></i>');
		} else {
			$(timeline).removeClass('condensed');
			$(timelineBtn).html('<i class="fa fa-caret-up" aria-hidden="true"></i>' + '</br>' + 'Hide Timeline');
		}
	});

	var box1 = $('.box-1');
	var box2 = $('.box-2');
	var box3 = $('.box-3');

	$(box1).mouseenter(function() {
		$(box1).addClass('come-forward');
		$(box2).addClass('fade-back');
		$(box3).addClass('fade-back');
	});
	$(box1).mouseleave(function() {
		$(box1).removeClass('come-forward');
		$(box2).removeClass('fade-back');
		$(box3).removeClass('fade-back');
	});

	$(box2).mouseenter(function() {
		$(box2).addClass('come-forward');
		$(box1).addClass('fade-back');
		$(box3).addClass('fade-back');
	});
	$(box2).mouseleave(function() {
		$(box2).removeClass('come-forward');
		$(box1).removeClass('fade-back');
		$(box3).removeClass('fade-back');
	});

	$(box3).mouseenter(function() {
		$(box3).addClass('come-forward');
		$(box2).addClass('fade-back');
		$(box1).addClass('fade-back');
	});
	$(box3).mouseleave(function() {
		$(box3).removeClass('come-forward');
		$(box2).removeClass('fade-back');
		$(box1).removeClass('fade-back');
	});


} );