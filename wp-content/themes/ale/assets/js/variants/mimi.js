jQuery(function($) {
    "use strict";

    //Alekids Button Style
    function alekids_button_rect(svg){
        if(svg){
            var width = svg.outerWidth();
            var height = svg.outerHeight();
            var svgRect = svg.find('rect');
            var x_pos_rect = svgRect.attr('x');
            var y_pos_rect = svgRect.attr('y');

            if(x_pos_rect) width = width - (parseInt(x_pos_rect) * 2);
            if(y_pos_rect) height = height - (parseInt(y_pos_rect) * 2);

            if(width > 0 && height > 0){
                svgRect.attr('width', width);
                svgRect.attr('height',height);
            }
        }
    }

    if($('.alekids_dashed').length){
        $('.alekids_dashed').each(function(){
            var svg = $(this);
            alekids_button_rect(svg);
        });
        $( window ).resize(function() {
            $('.alekids_dashed').each(function(){
                var svg = $(this);
                alekids_button_rect(svg);
            });
        });
        $(window).load(function(){
            $('.alekids_dashed').each(function(){
                var svg = $(this);
                alekids_button_rect(svg);
            });
        });
    }

    //Mobile Nav
    $('.open_mobile_nav').on('click',function(){
        $('.mimi_mobile_navigation').show(0);

        $('.close_mobile_nav').on('click',function(){
            $('.mimi_mobile_navigation').hide(0);
        });
        $(document).on('keyup',function(e){
            if(e.keyCode == 27){
                $('.mimi_mobile_navigation').hide(0);
            }
        });
    });
   
    if($('.alekids_menu_mobile').length){
        $('.alekids_menu_mobile li.menu-item-has-children > .open_current_dropdown').on('click',function(e){
            e.preventDefault();
            $(this).parent('li').children('ul').toggle(0, function(){display: "toggle"}).parent('li').toggleClass( "alekids_openned" );
        }); 
    }
    
    //Move rocket on Screen top
    if($('.alekids_top_screen').length) {
        $('.alekids_top_screen').on('mousemove', function(e){
            var lFollowX = 0,
		        lFollowY = 0;

            var min = 0;
            var max = 10;

            var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX)),
				lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));

                lFollowX = (15 * lMouseX) / 100 ;
                lFollowY = (12 * lMouseY) / 100 ;

            var translate = 'translateX(' + lFollowX + 'px) translateY(' + lFollowY +'px)';

            $(this).find('.alekids_roket').css({
                '-webit-transform': translate,
                '-moz-transform': translate,
                'transform': translate
            });
        });
    } 

    //alekids title animation
    if($('.alekids_title').length){
        $('.alekids_title').appear(function() {
            $(this).find('h2').each(function(){
                $(this).addClass('animated');
            });
        },{accX: 0, accY: -200});
    }

    //Display specific animation after preloaded end.
    $.event.special.destroyed = {
        remove: function(o) {
            if(o.handler){
                o.handler()
            }
        }
    }
    $('.alekids_preloader_content').bind('destroyed', function(){
       
        $('.inner_header h1').each(function(){
            $(this).addClass('animated');
        });

        setTimeout(function () {
            $('.alekids_top_screen .left_content .subtitle').each(function(){
                $(this).addClass('animated');
            });
        }, 500);

        setTimeout(function () {
            $('.alekids_top_screen .left_content .top_screen_title').each(function(){
                $(this).addClass('animated');
            });
        }, 1000);

        setTimeout(function () {
            $('.alekids_top_screen .left_content .top_screen_description').each(function(){
                $(this).addClass('animated');
            });
        }, 1500);

        setTimeout(function () {
            $('.alekids_top_screen .left_content .alekids_button').each(function(){
                $(this).addClass('animated');
            });
        }, 2000);

        setTimeout(function () {
            $('.alekids_top_screen .alekids_roket').each(function(){
                $(this).addClass('animated');
            });
        }, 3000);
        setTimeout(function () {
            $('.alekids_top_screen .alekids_roket').each(function(){
                $(this).addClass('end_animation').removeClass('animated');
            });
        }, 4000);
        
    });

    if($('.alekids_preloader_content').length == 0){

        $('.inner_header h1').each(function(){
            $(this).addClass('animated');
        });

        setTimeout(function () {
            $('.alekids_top_screen .left_content .subtitle').each(function(){
                $(this).addClass('animated');
            });
        }, 500);

        setTimeout(function () {
            $('.alekids_top_screen .left_content .top_screen_title').each(function(){
                $(this).addClass('animated');
            });
        }, 1000);

        setTimeout(function () {
            $('.alekids_top_screen .left_content .top_screen_description').each(function(){
                $(this).addClass('animated');
            });
        }, 1500);

        setTimeout(function () {
            $('.alekids_top_screen .left_content .alekids_button').each(function(){
                $(this).addClass('animated');
            });
        }, 2000);

        setTimeout(function () {
            $('.alekids_top_screen .alekids_roket').each(function(){
                $(this).addClass('animated');
            });
        }, 3000);
        setTimeout(function () {
            $('.alekids_top_screen .alekids_roket').each(function(){
                $(this).addClass('end_animation').removeClass('animated');
            });
        }, 4000);

    }
    
    //Open Search Modal
    $('.search_openner').on('click',function(e){
        e.preventDefault();

        $('.alekids_search_modal').show(500);

        $(document).on('keyup',function(e){
            if(e.keyCode == 27){
                $('.alekids_search_modal').hide(500);
            }
        });
    })

    //Scroll Top 
    if($('.alekids_scroll_top').length){
        var scroll_top_duration = 1300;
        $('.alekids_scroll_top').on('click',function(event){
            event.preventDefault();
            $('body,html').animate({
                    scrollTop: 0 ,
                }, scroll_top_duration
            );
        })
    }

    //Open video with venobox
    if($('.venobox').length){
        $('.venobox').venobox({
            framewidth : '958px',
            frameheight: '390px',
        });
    }

    //Init Slick Slider
    if($('.alekids_post_gallery').length){
        $('.alekids_post_gallery').slick({
            infinite: true,
            autoplay: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots:false,
            fade: true,
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
        });
    }

    //Single Gallery Sldier
    if($('.alekids_gallery_slider').length){
        $('.alekids_gallery_slider').slick({
            infinite: true,
            autoplay: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots:true,
            fade: true,
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
        });
    }

    //Testimonial Slider
    if($('.alekids_testimonial_slider').length){
        $('.alekids_testimonial_slider').slick({
            infinite: true,
            autoplay: false,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots:true,
            responsive: [
                {
                  breakpoint: 769,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }

              ]
        });
    }

    //Timeline Swipe Slider
    if($('.alekids_timeline').length){
        $('.alekids_timeline').slick({
            infinite: true,
            autoplay: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots:false,
            swipe: true,
            responsive: [
                {
                  breakpoint: 769,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 500,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }

              ]
        });
    }

    //Team Slider
    if($('.alekids_team_slider').length){
        $('.alekids_team_slider').slick({
            infinite: true,
            autoplay: false,
            arrows: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots:true,
            responsive: [
                {
                  breakpoint: 1000,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }

              ]
        });
    }

    //Submit search form on click
    if($('.alekids_submit_search').length){
        $('.alekids_submit_search').on('click',function(e){
            e.preventDefault();

            $('#searchform').submit();
        });
    }

    //Products slider
    if($('.alekids_product_slider').length){
        var columns = $('.alekids_product_slider .products').data('columns');

        $('.alekids_product_slider .products').slick({
            infinite: true,
            autoplay: false,
            arrows: true,
            slidesToShow: columns,
            slidesToScroll: 1,
            dots:false,
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
            responsive: [
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 500,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]
        });
    }
});
