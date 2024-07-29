<?php

$installed_demo = ale_demo_state::get_installed_demo();
require_once "ale_view_header.php";
?>
<div class="ale-admin-wrap ale_demo_install_tool">
    <div class="wrap ale-welcome-header">
        <h2 class="ale_page_title">
            <?php 
esc_html_e( 'Import demos for Ale', 'ale' );
?>
            <?php 
if ( ale_fs()->is_not_paying() ) {
    echo '<div class="free-status-badge">' . esc_html__( 'FREE', 'ale' ) . '</div>';
}
?>
        </h2>

            <div class="demo_tool_dashboard cf">
                
                <div class="col-6">
                    <h3><?php 
esc_html_e( 'Recommendation:', 'ale' );
?></h3>
                        <p><?php 
esc_html_e( 'We recommend to use a fresh install of WordPress for importing Demo Data. (no media, not posts, no pages, no plugins.)', 'ale' );
?></p>
                        <p><?php 
esc_html_e( 'The upload process can take up 5 minutes. So please, be patient and do not close the page.', 'ale' );
?></p>
                        <p><?php 
esc_html_e( 'Before importing Demo Examples you must install required plugins.', 'ale' );
?></p>
                </div>
                <div class="col-6">
                    <h3><?php 
esc_html_e( 'Server environment', 'ale' );
?></h3>
                        <p><?php 
esc_html_e( 'PHP version', 'ale' );
?>: <strong class="<?php 
if ( phpversion() >= 8.0 ) {
    echo 'green';
} else {
    echo 'red';
}
?>"><?php 
echo esc_html( phpversion() );
?></strong> <em>(<?php 
esc_html_e( 'Required', 'ale' );
?> - 8.0)</em></p>
                        <p><?php 
esc_html_e( 'PHP memory_limit', 'ale' );
?>: <strong><?php 
echo esc_html( ini_get( 'memory_limit' ) );
?></strong> <em>(<?php 
esc_html_e( 'Required', 'ale' );
?> - 256M)</em></p>
                        <p><?php 
esc_html_e( 'Demos available', 'ale' );
?>: <strong class="green"><?php 
echo esc_html( count( ale_global::$demo_list ) );
?></strong></p>
                        <p><?php 
esc_html_e( 'Installed demo', 'ale' );
?>: <strong><?php 
if ( isset( $installed_demo['demo_id'] ) ) {
    echo esc_attr( $installed_demo['demo_id'] );
} else {
    esc_html_e( 'Not installed yet', 'ale' );
}
?></strong></p>
                </div>
            </div>

            <div class="wp-filter">
                <ul class="filter-links filter-options">
                    <li class="active" data-group="all" ><span><?php 
esc_html_e( 'All', 'ale' );
?></span></li>
                    <li class="" data-group="free" ><span><?php 
esc_html_e( 'Free', 'ale' );
?></span></li>
                    <li class="" data-group="photography" ><span><?php 
esc_html_e( 'Photography', 'ale' );
?></span></li>
                    <li class="" data-group="micro-niche" ><span><?php 
esc_html_e( 'Micro Niche', 'ale' );
?></span></li>
                    <li class="" data-group="creative" ><span><?php 
esc_html_e( 'Creative', 'ale' );
?></span></li>
                    <li class="" data-group="business" ><span><?php 
esc_html_e( 'Business', 'ale' );
?></span></li>
                    <li class="" data-group="shop" ><span><?php 
esc_html_e( 'Shop', 'ale' );
?></span></li>
                    <li class="" data-group="one-page" ><span><?php 
esc_html_e( 'One Page', 'ale' );
?></span></li>
                </ul>

                <form class="search-form search-plugins" method="get">
                    <select name="" class="sort-options">
                        <option value="" selected="selected"><?php 
esc_html_e( 'Default', 'ale' );
?></option>
                        <option value="title"><?php 
esc_html_e( 'Title', 'ale' );
?></option>
                        <option value="date-created"><?php 
