jQuery(function($) {

    "use strict";

    //Preloader
    if($('.ale_preloader_holder').length){
        $(document).ready(function(){
            $('.ale_preloader_holder').fadeOut('1000',function(){$(this).remove();});
        });
    }

    /*
    * Parallax Option
    * */
    $.fn.moveIt = function(){
        var $window = $(window);
        var instances = [];

        $(this).each(function(){
            instances.push(new moveItItem($(this)));
        });

        window.onscroll = function(){
            var scrollTop = $window.scrollTop();
            instances.forEach(function(inst){
                inst.update(scrollTop);
            });
        }
    }
    var moveItItem = function(el){
        this.el = $(el);
        this.speed = this.el.attr('data-scroll-speed');
    };
    moveItItem.prototype.update = function(scrollTop){
        var pos = scrollTop / this.speed;


        if(this.el.data('scroll-type')=='element'){
            this.el.css('transform', 'translateY(' + -pos + 'px)');
        } else if(this.el.data('scroll-type')=='background'){
            this.el.css('background-position-y', -pos + 'px');
        }
    };
    $(function(){
        $('[data-scroll-speed]').moveIt();
    });



    if($('.look_button').length){
        $('.look_button').mousemove(function( e ) {


            const x = e.pageX - $(this).offset().left;
            const y = e.pageY - $(this).offset().top;

            e.target.style.setProperty('--x', x + "px");
            e.target.style.setProperty('--y', y + "px");
        })
    }

    //Animation for Bebe Background
    if($('#bebe_variant_header').length){
        var $window = $(window);
        var $stars1 = $('#stars1'); // Smaller
        var $stars2 = $('#stars2'); // Bigger
        var $cloud1 = $('#cloud1'); // Cloud Left 1
        var $cloud2 = $('#cloud2'); // Cloud Left 2
        var $cloud3 = $('#cloud3'); // Cloud Left 3
        var $cloud4 = $('#cloud4'); // Cloud Right 1
        var $cloud5 = $('#cloud5'); // Cloud Right 2

        $(window).scroll(function()
        {
            var yPos = -($window.scrollTop());

            // Stars
            $stars1.css({ top: (0   + (yPos / 8)) + 'px' });
            $stars2.css({ top: (0   + (yPos / 3 )) + 'px' });

            // Clouds Left
            $cloud1.css({ top: (10  + (yPos )) + 'px' });
            $cloud2.css({ top: (190 + (yPos )) + 'px' });
            $cloud3.css({ top: (410 + (yPos )) + 'px' });

            // Clouds Right
            $cloud4.css({ top: (0   + (yPos )) + 'px' });
            $cloud5.css({ top: (290 + (yPos )) + 'px' });
        });
    }

    //Mobile menu for Bebe
    if($('#bebe_mobile_menu').length){
        $('#bebe_mobile_menu .ul-drop > li').click(function(){
            $(this).children('ul').toggle({display: "toggle"});
        });
        
        $('#bebe_mobile_menu.drop-menu > a').click(function(){
            $(this).parents('div').children('.ul-drop').toggle({display: "toggle"});
        });
    }

    if($('.ale_plus').length){
        $('form').on( 'click', '.ale_plus, .ale_minus', function() {

            // Get current quantity values
            var qty = $( this ).closest( '.quantity' ).find( '.qty' );
            var val = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));

            // Change the value if plus or minus
            if ( $( this ).is( '.ale_plus' ) ) {
                if ( max && ( max <= val ) ) {
                    qty.val( max );
                } else {
                    qty.val( val + step );
                }
            } else {
                if ( min && ( min >= val ) ) {
                    qty.val( min );
                } else if ( val > 1 ) {
                    qty.val( val - step );
                }
            }
            qty.change();
        });
        $( document.body ).on( 'updated_cart_totals', function(){
            $('form').on( 'click', '.ale_plus, .ale_minus', function() {

                // Get current quantity values
                var qty = $( this ).closest( '.quantity ' ).find( '.qty' );
                var val = parseFloat(qty.val());
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));

                // Change the value if plus or minus
                if ( $( this ).is( '.ale_plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }
                }
                qty.change();
            });
        });
    }


    // Masonry grid
    if($('.grid').length){
        initMasonry( $('.grid') );
    }
    function initMasonry( $grid ) {
        var $grid = $grid.masonry({
            columnWidth: '.grid-sizer',
            gutter: '.gutter-sizer',
            itemSelector: '.grid-item',
            percentPosition: true
        });

        // layout images after they are loaded
        $grid.imagesLoaded( function() {
            $grid.masonry('layout');
        });
    }

    if($('.cafeteria-menu-drop').length){
        $('.ul-drop > li').click(function(){
            $(this).children('ul').toggle({display: "toggle"});
        });
    
        $('.cafeteria-menu-drop > a').click(function(){
            $(this).parents('div').children('.ul-drop').toggle({display: "toggle"});
        });
    }
    


    //Shop Products Shortcode Tabs
    if($('.olins_shop_products_box').length){

        $(".olins_shop_products_box").tabs({
            activate: function(event, ui) {
                initMasonry( $('.grid') );
            },
            show: { effect: "slide", direction: "left", duration: 0,  } ,
            hide: { effect: "slide", direction: "right", duration: 300, },
        });
    }

    //Exotico Slider Shortcode
    if($(".exotico-main-slider").length){
        $(".exotico-main-slider").bxSlider({
            mode: 'vertical',
            controls: false
        });
    }

    //Exotico Testimonials Shortcode
    if($(".testimonials_tabs").length){
        $(".testimonials_tabs").tabs();
    }
    if($('.testimonials-slider').length){
        $('.testimonials-slider').bxSlider({
            pager: false,
            slideWidth: 173,
            minSlides: 1,
            maxSlides: 3,
            moveSlides: 1
        });
    }

    if($('.olins_exotico_statistics .statistics__circle').length){
        $('.olins_exotico_statistics .statistics__circle').circliful();
    }

    if($(".olins_exotico_team .people-slider").length){
        $(".olins_exotico_team .people-slider").bxSlider({
            pager: false,
            slideWidth: 192,
            minSlides: 1,
            maxSlides: 5,
            moveSlides: 1,
            nextSelector: '.slider-controls__next',
            prevSelector: '.slider-controls__prev',
        });
    }

    //Exotico Best Offers
    if($(".exotico_producs_slider").length){
        $(".exotico_producs_slider").bxSlider({
            slideWidth: 240,
            minSlides: 1,
            maxSlides: 4,
            moveSlides: 1,
            pager: false,
            nextSelector: '.slider-controls__next',
            prevSelector: '.slider-controls__prev',
        });
    }
    // Slider One Shortcode
    if($('.olins_slider_one').length){
        $('.olins_slider_one').flexslider({
            animation: 'fade',
            slideshowSpeed: '9000',
            pauseOnHover: true,
            prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            controlNav: false,
            start: function(){
                $('.olins_slider_one li .slide_meta .slider_one_pre_title').css('display','none').removeClass('animated bounceInRight');
                $('.olins_slider_one li .slide_meta .slider_one_title').css('display','none').removeClass('animated bounceInLeft');
                $('.olins_slider_one li .slide_meta .slider_one_button').css('display','none').removeClass('animated bounceInUp');

                $('.flex-active-slide .slide_meta .slider_one_pre_title').css('display','block').addClass('animated bounceInRight');
                $('.flex-active-slide .slide_meta .slider_one_title').css('display','block').addClass('animated bounceInLeft');
                $('.flex-active-slide .slide_meta .slider_one_button').css('display','block').addClass('animated bounceInUp');
            },
            after: function(){
                $('.olins_slider_one li .slide_meta .slider_one_pre_title').css('display','none').removeClass('animated bounceInRight');
                $('.olins_slider_one li .slide_meta .slider_one_title').css('display','none').removeClass('animated bounceInLeft');
                $('.olins_slider_one li .slide_meta .slider_one_button').css('display','none').removeClass('animated bounceInUp');

                $('.flex-active-slide .slide_meta .slider_one_pre_title').css('display','block').addClass('animated bounceInRight');
                $('.flex-active-slide .slide_meta .slider_one_title').css('display','block').addClass('animated bounceInLeft');
                $('.flex-active-slide .slide_meta .slider_one_button').css('display','block').addClass('animated bounceInUp');
            }
        });
    }

    function moveSlider(selector){
        var movementStrength = 25;
        var height = movementStrength / $(window).height();
        var width = movementStrength / $(window).width();
        selector.mousemove(function(e){
            var pageX = e.pageX - ($(window).width() / 2);
            var pageY = e.pageY - ($(window).height() / 2);
            var newvalueX = width * pageX * -1 - 25;
            var newvalueY = height;
            selector.css("background-position", newvalueX+"px     "+newvalueY+"px");
        });
    }

    // Move Slider Shortcode
    if($('.olins_move_slider').length){
        var sliderSize = $(window).width();
        moveSlider($('.olins_move_slider .flex-active-slide figure'));

        $('.olins_move_slider').flexslider({
            animation: 'slide',
            animationLoop: true,
            pauseOnHover: true,
            smoothHeight: true,
            prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            controlNav: false,
            start: function(){
                //Trigger resize to fix VC full width row issue.
                $(window).trigger('resize');
                $('.olins_move_slider li .slide_meta .slider_one_pre_title').css('visibility','hidden').removeClass('animated fadeInUp');
                $('.olins_move_slider li .slide_meta .slider_one_title').css('visibility','hidden').removeClass('animated fadeInDown');
                $('.olins_move_slider li .slide_meta .slider_one_button').css('visibility','hidden').removeClass('animated fadeIn');

                $('.flex-active-slide .slide_meta .slider_one_pre_title').css('visibility','visible').addClass('animated fadeInUp');
                $('.flex-active-slide .slide_meta .slider_one_title').css('visibility','visible').addClass('animated fadeInDown');
                $('.flex-active-slide .slide_meta .slider_one_button').css('visibility','visible').addClass('animated fadeIn');

                moveSlider($('.olins_move_slider .flex-active-slide figure'));
            },
            after: function(){
                $('.olins_move_slider li .slide_meta .slider_one_pre_title').css('visibility','hidden').removeClass('animated fadeInUp');
                $('.olins_move_slider li .slide_meta .slider_one_title').css('visibility','hidden').removeClass('animated fadeInDown');
                $('.olins_move_slider li .slide_meta .slider_one_button').css('visibility','hidden').removeClass('animated fadeIn');

                $('.flex-active-slide .slide_meta .slider_one_pre_title').css('visibility','visible').addClass('animated fadeInUp');
                $('.flex-active-slide .slide_meta .slider_one_title').css('visibility','visible').addClass('animated fadeInDown');
                $('.flex-active-slide .slide_meta .slider_one_button').css('visibility','visible').addClass('animated fadeIn');

                moveSlider($('.olins_move_slider .flex-active-slide figure'));
            }
        });



    }

    //Slider for bebe gallery
    if($('#bebe-gallery-slider').length){
        $('#bebe-gallery-slider').flexslider({
            animation: "fade",
            controlNav: true,
            nextText: "",
            prevText: ""
        });
    }

    if($('#bebe-home-slider').length){
        $('#bebe-home-slider').flexslider({
            animation: "fade",
            controlNav: false,
            nextText: "",
            prevText: ""
        });
    }

    if($('#bebe-photo-gallery').length){
        $('#bebe-photo-gallery').flexslider({
            animation: "slide",
            controlNav: false,
            nextText: "",
            prevText: ""
        });
    }

    //Carousel Products Slider Shortcode
    if($('.olins_products_carousel').length) {
        $('.olins_products_carousel').flexslider({
            animation: "slide",
            animationLoop: false,
            minItems: 1,
            maxItems: 4,
            itemWidth: 210,
            itemMargin: 50,
            controlNav: false,
            customDirectionNav: $(".carousel_nav a")
        });
    }

    //Works and Posts Images slider
    if($('.single_post_images_slider').length){
        $('.single_post_images_slider').flexslider({
            animation: "slide",
            animationLoop: true,
            smoothHeight: true,
            prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            controlNav: false
        });
    }
    if($('.keira_single_post_images_slider').length){
        $('.keira_single_post_images_slider').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            slidesToShow: 2,
            slidesToScroll: 1,
        });
    }

    //Enforcement Testimonials
    if($('.enforcement_about_slider').length){
        $('.enforcement_about_slider').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            swipeToSlide: true,
            swipe:true,
            responsive: [
                {
                  breakpoint: 780,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    
                  }
                },
                {
                  breakpoint: 510,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
            
              ]
        });
    }

    //Organic Testimonials
    if($('.organic_testimonials_slider').length){
        $('.organic_testimonials_slider').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            dots:true,
            slidesToShow: 3,
            slidesToScroll: 1,
            swipeToSlide: true,
            swipe:true,
            responsive: [
                {
                  breakpoint: 780,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    
                  }
                },
                {
                  breakpoint: 510,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
            
              ]
        });
    }

    //Burger Testimonials
    if($('.burger_testimonials_slider').length){
        $('.burger_testimonials_slider').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            dots:true, 
            slidesToShow: 1, 
            slidesToScroll: 1,
            swipeToSlide: true,
            swipe:true
        });
    }

    //Orquidea Services

    if($('.titleservice').length){
        $('.titleservice').on('click',function(){
            $(this).parent().find('figure').toggle();
            $(this ).toggleClass("hidetitle");
        });
    }

    //Orquidea Filter But
    if($('.galleryfilterbox .filterbut').length){
        $('.galleryfilterbox .filterbut').on('click',function(){
            $('.dropdonwcat').toggle(0);
        });
    }
    
    //Orquidea Style Single Work
    if($('.orquidea_sliderbox').length){
        
        if (jQuery.isFunction(jQuery.fn.scrollable)) {
            $('.sliderbox').scrollable({circular: true}).autoscroll({ autoplay: true });
        }
    }
    

    //Donation open menu
    if($('#mobile-button').length){
        $('#mobile-button').click(function(){
            $('#mobile-menu').toggle({display: "toggle"});
        });
    }
    

    //Donation TimeLine
    if($('.donation_timeline_shortcoe').length){
        $('.donation_timeline_shortcoe').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            swipeToSlide: true,
            swipe:true,
            responsive: [
                {
                  breakpoint: 780,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    
                  }
                },
                {
                  breakpoint: 510,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
            
              ]
        });
    }

    //Donation Centered Slider
    if($('.ale_donation_home-2-slider .wrapper2').length){
        $('.ale_donation_home-2-slider .wrapper2').flexslider({
            animation: "slide",
            animationLoop: true,
            prevText: '',
            nextText: ''
        });
    }
    

    //Po Slider

    if($('.ale_po_vertical_slider .portfolio-column').length) {
        var homeTwoSwiper = new Swiper('.portfolio-column', {
            direction: 'vertical',
            effect:'slide',
            speed: 900,
            slidesPerView: 'auto',
            mousewheel: true,
            freeMode: true,
            loop: false,
            //spaceBetween:30
        })
    }

    //Enforcement Scroll Slider 

    if($('.home-one-slider').length) {

        $('.home_slider_counter').show(0).css('display','flex');
        
        var homeSlider = new Swiper('.home-one-slider', {
            direction: 'horizontal',
            keyboard: true,
            effect:'slide',
            speed: 900,
            slidesPerView: 'auto',
            mousewheel: true,
            freeMode: true,
            loop: false,
            spaceBetween:30,
            on: {
                init: function () {
                    var total_slides = $('.home-one-slider .swiper-slide').length - 1;
                    if(total_slides < 10){
                        var total = '0' + total_slides;
                    } else {
                        var total = total_slides;
                    }
                    $('.home_slider_counter .total').text(total);
                },
                slideChange: function(){
                    var current_slide = homeSlider.activeIndex;
                    var total_slide = $('.home-one-slider .swiper-slide').length - 1;
                    if(current_slide < 10){
                        var current = '0' + current_slide;
                    } else {
                        var current = current_slide;
                    }
                    $('.home_slider_counter .current').text(current);

                    var progress = current_slide * 100 / total_slide;
                    $('.home_slider_counter .bar').css('width',progress+'%');
                }
            }
        });

        $(window).resize(function(){
            homeSlider.reInit()
          })
          $(window).trigger('resize')
    }

    //Top Full Width Slider
    if($('.top_full_images_slider').length){
        $('.top_full_images_slider').flexslider({
            animation: "slide",
            animationLoop: true,
            smoothHeight: true,
            prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            //controlNav: false
        });
    }

    //Ospedale Team Slider on Homepage
    if($('.olins_ospedale_teamslider').length){
        $('.olins_ospedale_teamslider .team-slider').slick({ 
            infinite: true,
            autoplay: true,
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1, 
            appendArrows: '.arrows',
            nextArrow: '<i class="fa fa-angle-right" aria-hidden="true"></i>',
            prevArrow: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            responsive: [
                {
                  breakpoint: 630,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                }
              ]
        });
    }

    //HoverDir for Recent Works Shortcode
    if($('#da-thumbs').length){
        $(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
    }

    
    //Select Navigation on Mobile Devices
    if($('select.mobilemenu').length){
        $('select.mobilemenu').change(function(){
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });
    }

    //Icon Category on Works Archive for Zoo Variant
    if($('.title_with_icon .category_icon').length){
        $('.title_with_icon .category_icon').appear(function() {

            $(this).each(function(){
                $(this).addClass('animated fadeInUp').css('visibility','visible');
            });
        },{accX: 0, accY: -100});

    }

    //Testimonial Slider Element
    if($('.olins_testimonials_slider').length){
        $('.olins_testimonials_slider').flexslider({
            animation: "slide",
            animationLoop: true,
            smoothHeight: true,
            directionNav: false
        });
    }

    

    if($('.olins_pretty_team').length){
        $('.olins_pretty_team').flexslider({
            animation: "fade",
            animationLoop: true,
            //smoothHeight: true,
            directionNav: false,
            start:function(){
                if($(window).width()>'550') {
                    $('.olins_pretty_team_container .olins_pretty_team ul.slides li .col-6').css('height', $('.olins_pretty_team').height() + 'px');
                }
            },
            before:function(){
                if($(window).width()>'550') {
                    $('.olins_pretty_team_container .olins_pretty_team ul.slides li .col-6').css('height', $('.olins_pretty_team').height() + 'px');
                }
            }
        });
    }

    if($('.olins_simple_team').length){
        $('.olins_simple_team').flexslider({
            animation: "slide",
            animationLoop: true,
            //smoothHeight: true,
            directionNav: false
        });
    }

    if($('#nav_open').length){
        $('#nav_open').on('click',function(){
            if($('.luxuryshoes_drop_menu').hasClass('close')){
                $('.luxuryshoes_drop_menu').removeClass('close').addClass('open');
                $(this).removeClass('fa-bars').addClass('fa-times');
            } else {
                $('.luxuryshoes_drop_menu').removeClass('open').addClass('close');
                $(this).removeClass('fa-times').addClass('fa-bars');
            }

        });
    }

    //Scale image bg
    if($('.olins_scale_image_box').length){
        $('.olins_scale_image_box .scale_image .image_holder').appear(function() {
            $(this).each(function(){
                $(this).addClass('animate');
            });
        },{accX: 0, accY: -100});
    }


    //Camping Lines
    if($('.camping_lines').length){
        $('.camping_lines').appear(function() {
            $(this).each(function(){
                $(this).addClass('in');
            });
        },{accX: 0, accY: -100});
    }
    if($('.camping_bottom_line').length){
        $('.camping_bottom_line').appear(function() {
            $(this).each(function(){
                $(this).addClass('in');
            });
        },{accX: 0, accY: 0});
    }


    if($('.olins_service_block').length){
        $('.olins_service_block').appear(function() {
            $(this).each(function(){
                $('.olins_service_block .image_holder img').addClass('zoomIn').css('visibility','visible');
            });
        },{accX: 0, accY: -150});
    }


    if($('.olins_do_fadein').length){
        $('.olins_do_fadein').each(function(){
            var element = $(this);

            var delay = 100;
            if($(this).hasClass('delay200')){
                delay = 200;
            } else if($(this).hasClass('delay400')){
                delay = 400;
            } else if($(this).hasClass('delay600')){
                delay = 600;
            } else if($(this).hasClass('delay800')){
                delay = 800;
            }

            element.appear(function() {
                setTimeout(function () {
                    element.addClass('fadeInUp').css('visibility','visible');
                }, delay);

            });
        },{accX: 0, accY: -150});
    }


    if($('.olins_simple_testimonials_slider').length){
        $('.olins_simple_testimonials_slider').flexslider({
            animation: "slide",
            animationLoop: true,
            smoothHeight: true,
            directionNav: false
        });
    }

    if($('.olins_works_masonry_grid').length){


        $('.olins_works_masonry_grid').imagesLoaded( function() {
            $('.olins_works_masonry_grid').masonry({
                columnWidth: '.grid-sizer',
                gutter: '.gutter-sizer',
                itemSelector: '.grid_item_work',
                isAnimated: true,
                percentPosition: true,
            });
            $('.olins_works_masonry_grid').masonry('layout');
        });
    }



    if($('#header_search_form').length){
        $('#header_search_form .closed').on('click',function(e){
            e.preventDefault();
            $(this).removeClass('closed').addClass("opened");
            $('#header_search_form').addClass('open');

            $('.searchinput').on('change',function(){
                if($('.searchinput').val().length) {
                    $('#header_search_form #searchsubmit').removeClass('opened');
                }
            });
            if($('.searchinput').val().length) {
                $('#header_search_form #searchsubmit').removeClass('opened');
            }
        });
        $('#header_search_form .opened').on('click',function(e){
            e.preventDefault();
            $(this).removeClass('opened').addClass("closed");
            $('#header_search_form').removeClass('open')
        });
    }

    if($('.olins_video_box .venobox').length){
        $('.olins_video_box .venobox').venobox();
    }


    if($('.olins_tabs .tabs').length){
        $('.olins_tabs .tabs').tabslet();
    }
    if($('.olins_years_tabs .tabs').length){
        $('.olins_years_tabs .tabs').tabslet();
    }
    if($('.olins_team_tabs .tabs').length){
        $('.olins_team_tabs .tabs').tabslet();
    }
    if($('.olins_icon_tabs .tabs').length){
        $('.olins_icon_tabs .tabs').tabslet();
    }


    if($('.olins_centered_slider').length){
        $('.olins_centered_slider').slick({
            centerMode: true,
            autoplay:true,
            pauseOnHover:false,
            slidesToShow: 3,
            variableWidth: true,
            adaptiveHeight: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        pauseOnHover:false,
                        autoplay:true,
                        centerMode: true,
                        adaptiveHeight: true,
                        slidesToShow: 1,
                        variableWidth: false,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        pauseOnHover:false,
                        autoplay:true,
                        centerMode: true,
                        adaptiveHeight: true,
                        slidesToShow: 1
                    }
                }
            ]
        });
        $('.olins_centered_slider').on('beforeChange', function(event, slick){
            $('.olins_centered_slider').height(slick.listHeight);
        });
    }

    if($('.backtotop').length){
        var scroll_top_duration = 700;
        $('.backtotop').on('click',function(event){
            event.preventDefault();
            $('body,html').animate({
                    scrollTop: 0 ,
                }, scroll_top_duration
            );
        })
    }

    /* Sticky Header for Furniture Variant */
    if($('.olins_sticky_header').length){
        $(window).bind('scroll', function() {
            var scroll_top = $(document).scrollTop();
            var header_top = $('.olins_sticky_header').scrollTop() + 68;

            if(scroll_top > header_top ){
                $('.olins_sticky_header').addClass('sticky_active');
            } else {
                $('.olins_sticky_header').removeClass('sticky_active');
            }
        });
    }


    if($('.cafeteria_centered_slider').length){
        $('.cafeteria_centered_slider').flexslider({
            animation: "fade",
            controlNav: false,
            prevText: "",
            nextText: "",
            start: function(){
                $('.cafeteria_centered_slider .box,.slider .shadow').removeClass('slideUp');
                $('.cafeteria_centered_slider li:first .box,.slider li:first .shadow').addClass('slideUp');
            },
            after: function(){
                $('.cafeteria_centered_slider .box,.slider .shadow').removeClass('slideUp');
                $('.cafeteria_centered_slider .flex-active-slide .box,.slider .flex-active-slide .shadow').addClass('slideUp');
            },
            useCSS: false
        });
    }

    if($('.cafeteria_events_slider').length){
        $('.cafeteria_events_slider').flexslider({
            animation: "slide",
            prevText: "",
            nextText: "",
            useCSS: false
        });
    }
    

    /* Menu Pop Search */
    if($('.menu_pop_search').length){
        $('.search_open_button').on('click',function(e){
            e.preventDefault();
            if($('.pop_search_form_container').length){
                $('.pop_search_form_container').css('display','block');
            }
            if($('.pop_search_form_container_rosi').length){
                $('.pop_search_form_container_rosi').css('display','flex');
            }
        });
        $('.close_the_form').on('click',function(e){
            e.preventDefault();
            if($('.pop_search_form_container').length){
                $('.pop_search_form_container').css('display','none');
            }
            if($('.pop_search_form_container_rosi').length){
                $('.pop_search_form_container_rosi').css('display','none');
            }
        });
    }


    /*Slider for Brigitte Example*/
    if($('.brigitte_slider').length){
        $('.brigitte-slider-container').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: true,
            lazyLoad: 'progressive',
            nextArrow: '<span class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
            prevArrow: '<span type="button" class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            variableWidth: true
        });
        $('.brigitte-slider-container').on('afterChange', function(event, slick){
            var currentSlide = $('.brigitte-slider-container').slick('slickCurrentSlide');
            $('.brigitte_slider .current_photo').text(currentSlide + 1);
        });
        var $carousel =  $('.brigitte-slider-container');
        $(document).on('keydown', function(e) {
            if(e.keyCode == 37) {
                $carousel.slick('slickPrev');
            }
            if(e.keyCode == 39) {
                $carousel.slick('slickNext');
            }
        });
    }

    /*Works Slider Shortcode*/
    if($('.olins_works_slider_container').length){
        $('.olins_works_slider').slick({
            dots: false,
            infinite: true,
            speed: 500,
            adaptiveHeight: true,
            nextArrow: '.next_works_slide',
            prevArrow: '.previous_works_slide'
        });
        $('.olins_works_slider').on('afterChange', function(event, slick){
            var currentSlide = $('.olins_works_slider').slick('slickCurrentSlide');
            $('.olins_works_slider_container .current_photo').text(currentSlide + 1);
        });
        var $carousel =  $('.olins_works_slider');
        $(document).on('keydown', function(e) {
            if(e.keyCode == 37) {
                $carousel.slick('slickPrev');
            }
            if(e.keyCode == 39) {
                $carousel.slick('slickNext');
            }
        });
    }

    if($('.keira-item').length){
        $('.keira-item').each(function() {
            var containerWidth = $('.blog_grid ').width();
            var center = containerWidth / 2;
            var position = $(this).position().left;


            if(position < center) {
                $(this).addClass('left');
            } else {
                $(this).addClass('right');
            }
        });
    }



    if($('#olins_typed').length){
        var typed = new Typed('#olins_typed', {
            stringsElement: '#olins_typed_strings',
            typeSpeed: 150,
            backSpeed: 100,
            startDelay: 800,
            backDelay: 3200,
            loop: true,
            loopCount: Infinity,
        });
    }

    //Promo Slider Shortcode
    if($('.olins_promo_slider').length){
        $('.olins_promo_slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            arrows: false,
            adaptiveHeight: true,
            appendDots: '.olins_promo_slider_dots',
           // nextArrow: '.next_works_slide',
            //prevArrow: '.previous_works_slide'
        });
        $('.olins_promo_slider').on('afterChange', function(event, slick){
            var currentSlide = $('.olins_promo_slider').slick('slickCurrentSlide');
            var newSlide = '01';
            if(currentSlide < 9) {
                newSlide = '0'+ (currentSlide + 1);
            } else {
                newSlide = currentSlide + 1;
            }
            $('.olins_promo_slider_indexes').text(newSlide);
        });
        var $carousel =  $('.olins_promo_slider');
        $(document).on('keydown', function(e) {
            if(e.keyCode == 37) {
                $carousel.slick('slickPrev');
            }
            if(e.keyCode == 39) {
                $carousel.slick('slickNext');
            }
        });
    }


    if($('.extra_slider_container').length){
        $('.extra_slider_container').slick({
            dots: true,
            infinite: true,
            vertical:true,
            speed: 500,
            arrows: false,
            adaptiveHeight: true,
            appendDots: '.olins_extra_slider_dots',
        });

        $('.extra_slider_container').on('afterChange', function(event, slick){
            var currentSlide = $('.extra_slider_container').slick('slickCurrentSlide');
            var newSlide = '01';
            if(currentSlide < 9) {
                newSlide = '0'+ (currentSlide + 1);
            } else {
                newSlide = currentSlide + 1;
            }
            $('.olins_extra_slider_indexes').text(newSlide);
        });

    }


    //Make the first word strong
    if( $('.first_word_bold').length){
        $('.first_word_bold').each(function(){ var $p = $(this); $p.html($p.html().replace(/^(\w+)/, '<strong>$1</strong>')); });
    }


    if($('.olins_progress_bar').length){
        $('.olins_progress_bar .bar .progress').each(function(){
            var element = $(this);

            element.appear(function() {
                element.addClass('stretchRight').css('visibility','visible');
            });
            element.next().css('opacity','1');
        },{accX: 0, accY: -300});
    }

    /* Fashion Slider */
    if($('.olins_fashion_slider').length){
        $('.olins_fashion_slider').slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 500,
            adaptiveHeight: true,
        });

        var $carousel =  $('.olins_fashion_slider');
        $(document).on('keydown', function(e) {
            if(e.keyCode == 37) {
                $carousel.slick('slickPrev');
            }
            if(e.keyCode == 39) {
                $carousel.slick('slickNext');
            }
        });
    }


    /*Stephanie Slider Shortcode*/
    if($('.olins_stephanie_slider_container').length){
        $('.olins_stephanie_slider').slick({
            dots: false,
            infinite: true,
            slidesToShow: 4,
            centerMode: true,
            slidesToScroll: 1,
            speed: 500,
            adaptiveHeight: true,
            nextArrow: '<span class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
            prevArrow: '<span type="button" class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]

        });
        var $carousel =  $('.olins_stephanie_slider');
        $(document).on('keydown', function(e) {
            if(e.keyCode == 37) {
                $carousel.slick('slickPrev');
            }
            if(e.keyCode == 39) {
                $carousel.slick('slickNext');
            }
        });
    }



    if($('.olins_scroll_works').length){
        $('#olins_scroll_works').multiscroll({
            navigation: true,
            loopBottom: true,
            loopTop: true,
            sectionSelector: '.section',
            leftSelector: '.left',
            rightSelector: '.right',
            navigationPosition: 'right',
            css3: true
        });
    }


    if($('.taxipress_call_us').length){
        $('#call-us .selected span').on('click',function() {
            $('#call-us .selected ul').slideToggle();
        });

        $('#call-us .selected li').on('click',function () {
            $('#call-us .selected span').text($(this).text());
            $('#call-us .number').text($(this).attr('data-num'));

            /* Close*/
            $('#call-us .selected ul').slideToggle();
        });
    }

    if($('.taxipress_search_box').length){
        $('nav .search input[type="submit"]').on('click', function (e) {

            $('nav .search').slideToggle(100);
        });

        $('nav .search-button').on('click',function (e) {
            e.preventDefault();
            $('nav .search').slideToggle(100);
        });
    }


    if($('.taxipress_mobile_menu').length){
        /* Nav For Mobiles */
        $('nav .mobile-button').on('click',function () {
            $('nav .mobile-menu').slideToggle();
        });
        $('nav .mobile-menu > li a').on('click',function(e) {
            $(this).parent('li').find('.sub-menu').slideToggle();
        });
        $('nav .mobile-menu .sub-menu > li a').on('click',function(e) {
            $(this).parent('li').find('.sub-menu').slideToggle();
        });
    }

    if($('.olins_taxipress_cars').length){
        $('.olins_taxipress_cars #slider').flexslider({
            animation: "slide",
            controlNav: false
        });
    }
    if($('.limpieza_recent_line').length){
        $('.limpieza_recent_line').flexslider({
            animation: 'slider',
			prevText: '',
			nextText: '',
			pauseOnHover: true,
			itemWidth: 320,
			itemMargin: 30,
			minItems: 2,
			maxItems: 4,
			controlNav: false,
			move: 1,
			startAt: 1
        });
    }

    //Nunta Wishlist Shortcode
    if($('.nunta_wishitem').length){
        $('.nunta_viewmore').on('click',function(){
            $(this).next().toggle(0);
        });
        $('.nunta_close').on('click',function(){
            $(this).parent().parent().toggle(0);
        });
    }

    if($('.prestigio_mobile_menu').length) {
        $('.drop-menu > a').click(function () {
            $(this).parents('div').children('.ul-drop').toggle({display: "toggle"});
        });
    }
    if($('.olins_prestigio_top').length){
        // Background Parallax
        var $window = $(window);
        $('section[data-type="background"]').each(function(){

            var $obj = $(this);
            var offset = $obj.offset().top;

            $(window).scroll(function()
            {
                offset = $obj.offset().top;

                if ($window.scrollTop() > (offset - window.innerHeight))
                {
                    var yPos = -(($window.scrollTop() - offset) / 5 );
                    var coords = '50% ' + ( yPos ) + 'px';
                    $obj.css({ backgroundPosition:  coords });
                }
            });
            $(window).resize(function()
            {
                offset = $obj.offset().top;
            });
        });

        $('.top-slider').flexslider({
            animation: "slide",
            prevText: "",
            nextText: "",
            directionNav: false,
            useCSS: false,
            start: function() {
                $('.top-slider li').css('opacity','1');
            }
        });
    }

    if($('.olins_prestigio_blog').length){

        //Works Slider
        $('.olins_prestigio_blog .works_slider .blog-slider').flexslider({
            animation: "slide",
            prevText: "",
            nextText: "",
            useCSS: false,
            directionNav: false,
            start: function() {
                $('.works_slider .blog-slider li').css('opacity','1');
            }
        });

        $('.olins_prestigio_blog section.works_slider h2 .prev').click(function() {
            var slider = $('.works_slider .blog-slider').data('flexslider');
            slider.flexslider("prev");
        });
        $('.olins_prestigio_blog section.works_slider h2 .next').click(function() {
            var slider = $('.works_slider .blog-slider').data('flexslider');
            slider.flexslider("next");
        });

        //Blog Slider
        $('.olins_prestigio_blog .post_slider .blog-slider').flexslider({
            animation: "slide",
            prevText: "",
            nextText: "",
            useCSS: false,
            directionNav: false,
            start: function() {
                $('.post_slider .blog-slider li').css('opacity','1');
            }
        });

        $('.olins_prestigio_blog section.post_slider h2 .prev').click(function() {
            var slider = $('.post_slider .blog-slider').data('flexslider');
            slider.flexslider("prev");
        });
        $('.olins_prestigio_blog section.post_slider h2 .next').click(function() {
            var slider = $('.post_slider .blog-slider').data('flexslider');
            slider.flexslider("next");
        });
    }

    if($('.olins_prestigio_team').length){
        $('.olins_prestigio_team .team-slider').flexslider({
            animation: "slide",
            prevText: "",
            nextText: "",
            minItems: 1,
            maxItems: 4,
            move: 1,
            itemWidth: 171,
            itemMargin: 20,
            controlNav: false,
            directionNav: false,
            useCSS: false,
            start: function() {
                $('.team-slider li').css('opacity','1');
            }
        });

        // Team Slider Directions
        $('.olins_prestigio_team section.team .prev').click(function() {
            var slider = $('.team-slider').data('flexslider');
            slider.flexslider("prev");
        });
        $('.olins_prestigio_team section.team .next').click(function() {
            var slider = $('.team-slider').data('flexslider');
            slider.flexslider("next");
        });
    }

    if($('.olins_prestigio_testimonials').length){
        $('.olins_prestigio_testimonials-slider').flexslider({
            animation: "slide",
            prevText: "",
            nextText: "",
            minItems: 1,
            maxItems: 3,
            move: 1,
            itemWidth: 320,
            directionNav: false,
            useCSS: false,
            start: function() {
                $('.olins_prestigio_testimonials-slider li').css('opacity','1');
            }
        });

        // Team Slider Directions
        $('section.olins_prestigio_testimonials .prev').click(function() {
            var slider = $('.olins_prestigio_testimonials-slider').data('flexslider');
            slider.flexslider("prev");
        });
        $('section.olins_prestigio_testimonials .next').click(function() {
            var slider = $('.olins_prestigio_testimonials-slider').data('flexslider');
            slider.flexslider("next");
        });
    }


    if($('.search-box .button_s').length){
        $('.search-box .button_s').on('click',function(){
            $('.search-box .form_box').toggle();
        });
    }

    if($('.olins_ospedale_slider_top').length){
        $('.top-slider').flexslider({
            animation:"slide",
            slideshowSpeed: 10000,
            animationSpeed: 500,
            prevText:"",
            nextText:"",
            start: function(){
                $(window).trigger('resize');
                $('.top-slider .contry').removeClass('slideLeft');
                $('.top-slider .flex-active-slide .contry').addClass('slideLeft');
            },
            after: function(){
                $('.top-slider .contry').removeClass('slideLeft');
                $('.top-slider .flex-active-slide .contry').addClass('slideLeft');
            }
        });
        $('.top-slider .flex-viewport').css('overflow','');
    }


    if($('.ale_donation_donate_').length){
        $('.ale_donation_donate_ a').click(function(){
            $('.donate-form').fadeIn(200);
        });
    
        $('.donate-form .exit').click(function(){
            $('.donate-form').fadeOut(200);
        });
    }
   
    if($('.scrollbox').length){
        $('.scrollbox').jScrollPane();
    }

    if($('#ei-slider').length){
        $('#ei-slider').eislideshow({
            animation			: 'center',
            autoplay			: true,
            slideshow_interval	: 3000,
            titlesFactor		: 0
        });
    }

  
    if($('.ale_theme_hover_style_id_10').length){
        $('.works_items_container > div ').each( function() { $(this).hoverdir(); } );
    }
    

    if($('#nunta_countdown').length){
        var c_year = $('#nunta_countdown').data('c_year');
        var c_month = $('#nunta_countdown').data('c_month');
        var c_day = $('#nunta_countdown').data('c_day');
        var c_hour = $('#nunta_countdown').data('c_hour');

    $('#nunta_countdown').countdown({until: new Date(c_year, c_month-1, c_day, c_hour)});
    }

    if($('.nunta_blog_style').length){
        $('.blogfulllink a.toggle').on('click', function(e){
            e.preventDefault();

            var button = $(this);
            var current_id = $(this).data('linkid');

            $.ajax({
                url: ale.ajax_load_url,
                data: {
                    'action': 'aletheme_nunta_load_post',
                    'id' : current_id
                },
                success:function(data) {
                    $('.full[data-fullid="' + current_id + '"]').html(data).toggle();
                    if(button.text() == ale.close_text) {
                        button.text(ale.expand_text);
                    } else {
                        button.text(ale.close_text);
                    }
                    
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            }); 
        });
    }
    

    if($('.destination_viaje_slider').length){
        $('.destination_viaje_slider').slick({
            infinite: true,
            animation: "slide",
            animationLoop: true,
            smoothHeight: true,
            controlNav: false,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    }
   
});
