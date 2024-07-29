<?php get_header();

    if(ale_get_meta('post_title_position')!="") {
        if(ale_get_option('blog_grid_layout') != 'taxipress'){
            get_template_part('partials/page_heading');
        }
    }

    switch (ale_get_option('blog_grid_layout')) {
        case 'default':
            switch (ALETHEME_DESIGN_STYLE) {
                case 'mimi':
                    get_template_part('partials/blog/single/mimi');
                    break;
                case 'pizza':
                    get_template_part('partials/blog/single/pizza');
                    break;
                default:
                    get_template_part('partials/blog/single/default');
                    break;
            }
            break;
        default :
            get_template_part('partials/blog/single/default');
            break;
    } 

get_footer(); ?>