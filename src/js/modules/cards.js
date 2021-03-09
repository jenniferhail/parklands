var $ = require('jquery');

module.exports = {
    init: function () {
        var cards = document.querySelectorAll('.block.listing .block-single-card');
        Array.prototype.forEach.call(cards, function(card) {
            card.style.cursor = 'pointer';
            var down, up, link = card.querySelector('.title a');
            card.onmousedown = function() {
                down = +new Date();
            } 
            card.onmouseup = function() {
                up = +new Date();
                if ((up - down) < 200) {
                    link.click();
                }
            }
        });
    }
}