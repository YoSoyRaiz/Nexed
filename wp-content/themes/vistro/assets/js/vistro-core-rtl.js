(function ($) {
	"use strict";

    // preloader
	function preloader() {
		$("#vistroPreloader").delay(0).fadeOut();
	}
	$(window).on("load", function () {
		preloader();
	});

	function mobileMenuActive($scope, $) {
		$(".open_mobile_menu").on("click", function () {
			$(".mobile_menu_wrap").toggleClass("mobile_menu_on");
		});
		$(".open_mobile_menu").on("click", function () {
			$("body").toggleClass("mobile_menu_overlay_on");
		});
	}

	if ($(".mobile_menu li.dropdown ul").length) {
		$(".mobile_menu li.dropdown").append(
			'<div class="dropdown-btn"><span class="fas fa-caret-right"></span></div>'
		);
		$(".mobile_menu li.dropdown .dropdown-btn").on("click", function () {
			$(this).prev("ul").slideToggle(500);
		});
	}
	$(".dropdown-btn").on("click", function () {
		$(this).toggleClass("toggle-open");
	});

	$(".search-btn").on("click", function () {
		$(".search-body").toggleClass("search-open");
	});
	$(".h1-search-btn-1").on("click", function () {
		$(".overlay, .search_1_popup_active").addClass("active");
	});
	$(".overlay, .search_1_popup_close").on("click", function () {
		$(".search_1_popup_active").removeClass("active");
		$(".overlay").removeClass("active");
	});

	function hero_3_slider_active($scope, $) {
		var hero3 = new Swiper(".hero_3_slider_active", {
			spaceBetween: 20,
			loop: true,
			speed: 1000,
			centeredSlides: true,
			slidesPerView: 3,
			autoplay: {
				delay: 5000,
			},
			navigation: {
				nextEl: ".hero_3_next",
				prevEl: ".hero_3_prev",
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
				},
				480: {
					slidesPerView: 1,
				},
				576: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 2,
				},
				992: {
					slidesPerView: 2,
				},
				1200: {
					slidesPerView: 3,
				},
			},
		});
	}

function services_1_slider_active($scope, $) {
	var services1 = new Swiper(".services_1_slider_active", {
		spaceBetween: 30,
		loop: true,
		speed: 1000,
		navigation: {
			nextEl: ".services_1_next",
			prevEl: ".services_1_prev",
		},
		breakpoints: {
			0: {
				slidesPerView: 1,
			},
			480: {
				slidesPerView: 1,
			},
			576: {
				slidesPerView: 2,
			},
			992: {
				slidesPerView: 3,
			},
			1200: {
				slidesPerView: 4,
			},
		},
	});
}


