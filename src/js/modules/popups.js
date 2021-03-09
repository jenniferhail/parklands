var $ = require("jquery");
var MicroModal = require("micromodal");

module.exports = {
	init: function () {
		MicroModal.init();

		// Open weather popup
		var weatherBtn = document.getElementById("weather-trigger");
		weatherBtn.addEventListener("click", function () {
			if ($(".modal.is-open").length > 0) {
				MicroModal.close();
			}
			MicroModal.show("modal-3");
		});

		// Open CFS popup
		var cfsBtn = document.getElementById("cfs-trigger");
		cfsBtn.addEventListener("click", function () {
			if ($(".modal.is-open").length > 0) {
				MicroModal.close();
			}
			MicroModal.show("modal-4");
		});

		// General Popup
		var generalPopup = document.getElementById("modal-2");

		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(";");
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == " ") {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
			var expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		if (generalPopup) {
			// If the popup exists, check for the cookie
			var cookie = getCookie("mightilyPopup");

			// If the cookie does not exist
			if (cookie == false) {
				// Show the popup
				MicroModal.show("modal-2");
				// And set a cookie
				setCookie("mightilyPopup", "seen", 60);
			}
		}
	},
};
