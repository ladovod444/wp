<?php

/**
 * ================
 *  SPECIFIC HEADER
 * ================
 */
function aletheme_show_specific_header(){
    
    if(ALETHEME_DESIGN_STYLE){
        switch (ALETHEME_DESIGN_STYLE){
            case 'zoo' :
            case 'furniture' :
            case 'magazine' :
                get_template_part('partials/header/zoo');
                break;
            case 'blackwhite' :
            case 'stephanie' :
            case 'smoothie' :
            case 'laptica' :
            case 'cosushi' :
                get_template_part('partials/header/blackwhite');
                break;
            case 'bakery' :
                get_template_part('partials/header/bakery');
                break;
            case 'photography' :
            case 'camping' :
            case 'pixel' :
            case 'po' :
                get_template_part('partials/header/photography');
                break;
            case 'luxuryshoes' :
                get_template_part('partials/header/luxuryshoes');
                break;
            case 'travelphoto' :
            case 'cv' :
            case 'moka' :
                get_template_part('partials/header/travelphoto');
                break;
            case 'viaje' :
                get_template_part('partials/header/viaje');
                break;
            case 'wedding' :
                get_template_part('partials/header/wedding');
                break;
            case 'creative' :
            case 'rosi' :
            case 'organic' :
                get_template_part('partials/header/creative');
                break;
            case 'brigitte' :
            case 'corporate' :
            case 'fashion' :
            case 'pastel' :
            case 'cameron' :
            case 'jade' :
                get_template_part('partials/header/brigitte');
                break;
            case 'keira' :
                get_template_part('partials/header/keira');
                break;
            case 'exotico' :
                get_template_part('partials/header/exotico');
                break;
            case 'taxipress' :
                get_template_part('partials/header/taxipress');
                break;
            case 'prestigio' :
                get_template_part('partials/header/prestigio');
                break;
            case 'ospedale' :
                get_template_part('partials/header/ospedale');
                break;
            case 'enforcement' :
                get_template_part('partials/header/enforcement');
                break;
            case 'donation' :
                get_template_part('partials/header/donation');
                break;
            case 'orquidea' :
                get_template_part('partials/header/orquidea');
                break;
            case 'limpieza' :
                get_template_part('partials/header/limpieza');
                break;
            case 'nunta' :
                get_template_part('partials/header/nunta');
                break;
            case 'cafeteria' :
                get_template_part('partials/header/cafeteria');
                break;
            case 'hai' :
                get_template_part('partials/header/hai');
                break;
            case 'burger' :
                get_template_part('partials/header/burger');
                break;
            case 'kitty' :
                get_template_part('partials/header/kitty');
                break;
            case 'delizioso' :
                get_template_part('partials/header/delizioso');
                break;
            case 'bebe' :
                get_template_part('partials/header/bebe');
                break;
            case 'mimi' :
                get_template_part('partials/header/mimi');
                break;
            case 'pizza' :
                get_template_part('partials/header/pizza');
                break;
        }
    } ?>

    <?php if(ALETHEME_DESIGN_STYLE == 'taxipress'){?>
        <div class="ale_main_container <?php echo (ALETHEME_DESIGN_STYLE == 'taxipress') ? 'wrap' : ''; ?> cf"><!-- Main Container Start -->
            <section class="ale_container <?php echo (ALETHEME_DESIGN_STYLE == 'taxipress') ? 'content' : ''; ?>">
    <?php } else { ?>
        <div class="ale_main_container cf"><!-- Main Container Start -->
            <div class="ale_container">
    <?php } 
}

add_action('aletheme_specific_header','aletheme_show_specific_header');


/**
 * ================
 *  SPECIFIC FOOTER
 * ================
 */
