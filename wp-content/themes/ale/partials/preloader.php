<?php
$preloader_style = ale_get_option('preloder_style');
$color = '';

if(ale_get_option('loader_animation')){
	$color = 'background-color:'.ale_get_option('loader_animation').';';
}
if(!empty(get_theme_mod('olins_aspect_color'))){
    $color = 'background-color:'.get_theme_mod('olins_aspect_color').';';
}


if(ale_get_option('preloder') == 'enable') { ?>
	<div class="ale_preloader_holder" <?php if(ale_get_option('loader_bg')){ if(empty(get_theme_mod('olins_aspect_color'))){echo 'style="background-color:'.esc_attr(ale_get_option('loader_bg')).'"';} } ?>>
		<?php switch($preloader_style){
			case '1' :
				echo '<div class="sk-rotating-plane" style="'.esc_attr($color).'"></div>';
				break;
			case '2' :
				echo '<div class="sk-double-bounce">
				        <div style="'.esc_attr($color).'" class="sk-child sk-double-bounce1"></div>
				        <div style="'.esc_attr($color).'" class="sk-child sk-double-bounce2"></div>
				      </div>';
				break;
			case '3' :
				echo '<div class="sk-wave">
				        <div style="'.esc_attr($color).'" class="sk-rect sk-rect1"></div>
				        <div style="'.esc_attr($color).'" class="sk-rect sk-rect2"></div>
				        <div style="'.esc_attr($color).'" class="sk-rect sk-rect3"></div>
				        <div style="'.esc_attr($color).'" class="sk-rect sk-rect4"></div>
				        <div style="'.esc_attr($color).'" class="sk-rect sk-rect5"></div>
				      </div>';
				break;
			case '4' :
				echo '<div class="sk-wandering-cubes">
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube1"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube2"></div>
				      </div>';
				break;
			case '5' :
				echo '<div style="'.esc_attr($color).'" class="sk-spinner sk-spinner-pulse"></div>';
				break;
			case '6' :
				echo '<div class="sk-chasing-dots">
				        <div style="'.esc_attr($color).'" class="sk-child sk-dot1"></div>
				        <div style="'.esc_attr($color).'" class="sk-child sk-dot2"></div>
				      </div>';
				break;
			case '7' :
				echo '<div class="sk-three-bounce">
				        <div style="'.esc_attr($color).'" class="sk-child sk-bounce1"></div>
				        <div style="'.esc_attr($color).'" class="sk-child sk-bounce2"></div>
				        <div style="'.esc_attr($color).'" class="sk-child sk-bounce3"></div>
				      </div>';
				break;
			case '8' :
				echo '<style type="text/css">.sk-circle .sk-child:before { ' . esc_attr($color) . ' }</style>
					  <div class="sk-circle">
				        <div class="sk-circle1 sk-child"></div>
				        <div class="sk-circle2 sk-child"></div>
				        <div class="sk-circle3 sk-child"></div>
				        <div class="sk-circle4 sk-child"></div>
				        <div class="sk-circle5 sk-child"></div>
				        <div class="sk-circle6 sk-child"></div>
				        <div class="sk-circle7 sk-child"></div>
				        <div class="sk-circle8 sk-child"></div>
				        <div class="sk-circle9 sk-child"></div>
				        <div class="sk-circle10 sk-child"></div>
				        <div class="sk-circle11 sk-child"></div>
				        <div class="sk-circle12 sk-child"></div>
				      </div>';
				break;
			case '9' :
				echo '<div class="sk-cube-grid">
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube1"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube2"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube3"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube4"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube5"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube6"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube7"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube8"></div>
				        <div style="'.esc_attr($color).'" class="sk-cube sk-cube9"></div>
				      </div>';
				break;
			case '10' :
				echo '<style type="text/css">.sk-fading-circle .sk-circle:before { ' . esc_attr($color) . ' }</style>
					  <div class="sk-fading-circle">
				        <div class="sk-circle1 sk-circle"></div>
				        <div class="sk-circle2 sk-circle"></div>
				        <div class="sk-circle3 sk-circle"></div>
				        <div class="sk-circle4 sk-circle"></div>
				        <div class="sk-circle5 sk-circle"></div>
				        <div class="sk-circle6 sk-circle"></div>
				        <div class="sk-circle7 sk-circle"></div>
				        <div class="sk-circle8 sk-circle"></div>
				        <div class="sk-circle9 sk-circle"></div>
				        <div class="sk-circle10 sk-circle"></div>
				        <div class="sk-circle11 sk-circle"></div>
				        <div class="sk-circle12 sk-circle"></div>
				      </div>';
				break;
			case '11' :
				echo '<style type="text/css">.sk-folding-cube .sk-cube:before { ' . esc_attr($color) . ' }</style>
					  <div class="sk-folding-cube">
				        <div class="sk-cube1 sk-cube"></div>
				        <div class="sk-cube2 sk-cube"></div>
				        <div class="sk-cube4 sk-cube"></div>
				        <div class="sk-cube3 sk-cube"></div>
				      </div>';
				break;
            case '12' :
                echo '<div class="loader">
                      <div style="'.esc_attr($color).'" class="loader__bar"></div>
                      <div style="'.esc_attr($color).'" class="loader__bar"></div>
                      <div style="'.esc_attr($color).'" class="loader__bar"></div>
                      <div style="'.esc_attr($color).'" class="loader__bar"></div>
                      <div style="'.esc_attr($color).'" class="loader__bar"></div>
                      <div style="'.esc_attr($color).'" class="loader__ball"></div>
                    </div>';
				break;
				
			case '13' :
				echo '<div class="loading">
						<div class="finger finger-1">
							<div class="finger-item" style="'.esc_attr($color).'">
								<span></span><i></i>
							</div>
						</div>
						<div class="finger finger-2">
							<div class="finger-item" style="'.esc_attr($color).'">
								<span></span><i></i>
							</div>
						</div>
						<div class="finger finger-3">
							<div class="finger-item" style="'.esc_attr($color).'">
								<span></span><i></i>
							</div>
						</div>
						<div class="finger finger-4">
							<div class="finger-item" style="'.esc_attr($color).'">
								<span></span><i></i>
							</div>
						</div>
						<div class="last-finger">
							<div class="last-finger-item" style="'.esc_attr($color).'"><i></i></div>
						</div>
					</div>';
			break;
            case '14' :
                echo '<div class="alekids_preloader_content" >
                        <div class="alekids_content">
                            <div class="planet" style="'.esc_attr($color).'">
                                <div class="ring"></div>
                                    <div class="cover-ring" style="'.esc_attr($color).'"></div>
                                <div class="spots">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <p>'.esc_html_e('loading','ale').'</p>
                        </div>
                    </div>';
            break;
		} ?>

	</div>
<?php  }?>