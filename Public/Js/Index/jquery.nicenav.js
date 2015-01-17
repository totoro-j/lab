; (function ($) {
    $.extend({
        'nicenav': function (con) {
            con = typeof con === 'number' ? con : 300;
            var $lis = $('#nav>li'), $h = $('#navLibg')
            $lis.hover(function () {
                $h.stop().animate({
                    'left': $(this).offsetParent().context.offsetLeft
                }, con);
            }, function () {
                $h.stop().animate({
                    'left': '0px'
                }, con);
            })
        }
    });
}(jQuery));