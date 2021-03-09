var $ = require("jquery");

module.exports = {
	init: function () {
		var menuItems = document.querySelectorAll("li.menu-item-has-children");

		Array.prototype.forEach.call(menuItems, function (el, i) {
			var activatingA = el.querySelector("a");
			var btn =
				'<button class="submenu-btn" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 193.8 96.9"><style>.svg-white{fill: #ffffff;}</style><polygon class="svg-white" points="193.8 0 96.9 96.9 0 0 "/></svg><span class="visually-hidden">Show Submenu for “' +
				activatingA.text +
				"”</span></button>";
			activatingA.insertAdjacentHTML("afterend", btn);
		});

		var submenuBtns = document.querySelectorAll(
			".main-menu .menu-item .submenu-btn"
		);
		Array.prototype.forEach.call(submenuBtns, function (el) {
			el.addEventListener("click", function () {
				console.log("You clicked the submenu button.");
				this.closest(".menu-item").classList.toggle("active");
				var screenReaderText = this.querySelector(".visually-hidden")
					.innerHTML;
				var screenReaderShow = screenReaderText.replace("Hide", "Show");
				var screenReaderHide = screenReaderText.replace("Show", "Hide");

				if (this.closest(".menu-item").classList.contains("active")) {
					this.setAttribute("aria-expanded", "true");
					this.querySelector(
						".visually-hidden"
					).innerHTML = screenReaderHide;
				} else {
					this.setAttribute("aria-expanded", "false");
					this.querySelector(
						".visually-hidden"
					).innerHTML = screenReaderShow;
				}
			});
		});
	},
};
