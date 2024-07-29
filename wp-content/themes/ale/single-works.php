<?php get_header();

    //Heading
    switch (ALETHEME_DESIGN_STYLE) {
        case 'mimi':
            get_template_part('partials/page_heading');
            break;
        default:
            if(ale_get_meta('post_title_position')!="") {
                get_template_part('partials/page_heading');
            }
            break;
    }

    //Listing
    switch (ALETHEME_DESIGN_STYLE) {
        case 'mimi':
            get_template_part('partials/work/single/mimi');
            break;
        default:
            get_template_part('partials/work/single/default');
            break;
    }

get_footer(); ?>