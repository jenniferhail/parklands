var $ = require('jquery');
var slick = require('slick-carousel');

module.exports = {
	init: function () {

        var slider = $('.block.hero.style-3.slider .items');
        if (slider.length > 0) {
            for (var i = 0; i < slider.length; i++) {
                // Init first slider
                $(slider[i]).slick();
            }
        }

	}
}