(function($) {
    $.fn.invisible = function() {
        return this.each(function() {
            $(this).css("opacity", "0");
        });
    };
    $.fn.visible = function() {
        return this.each(function() {
            $(this).css("opacity", "1");
        });
    };
}(jQuery));

document.onreadystatechange = function(e) {
    if (document.readyState === 'complete') {
        $(document.body).hide();
        $('nav').hide();
        $('#panel-de-control').hide();
        $('.esconder').invisible();
    }
};

window.onload = function() {
    $(document.body).fadeIn('500', function(){
        $('nav').fadeIn('500', function() {
            $('#panel-de-control').fadeIn(500, function() {
                $('.esconder').hide();
                $('.esconder').visible();
                $('.esconder').fadeIn(500);
            });
        })
    });
};