esc_html_e( 'Date Created', 'ale' );
?></option>
                    </select>
                    <label>
                        <input type="search" name="" value="" class="wp-filter-search filter__search js-shuffle-search" placeholder="<?php 
esc_attr_e( 'Search', 'ale' );
?>" >
                    </label>
                </form>
            </div>

            <div id="grid" class="ale-demo-page cf">


                <?php 
$ale_demo_names = array();
//Set Required Plugins
$plugins = new ale_plugin_installer();
$plugins->set_plugins_data( ale_global::$plugins_list );
foreach ( ale_global::$demo_list as $demo_id => $ale_temp_params ) {
    $ale_demo_names[$ale_temp_params['text']] = $demo_id;
    $tmp_class = '';
    if ( $installed_demo !== false and $installed_demo['demo_id'] == $demo_id ) {
        $tmp_class = 'ale-demo-installed';
    }
    $data_groups = '';
    $i = 0;
    $del = '';
    if ( $ale_temp_params['category'] ) {
        foreach ( $ale_temp_params['category'] as $cat ) {
            if ( $i == 0 ) {
                $del = '';
            } else {
                $del = ', ';
            }
            $data_groups .= $del . '"' . esc_attr( $cat ) . '"';
            $i++;
        }
    }
    ?>

                    <div data-groups='[<?php 
    echo esc_attr( $data_groups );
    ?>]' data-date-created="<?php 
    echo esc_attr( $ale_temp_params['date-create'] );
    ?>" data-title="<?php 
    echo esc_attr( $ale_temp_params['text'] );
    ?>" class="ale-demo-<?php 
    echo esc_attr( $demo_id );
    ?> ale-wp-admin-demo picture-item ale-demo-item <?php 
    echo esc_attr( $tmp_class );
    ?> cf">
                        <div class="ale_image">
                            <div class="ale_info cf">
                                <h2 class="demo_search_title"><?php 
    echo esc_html( $ale_temp_params['text'] );
    ?></h2>
                                <span class="ale-installed-text">
                                    <?php 
    if ( !empty( ale_global::$demo_list[$demo_id]['demo_installed_text'] ) ) {
        echo esc_attr( ale_global::$demo_list[$demo_id]['demo_installed_text'] );
    } else {
        echo 'Installed';
    }
    ?>
                                </span>
                                <?php 
    if ( ale_global::$demo_list[$demo_id]['premium'] ) {
        //Display notification if free user
        if ( ale_fs()->is_not_paying() ) {
            ?>
                                        <span class="premium-text-demo"><?php 
            esc_html_e( 'Premium', 'ale' );
            ?></span>
                                    <?php 
        }
    }
    ?>
                                <div class="aspect aspect--7x5">
                                    <div class="aspect__inner">
                                        <a href="<?php 
    echo esc_url( $ale_temp_params['demo_url'] );
    ?>" target="_blank"><img src="<?php 
    echo esc_url( $ale_temp_params['demo_preview'] );
    ?>" class="decor" alt="<?php 
    echo esc_attr( $ale_temp_params['text'] );
    ?>" /></a>
                                    </div>
                                </div>
                                
                                <div class="demo-item-meta">
                                    <?php 
    if ( isset( $ale_temp_params['builder'] ) ) {
        ?>
                                        <div class="builder_selector required_plugins">
                                            <?php 
        $ale_demo_id = $ale_temp_params['text'];
        ?>
                                            <h4><?php 
        esc_html_e( 'Select Page Builder', 'ale' );
        ?>:</h4>
                                            <ul>
                                                <?php 
        $ale_plugins = $plugins->get_plugins_data();
        $html_plugins_output = '';
        foreach ( $ale_plugins as $plugin ) {
            if ( in_array( $plugin['slug'], $ale_temp_params['builder'], true ) ) {
                //Set the slug
                $plugin_slug = $plugin['slug'];
                $ale_url = '';
                $ale_html = '';
                $ale_builder = 'checked';
                if ( $plugins->is_plugin_installed( $plugin_slug ) === false ) {
                    $ale_url = admin_url( 'update.php' ) . '?action=install-plugin&plugin=' . $plugin_slug . '&_wpnonce=' . wp_create_nonce( 'install-plugin_' . $plugin_slug );
                    $ale_html = '<input type="radio" class="builder_type" name="builder_' . esc_attr( $ale_demo_id ) . '" id="builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . '" value="' . $plugin['slug'] . '" ' . $ale_builder . ' /> <label for="builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . '">' . $plugin['name'] . '</label>' . '<span class="install_but builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . '"><a href="' . esc_url( $ale_url ) . '" class="install-plugin">' . esc_html__( 'Install', 'ale' ) . '</a></span>';
                } else {
                    if ( $plugins->is_plugin_installed( $plugin_slug ) === true ) {
                        if ( $plugins->is_plugin_activated( $plugin_slug ) === false ) {
                            $ale_url = admin_url( 'plugins.php' ) . '?action=activate&plugin=' . $plugin['file_path'] . '&_wpnonce=' . wp_create_nonce( 'activate-plugin_' . $plugin['file_path'] );
                            $ale_html = '<input type="radio" class="builder_type" name="builder_' . esc_attr( $ale_demo_id ) . '" id="builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . '" value="' . $plugin['slug'] . '"  ' . $ale_builder . ' /> <label for="builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . '">' . $plugin['name'] . '</label>' . '<span class="install_but builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . '"><a href="' . esc_url( $ale_url ) . '" class="activate-plugin">' . esc_html__( 'Activate', 'ale' ) . '</a></span>';
                        } else {
                            $ale_html = '<input type="radio" class="builder_type" name="builder_' . esc_attr( $ale_demo_id ) . '" id="builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . '" value="' . $plugin['slug'] . '"  ' . $ale_builder . ' /> <label for="builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . '">' . $plugin['name'] . '</label>' . '<span class="install_but  builder_' . esc_attr( $plugin['slug'] ) . esc_attr( $ale_demo_id ) . ' installed"><i class="fa fa-check success" aria-hidden="true"></i> ' . esc_html__( 'Active', 'ale' ) . '</span>';
                        }
                    }
                }
                if ( $ale_html !== '' ) {
                    $html_plugins_output .= '<li class="olins_plugin_name builder_plugins_name">' . $ale_html . '</li>';
                }
            }
        }
        echo ale_wp_kses( $html_plugins_output );
        ?>
                                            </ul>
                                            
                                        </div>
                                    <?php 
    }
    ?>

                                    <div class="required_plugins">
                                        <h4><?php 
    esc_html_e( 'Required Plugins', 'ale' );
    ?>:</h4>
                                        <ul>
                                            <?php 
    $olins_plugins = $plugins->get_plugins_data();
    $html_plugins_output = '';
    foreach ( $olins_plugins as $plugin ) {
        if ( in_array( $plugin['slug'], $ale_temp_params['required_plugins'], true ) ) {
            //Set the slug
            $plugin_slug = $plugin['slug'];
            $olins_url = '';
            $olins_html = '';
            if ( $plugins->is_plugin_installed( $plugin_slug ) === false ) {
                $olins_url = admin_url( 'update.php' ) . '?action=install-plugin&plugin=' . $plugin_slug . '&_wpnonce=' . wp_create_nonce( 'install-plugin_' . $plugin_slug );
                $olins_html = $plugin['name'] . '<span class="install_but"><a href="' . esc_url( $olins_url ) . '" class="install-plugin">' . esc_html__( 'Install', 'ale' ) . '</a></span>';
            } else {
                if ( $plugins->is_plugin_installed( $plugin_slug ) === true ) {
                    if ( $plugins->is_plugin_activated( $plugin_slug ) === false ) {
                        $olins_url = admin_url( 'plugins.php' ) . '?action=activate&plugin=' . $plugin['file_path'] . '&_wpnonce=' . wp_create_nonce( 'activate-plugin_' . $plugin['file_path'] );
                        $olins_html = $plugin['name'] . '<span class="install_but"><a href="' . esc_url( $olins_url ) . '" class="activate-plugin">' . esc_html__( 'Activate', 'ale' ) . '</a></span>';
                    } else {
                        $olins_html = $plugin['name'] . '<span class="install_but installed"><i class="fa fa-check success" aria-hidden="true"></i> ' . esc_html__( 'Active', 'ale' ) . '</span>';
                    }
                }
            }
            if ( $olins_html !== '' ) {
                $html_plugins_output .= '<li class="olins_plugin_name default_plugin_name">' . $olins_html . '</li>';
            }
        }
    }
    echo ale_wp_kses( $html_plugins_output );
    ?>
                                        </ul>
                                    </div>
                                    <div class="ale-demo-info">
                                        <?php 
    if ( isset( ale_global::$demo_list[$demo_id]['info'] ) && !empty( ale_global::$demo_list[$demo_id]['info'] ) ) {
        echo ale_global::$demo_list[$demo_id]['info'];
    }
    ?>
                                    </div>
                                    <div class="theme-actions">
                                        <?php 
    //Display install button for premium users or free demos
    if ( ale_global::$demo_list[$demo_id]['premium'] ) {
        ?>
                                            <a class="button button-secondary ale-button-demo-preview" href="<?php 
        echo esc_url( ale_global::$demo_list[$demo_id]['demo_url'] );
        ?>" target="_blank">Live Demo</a>
                                        <?php 
    } else {
        ?>
                                            <a class="button button-primary ale-button-install-demo" href="#" data-demo-id="<?php 
        echo esc_attr( $demo_id );
        ?>">Install</a>
                                            <a class="button button-secondary ale-button-demo-preview" href="<?php 
        echo esc_url( ale_global::$demo_list[$demo_id]['demo_url'] );
        ?>" target="_blank">Live Demo</a>
                                            <a class="button button-secondary ale-button-uninstall-demo" href="#" data-demo-id="<?php 
        echo esc_attr( $demo_id );
        ?>">Uninstall</a>
                                            <a class="button button-primary disabled ale-button-installing-demo" href="#" data-demo-id="<?php 
        echo esc_attr( $demo_id );
        ?>">Installing...</a>
                                            <a class="button button-primary disabled ale-button-uninstalling-demo" href="#" data-demo-id="<?php 
        echo esc_attr( $demo_id );
        ?>">Uninstalling...</a>
                                        <?php 
    }
    ?>
                                    </div>
                                    <?php 
    if ( ale_global::$demo_list[$demo_id]['premium'] ) {
        //Display notification if free user
        if ( ale_fs()->is_not_paying() ) {
            ?>
                                            <div class="upgrade-mask">
                                                <div class="upgrade-container">
                                                    <div class="upgrade-content">
                                                        <span class="icon">
                                                            <img src="<?php 
            echo esc_url( ALETHEME_URL . '/assets/svg/lock.svg' );
            ?>" alt="" />
                                                        </span>
                                                        <p><?php 
            echo wp_kses_post( __( 'Upgrade to <strong>Premium</strong><br>to unlock all demos', 'ale' ) );
            ?></p>
                                                    </div>
                                                    <div class="upgrade-buttons">
                                                        <a class="upgrade-button" href="<?php 
            echo esc_url( ale_fs()->get_upgrade_url() );
            ?>"><?php 
            esc_html_e( 'Upgrade', 'ale' );
            ?></a>
                                                        <a class="upgrade-button live-preview-button" href="<?php 
            echo esc_url( $ale_temp_params['demo_url'] );
            ?>" target="_blank"><?php 
            esc_html_e( 'Demo Preview', 'ale' );
            ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php 
        }
    }
    ?>
                                </div>
                                <div class="ale-progress-bar-wrap"><div class="ale-progress-bar"></div></div>
                            </div>
                            <div class="ale-mask"></div>
                        </div>

                    </div>
                <?php 
}
?>
            </div>

    </div>


</div>