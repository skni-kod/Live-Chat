document.addEventListener('DOMContentLoaded', function () {
    var elem = $('.color-picker')[0];

    var colorPicker = new Huebee(elem, {

    });

    colorPicker.on('change', function (color) {
        document.querySelector('.livechat-header').style.backgroundColor = color;
        document.querySelector('#livechat-send-button').style.backgroundColor = color;
    });
});