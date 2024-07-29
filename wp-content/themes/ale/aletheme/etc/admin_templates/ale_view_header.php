<?php 
    $current_screen = get_current_screen();
    $ale_theme = wp_get_theme();
?>
<div class="ale-admin-header">
    <div class="ale-admin-header-left">
        <a href="https://aletheme.com/" target="_blank" title="ALETHEME.COM" class="ale-admin-logo"><img src="<?php echo ALETHEME_URL . '/assets/images/aletheme.png';  ?>" alt="ALETHEME.COM" /></a>
        <nav>
            <a <?php echo ($current_screen->base == 'toplevel_page_ale_welcome') ? 'class="active"' : ''; ?> href="<?php echo esc_url(menu_page_url('ale_welcome',false)); ?>"><?php esc_html_e('Welcome','ale'); ?></a>
            <a <?php echo ($current_screen->base == 'ale-dashboard_page_aletheme') ? 'class="active"' : ''; ?> href="<?php echo esc_url(menu_page_url('aletheme',false)); ?>"><?php esc_html_e('Theme Options','ale'); ?></a>
            <a <?php echo ($current_screen->base == 'ale-dashboard_page_aletheme_theme_demos') ? 'class="active"' : ''; ?> href="<?php echo esc_url(menu_page_url('aletheme_theme_demos',false)); ?>"><?php esc_html_e('Demos','ale'); ?></a>    
        </nav>
    </div>
    <div class="ale-admin-header-right">
        <a href="https://aletheme.com/support/" target="_blank"><?php esc_html_e('Knowledge Base','ale'); ?></a>
        <div class="ale-admin-separator"></div>
        <div class="ale-theme-version" title="<?php echo esc_attr_e('Current version','ale'); ?>"><?php echo esc_html($ale_theme->get( 'Version' )); ?></div>
        <div class="ale-notification"><span class="notify-icon"></span></div>
    </div>
</div>