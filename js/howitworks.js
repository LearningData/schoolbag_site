// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('data-class')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
$('.btn-get-book').click(function() {
  $(this).hide();
});
$('.btn-close').click(function() {
  $('.btn-get-book').slideDown(100);
});
