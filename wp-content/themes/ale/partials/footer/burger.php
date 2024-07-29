<footer class="ale_footer cf">
    <div class="content_wrapper footer_flex cf">
        <div class="col-3">
            <?php if(ale_get_option('footer_burger_col1_tit')){
                echo '<h4 class="footer_widget_title">'.esc_attr(ale_get_option('footer_burger_col1_tit')).'</h4>';    
            } 
            if(ale_get_option('footer_burger_col1_content')){
                echo '<div class="footer_widget_content">'.ale_wp_kses(ale_get_option('footer_burger_col1_content')).'</div>';
            }
            ?>
        </div>
        <div class="col-3">
            <?php if(ale_get_option('footer_burger_col2_tit')){
                echo '<h4 class="footer_widget_title">'.esc_attr(ale_get_option('footer_burger_col2_tit')).'</h4>';    
            } 
            if(ale_get_option('footer_burger_col2_content')){
                echo '<div class="footer_widget_content">'.ale_wp_kses(ale_get_option('footer_burger_col2_content')).'</div>';
            }
            ?>
        </div>
        <div class="col-3">
            <?php if(ale_get_option('footer_burger_col3_tit')){
                echo '<h4 class="footer_widget_title">'.esc_attr(ale_get_option('footer_burger_col3_tit')).'</h4>';    
            } 
            if(ale_get_option('footer_burger_col3_content')){
                echo '<div class="footer_widget_content">'.ale_wp_kses(ale_get_option('footer_burger_col3_content')).'</div>';
            }
            ?>
        </div>
        <div class="col-3">
            <?php if(ale_get_option('footer_burger_col4_tit')){
                echo '<h4 class="footer_widget_title">'.esc_attr(ale_get_option('footer_burger_col4_tit')).'</h4>';    
            } 
            if(ale_get_option('footer_burger_col4_content')){
                echo '<div class="footer_widget_content">'.ale_wp_kses(ale_get_option('footer_burger_col4_content')).'</div>';
            }
            ?>
        </div>
    </div>
    <div class="bottom_footer">
        <div class="logo_container">
            <a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
                <?php if(ale_get_option('footerlogo')){?>
                    <img src="<?php echo esc_url(ale_get_option('footerlogo')); ?>" <?php if(!empty(ale_get_option('footerlogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('footerlogoretina')); ?> 2x"<?php } ?> alt="logo" />
                <?php } else { ?>
                    <h1><?php esc_attr(bloginfo('title')); ?></h1>
                <?php } ?>
            </a>
        </div>
        <div class="nav_container">
            <?php if ( has_nav_menu( 'footer_menu' ) ) { ?>
                <nav class="navigation footer_nav font_one">
                    <?php
                    wp_nav_menu(array(
                        'theme_location'=> 'footer_menu',
                        'menu'			=> 'Footer Menu',
                        'menu_class'	=> 'menu menu-footer ',
                        'walker'		=> new Aletheme_Nav_Walker(),
                        'container'		=> '',
                    )); ?>
                </nav>
            <?php } ?>
            
            <a href="#top" class="burger_button look_button font_one backtotop"><span><?php esc_html_e('Scroll to top','ale'); ?></span></a>
        </div>
    </div>
</footer>