function aletheme_show_specific_footer(){

    $ale_footer_variant = ale_get_option('footer_variant');

    if($ale_footer_variant == 'default'){
        $ale_design_variant = ale_get_option('design_variant');

        switch ($ale_design_variant){
            case 'zoo' :
                get_template_part('partials/footer/zoo');
                break;
            case 'blackwhite' :
                get_template_part('partials/footer/blackwhite');
                break;
            case 'bakery' :
                get_template_part('partials/footer/bakery');
                break;
            case 'camping' :
            case 'photography' :
                get_template_part('partials/footer/photography');
                break;
            case 'luxuryshoes' :
                get_template_part('partials/footer/luxuryshoes');
                break;
            case 'viaje' :
            case 'pastel' :
            case 'cameron' :
                get_template_part('partials/footer/viaje');
                break;
            case 'brigitte' :
                get_template_part('partials/footer/brigitte');
                break;
            case 'furniture' :
            case 'creative' :
            case 'magazine' :
            case 'stephanie' :
            case 'pixel' :
                get_template_part('partials/footer/furniture');
                break;
            case 'fashion' :
                get_template_part('partials/footer/fashion');
                break;
            case 'jade' :
                get_template_part('partials/footer/jade');
                break;
            case 'rosi' :
                get_template_part('partials/footer/rosi');
                break;
            case 'keira' :
                get_template_part('partials/footer/keira');
                break;
            case 'exotico' :
                get_template_part('partials/footer/exotico');
                break;
            case 'prestigio' :
                get_template_part('partials/footer/prestigio');
                break;
            case 'ospedale' :
                get_template_part('partials/footer/ospedale');
                break;
            case 'enforcement' :
                get_template_part('partials/footer/enforcement');
                break;
            case 'donation' :
                get_template_part('partials/footer/donation');
                break;
            case 'orquidea' :
                get_template_part('partials/footer/orquidea');
                break;
            case 'burger' :
                get_template_part('partials/footer/burger');
                break;
            case 'laptica' :
                get_template_part('partials/footer/laptica');
                break;
            case 'kitty' :
                get_template_part('partials/footer/kitty');
                break;
            case 'moka' :
                get_template_part('partials/footer/moka');
                break;
            case 'delizioso' :
                get_template_part('partials/footer/delizioso');
                break;
            case 'cosushi' :
                get_template_part('partials/footer/cosushi');
                break;
            case 'bebe' :
                get_template_part('partials/footer/bebe');
                break;
            case 'mimi' :
                get_template_part('partials/footer/mimi');
                break;
            case 'pizza' :
                get_template_part('partials/footer/pizza');
                break;
        }
    } else {
        // Widget Footer Here
        get_template_part('partials/footer/widget-footer');
    }

    echo (ALETHEME_DESIGN_STYLE == 'taxipress') ? '</section>' : '</div>'; 
    ?>

    </div> <!-- Main Container End -->

    <?php if(ALETHEME_DESIGN_STYLE == 'taxipress'){
        get_template_part('partials/footer/taxipress');
    }  if(ALETHEME_DESIGN_STYLE == 'limpieza'){
        get_template_part('partials/footer/limpieza');
    }  if(ALETHEME_DESIGN_STYLE == 'nunta'){
        get_template_part('partials/footer/nunta');
    } if(ALETHEME_DESIGN_STYLE == 'cafeteria'){
        get_template_part('partials/footer/cafeteria');
    } if(ALETHEME_DESIGN_STYLE == 'organic'){
        get_template_part('partials/footer/organic');
    }  if(ALETHEME_DESIGN_STYLE == 'hai'){
        get_template_part('partials/footer/hai');
    } ?>

    </div><!-- Wrapper End -->

    <?php
    /* Data for Wedding Variant */
    if(is_single()){
        if(ale_get_option('design_variant') == 'wedding'){
            if(ale_get_meta('post_title_position') == 'fullwidthwedding'){
                get_template_part('partials/blog/wedding_full_post');
            }
        }
    } if($ale_footer_variant == 'default'){
        if(ale_get_option('design_variant') == 'wedding'){
            get_template_part('partials/footer/wedding');
        }
    } if(ale_get_option('design_variant')=='photography' or ale_get_option('design_variant')=='camping' or ale_get_option('design_variant')=='wedding' or ale_get_option('design_variant')=='pixel' or ale_get_option('design_variant')=='po'){
        get_template_part('partials/header/overlay_nav');
    }  
}
add_action('aletheme_specific_footer','aletheme_show_specific_footer');

