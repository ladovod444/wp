<?php require_once "ale_view_header.php"; ?>
<div class="ale-admin-wrap ale_theme_welcome_tool">
    <div class="wrap ale-welcome-header">
        <h2 class="ale_page_title">
            <?php esc_html_e('Welcome to Ale','ale'); ?>
            <?php if ( ale_fs()->is_not_paying() ) {
                echo '<div class="free-status-badge">'.esc_html__('FREE','ale').'</div>';
            } ?>
        </h2>
        <div class="ale-welcome-info">
            <p class="intro"><?php esc_html_e('Ale is a versatile and dynamic WordPress theme designed for a wide range of purposes, including blogs, personal portfolios, business websites, and WooCommerce stores. With its sleek design and robust customization options, Ale empowers users to create stunning websites tailored to their specific needs.','ale'); ?></p>
            <?php if ( ale_fs()->is_not_paying() ) { ?>
                <div class="upgrade-call">
                    <a class="upgrade-button" href="<?php echo esc_url(ale_fs()->get_upgrade_url()); ?>"><?php esc_html_e('Upgrade','ale'); ?></a>
                    <span class="lock-icon-text"><img src="<?php echo esc_url(ALETHEME_URL.'/assets/svg/lock.svg'); ?>" alt=""/><span><?php echo wp_kses_post(__('Update to <strong>Premium</strong> to unlock all options.','ale')); ?></span></span>
                </div>
            <?php } ?>
            <div class="ale-admin-features">
                <div class="ale-admin-feature-item">
                    <div class="ale-admin-feature-image">
                        <img src="<?php echo esc_url(ALETHEME_URL.'/assets/images/demos-feature.png'); ?>" alt="" />
                        <?php if ( ale_fs()->is_not_paying() ) { ?>
                            <div class="lock-mask"><img src="<?php echo esc_url(ALETHEME_URL.'/assets/svg/lock.svg'); ?>" alt=""/></div>
                        <?php } ?>
                    </div>
                    <div class="ale-admin-feature-meta">
                        <h3><?php esc_html_e('44 demos for micro-niche sites','ale'); ?></h3>
                        <p><?php esc_html_e('Choose a ready to use site example from 44 multifunctional variations and install in just one click.','ale'); ?></p>
                        <div class="feature-buttons">
                            <?php if ( ale_fs()->is_not_paying() ) { ?>
                                <a class="upgrade-button" href="<?php echo esc_url(ale_fs()->get_upgrade_url()); ?>"><?php esc_html_e('Upgrade','ale'); ?></a>
                            <?php } else { ?>
                                <a class="upgrade-button" href="<?php echo esc_url(menu_page_url('aletheme_theme_demos',false)); ?>"><?php esc_html_e('Import Tool','ale'); ?></a>
                            <?php } ?>
                            <a class="upgrade-button live-preview-button" href="https://aletheme.com/demos/?demo=1" target="_blank"><?php esc_html_e('Site examples','ale'); ?></a>
                        </div>
                    </div>
                </div>
                <div class="ale-admin-feature-item">
                    <div class="ale-admin-feature-image">
                        <img src="<?php echo esc_url(ALETHEME_URL.'/assets/images/options-feature.png'); ?>" alt="" />
                        <?php if ( ale_fs()->is_not_paying() ) { ?>
                            <div class="lock-mask"><img src="<?php echo esc_url(ALETHEME_URL.'/assets/svg/lock.svg'); ?>" alt=""/></div>
                        <?php } ?>
                    </div>
                    <div class="ale-admin-feature-meta">
                        <h3><?php esc_html_e('Advanced Customization Options','ale'); ?></h3>
                        <p><?php esc_html_e('Customize your site with Ale Premium Options and make it unique and awesome.','ale'); ?></p>
                        <div class="feature-buttons">
                            <?php if ( ale_fs()->is_not_paying() ) { ?>
                                <a class="upgrade-button" href="<?php echo esc_url(ale_fs()->get_upgrade_url()); ?>"><?php esc_html_e('Upgrade','ale'); ?></a>
                            <?php } else { ?>
                                <a class="upgrade-button" href="<?php echo esc_url(menu_page_url('aletheme',false)); ?>"><?php esc_html_e('Ale Options','ale'); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="ale-admin-feature-item">
                    <div class="ale-admin-feature-image">
                        <img src="<?php echo esc_url(ALETHEME_URL.'/assets/images/support-feature.png'); ?>" alt="" />
                        <?php if ( ale_fs()->is_not_paying() ) { ?>
                            <div class="lock-mask"><img src="<?php echo esc_url(ALETHEME_URL.'/assets/svg/lock.svg'); ?>" alt=""/></div>
                        <?php } ?>
                    </div>
                    <div class="ale-admin-feature-meta">
                        <h3><?php esc_html_e('Premium Support','ale'); ?></h3>
                        <p><?php esc_html_e('Feel free to get help from us with any theme related issues. We offer Premium Ultra Class Support. ','ale'); ?></p>
                        <div class="feature-buttons">
                            <?php if ( ale_fs()->is_not_paying() ) { ?>
                                <a class="upgrade-button" href="<?php echo esc_url(ale_fs()->get_upgrade_url()); ?>"><?php esc_html_e('Upgrade','ale'); ?></a>
                            <?php } else { ?>
                                <a class="upgrade-button" href="https://aletheme.com/client-support/"><?php esc_html_e('Premium Support','ale'); ?></a>
                            <?php } ?>
                            <a class="upgrade-button live-preview-button" href="https://aletheme.com/support/" target="_blank"><?php esc_html_e('Knowledge Base','ale'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>