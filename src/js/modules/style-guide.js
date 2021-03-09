var $ = require('jquery');

module.exports = {
	init: function () {
		var app = new Vue({
			el: '#app',
			data: {
				layouts: document.querySelectorAll('.block')
			}
		})
	}
}