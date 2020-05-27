require('../../node_modules/jquery/dist/jquery.min.js');
require('./bootstrap');
require('../../node_modules/bootstrap-select/js/bootstrap-select');

$('.like-btn-svg').on('click', function () {
    const $that = $(this);
    $.ajax({
        type: "GET",
        url: '/recipe/' + $that.attr('data-id') + '/mark',
    }).done(function (msg) {
        if ($that.hasClass('liked')) {
            if ($that.hasClass('animate')) {
                $that.toggleClass('animate');
            }
            $that.toggleClass('animate-back');
            $that.removeClass('liked');
        } else {
            if ($that.hasClass('animate-back')) {
                $that.toggleClass('animate-back');
            }
            $that.toggleClass('animate');
            $that.addClass('liked');
        }
    });
});
