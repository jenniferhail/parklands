var $ = require("jquery");

module.exports = {
	init: function () {
		function getHeaderHeight() {
			// Get height of the header
			var header = document.querySelector(".header");
			var headerHeight = header.offsetHeight;
			return headerHeight;
		}
		// Adjust the first block if notifications are displayed
		function adjustFirstBlockTopPadding() {
			var height = getHeaderHeight();
			var siteWidth = window.innerWidth;

			// Increase the block padding by the height of the notifications,
			// Or, the amount greater than the header's usual height

			if (siteWidth < 768) {
				var newPadding = height - 70;
			} else if (siteWidth >= 768) {
				var newPadding = height - 115;
			}
			// console.log(newPadding);
			// Find the first block on the page
			var firstBlock = document.querySelector(".block:first-of-type");
			if (
				firstBlock.classList.contains("hero") &&
				firstBlock.classList.contains("style-4")
			) {
				// Do nothing
			} else if (
				firstBlock.classList.contains("hero") &&
				firstBlock.classList.contains("style-1")
			) {
				// The first block is hero style 1.
				if (newPadding > 0) {
					firstBlock.style.paddingTop = newPadding + "px";
				} else {
					firstBlock.style.paddingTop = "0px";
				}
			} else if (firstBlock.classList.contains("interactive-map")) {
				if (siteWidth < 768) {
					firstBlock.style.paddingTop = "0px";
				} else if (siteWidth >= 768) {
					firstBlock.style.paddingTop = height + "px";
				}
			} else {
				// The first block is not hero style 1 or 4.
				if (newPadding > 0) {
					firstBlock.style.paddingTop = height + 35 + "px"; // Add 35px
				} else {
					firstBlock.style.paddingTop = "150px";
				}
			}
		}
		adjustFirstBlockTopPadding();

		// Cookie Notice
		$(".cookie-notice button.close").click(function () {
			var future = new Date();
			document.cookie =
				"cookienotice=accepted; expires=" +
				future.setDate(future.getDate() + 326) +
				";";
			$(".cookie-notice").hide().addClass("hide");
		});

		// Site Alert
		$(".site-alert button.close").click(function () {
			var future = new Date();
			var noticeID = $(this).parent().parent().attr("id");
			document.cookie =
				"sitenotice" +
				noticeID +
				"=accepted; expires=" +
				future.setDate(future.getDate() + 326) +
				";";
			$(".site-alert").hide().addClass("hide");
			adjustFirstBlockTopPadding();
		});

		// Park Alert
		$(".park-alert button.close").click(function () {
			var future = new Date();
			var noticeID = $(this).parent().parent().attr("id");
			document.cookie =
				"parknotice" +
				noticeID +
				"=accepted; expires=" +
				future.setDate(future.getDate() + 326) +
				";";
			$(".park-alert").hide().addClass("hide");
			adjustFirstBlockTopPadding();
		});

		// Location Alert
		$(".location-alert button.close").click(function () {
			var future = new Date();
			var noticeID = $(this).parent().parent().attr("id");
			document.cookie =
				"locationnotice" +
				noticeID +
				"=accepted; expires=" +
				future.setDate(future.getDate() + 326) +
				";";
			$(".location-alert").hide().addClass("hide");
			adjustFirstBlockTopPadding();
		});
	},
};
