var $ = require("jquery");
var styleguide = require("./modules/style-guide.js"); // comment out before pushing
var accordions = require("./modules/accordions.js");
var animations = require("./modules/animations.js");
var cards = require("./modules/cards.js");
var map = require("./modules/map.js");
var menu = require("./modules/menu.js");
var notices = require("./modules/notices.js");
var popups = require("./modules/popups.js");
var slider = require("./modules/sliders.js");
var submenus = require("./modules/submenus.js");
var svg = require("./modules/svg.js");
var weather = require("./modules/weather.js");

// Make sure that you init the styleguide first.
styleguide.init(); // comment out before pushing
accordions.init();
animations.init();
cards.init();
map.init();
menu.init();
notices.init();
slider.init();
svg.init();
submenus.init();
weather.init();

// Slider JS for the gallery slider has been moved to the footer

// vue.js to handle DOM rendering and
// axios to handle fetching data
// Define a new component called weather-data
Vue.component("weather-data", {
	data: function () {
		return {
			forecast: null,
			temperature: null,
			temperatureUnit: null,
			shortForecast: null,
			icon: null,
			iconAbbr: null,
			iconShort: null,
			time: null,
		};
	},
	filters: {
		trimIconURL(el) {
			if (el) {
				var string = el.split("/");
				var time = string[5];
				string = string[string.length - 1];

				if (string.includes(",")) {
					string = string.split(",")[0];
				} else if (string.includes("?")) {
					string = string.split("?")[0];
				}

				return string + "-" + time;
			}
		},
	},
	mounted() {
		var config = {
			method: "get",
			url: "https://api.weather.gov/gridpoints/LMK/59,76/forecast/hourly",
			headers: {
				// "User-Agent": ("Mightily weather forecast", "sos@mightily.com"),
				"Access-Control-Allow-Origin": "*",
				"Access-Control-Allow-Credentials": "true",
				"Access-Control-Allow-Methods": "GET,HEAD,OPTIONS,POST,PUT",
				"Access-Control-Allow-Headers":
					"Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers",
			},
		};
		axios(config)
			// The Parklands
			// 38.2181087, -85.4766127
			// https://api.weather.gov/points/38.2181,-85.4766
			// https://api.weather.gov/gridpoints/LMK/59,76/forecast/hourly
			// .get('https://api.weather.gov/gridpoints/LMK/59,76/forecast/hourly')
			.then(
				(response) => (
					console.log(response),
					(this.forecast = response.data),
					(this.temperature =
						response.data.properties.periods[0].temperature),
					(this.temperatureUnit =
						response.data.properties.periods[0].temperatureUnit),
					(this.shortForecast =
						response.data.properties.periods[0].shortForecast),
					// Get the icon abbreviation (Ref: https://api.weather.gov/icons)
					(this.icon = response.data.properties.periods[0].icon)
				)
			);
	},
	template:
		'<div><span class="icon" :class="$options.filters.trimIconURL(icon)"></span><span class="forecast">{{shortForecast}} {{temperature}}{{temperatureUnit}}</span></div>',
});

Vue.component("cfs-data-1", {
	data: function () {
		return {
			info: null,
		};
	},
	mounted() {
		var config = {
			method: "get",
			url:
				"https://waterservices.usgs.gov/nwis/iv/?format=json&sites=03297900&parameterCd=00060,00065&siteStatus=all",
			// headers: {
			// 	"User-Agent": "Mightily CFS data 1, developers@mightily.com",
			// 	// "Access-Control-Allow-Origin": "*",
			// },
		};
		axios(config).then(
			(response) =>
				(this.info =
					response.data.value.timeSeries[0].values[0].value[0].value)
		);
	},
	template: "<span>{{info}} CFS</span>",
});

Vue.component("cfs-data-2", {
	data: function () {
		return {
			info: null,
		};
	},
	mounted() {
		var config = {
			method: "get",
			url:
				"https://waterservices.usgs.gov/nwis/iv/?format=json&sites=03298000&parameterCd=00060,00065&siteStatus=all",
			// headers: {
			// 	"User-Agent": "Mightily CFS data 2, developers@mightily.com",
			// 	// "Access-Control-Allow-Origin": "*",
			// },
		};
		axios(config).then(
			(response) =>
				(this.info =
					response.data.value.timeSeries[0].values[0].value[0].value)
		);
	},
	template: "<span>{{info}} CFS</span>",
});

Vue.component("cfs-data-3", {
	data: function () {
		return {
			info: null,
		};
	},
	mounted() {
		var config = {
			method: "get",
			url:
				"https://waterservices.usgs.gov/nwis/iv/?format=json&sites=03298200&parameterCd=00060,00065&siteStatus=all",
			// headers: {
			// 	"User-Agent": "Mightily CFS data 3, developers@mightily.com",
			// 	// "Access-Control-Allow-Origin": "*",
			// },
		};
		axios(config).then(
			(response) =>
				(this.info =
					response.data.value.timeSeries[0].values[0].value[0].value)
		);
	},
	template: "<span>{{info}} CFS</span>",
});

new Vue({
	el: "#weather-forecast",
});

new Vue({
	el: "#components-demo",
});

new Vue({
	el: "#cfs-1",
});

new Vue({
	el: "#cfs-2",
});

new Vue({
	el: "#cfs-3",
});

popups.init();
