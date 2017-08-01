/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

//Set height for each section
function pageHeight() {
    var wHeight = $(window).height();
    $('header, #howitworks, #about, #contatct').css('min-height', wHeight);
}
pageHeight();
$(window).resize(function() {
    pageHeight()
});
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});

// Loading quotes divs randomly
var divs = $(".div-quote").get().sort(function() {
    return Math.round(Math.random()) - 0.5; //random so we get the right +/- combo
}).slice(0, 2)
$(divs).show();