/* =======================
 *  SPECIFIC BLOG LISTING
 * ======================= */
function aletheme_show_specific_blog_listing(){
    $ale_blog_grid_design_variant = ale_get_option('blog_grid_layout');

    switch ($ale_blog_grid_design_variant) {
        case 'cameron':
            get_template_part('partials/blog/list/cameron');
            break;
        case 'exotico':
            get_template_part('partials/blog/list/exotico');
            break;
        case 'nunta':
            get_template_part('partials/blog/list/nunta');
            break;
        case 'enforcement':
            get_template_part('partials/blog/list/enforcement');
            break;
        case 'cafeteria':
            get_template_part('partials/blog/list/cafeteria');
            break;
        case 'default':
            switch (ALETHEME_DESIGN_STYLE) {
                case 'mimi':
                    get_template_part('partials/blog/list/mimi');
                    break;
                case 'pizza':
                    get_template_part('partials/blog/list/pizza');
                    break;
                default:
                    get_template_part('partials/blog/list/default');
                    break;
            }
            break;
        default :
            get_template_part('partials/blog/list/default');
            break;
    }
}
add_action('aletheme_archive_listing','aletheme_show_specific_blog_listing');

/**
 * ===================
 *  SPECIFIC BLOG GRID
 * ===================
 */
function aletheme_show_specific_blog_grid(){
    $ale_blog_grid_design_variant = ale_get_option('blog_grid_layout');

    switch ($ale_blog_grid_design_variant){
        case 'vintage' :
            get_template_part('partials/blog/vintage_preview' );
            break;
        case 'furniture' :
            get_template_part('partials/blog/furniture_preview' );
            break;
        case 'brigitte' :
            get_template_part('partials/blog/brigitte_preview' );
            break;
        case 'pixel' :
            get_template_part('partials/blog/pixel_preview' );
            break;
        case 'jade' :
            get_template_part('partials/blog/jade_preview' );
            break;
        case 'rosi' :
            get_template_part('partials/blog/rosi_preview' );
            break;
        case 'keira' :
            get_template_part('partials/blog/keira_preview' );
            break;
        case 'taxipress' :
            get_template_part('partials/blog/taxipress_preview' );
            break;
        case 'donation' :
            get_template_part('partials/blog/donation_preview' );
            break;
        case 'limpieza' :
            get_template_part('partials/blog/limpieza_preview' );
            break;
        case 'organic' :
            get_template_part('partials/blog/organic_preview' );
            break;
        case 'burger' :
            get_template_part('partials/blog/burger_preview' );
            break;
        case 'kitty' :
            get_template_part('partials/blog/kitty_preview' );
            break;
        case 'delizioso' :
            get_template_part('partials/blog/delizioso_preview' );
            break;
        case 'cosushi' :
            get_template_part('partials/blog/cosushi_preview' );
            break;
        case 'bebe' :
            get_template_part('partials/blog/bebe_preview' );
            break;
        default :
            get_template_part('partials/postpreview' );
    }
}
add_action('aletheme_specific_blog_grid','aletheme_show_specific_blog_grid');


/* =========================
 *  SPECIFIC COMMENTS BLOCK
 * ========================= */
function aletheme_show_specific_comments(){

    switch (ALETHEME_DESIGN_STYLE){
        case 'keira' :
            get_template_part('partials/comments/keira');
            break;
        case 'bebe' :
            get_template_part('partials/comments/bebe');
            break;
        case 'nunta' :
            get_template_part('partials/comments/nunta');
            break;
        case 'mimi' :
            get_template_part('partials/comments/mimi');
            break;
        case 'pizza' :
            get_template_part('partials/comments/pizza');
            break;
        default :
            get_template_part('partials/comments/default');
    }
}
add_action('aletheme_specific_comments_list_and_form','aletheme_show_specific_comments');