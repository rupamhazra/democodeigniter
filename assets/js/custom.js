jQuery(window).on("load", function() {
    "use strict";
    $("#preloader").fadeOut("slow");
    $('.flexslider.flexslider-banner').flexslider({
        controlNav: false
    });
    $('.flexslider').flexslider({
        animation: "slide",
        directionNav: true,
        slideshow: true
    });
});
jQuery(function($) {
    "use strict";
    $('a').addClass('transition');
    jQuery('#nav').singlePageNav({
        offset: jQuery('#nav').outerHeight(),
        filter: ':not(.external)',
        speed: 1200,
        currentClass: 'current',
        easing: 'easeInOutExpo',
        updateHash: true,
        beforeStart: function() {
            console.log('begin scrolling');
        },
        onComplete: function() {
            console.log('done scrolling');
        }
    });
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 400) {
            $("#navigation").css("background-color", "#fff", );
        } else {
            $("#navigation").css("background-color", "rgba(255, 255, 255, 0.69)");
        }
    });
    var slideHeight = $(window).height();
    $('#slider, .carousel.slide, .carousel-inner, .carousel-inner .item').css('height', slideHeight);
    $(window).resize(function() {
        'use strict',
        $('#slider, .carousel.slide, .carousel-inner, .carousel-inner .item').css('height', slideHeight);
    });
    $(".service-item").on("mouseover", function() {
        $('.service-item .effect').addClass('shadow');
    });
    $(".project-wrapper").mixItUp();
    $(".portfolio-lightbox").magnificPopup({
        type: "image",
        gallery: {
            enabled: true
        }
    });
    $('').parallax("50%", 0.3);
    $(".number-counters").appear(function() {
        $(".number-counters [data-to]").each(function() {
            var e = $(this).attr("data-to");
            $(this).delay(6e3).countTo({
                from: 50,
                to: e,
                speed: 3e3,
                refreshInterval: 50
            })
        })
    });
    $(window).on("scroll", function() {
        if ($(window).scrollTop() > 400) {
            $("#back-top").fadeIn(200)
        } else {
            $("#back-top").fadeOut(200)
        }
    });
    $("#back-top").on("click", function() {
        $("html, body").stop().animate({
            scrollTop: 0
        }, 1500, "easeInOutExpo")
    });
    $("#testimonial-slider").owlCarousel({
        items: 6,
        itemsDesktop: [1000, 6],
        itemsDesktopSmall: [979, 4],
        itemsTablet: [768, 4],
        pagination: false,
        transitionStyle: "backSlide",
        autoPlay: 1500,
        loop: true,
    });
    $("#skills-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        pagination: true,
        transitionStyle: "backSlide",
        autoPlay: true
    });
    $("#cms-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        pagination: true,
        transitionStyle: "backSlide",
        autoPlay: true
    });
    $("#shop-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        pagination: true,
        transitionStyle: "backSlide",
        autoPlay: true
    });
    $("#server-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        pagination: true,
        transitionStyle: "backSlide",
        autoPlay: true
    });
    $("#fontend-slider").owlCarousel({
        items: 1,
        itemsDesktop: [1000, 1],
        itemsDesktopSmall: [979, 1],
        itemsTablet: [768, 1],
        pagination: true,
        transitionStyle: "backSlide",
        autoPlay: true
    });
    $(".land-demo").owlCarousel({
        loop: !0,
        margin: 0,
        autoplay: !0,
        autoplayTimeout: 2e3,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1e3: {
                items: 1
            }
        }
    });

    $("#client").owlCarousel({
        loop: !0,
        margin: 5,
        autoplay: !0,
        autoplayTimeout: 2e3,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1e3: {
                items: 4
            }
        }
    });
    // you-tube-popup   



    var campaign = (function($, window) {

        'use strict';

        var main = {},

            initialize = function() {

                lightbox(main.elem.lightbox);

            },

            // Magnific Popup - YouTube video
            lightbox = function(elem) {
                elem.magnificPopup({
                    type: 'iframe',
                    iframe: {
                        markup: '<div class="mfp-iframe-scaler">' + '<div class="mfp-close"></div>' + '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' + '</div>',
                        patterns: {
                            youtube: {
                                index: 'youtube.com/',
                                id: 'v=',
                                src: '//www.youtube.com/embed/%id%'
                            }
                        },
                        srcAction: 'iframe_src'
                    }
                });
            };

        return {
            main: main,
            init: initialize
        };

    }(window.jQuery, window));

    // On dom ready...
    $(function() {

        'use strict';

        var main = campaign.main;

        main.elem = {};
        main.elem.lightbox = $('#lightbox');

        campaign.init();

    });



    // back-to-top
    $('body').append('<div id="toTop" class="toTop"><i class="fa fa-angle-up" aria-hidden="true"></i></div>');
    $(window).scroll(function() {
        if ($(this).scrollTop() != 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });





    function initialize() {
        var myLatLng = new google.maps.LatLng(31.04095, 31.37847);
        var mapOptions = {
            zoom: 14,
            center: myLatLng,
            disableDefaultUI: true,
            scrollwheel: false,
            navigationControl: false,
            mapTypeControl: false,
            scaleControl: false,
            draggable: false,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'roadatlas']
            }
        };
        var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: 'https://image.ibb.co/ju5vuS/location_icon.png',
            title: '',
        });
    }
    google.maps.event.addDomListener(window, "load", initialize);
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 120,
        mobile: false,
        live: true
    });
    wow.init();
    $('#contact-form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true
            }
        },
        messages: {
            name: {
                required: "come on, you have a name don't you?",
                minlength: "your name must consist of at least 2 characters"
            },
            email: {
                required: "no email, no message"
            },
            message: {
                required: "yea, you have to write something to send this form.",
                minlength: "thats all? really?"
            }
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                type: "POST",
                data: $(form).serialize(),
                url: "sendmail.php",
                success: function() {
                    $('#contact-form :input').attr('disabled', 'disabled');
                    $('#contact-form').fadeTo("slow", 0.15, function() {
                        $(this).find(':input').attr('disabled', 'disabled');
                        $(this).find('label').css('cursor', 'default');
                        $('#success').fadeIn();
                    });
                },
                error: function() {
                    $('#contact-form').fadeTo("slow", 0.15, function() {
                        $('#error').fadeIn();
                    });
                }
            });
        }
    });


    $('.xboot-mobile-menu').meanmenu();


});