function services_3_slider_active($scope, $) {
	var services1 = new Swiper(".services_3_slider_active", {
		spaceBetween: 30,
		loop: true,
		speed: 1000,
		autoplay: {
			delay: 4000,
		},
		navigation: {
			nextEl: ".service_3_next",
			prevEl: ".service_3_prev",
		},
		breakpoints: {
			0: {
				slidesPerView: 1,
			},
			480: {
				slidesPerView: 1,
			},
			576: {
				slidesPerView: 2,
			},
			768: {
				slidesPerView: 3,
			},
			992: {
				slidesPerView: 3,
			},
			1200: {
				slidesPerView: 4,
			},
		},
	});
}

	function project_1_slider_active($scope, $) {
		var project1 = new Swiper(".project_1_slider_active", {
			spaceBetween: 30,
			loop: true,
			speed: 1000,
			centeredSlides: true,
			autoplay: {
				delay: 5000,
			},
			navigation: {
				nextEl: ".project_1_next",
				prevEl: ".project_1_prev",
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
				},
				480: {
					slidesPerView: 1,
				},
				576: {
					slidesPerView: 2,
				},
				768: {
					slidesPerView: 2,
				},
				992: {
					slidesPerView: 2,
				},
				1200: {
					slidesPerView: 3,
				},
			},
		});
	}


	function brandActive($scope, $) {
		var happyClient1 = new Swiper(".happy_client_1_active", {
			spaceBetween: 30,
			loop: true,
			speed: 1000,
			centeredSlides: true,
			autoplay: {
				delay: 3000,
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
				},
				480: {
					slidesPerView: 2,
				},
				576: {
					slidesPerView: 3,
				},
				768: {
					slidesPerView: 3,
				},
				992: {
					slidesPerView: 5,
				},
				1200: {
					slidesPerView: 5,
				},
			},
		});
	}

	function testimonial_1_active($scope, $) {
		var happyClient1 = new Swiper(".testimonial_1_active", {
			loop: true,
			speed: 1000,
			centeredSlides: true,
			autoplay: {
				delay: 3000,
			},
		});
	}

	function testimonialActive($scope, $) {
		var testimonial2 = new Swiper(".testimonial_2_active", {
			loop: true,
			speed: 1000,
			centeredSlides: true,
			autoplay: {
				delay: 3000,
			},
		});
		var services1 = new Swiper(".testimonial_3_active", {
			spaceBetween: 30,
			loop: true,
			speed: 1000,
			centeredSlides: true,
			autoplay: {
				delay: 4000,
			},
			breakpoints: {
				0: {
					slidesPerView: 1,
				},
				480: {
					slidesPerView: 1,
				},
				576: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 2,
				},
				992: {
					slidesPerView: 2,
				},
				1200: {
					slidesPerView: 3,
				},
			},
		});
	}

	/*
testimonial-2
====end====
*/

	function teamSliderActive($scope, $) {
		let agents1_thumb = new Swiper(".agents_1_preview", {
			spaceBetween: 30,
			loop: true,
			speed: 1000,
			slidesPerView: 3,
			rtl: false,
			centeredSlides: false,
			watchSlidesProgress: false,

			breakpoints: {
				320: {
					slidesPerView: 1,
				},
				576: {
					slidesPerView: 1,
				},
				768: {
					slidesPerView: 2,
				},
				993: {
					slidesPerView: 3,
				},
			},
		});

		let slider3 = new Swiper(".agents_1_main_slider", {
			loop: true,
			spaceBetween: 0,
			rtl: false,
			slidesPerView: 1,
			effect: "fade",
			autoplay: {
				delay: 5000,
			},
			fadeEffect: {
				crossFade: true,
			},
			navigation: {
				nextEl: ".agents_1_next",
				prevEl: ".agents_1_prev",
			},
			thumbs: {
				swiper: agents1_thumb,
			},
		});
	}

function countrySlideTwoActive($scope, $) {
	let slider_thumb = new Swiper(".benefit_1_flaq_active", {
		loop: true,
		spaceBetween: 30,
		rtl: false,
		centeredSlides: false,
		watchSlidesProgress: false,
		breakpoints: {
			320: {
				slidesPerView: 1,
			},
			576: {
				slidesPerView: 2,
			},
			768: {
				slidesPerView: 3,
			},
			992: {
				slidesPerView: 2,
			},
			1200: {
				slidesPerView: 3,
			},
			1400: {
				slidesPerView: 4,
			},
		},
	});

	let tslider1 = new Swiper(".benefit_1_main_active", {
		loop: true,
		spaceBetween: 0,
		rtl: false,
		slidesPerView: 1,
		effect: "fade",
		fadeEffect: {
			crossFade: true,
		},
		autoplay: {
			delay: 6000,
			disableOnInteraction: false,
		},
		thumbs: {
			swiper: slider_thumb,
		},
	});
}


	var services1 = new Swiper(".sidebar_slider_active", {
		loop: true,
		speed: 1000,
		effect: "fade",
		autoplay: {
			delay: 4000,
		},
	});


