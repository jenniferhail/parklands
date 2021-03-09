var $ = require("jquery");
var _ = require("lodash");

module.exports = {
	init: function () {
		// Map - Positioning the legend button at the bottom of the viewport
		function mapHeight() {
			// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
			let vh = window.innerHeight * 0.01;
			// Then we set the value in the --vh custom property to the root of the document
			document.documentElement.style.setProperty("--vh", `${vh}px`);
		}
		mapHeight();

		// If the screen size changes, recalculate the viewport height
		// Using the lodash throttle
		window.addEventListener(
			"resize",
			_.throttle(function () {
				mapHeight();
			}, 300)
		);

		// Map Button
		var mapBtn = document.querySelector(".block.interactive-map .map-btn");
		var closeBtn = document.querySelector(
			".block.interactive-map .close-btn"
		);
		var filterPanel = document.querySelector(
			".block.interactive-map .side-panel"
		);

		function togglePanel(el) {
			el.addEventListener("click", function () {
				if (filterPanel.classList.contains("active")) {
					filterPanel.classList.remove("active");
					mapBtn.focus();
				} else {
					filterPanel.classList.add("active");
					closeBtn.focus();
				}
			});
		}

		if (mapBtn) {
			togglePanel(mapBtn);
		}
		if (closeBtn) {
			togglePanel(closeBtn);
		}
	},
};
