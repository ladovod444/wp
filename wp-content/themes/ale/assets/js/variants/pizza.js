jQuery(function($) {
    "use strict";

    //Open Search Modal
    $('.search_openner').on('click',function(e){
        e.preventDefault();
        $('.delizioso_search_container').show(500);
        $(document).on('keyup',function(e){
            if(e.keyCode == 27){
                $('.delizioso_search_container').hide(500);
            }
        });
    })

    //Mobile Nav
    $('.open_mobile_nav').on('click',function(){
        $('.mobile_navigation').show(0);

        $('.close_mobile_nav').on('click',function(){
            $('.mobile_navigation').hide(0);
        });
        $(document).on('keyup',function(e){
            if(e.keyCode == 27){
                $('.mobile_navigation').hide(0);
            }
        });
    });

    if($('.open_burger_icon').length){
        $('.open_burger_icon').on('click',function(){
            $('.right_side_part').css('right','0');

            $(document).on('keyup',function(e){
                if(e.keyCode == 27){
                    $('.right_side_part').css('right','-500px');
                }
            });
        });
        $('.close_side_part').on('click',function(){
            $('.right_side_part').css('right','-500px');
        });
    }
   
    if($('.ale_menu_mobile').length){ 
        $('.ale_menu_mobile li.menu-item-has-children > .open_current_dropdown').on('click',function(e){
            e.preventDefault();
            $(this).parent('li').children('ul').toggle(0, function(){display: "toggle"}).parent('li').toggleClass( "ale_openned" );
        }); 
    }

    //Blog Masonry
    if($('.masonry_grid').length){
        initMasonry( $('.masonry_grid') );
    }
    function initMasonry( $grid ) {
        var $grid = $grid.masonry({
            columnWidth: '.grid-sizer',
            gutter: '.gutter-sizer',
            itemSelector: '.ale_blog_preview',
            percentPosition: true
        });

        // layout images after they are loaded
        $grid.imagesLoaded( function() {
            $grid.masonry('layout');
        });
    }

     //Init Slick Slider
     if($('.ale_post_gallery').length){
        $('.ale_post_gallery').slick({
            infinite: true,
            autoplay: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: false,
            prevArrow: '<button type="button" class="slick-prev">Prev</button>'
        });
    }

    if($('.delizioso_bg_slider').length){
        $('.delizioso_bg_slider').slick({
            infinite: true,
            autoplay: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots:true,
            fade: false,
            appendArrows: '.delizioso_header_slider .arrows',
            prevArrow: '<button type="button" class="slick-prev">Prev</button>'
        });
        $('.delizioso_bg_slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            $('.delizioso_header_slider .delizioso_bg_slider figure figcaption .delizioso_bg_title').removeClass('animated');
            $('.delizioso_header_slider .delizioso_bg_slider figure figcaption .delizioso_slider_title').removeClass('animated');
            $('.delizioso_header_slider .delizioso_bg_slider figure figcaption .delizioso_slider_description').removeClass('animated');
            $('.delizioso_header_slider .delizioso_bg_slider figure figcaption .delizioso_link_button').removeClass('animated');

            delizioso_animated_one_appear();
        });
    }

    function delizioso_animated_one_appear(){
        if($('.delizioso_title_container').length){
            $('.delizioso_title_container').appear(function() {
    
                var ale_title_item = $(this);
                
                setTimeout(function () {
                    ale_title_item.find('.delizioso_title').each(function(){
                        $(this).addClass('animated');
                    });
                }, 100);
                setTimeout(function () {
                    ale_title_item.find('.block_title').each(function(){
                        $(this).addClass('animated');
                    });
                }, 300);
            },{accX: 0, accY: -200});
        }
     
        setTimeout(function () {
            $('.delizioso_header_slider .delizioso_bg_slider figure figcaption .delizioso_bg_title').each(function(){
                $(this).addClass('animated');
            });
        }, 500);
        setTimeout(function () {
            $('.delizioso_header_slider .delizioso_bg_slider figure figcaption .delizioso_slider_title').each(function(){
                $(this).addClass('animated');
            });
        }, 800);
        setTimeout(function () {
            $('.delizioso_header_slider .delizioso_bg_slider figure figcaption .delizioso_slider_description').each(function(){
                $(this).addClass('animated');
            });
        }, 1200);
        setTimeout(function () {
            $('.delizioso_header_slider .delizioso_bg_slider figure figcaption .delizioso_link_button').each(function(){
                $(this).addClass('animated');
            });
        }, 1600);
    }

    //Display specific animation after preloaded end.
    $.event.special.destroyed = {
        remove: function(o) {
            if(o.handler){
                o.handler()
            }
        }
    }
    $('.ale_preloader_content').bind('destroyed', function(){
        //Animation if preloader is enabled. 
        delizioso_animated_one_appear();
    });
 
    if($('.ale_preloader_content').length == 0){
        //Animation if preloader is disabled
        delizioso_animated_one_appear();
    }

    //Open video with venobox
    if($('.venobox').length){
        $('.venobox').venobox({
            framewidth : '950px',
            frameheight: '570px',
        });
    }

    if($('.delizioso_product_slider').length){
        var columns = $('.delizioso_product_slider .products').data('columns');

        $('.delizioso_product_slider .products').slick({
            infinite: true,
            autoplay: false,
            arrows: true,
            slidesToShow: columns,
            slidesToScroll: 1,
            dots:false,
            prevArrow: '<button type="button" class="slick-prev">Prev</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>',
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                  }
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 510,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
        });
    }

    if($('.delizioso_team_members').length){
        $('.delizioso_team_members').slick({
            infinite: true,
            autoplay: false,
            arrows: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            dots:false,
            centerMode: true,
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                  }
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 510,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
              ]
        });
    }

    if($('.delizioso_testimonials_slider').length){
        $('.delizioso_testimonials_slider').slick({
            infinite: true,
            autoplay: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots:false,
            fade: true,
            adaptiveHeight:true,
            prevArrow: '<button type="button" class="slick-prev">Prev</button>',
            nextArrow: '<button type="button" class="slick-next">Next</button>',
        });
    }
});