function faqActiveClass($scope, $) {
	$(document).on("click", ".accordion-item", function () {
		$(this).addClass("faq_bg").siblings().removeClass("faq_bg");
	});
}


	function counterActive($scope, $) {
		if ($(".odometer").length) {
			jQuery(".odometer").appear(function (e) {
				var odo = jQuery(".odometer");
				odo.each(function () {
					var countNumber = jQuery(this).attr("data-count");
					jQuery(this).html(countNumber);
				});
			});
		}
	}

	/*
popup-video-activition
====start====
*/
	$(".popup-video").magnificPopup({
		type: "iframe",
	});
	/*
popup-video-activition
====end====
*/

	/*
popup-img-activition
====start====
*/
	function magnificPopupActive($scope, $) {
		$(".popup_img").magnificPopup({
			type: "image",
			gallery: {
				enabled: true,
			},
		});
	}

	(function($) {
		$.fn.counterUpWidget = function(options) {
			options = $.extend({
				delay: 10,
				time: 3000
			}, options);

			return this.each(function() {
				var $this = $(this);
				$this.counterUp(options);
			});
		};
	})(jQuery);

	function counterTwoActive($scope, $) {
		$scope.find(".counter").counterUpWidget({
			delay: 10,
			time: 3000
		});
	}




	/*
data-bg-activition
====start====
*/
	$("[data-background]").each(function () {
		$(this).css(
			"background-image",
			"url(" + $(this).attr("data-background") + ") "
		);
	});

	function backgroundActive($scope, $) {
		var img = $("[data-background]");
		img.css("background-image", function () {
			var bg = "url(" + $(this).data("background") + ")";

			if ($(this).data("background")) {
				return bg;
			} else {
				return false;
			}
		});
	}
	/*
data-bg-activition
====end====
*/

	/*
data-width-activition
====start====
*/
	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	});
	/*
data-width-activition
====end====
*/

	/*
data-bg-color-activition
====start====
*/
	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));
	});
	/*
		data-bg-color-activition
		====end====
	*/

	$(document).ready(function () {
		// addClass-start
		gsap.registerPlugin(ScrollTrigger);

		const boxes = gsap.utils.toArray(".tx-animation-style1, .h1-animation");
		boxes.forEach((img) => {
			gsap.to(img, {
				scrollTrigger: {
					trigger: img,
					start: "top 90%",
					end: "bottom bottom",
					toggleClass: "active",
					once: true,
				},
			});
		});

		var st = $(".tx-split-text");
		if (st.length == 0) return;
		gsap.registerPlugin(SplitText);
		st.each(function (index, el) {
			el.split = new SplitText(el, {
				type: "lines,words,chars",
				linesClass: "split-line",
			});
			gsap.set(el, { perspective: 400 });

			if ($(el).hasClass("split-in-fade")) {
				gsap.set(el.split.chars, {
					opacity: 0,
					ease: "Back.easeOut",
				});
			}
			if ($(el).hasClass("split-in-right")) {
				gsap.set(el.split.chars, {
					opacity: 0,
					x: "50",
					ease: "Back.easeOut",
				});
			}
			if ($(el).hasClass("split-in-right-hero")) {
				gsap.set(el.split.chars, {
					opacity: 0,
					duration: 5,
					x: "50",
					ease: "Back.easeOut",
				});
			}
			if ($(el).hasClass("split-in-left")) {
				gsap.set(el.split.chars, {
					opacity: 0,
					x: "-50",
					ease: "circ.out",
				});
			}
			if ($(el).hasClass("split-in-up")) {
				gsap.set(el.split.chars, {
					opacity: 0,
					y: "80",
					ease: "circ.out",
				});
			}
			if ($(el).hasClass("split-in-down")) {
				gsap.set(el.split.chars, {
					opacity: 0,
					duration: 0.1,
					y: "-80",
					ease: "circ.out",
				});
			}
			if ($(el).hasClass("split-in-rotate")) {
				gsap.set(el.split.chars, {
					opacity: 0,
					rotateX: "50deg",
					ease: "circ.out",
				});
			}
			if ($(el).hasClass("split-in-scale")) {
				gsap.set(el.split.chars, {
					opacity: 0,
					scale: "0.5",
					ease: "circ.out",
				});
			}
			el.anim = gsap.to(el.split.chars, {
				scrollTrigger: {
					trigger: el,
					start: "top 90%",
				},
				x: "0",
				y: "0",
				rotateX: "0",
				scale: 1,
				opacity: 1,
				duration: 0.8,
				stagger: 0.02,
			});
		});

		const splitType = document.querySelectorAll(".reveal-type");

		splitType.forEach((char, i) => {
			const text = new SplitType(char, { type: "chars,words" });

			gsap.from(text.words, {
				scrollTrigger: {
					trigger: char,
					start: "top 90%",
					end: "top 50%",
					scrub: false,
					markers: false,
				},
				duration: 1,
				opacity: 0,
				stagger: 0.2,
			});
		});
	});

	/*
gsap-animation
=====end====
*/

	/*
reveal-type-2-animation
=====start====
*/
	const splitType2 = document.querySelectorAll(".reveal-type-2");

	splitType2.forEach((char, i) => {
		const text = new SplitType(char, { type: "chars,words" });

		gsap.from(text.chars, {
			scrollTrigger: {
				trigger: char,
				start: "top 90%",
				end: "top 50%",
				scrub: true,
				markers: false,
			},
			opacity: 0,
			stagger: 0.1,
		});
	});
	/*
reveal-type-2-animation
=====end====
*/

	/*
back-to-top
=====start==== */
	var backtotop = $(".scroll-top");

	$(window).scroll(function () {
		if ($(window).scrollTop() > 300) {
			backtotop.addClass("show");
		} else {
			backtotop.removeClass("show");
		}
	});

	backtotop.on("click", function (e) {
		e.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, "700");
	});

	// active wow js
	new WOW().init();


	function timeActive($scope, $) {
		setInterval(updateClock, 1000);
		function updateClock() {
			const time = new Date();
			let hour = time.getHours();
			let min = time.getMinutes();
			let sec = time.getSeconds();

			// Ensure hour is within 1-12 format
			if (hour >= 24) {
				if (hour > 24) {
					hour -= 24;
				}
			} else if (hour == 0) {
				hour = 12;
			}

			// Add leading zeros to single-digit minutes and seconds
			hour = hour < 10 ? "0" + hour : hour;
			min = min < 10 ? "0" + min : min;
			sec = sec < 10 ? "0" + sec : sec;

			// Format current time as HH:MM:SS
			const currentTime = `${hour}:${min}:${sec}`;

			// Check if the element with the specified ID exists
			const clockElement = document.getElementById("clock");

			if (clockElement) {
				// Update the HTML element with the clock
				clockElement.innerHTML = currentTime;
			}
		}
		updateClock();
	}

	function heroSectionImgActive($scope, $) {
		gsap.registerPlugin(ScrollTrigger);

		const add_class = document.querySelectorAll(".add-class");

		gsap.from(add_class, {
			scrollTrigger: {
				trigger: add_class,
				start: "top 90%",
				end: "top 50%",
				scrub: true,
				markers: false,
				toggleClass: "active",
				once: true,
			},
		});
	}

	function imageAnimationActive($scope, $) {
		gsap.registerPlugin(ScrollTrigger);

		const boxes = gsap.utils.toArray(".h1-animation");
		boxes.forEach((img) => {
			gsap.to(img, {
				scrollTrigger: {
					trigger: img,
					start: "top 90%",
					end: "bottom bottom",
					toggleClass: "active",
					once: true,
				},
			});
		});
	}


