var $ = require('jquery');

module.exports = {
	init: function () {
		// List View
		$('.accordion .title').on('click', function (evt) {
			evt.preventDefault();
			
			$(this).parent().toggleClass('active');
			$(this).parent().find('.content').slideToggle('3000');
			
		});

	}
}