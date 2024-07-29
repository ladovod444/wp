jQuery(function($){

    if($('body').hasClass('woocommerce-page')){
        //Do not Init Infinite Scroll
    } else {
        $('.blog_posts .story').append('<div class="load-more">' + aleloadmore.button_text + '</div>');
        var button = $('.blog_posts .story .load-more');
        var page = 2;
        var loading = false;

        $('body').on('click', '.load-more', function () {


            if (!loading) {
                loading = true;
                var data = {
                    action: 'ale_ajax_load_more',
                    nonce: aleloadmore.nonce,
                    page: page,
                    query: aleloadmore.query,
                };
                $.post(aleloadmore.url, data, function (res) {
                    if (res.success) {

                        var $content = $(res.data);
                        if ($('.grid').length) {

                            $content.imagesLoaded( function() {
                                $('.blog_posts .story .grid').append($content).masonry('appended', $content).ready(function($) {
                                    if($('.keira-item').length) {
                                        $('.keira-item').each(function () {
                                            var containerWidth = $('.blog_grid ').width();
                                            var center = containerWidth / 2;
                                            var position = $(this).position().left;

                                            if (position < center) {
                                                $(this).addClass('left');
                                            } else {
                                                $(this).addClass('right');
                                            }
                                        });
                                    }
                                });
                            });
                            //With Masonry init
                            
                        } else {
                            $('.blog_posts .story .blog_grid').append($content)
                        }
                        $('.blog_posts .story').append(button);

                        //Hide the Load More button if no more posts to load
                        if (page == aleloadmore.maxpage) {
                            button.hide();
                        }
                        page = page + 1;
                        loading = false;


                    } else {

                    }
                }).fail(function (xhr, textStatus, e) {

                });
            }

        });
    }

});