// niceSelect active
if ($("select").length) {
	$("select").niceSelect();
}

$(window).on('elementor/frontend/init', function () {
	elementorFrontend.hooks.addAction('frontend/element_ready/vistro_headers.default', mobileMenuActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/gallery_items.default', magnificPopupActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/hero_section.default', timeActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/hero_section.default', heroSectionImgActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/hero_section.default', hero_3_slider_active);
	elementorFrontend.hooks.addAction('frontend/element_ready/image_box.default', imageAnimationActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/image_box.default', backgroundActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/about_section.default', imageAnimationActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/country_slide.default', backgroundActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/country_slide.default', services_1_slider_active);
	elementorFrontend.hooks.addAction('frontend/element_ready/cta_slide.default', testimonial_1_active);
	elementorFrontend.hooks.addAction('frontend/element_ready/service_lists.default', imageAnimationActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/count_box.default', counterActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/project_slide.default', project_1_slider_active);
	elementorFrontend.hooks.addAction('frontend/element_ready/vistro_brand.default', brandActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/vistro_team.default', teamSliderActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/vistro_faq.default', imageAnimationActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/vistro_faq.default', counterActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/vistro_faq.default', faqActiveClass);
	elementorFrontend.hooks.addAction('frontend/element_ready/vistro_testimonial.default', testimonialActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/service_slide.default', services_3_slider_active);
	elementorFrontend.hooks.addAction('frontend/element_ready/country_slide.default', countrySlideTwoActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/count_box.default', counterTwoActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/vistro_cta.default', backgroundActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/contact_form.default', backgroundActive);
	elementorFrontend.hooks.addAction('frontend/element_ready/post_grid.default', imageAnimationActive);
});

})(jQuery);
