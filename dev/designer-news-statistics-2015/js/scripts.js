$(document).ready(function(){

	// Tabs

	$('.tabs__labels').on('click', '.tabs__label:not(.is-current)', function() {
		$(this)
			.addClass('is-current')
			.siblings()
				.removeClass('is-current')
			.parents('.tabs')
				.find('.tabs__tab').eq($(this).index())
					.fadeIn(200)
					.siblings('.tabs__tab')
						.fadeOut(200);
	});

	// Running numbers
	var counted = false;
	var overviewPlacement = $('.overview__count').offset().top;

	startCounting = function() {
		if (($(window).scrollTop() + $(window).height() > overviewPlacement) && !counted) {
			var options = { useEasing : true, useGrouping : true, separator : ',', decimal : '.' }
			var time = 1;

			var posts = parseInt($('#overview-posts').attr('data-count'));
			var postsCounting = new countUp("overview-posts", 1, posts, 0, time, options);
			postsCounting.start();

			var comments = parseInt($('#overview-comments').attr('data-count'));
			var commentsCounting = new countUp("overview-comments", 1, comments, 0, time, options);
			commentsCounting.start();

			var upvotes = parseInt($('#overview-upvotes').attr('data-count'));
			var upvotesCounting = new countUp("overview-upvotes", 1, upvotes, 0, time, options);
			upvotesCounting.start();

			var users = parseInt($('#overview-users').attr('data-count'));
			var usersCounting = new countUp("overview-users", 1, users, 0, time, options);
			usersCounting.start();

			counted = true;
		}

	};

	startCounting();

	$(window).scroll(function() {
		if (!counted) {
			startCounting();
		}
	});

	// Show more

	$('.show-more__button').click(function(e) {
		$(this).parent().siblings('.items-list.is-hidden').slideDown();
		$(this).remove();

		e.preventDefault();
	});

});
