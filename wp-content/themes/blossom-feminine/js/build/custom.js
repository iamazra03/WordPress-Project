jQuery(document).ready(function($) {
    $('.btn-close').on( 'click', function() {
        $('.promotional-block').hide();
    });

    //Header Search form show/hide
    $(".btn-search").on( 'click', function() {
        $(".site-header .form-holder").slideToggle();
        return false;
    });
    $('html').on( 'click', function() {
        $('.site-header .form-holder').slideUp();
    });

    $(".btn-search").on('keyup', function(event){
        if(event.key == "Escape"){
           $('.site-header .form-holder').slideUp(); 
        }
    });

    $('.site-header .form-section').on( 'click', function(event) {
        event.stopPropagation();
    });    
    
    var rtl, slider_auto;
    
    if( blossom_feminine_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }

    if( blossom_feminine_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    //banner slider
    $('#banner-slider').owlCarousel({
        loop       : true,
        margin     : 0,
        nav        : true,
        items      : 1,
        dots       : false,
        autoplay   : slider_auto,
        lazyLoad   : true,
        rtl        : rtl,
        animateOut : blossom_feminine_data.animation,
    });

    // Script for back to top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#blossom-top').fadeIn();
        } else {
            $('#blossom-top').fadeOut();
        }
    });

    $("#blossom-top").on( 'click', function() {
        $('html,body').animate({ scrollTop: 0 }, 600);
    });

    //match height
    $('.post-navigation .nav-links .nav-holder').matchHeight();
    $('.archive #primary .post').matchHeight();
    $('.search #primary .search-post').matchHeight();

    //Responsive menu
    var winWidth = $(window).width();
    $('#site-navigation ul li.menu-item-has-children').find('> a').after('<button class="submenu-toggle"><i class="fa fa-angle-down"></i></button>');
    $('#site-navigation ul li .submenu-toggle').on( 'click', function() {
        $(this).siblings('.sub-menu').stop(true, false, true).slideToggle();
        $(this).toggleClass('active');
    });

    $('#primary-toggle-button').on( 'click', function() {
        $('.main-navigation').toggleClass('menu-toggled');
    });

    //secondary menu
    $('.secondary-nav ul li.menu-item-has-children').find('> a').after('<button class="submenu-toggle"><i class="fa fa-angle-down"></i></button>');
    $('.secondary-nav ul li .submenu-toggle').on( 'click', function() {
        $(this).siblings('.sub-menu').stop(true, false, true).slideToggle();
        $(this).toggleClass('active');
    });

    $('#secondary-toggle-button, #primary-toggle-button').on( 'click', function() {
        $(this).siblings('.secondary-nav').children('.secondary-menu-list').slideDown();
        $(this).siblings('.main-navigation').children('.primary-menu-list').slideDown();
    });

    $('.secondary-nav .close, .main-navigation .close').on( 'click', function() {
        $(this).parents('.secondary-menu-list').slideUp();
        $(this).parents('.primary-menu-list').slideUp();
    });

    $(window).on( 'keyup', function(e) {
        if(e.key == 'Escape') {
            if($(window).width() < 768) {
                $('.secondary-nav .secondary-menu-list').slideUp();
            } else {
                $('.secondary-nav .secondary-menu-list').slideDown();
            }

            if($(window).width() < 1025) {
                $('.main-navigation .primary-menu-list').slideUp();
            } else {
                $('.main-navigation .primary-menu-list').slideDown();
            }
        }
    });

    //js for accessibility
    $('.main-navigation ul li a, .main-navigation ul li button, .secondary-nav ul li a, .secondary-nav ul li button').on( 'focus', function() {
        $(this).parents('li').addClass('focused');
    }).on( 'blur', function() {
        $(this).parents('li').removeClass('focused');
    });

    //sticky kit
    if(winWidth > 767){
        $(".single #primary .post .text-holder .entry-content .social-share").stick_in_parent({
            offset_top: 60,
        });
    }

    //wow
    new WOW().init();
});