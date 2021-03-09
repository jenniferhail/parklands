var $ = require("jquery");
var MicroModal = require("micromodal");
var _ = require("lodash");

module.exports = {
	init: function () {
		var screenWidth = window.innerWidth;

		// Nav toggle
		$(".nav-toggle").on("click", function () {
			$(".header").toggleClass("active");
			$(".hamburger-menu").toggleClass("active");
		});

		// Menu Scroll on Home Page
		var menuScroll = function (event) {
			var scrollY = window.pageYOffset;
			// console.log('scroll event - ' + scrollY);
			if (scrollY > 1) {
				$(".header").addClass("scrolled");
			} else {
				$(".header").removeClass("scrolled");
			}
		};

		if (document.querySelector("body.home")) {
			document.addEventListener(
				"scroll",
				_.throttle(function () {
					menuScroll();
				}, 300)
			);
		}

		// Header CFS
		// Switch out links with icons, based on classes added in WP menus
		if ($(".menu-item.cfs").length > 0) {
			// Save original CFS link markup in a variable
			var ogCfsItem = $(".menu-item.cfs a");
			var cfsSvg =
				// OG '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><style>.white {fill: #ffffff;}</style><path class="white" d="M502.5 380c-1.2-0.6-2.4-1.1-3.7-1.7 3.1-7 5.3-14.2 6.4-21.5 4.3-26.5-3.9-54.9-22-76.2 -16-18.8-38-29.5-60.4-29.5 -9.2 0-16.7 7.5-16.7 16.7 0 18.4-15 33.4-33.4 33.4H139.1c-18.4 0-33.4-15-33.4-33.4 0-9.2-7.5-16.7-16.7-16.7 -22.4 0-44.4 10.8-60.4 29.5 -18.1 21.2-26.3 49.7-22 76.2 1.2 7.3 3.4 14.5 6.4 21.5 -1.2 0.5-2.4 1.1-3.7 1.7 -8.3 4-11.8 13.9-7.9 22.3 4 8.3 14 11.8 22.3 7.9 23.3-11.1 51.1-9.2 72.6 5.2 36.1 24 82.6 24 118.7 0 24.8-16.5 56.9-16.5 81.7 0 36.1 24 82.6 24 118.7 0 21.5-14.3 49.3-16.3 72.6-5.2 8.3 4 18.3 0.5 22.3-7.9C514.3 394 510.8 384 502.5 380zM472.3 351.5c-1 6.2-3.3 12.5-6.6 18.5 -23.9-2.1-48.3 3.9-68.7 17.5 -24.8 16.5-56.8 16.5-81.6 0 -36.1-24-82.6-24-118.7 0 -24.8 16.5-56.8 16.5-81.6 0 -20.4-13.6-44.8-19.6-68.7-17.5 -3.3-6-5.6-12.3-6.6-18.5 -2.8-16.9 2.7-35.3 14.5-49.2 6.2-7.2 13.4-12.4 21.1-15.3 8.3 27.5 33.8 47.6 64 47.6h233.7c30.1 0 55.7-20.1 64-47.6 7.7 2.8 14.9 8 21.1 15.3C469.7 316.2 475.1 334.6 472.3 351.5z"/><path class="white" d="M502.5 446.8c-33.8-16.2-74.3-13.3-105.5 7.5 -24.8 16.5-56.8 16.5-81.6 0 -36.1-24-82.6-24-118.7 0 -24.8 16.5-56.8 16.5-81.6 0 -31.2-20.8-71.7-23.7-105.5-7.5 -8.3 4-11.8 13.9-7.9 22.3 4 8.3 14 11.8 22.3 7.9 23.3-11.1 51.1-9.2 72.6 5.2 36.1 24 82.6 24 118.7 0 24.8-16.5 56.9-16.5 81.7 0 36.1 24 82.6 24 118.7 0 21.5-14.3 49.3-16.3 72.6-5.2 8.3 4 18.3 0.5 22.3-7.9C514.3 460.8 510.8 450.8 502.5 446.8z"/><path class="white" d="M495.3 45.3H130.7c-6.9-19.4-25.4-33.4-47.2-33.4H16.7c-9.2 0-16.7 7.5-16.7 16.7v66.8c0 9.2 7.5 16.7 16.7 16.7h66.8c21.8 0 40.3-14 47.2-33.4h364.6c9.2 0 16.7-7.5 16.7-16.7C512 52.7 504.5 45.3 495.3 45.3zM83.5 78.7H33.4V45.3h50.1c9.2 0 16.7 7.5 16.7 16.7C100.2 71.2 92.7 78.7 83.5 78.7z"/><path class="white" d="M495.3 112h-66.8c-21.8 0-40.3 14-47.2 33.4H16.7c-9.2 0-16.7 7.5-16.7 16.7 0 9.2 7.5 16.7 16.7 16.7h364.6c6.9 19.4 25.4 33.4 47.2 33.4h66.8c9.2 0 16.7-7.5 16.7-16.7v-66.8C512 119.5 504.5 112 495.3 112zM478.6 178.8h-50.1c-9.2 0-16.7-7.5-16.7-16.7 0-9.2 7.5-16.7 16.7-16.7h50.1V178.8z"/></svg>';
				// Too light '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><style type="text/css"> .white-svg-new{fill:#FFFFFF;}</style><path class="white-svg-new" d="M29.2 6.5h-4c-1 0-1.9 0.6-2.2 1.6l-0.1 0.2 -0.1 0.2h-0.2 -0.2H0.8c-0.2 0-0.4 0.2-0.4 0.4 0 0.2 0.2 0.4 0.4 0.4h21.6 0.2 0.2l0.1 0.2 0.1 0.2c0.3 1 1.2 1.6 2.2 1.6h4c0.2 0 0.4-0.2 0.4-0.4v-4C29.6 6.7 29.4 6.5 29.2 6.5zM28.7 7.5v0.4 2 0.4 0.2h-0.2 -0.4 -3c-0.9 0-1.6-0.7-1.6-1.6 0-0.9 0.7-1.6 1.6-1.6h3 0.4 0.2V7.5z"/><path class="white-svg-new" d="M29.2 2.5H7.6 7.3 7.2L7.1 2.4 7 2.1c-0.3-1-1.2-1.6-2.2-1.6h-4C0.6 0.5 0.4 0.7 0.4 1v4c0 0.2 0.2 0.4 0.4 0.4h4c1 0 1.9-0.6 2.2-1.6l0.1-0.2 0.1-0.2h0.2 0.2 21.6c0.2 0 0.4-0.2 0.4-0.4 0-0.1 0-0.2-0.1-0.3C29.4 2.6 29.3 2.5 29.2 2.5zM4.8 4.5h-3H1.4 1.2V4.3 3.9v-2V1.6 1.4h0.2 0.4 3c0.9 0 1.6 0.7 1.6 1.6C6.3 3.8 5.6 4.5 4.8 4.5z"/><path class="white-svg-new" d="M29.3 22.3c0 0-0.1 0-0.1-0.1l0 0 -0.1 0 -0.3-0.1L28.6 22l0.1-0.2 0.1-0.3c0.2-0.4 0.3-0.8 0.3-1.1 0.2-1.4-0.2-2.9-1.2-4 -0.8-1-2-1.5-3.1-1.5 -0.2 0-0.4 0.2-0.4 0.4 0 1.4-1.1 2.6-2.6 2.6H8.1c-1.4 0-2.6-1.1-2.6-2.6 0-0.2-0.2-0.4-0.4-0.4 -1.2 0-2.3 0.6-3.1 1.5 -1 1.1-1.4 2.6-1.2 4 0.1 0.4 0.2 0.8 0.3 1.1l0.1 0.3L1.4 22l-0.2 0.1 -0.3 0.1c0 0-0.1 0-0.1 0.1l-0.1 0c-0.2 0.1-0.3 0.3-0.2 0.5 0.1 0.1 0.2 0.2 0.4 0.2 0.1 0 0.1 0 0.2 0 0.7-0.3 1.4-0.5 2.1-0.5 1 0 1.9 0.3 2.7 0.8 1 0.6 2.1 1 3.2 1s2.2-0.3 3.2-1c0.8-0.5 1.8-0.8 2.7-0.8 1 0 1.9 0.3 2.7 0.8 1 0.6 2.1 1 3.2 1 1.1 0 2.2-0.3 3.2-1 0.8-0.5 1.8-0.8 2.7-0.8 0.7 0 1.5 0.2 2.1 0.5 0.1 0 0.1 0 0.2 0 0.2 0 0.3-0.1 0.4-0.2C29.6 22.6 29.5 22.4 29.3 22.3zM28.4 20.2c-0.1 0.4-0.2 0.9-0.5 1.3l-0.1 0.2 -0.1 0.1 -0.1 0 -0.2 0c-0.2 0-0.3 0-0.5 0 -1.1 0-2.2 0.3-3.2 1 -0.8 0.5-1.8 0.8-2.7 0.8 -1 0-1.9-0.3-2.7-0.8 -1-0.6-2.1-1-3.2-1s-2.2 0.3-3.2 1c-0.8 0.5-1.8 0.8-2.7 0.8 -1 0-1.9-0.3-2.7-0.8 -0.9-0.6-2.1-1-3.2-1 -0.2 0-0.3 0-0.5 0l-0.2 0 -0.1 0 -0.1-0.1 -0.1-0.2c-0.2-0.4-0.4-0.9-0.5-1.3 -0.2-1.2 0.2-2.4 1-3.4 0.4-0.5 0.9-0.9 1.5-1.1l0.4-0.1 0.2-0.1 0.1 0.2 0.1 0.4C5 16.8 5.5 17.4 6 17.8c0.6 0.4 1.3 0.7 2 0.7h13.8c0.7 0 1.4-0.2 2-0.7 0.6-0.4 1-1 1.2-1.7l0.1-0.4 0.1-0.2 0.2 0.1 0.4 0.1c0.6 0.2 1.1 0.6 1.5 1.1C28.2 17.8 28.6 19 28.4 20.2z"/><path class="white-svg-new" d="M29.3 26.2c-0.8-0.4-1.6-0.6-2.5-0.6 -1.2 0-2.3 0.3-3.2 1 -0.8 0.5-1.8 0.8-2.7 0.8 -1 0-1.9-0.3-2.7-0.8 -1-0.6-2.1-1-3.2-1s-2.2 0.3-3.2 1c-0.8 0.5-1.8 0.8-2.7 0.8 -1 0-1.9-0.3-2.7-0.8 -0.9-0.6-2-1-3.2-1 -0.9 0-1.7 0.2-2.5 0.6 -0.2 0.1-0.3 0.3-0.2 0.5C0.5 26.9 0.7 27 0.8 27 0.9 27 1 27 1 27c0.7-0.3 1.4-0.5 2.1-0.5 1 0 1.9 0.3 2.7 0.8 1 0.6 2.1 1 3.2 1 1.1 0 2.2-0.3 3.2-1 0.8-0.5 1.8-0.8 2.7-0.8 1 0 1.9 0.3 2.7 0.8 1 0.6 2.1 1 3.2 1s2.2-0.3 3.2-1c0.8-0.5 1.8-0.8 2.7-0.8 0.7 0 1.5 0.2 2.1 0.5 0.1 0 0.1 0 0.2 0 0.2 0 0.3-0.1 0.4-0.2C29.6 26.6 29.5 26.3 29.3 26.2z"/></svg>';
				'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"><style type="text/css">  .svg-white{fill:#FFFFFF;}</style><path class="svg-white" d="M29.2 6.4h-4c-1.1 0-2 0.7-2.3 1.7l-0.2 0.3H0.8c-0.3 0-0.5 0.3-0.5 0.5s0.3 0.5 0.5 0.5h21.9l0.2 0.3c0.3 1 1.2 1.7 2.3 1.7h4c0.3 0 0.5-0.3 0.5-0.5v-4C29.7 6.6 29.5 6.4 29.2 6.4zM28.6 7.4v3h-3.5c-0.8 0-1.5-0.6-1.5-1.5s0.6-1.5 1.5-1.5H28.6z"/><path class="svg-white" d="M0.8 5.5h4c1.1 0 2-0.7 2.3-1.7l0.2-0.3h21.9c0.3 0 0.5-0.3 0.5-0.5 0-0.1 0-0.3-0.1-0.4 -0.1-0.1-0.2-0.2-0.4-0.2H7.3l0 0L7.1 2.1c-0.3-1-1.2-1.7-2.3-1.7h-4C0.5 0.4 0.3 0.6 0.3 1v4C0.3 5.3 0.5 5.5 0.8 5.5zM1.3 4.4V1.5h3.5c0.8 0 1.5 0.6 1.5 1.5C6.2 3.8 5.5 4.4 4.8 4.4H1.3z"/><path class="svg-white" d="M29.4 22.2L29.4 22.2 29.4 22.2l0-0.1h-0.2L28.9 22l-0.1 0 0.1-0.1 0.1-0.3c0.2-0.4 0.3-0.8 0.3-1.1 0.2-1.5-0.2-3-1.2-4.1 -0.8-1-2-1.5-3.2-1.5 -0.3 0-0.5 0.3-0.5 0.5 0 1.4-1.1 2.5-2.5 2.5H8.1c-1.4 0-2.5-1.1-2.5-2.5 0-0.3-0.3-0.5-0.5-0.5 -1.2 0-2.3 0.6-3.2 1.5 -1 1.1-1.4 2.6-1.2 4.1 0.1 0.4 0.2 0.8 0.3 1.1l0.1 0.3L1.2 22l-0.3 0.1c-0.1 0-0.1 0-0.2 0.1l-0.1 0c-0.3 0.1-0.4 0.4-0.3 0.7l0 0c0.1 0.1 0.2 0.2 0.5 0.2h0.2l0 0c0.8-0.3 1.4-0.5 2.1-0.5 0.9 0 1.8 0.3 2.6 0.8 1.1 0.7 2.2 1 3.3 1 1.2 0 2.3-0.3 3.3-1 0.8-0.5 1.8-0.8 2.6-0.8 0.9 0 1.8 0.3 2.6 0.8 1.1 0.7 2.2 1 3.3 1 1.2 0 2.3-0.3 3.3-1 0.8-0.5 1.8-0.8 2.6-0.8 0.7 0 1.4 0.2 2 0.5l0.3 0c0.3 0 0.4-0.1 0.5-0.2l0 0C29.7 22.6 29.6 22.3 29.4 22.2zM21 23.5c-0.9 0-1.8-0.3-2.6-0.8 -1.1-0.7-2.2-1-3.3-1 -1.2 0-2.3 0.3-3.3 1 -0.8 0.5-1.8 0.8-2.6 0.8 -0.9 0-1.8-0.3-2.6-0.8 -1-0.6-2.2-1-3.3-1H2.6l0 0 -0.1-0.2C2.2 21 2 20.5 1.9 20.2c-0.2-1.1 0.2-2.3 1-3.3 0.4-0.5 0.9-0.9 1.4-1.1l0.4-0.1 0.1 0 0 0.1L5 16.1c-0.1 0.8 0.5 1.4 1 1.8 0.7 0.5 1.4 0.7 2.1 0.7h13.8c0.8 0 1.5-0.2 2.1-0.7 0.6-0.4 1-1 1.3-1.8l0.1-0.4 0-0.1 0.1 0.1 0.4 0.1c0.5 0.2 1 0.5 1.4 1.1 0.9 1 1.3 2.1 1.1 3.3l0 0.1c-0.1 0.4-0.2 0.8-0.5 1.1l-0.1 0.2 0 0h-0.7c-1.2 0-2.3 0.3-3.3 1C22.9 23.2 21.9 23.5 21 23.5z"/><path class="svg-white" d="M29.4 26.1c-0.8-0.4-1.6-0.6-2.6-0.6 -1.3 0-2.4 0.3-3.3 1 -0.8 0.5-1.8 0.8-2.6 0.8 -0.9 0-1.8-0.3-2.6-0.8 -1.1-0.7-2.2-1-3.3-1 -1.2 0-2.3 0.3-3.3 1C11 27 10 27.3 9.1 27.3c-0.9 0-1.8-0.3-2.6-0.8 -1-0.7-2.1-1-3.3-1 -0.9 0-1.7 0.2-2.6 0.6 -0.1 0.1-0.2 0.2-0.3 0.3 0 0.1 0 0.2 0 0.3 0 0.2 0.3 0.4 0.4 0.4H1l0 0c0.8-0.3 1.4-0.5 2.1-0.5 0.9 0 1.8 0.3 2.6 0.8 1.1 0.7 2.2 1 3.3 1 1.2 0 2.3-0.3 3.3-1 0.8-0.5 1.8-0.8 2.6-0.8 0.9 0 1.8 0.3 2.6 0.8 1.1 0.7 2.2 1 3.3 1 1.2 0 2.3-0.3 3.3-1 0.8-0.5 1.8-0.8 2.6-0.8 0.7 0 1.4 0.2 2 0.5l0.3 0c0.3 0 0.4-0.1 0.5-0.2 0.1-0.1 0.2-0.3 0.1-0.4C29.6 26.3 29.5 26.2 29.4 26.1z"/></svg>';
			var cfsHtml =
				'<button id="cfs-trigger" type="button" class="menu-btn open-cfs"><span class="visually-hide-text">Open CFS</span>' +
				cfsSvg +
				"</button>";
			$(".menu-item.cfs").html(cfsHtml);
		}

		// Header Search
		function searchChanges(width) {
			// Save original search link markup in a variable
			var ogSearchItem = $(".menu-item.search a");
			var searchLarge =
				'<div class="search-container"><button type="button" class="open-search"><span class="visually-hide-text">Open Search</span><i class="far fa-search"></i></button><form id="search-form" class="search" action="/search/" method="get"><label for="search-field"><span class="visually-hidden">Search</span><input id="search-field" type="text" name="fwp_search_field" value=""></label><button id="search-submit" class="submit" form="search-form" type="submit">Search</button></form><button type="button" class="close"><span class="visually-hidden">Close</span></button></div>';
			var searchSmall =
				'<div class="search-container"><button type="button" class="open-search" data-micromodal-trigger="modal-5"><span class="visually-hide-text">Open Search</span><i class="far fa-search"></i></button></div>';

			// Menu breakpoint
			if (width < 768) {
				$(".menu-item.search").html(searchSmall).addClass("ready");
			} else if (width >= 768) {
				$(".menu-item.search").html(searchLarge).addClass("ready");
			} else {
				// Do nothing
			}
		}

		// Open click event
		$(document).on(
			"click",
			".menu-item.search .open-search",
			function (evt) {
				evt.preventDefault();
				// console.log('Clicked search');
				screenWidth = window.innerWidth;
				console.log(screenWidth);

				if (screenWidth < 768) {
					console.log("Width smaller than 768px");
					if ($(".modal.is-open").length > 0) {
						MicroModal.close();
					}
					// if mobile, display search modal
					MicroModal.show("modal-5");
				} else if (screenWidth >= 768) {
					// if desktop, search button displays search in menu
					console.log("Width larger than 769px");
					$(".top-menu .main-menu").toggleClass("fade");
					$(".menu-item.search").toggleClass("active");
					if ($(".menu-item.search").hasClass("active")) {
						setTimeout(function (evt) {
							$('.menu-item.search input[type="text"]').focus();
						}, 300);
					}
					// If tabbing through, open the search bar
					$('.menu-item.search input[type="text"]').on(
						"focus",
						function (evt) {
							$(".menu-item.search").addClass("active");
							$(".top-menu .main-menu").addClass("fade");
						}
					);
					// If tabbing the opposite direction, open the search bar
					$(".menu-item.search .close").on("focus", function (evt) {
						$(".menu-item.search").addClass("active");
						$(".top-menu .main-menu").addClass("fade");
					});
				}
			}
		);

		// Close search click event
		$(document).on("click", ".menu-item.search .close", function (evt) {
			evt.preventDefault();
			$(".menu-item.search").toggleClass("active");
			$(".top-menu .main-menu").removeClass("fade");
		});

		function menuChanges(width) {
			var bottomMenu = $(".main-menu.bottom");
			var donateButton = $(".menu-item.donate");
			// Menu breakpoint
			if (width < 768 && $(".bottom-menu .main-menu.bottom").length > 0) {
				// console.log('Screen width < 768 & the bottom menu is in the main menu');
				// Move the bottom menu inside the hamburger menu on mobile
				$(".hamburger-menu .wrapper").prepend(bottomMenu);
				// Make the donate button the last item in the bottom menu
				$(".hamburger-menu .main-menu.bottom").append(donateButton);
			} else if (
				width >= 768 &&
				$(".hamburger-menu .main-menu.bottom").length > 0
			) {
				// console.log('Greater than 769px & the bottom menu is in the hamburger menu');
				$(".bottom-menu").prepend(bottomMenu);
				$(".top-menu .main-menu").prepend(donateButton);
			} else {
				// Do nothing
			}
		}

		function checkWindowSize() {
			screenWidth = window.innerWidth;
			menuChanges(screenWidth);
			searchChanges(screenWidth);
		}
		// Run on page load
		checkWindowSize();
		// Listen for page size change
		window.onresize = checkWindowSize;
	},
};
