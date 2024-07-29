<?php 
get_header(); 
get_template_part('partials/page_heading');

    switch (ALETHEME_DESIGN_STYLE) {
        case 'bebe':
            get_template_part('partials/work/list/bebe');
            break;
        case 'mimi':
            get_template_part('partials/work/list/mimi');
            break;
        default:
            get_template_part('partials/work/list/default');
            break;
    }

get_footer();
