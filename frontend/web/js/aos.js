new WOW().init();

jQuery(document).ready(function( $ ) {
    $('.counter').counterUp({
        delay: 5,
        time: 1000
    });
});

var typed = new Typed(".typed", {
    strings: [
        "АСТАНИНСКАЯ АКАДЕМИЯ БИЗНЕСА И НЕТВОРКИНГА"
    ],
    typeSpeed: 60,
    backSpeed: 60,
    loop: true
});

$(document).ready(function () {
    AOS.init({
        offset: 50,
        duration: 600,
        easing: 'ease-in-sine',
        delay: 100,
        //            disable: window.innerWidth < 768
    });
});

