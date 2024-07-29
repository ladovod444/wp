<?php
$front_header = '';
if(is_front_page()){
    $front_header = 'fixed_front_header';
} ?>
<header class="ale_header ale_header_photography <?php echo esc_attr($front_header); ?> font_two cf">
	<div class="header_flex_box">
		<div class="header_flex_child logo_container">
			<a href="<?php echo esc_url(home_url("/")); ?>" class="logo">
				<?php if(ale_get_option('sitelogo')){?>
					<img src="<?php echo esc_url(ale_get_option('sitelogo')); ?>" <?php if(!empty(ale_get_option('sitelogoretina'))){ ?>srcset="<?php echo esc_url(ale_get_option('sitelogoretina')); ?> 2x"<?php } ?> alt="logo" />
				<?php } else { ?>
					<h1><?php esc_attr(bloginfo('title')); ?></h1>
				<?php } ?>
			</a><br />
            <?php if(ale_get_option('design_variant') !== 'pixel'){ ?>
                <span class="tagline font_one">
                    <?php echo esc_attr(get_bloginfo('description')); ?>
                </span>
            <?php } ?>
		</div>

		<div class="header_flex_child navigation_container">
			<i id="trigger-overlay" class="fa fa-bars" aria-hidden="true"></i>
		</div>
	</div>
</header>