var $ = require("jquery");
var lottie = require("lottie-web");
var anime = require("animejs");
var CountUp = require("countup");

module.exports = {
	init: function () {
		// Moving cloud effect for the home page hero
		var cloudsDiv = `<div class="moving-clouds" style="background-image: url('/app/themes/mightily/dist/assets/img/clouds.png'); "></div>`;
		// var cloudsDiv = `<div class="moving-clouds" style="background-image: url('/assets/img/clouds.png'); "></div>`;
		var homeHero = $(".home .hero.style-4 .image");
		if (homeHero.length > 0) {
			// Found home hero
			homeHero.append(cloudsDiv);
		}

		// Fade in all blocks
		var mightyBlocks = document.querySelectorAll(".block");
		$(document).ready(function () {
			for (var i = 0; i < mightyBlocks.length; i++) {
				var mightyBlock = mightyBlocks[i];
				var bodyEl = document.querySelector("body");

				if (
					bodyEl.classList.contains("home") &&
					mightyBlock.classList.contains("style-4")
				) {
					// Animate hero style 4 differently
					mightyBlock.style.opacity = "1";
					var heroImage = mightyBlock.querySelector(".image");
					var heroClouds = mightyBlock.querySelector(
						".moving-clouds"
					);
					var heroContent = mightyBlock.querySelector(".content");
					var tl = anime.timeline({
						duration: 500,
						easing: "cubicBezier(.5, .05, .1, .3)",
					});
					tl.add({
						targets: [heroImage, heroClouds],
						opacity: 1,
						delay: 0,
					}).add({
						targets: heroContent,
						opacity: 1,
						delay: 500,
					});
				} else if (mightyBlock.classList.contains("donate")) {
					new Waypoint({
						element: mightyBlock,
						handler: function () {
							this.element.classList.add("animate");

							anime({
								targets: this.element,
								opacity: 1,
								duration: 400,
								easing: "cubicBezier(.5, .05, .1, .3)",
							});

							var counter1Num = $("#bubble-number").data("count");
							var counter1Start = 0;
							var counter1Speed = $("#bubble-number").data(
								"speed"
							);
							var counter1 = new CountUp(
								"bubble-number",
								counter1Start,
								counter1Num,
								0,
								counter1Speed
							);

							if (!counter1.error) {
								counter1.start();
							} else {
								console.error(counter1.error);
							}

							var counter2Num = $("#goal-number").data("count");
							var counter2Start = 0;
							var counter2Speed = $("#goal-number").data("speed");
							var counter2 = new CountUp(
								"goal-number",
								counter2Start,
								counter2Num,
								0,
								counter2Speed
							);

							if (!counter2.error) {
								counter2.start();
							} else {
								console.error(counter2.error);
							}
						},
						offset: "85%",
					});
				} else {
					new Waypoint({
						element: mightyBlock,
						handler: function () {
							this.element.classList.add("animate");
							anime({
								targets: this.element,
								opacity: 1,
								duration: 400,
								easing: "cubicBezier(.5, .05, .1, .3)",
							});
						},
						offset: "85%",
					});
				}
			}
		});

		var cardCols = document.querySelectorAll(".block.cards .col");
		$(document).ready(function () {
			for (var i = 0; i < cardCols.length; i++) {
				var mightyBlock = cardCols[i];
				new Waypoint({
					element: mightyBlock,
					handler: function () {
						anime({
							targets: this.element,
							opacity: 1,
							duration: 400,
							easing: "cubicBezier(.5, .05, .1, .3)",
						});
					},
					offset: "85%",
				});
			}
		});

		// For dev purposes only
		// Comment out for production
		// window.addEventListener('load', function () {
		//     // Run the lottie animation
		//     lottie.loadAnimation({
		//         container: document.getElementById('get-involved'), // the dom element that will contain the animation
		//         renderer: 'svg',
		//         loop: false,
		//         autoplay: true,
		//         // path: '/app/themes/mightily/dist/assets/lottie/GetInvolveddata.json' // the path to the animation json
		//         path: '/assets/lottie/GetInvolveddata.json' // the path to the animation json
		//     });

		// });
	},
};
