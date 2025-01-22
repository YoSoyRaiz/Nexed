(function ($) {
	"use strict";

	// insert quote icon on blockquote first p tag
	if ($("blockquote p:first-child").length) {
		$("blockquote p:first-child").prepend(
			'<span class="blockquote_quote flaticon-quote-3"></span>'
		);
	}

	// add class #respond id
	if ($("#respond").length) {
		$("#respond").addClass("mt-30");
	}
	// wrap #commentform with a div and add class
	if ($("#commentform").length) {
		$("#commentform").wrap('<div class="comment-replay-form"></div>');
	}

	var txPostGallery = new Swiper("[data-txPostGallery]", {
		spaceBetween: 0,
		slidesPerView: 1,
		effect: "fade",
		loop: true,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
			clickable: true,
		},
		autoplay: {
			enabled: true,
			delay: 6000,
		},
	});


})(jQuery);