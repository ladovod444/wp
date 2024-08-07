<?php

/**
 * Generates the tabs that are used in the options menu
 */

function optionsframework_tabs() {

	$optionsframework_settings = get_option('optionsframework');
	$options = optionsframework_options();
	$menu = '';

	foreach ($options as $value) {
		// Heading for Navigation
		if ($value['type'] == "heading") {
			$jquery_click_hook = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($value['tab']) );
			$jquery_click_hook = "of-option-" . $jquery_click_hook;
            $ale_icon = '';
            if(isset($value['icon'])){
                $ale_icon = '<i class="fa '.$value['icon'].'" aria-hidden="true"></i>';
            }
			$menu .= '<a id="'.  esc_attr( $jquery_click_hook ) . '-tab" class="nav-tab" title="' . esc_attr( $value['name'] ) . '" href="' . esc_attr( '#'.  $jquery_click_hook ) . '">' . $ale_icon . esc_html( $value['name'] ) . '</a>';
		}
	}

	return $menu;
}

/**
 * Generates the options fields that are used in the form.
 */

function optionsframework_fields() {

	global $allowedtags;
	$optionsframework_settings = get_option('optionsframework');

	// Gets the unique option id
	if ( isset( $optionsframework_settings['id'] ) ) {
		$option_name = $optionsframework_settings['id'];
	}
	else {
		$option_name = 'optionsframework';
	};

	$settings = get_option($option_name);
	$options = optionsframework_options();

	$counter = 0;
	$menu = '';
	$ale_dependency_script = '';

	foreach ( $options as $value ) {

		$counter++;
		$val = '';
		$select_value = '';
		$checked = '';
		$output = '';
		$field_script = '';

		// Wrap all options
		if ( ( $value['type'] != "heading" ) && ( $value['type'] != "info" ) ) {

			// Keep all ids lowercase with no spaces
			$value['id'] = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($value['id']) );

			$id = 'section-' . $value['id'];

			$class = 'section ';
			if ( isset( $value['type'] ) ) {
				$class .= ' section-' . $value['type'];
			}
			if ( isset( $value['class'] ) ) {
				$class .= ' ' . $value['class'];
			}

			$output .= '<div id="' . esc_attr( $id ) .'" class="' . esc_attr( $class ) . '">'."\n";
			if ( isset( $value['name'] ) ) {

			    if(isset( $value['tutorial'])){
                    $output .= '<h4 class="heading">' . esc_html( $value['name'] ) . ' <a href="'.esc_html($value['tutorial']).'" target="_blank" style=" color:#cc181e; text-decoration:none; float:right">'.esc_html__('Video Tutorial','ale').' &nbsp;<i class="fa fa-youtube-play" style="font-size:1.2em;" aria-hidden="true"></i></a></h4>' . "\n";
                } else {
                    $output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n";
                }

			}
			if ( $value['type'] != 'editor' ) {
				$output .= '<div class="option">' . "\n" . '<div class="controls">' . "\n";
			}
			else {
				$output .= '<div class="option">' . "\n" . '<div>' . "\n";
			}
		}

		// Set default value to $val
		if ( isset( $value['std'] ) ) {
			$val = $value['std'];
		}

		// If the option is already saved, ovveride $val
		if ( ( $value['type'] != 'heading' ) && ( $value['type'] != 'info') ) {
			if ( isset( $settings[($value['id'])]) ) {
				$val = $settings[($value['id'])];
				// Striping slashes of non-array options
				if ( !is_array($val) ) {
					$val = stripslashes( $val );
				}
			}
		}

		// If there is a description save it for labels
		$explain_value = '';
		if ( isset( $value['desc'] ) ) {
			$explain_value = $value['desc'];
		}
        
		//jQuery code for dependency fields
		if ( isset( $value['dependency'] ) ) {
			$field_script .= "
				if($('#".esc_attr($value['dependency'][0])."').val() == '".esc_attr($value['dependency'][1])."'){ $('#section-".esc_attr($value['id'])."').show(); } else { $('#section-".esc_attr($value['id'])."').hide(); } 

				$('#".esc_attr($value['dependency'][0])."').on('change',function(){
					if($('#".esc_attr($value['dependency'][0])."').val() == '".esc_attr($value['dependency'][1])."'){ $('#section-".esc_attr($value['id'])."').show(); } else { $('#section-".esc_attr($value['id'])."').hide(); }
				});
			";
		}
		//jQuery code for hide fields
		if ( isset( $value['hidefor'] ) ) {
			foreach($value['hidefor'][1] as $hidevalue){
				$field_script .= "
					if($('#".esc_attr($value['hidefor'][0])."').val() == '".esc_attr($hidevalue)."') { $('#section-".esc_attr($value['id'])."').hide(); } 

					$('#".esc_attr($value['hidefor'][0])."').on('change',function(){
						if($('#".esc_attr($value['hidefor'][0])."').val() == '".esc_attr($hidevalue)."') { $('#section-".esc_attr($value['id'])."').hide(); } else { $('#section-".esc_attr($value['id'])."').show(); }
					});
				";
			}
		}

		switch ( $value['type'] ) {

		// Basic text input
		case 'text':
			$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" type="text" value="' . esc_attr( $val ) . '" />';
			break;

		// Textarea
		case 'textarea':
			$rows = '8';

			if ( isset( $value['settings']['rows'] ) ) {
				$custom_rows = $value['settings']['rows'];
				if ( is_numeric( $custom_rows ) ) {
					$rows = $custom_rows;
				}
			}

			$val = stripslashes( $val );
			$output .= '<textarea id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" rows="' . $rows . '">' . esc_textarea( $val ) . '</textarea>';
			break;

		// Select Box
		case ($value['type'] == 'select'):
			$output .= '<select class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" id="' . esc_attr( $value['id'] ) . '">';

			foreach ($value['options'] as $key => $option ) {
				$selected = '';
				if ( $val != '' ) {
					if ( $val == $key) { $selected = ' selected="selected"';}
				}
				$output .= '<option'. $selected .' value="' . esc_attr( $key ) . '">' . esc_html( $option ) . '</option>';
			}
			$output .= '</select>';
			break;


		// Radio Box
		case "radio":
			$name = $option_name .'['. $value['id'] .']';
			foreach ($value['options'] as $key => $option) {
				$id = $option_name . '-' . $value['id'] .'-'. $key;
				$output .= '<input class="of-input of-radio" type="radio" name="' . esc_attr( $name ) . '" id="' . esc_attr( $id ) . '" value="'. esc_attr( $key ) . '" '. checked( $val, $key, false) .' /><label for="' . esc_attr( $id ) . '">' . esc_html( $option ) . '</label>';
			}
			break;

		// Image Selectors
		case "images":
			$name = $option_name .'['. $value['id'] .']';
			foreach ( $value['options'] as $key => $option ) {
				$selected = '';
				$checked = '';
				if ( $val != '' ) {
					if ( $val == $key ) {
						$selected = ' of-radio-img-selected';
						$checked = ' checked="checked"';
					}
				}
				$output .= '<input type="radio" id="' . esc_attr( $value['id'] .'_'. $key) . '" class="of-radio-img-radio" value="' . esc_attr( $key ) . '" name="' . esc_attr( $name ) . '" '. $checked .' />';
				$output .= '<div class="of-radio-img-label">' . esc_html( $key ) . '</div>';
				$output .= '<img src="' . esc_url( $option ) . '" alt="' . $option .'" class="of-radio-img-img' . $selected .'" onclick="document.getElementById(\''. esc_attr($value['id'] .'_'. $key) .'\').checked=true;" />';
			}
			break;

		// Checkbox
		case "checkbox":
			$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" '. checked( $val, 1, false) .' />';
			$output .= '<label class="explain" for="' . esc_attr( $value['id'] ) . '">' . wp_kses( $explain_value, $allowedtags) . '</label>';
			break;

		// Multicheck
		case "multicheck":
			foreach ($value['options'] as $key => $option) {
				$checked = '';
				$label = $option;
				$option = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($key));

				$id = $option_name . '-' . $value['id'] . '-'. $option;
				$name = $option_name . '[' . $value['id'] . '][' . $option .']';

				if ( isset($val[$option]) ) {
					$checked = checked($val[$option], 1, false);
				}

				$output .= '<input id="' . esc_attr( $id ) . '" class="checkbox of-input" type="checkbox" name="' . esc_attr( $name ) . '" ' . $checked . ' /><label for="' . esc_attr( $id ) . '">' . esc_html( $label ) . '</label>';
			}
			break;

		// Color picker
		case "color":
			$output .= '<div id="' . esc_attr( $value['id'] . '_picker' ) . '" class="colorSelector"><div style="' . esc_attr( 'background-color:' . $val ) . '"></div></div>';
			$output .= '<input class="of-color" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '" id="' . esc_attr( $value['id'] ) . '" type="text" value="' . esc_attr( $val ) . '" />';
			break;

		// Uploader
		case "upload":
			$output .= optionsframework_medialibrary_uploader( $value['id'], $val, null );
			break;

			// Typography
		case 'typography':
		
			unset( $font_size, $font_style, $font_face, $font_transform,$font_weight,$font_lineheight, $font_color );
		
			$typography_defaults = array(
				'size' => '',
				'face' => '',
				'style' => '',
				'transform' => '',
				'weight' => '',
				'lineheight' => '',
				'color' => ''
			);
			
			$typography_stored = wp_parse_args( $val, $typography_defaults );
			
			$typography_options = array(
				'sizes' => of_recognized_font_sizes(),
				'faces' => of_recognized_font_faces(),
				'styles' => of_recognized_font_styles(),
				'transform' => of_recognized_font_transform(),
				'weight' => of_recognized_font_weight(),
				'lineheight' => true,
				'color' => true
			);
			
			if ( isset( $value['options'] ) ) {
				$typography_options = wp_parse_args( $value['options'], $typography_options );
			}

			// Font Size
			if ( $typography_options['sizes'] ) {
				$font_size = '<div class="ale_setting_line cf"><div class="half-box"><div class="ale_setting_title">'. esc_html__('Font Size:','ale').'</div><select class="of-typography of-typography-size" name="' . esc_attr( $option_name . '[' . $value['id'] . '][size]' ) . '" id="' . esc_attr( $value['id'] . '_size' ) . '">';
				$sizes = $typography_options['sizes'];
				foreach ( $sizes as $i ) {
					$size = $i . 'px';
					$font_size .= '<option value="' . esc_attr( $size ) . '" ' . selected( $typography_stored['size'], $size, false ) . '>' . esc_html( $size ) . '</option>';
				}
				$font_size .= '</select></div>';
			}

			// Font Face
			if ( $typography_options['faces'] ) {
				$font_face = '<div class="half-box cf"><div class="ale_setting_title">'. esc_html__('The Font:','ale').'</div><select class="of-typography of-typography-face" name="' . esc_attr( $option_name . '[' . $value['id'] . '][face]' ) . '" id="' . esc_attr( $value['id'] . '_face' ) . '">';
				$faces = $typography_options['faces'];
				foreach ( $faces as $key => $face ) {
					$font_face .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['face'], $key, false ) . '>' . esc_html( $face ) . '</option>';
				}
				$font_face .= '</select></div></div>';
			}

			// Font Styles
			if ( $typography_options['styles'] ) {
				$font_style = '<div class="ale_setting_line cf"><div class="half-box"><div class="ale_setting_title">'. esc_html__('Font Style:','ale').'</div><select class="of-typography of-typography-style" name="'.$option_name.'['.$value['id'].'][style]" id="'. $value['id'].'_style">';
				$styles = $typography_options['styles'];
				foreach ( $styles as $key => $style ) {
					$font_style .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['style'], $key, false ) . '>'. $style .'</option>';
				}
				$font_style .= '</select></div>';
			}

			//Text Transform
			if ( $typography_options['transform'] ) {
				$font_transform = '<div class="half-box cf"><div class="ale_setting_title">'. esc_html__('Font Transform:','ale').'</div><select class="of-typography of-typography-transform" name="'.$option_name.'['.$value['id'].'][transform]" id="'. $value['id'].'_transform">';
				$transforms = $typography_options['transform'];
				foreach ( $transforms as $key => $transform ) {
					$font_transform .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['transform'], $key, false ) . '>'. $transform .'</option>';
				}
				$font_transform .= '</select></div></div>';
			}

			//Text Weight
			if ( $typography_options['weight'] ) {
				$font_weight = '<div class="ale_setting_line cf"><div class="half-box"><div class="ale_setting_title">'. esc_html__('Font Weight:','ale').'</div><select class="of-typography of-typography-weight" name="'.$option_name.'['.$value['id'].'][weight]" id="'. $value['id'].'_weight">';
				$weights = $typography_options['weight'];
				foreach ( $weights as $key => $weight ) {
					$font_weight .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typography_stored['weight'], $key, false ) . '>'. $weight .'</option>';
				}
				$font_weight .= '</select></div>';
			}

			//Text Line Height
			if ( $typography_options['lineheight'] ) {
				$font_lineheight = '<div class="half-box cf"><div class="ale_setting_title">' . esc_html__(
						'Font Line Height (px or %):',
						'ale'
					) . '</div><input id="' . esc_attr(
						$value['id']
					) . '" class="of-input of-input-lineheight" name="' . esc_attr(
						$option_name . '[' . $value['id'] . '][lineheight]'
					) . '" type="text" value="' . esc_attr($typography_stored['lineheight']) . '" /></div></div>';
			}

			// Font Color
			if ( $typography_options['color'] ) {
				$font_color = '<div class="ale_setting_line cf"><div class="half-box"><div class="ale_setting_title">'. esc_html__('Font Color:','ale').'</div><div id="' . esc_attr( $value['id'] ) . '_color_picker" class="colorSelector"><div style="' . esc_attr( 'background-color:' . $typography_stored['color'] ) . '"></div></div>';
				$font_color .= '<input class="of-color of-typography of-typography-color" name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" type="text" value="' . esc_attr( $typography_stored['color'] ) . '" /></div></div>';
			}
	
			// Allow modification/injection of typography fields
			$typography_fields = compact( 'font_size', 'font_face', 'font_style', 'font_transform','font_weight','font_lineheight', 'font_color' );
			$typography_fields = apply_filters( 'of_typography_fields', $typography_fields, $typography_stored, $option_name, $value );
			$output .= implode( '', $typography_fields );
			
			break;

		// Background
		case 'background':

			$background = $val;

			// Background Color
			$output .= '<div id="' . esc_attr( $value['id'] ) . '_color_picker" class="colorSelector"><div style="' . esc_attr( 'background-color:' . $background['color'] ) . '"></div></div>';
			$output .= '<input class="of-color of-background of-background-color" name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" type="text" value="' . esc_attr( $background['color'] ) . '" />';

			// Background Image - New AJAX Uploader using Media Library
			if (!isset($background['image'])) {
				$background['image'] = '';
			}

			$output .= optionsframework_medialibrary_uploader( $value['id'], $background['image'], null, '',0,'image');
			$class = 'of-background-properties';
			if ( '' == $background['image'] ) {
				$class .= ' hide';
			}
			$output .= '<div class="' . esc_attr( $class ) . '">';

			// Background Repeat
			$output .= '<select class="of-background of-background-repeat" name="' . esc_attr( $option_name . '[' . $value['id'] . '][repeat]'  ) . '" id="' . esc_attr( $value['id'] . '_repeat' ) . '">';
			$repeats = of_recognized_background_repeat();

			foreach ($repeats as $key => $repeat) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['repeat'], $key, false ) . '>'. esc_html( $repeat ) . '</option>';
			}
			$output .= '</select>';

			// Background Position
			$output .= '<select class="of-background of-background-position" name="' . esc_attr( $option_name . '[' . $value['id'] . '][position]' ) . '" id="' . esc_attr( $value['id'] . '_position' ) . '">';
			$positions = of_recognized_background_position();

			foreach ($positions as $key=>$position) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['position'], $key, false ) . '>'. esc_html( $position ) . '</option>';
			}
			$output .= '</select>';

			// Background Attachment
			$output .= '<select class="of-background of-background-attachment" name="' . esc_attr( $option_name . '[' . $value['id'] . '][attachment]' ) . '" id="' . esc_attr( $value['id'] . '_attachment' ) . '">';
			$attachments = of_recognized_background_attachment();

			foreach ($attachments as $key => $attachment) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['attachment'], $key, false ) . '>' . esc_html( $attachment ) . '</option>';
			}
			$output .= '</select>';

			//Background Size Attribute
			$output .= '<select class="of-background of-background-size" name="' . esc_attr( $option_name . '[' . $value['id'] . '][background-size]' ) . '" id="' . esc_attr( $value['id'] . '_size' ) . '">';
			$sizes = of_recognized_background_size();

			foreach ($sizes as $key => $size) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $background['background-size'], $key, false ) . '>' . esc_html( $size ) . '</option>';
			}
			$output .= '</select>';
			$output .= '</div>';

			break;

			// Header Styles

			case 'header_styles':

				$header_style = $val;

				// Header BG Color
				$output .= '<div class="ale_setting_line cf"><div class="half-box"><div class="ale_setting_title">'. esc_html__('Header Background Color:','ale').'</div>';
				$output .= '<div id="' . esc_attr( $value['id'] ) . '_color_picker" class="colorSelector"><div style="' . esc_attr( 'background-color:' . $header_style['color'] ) . '"></div></div>';
				$output .= '<input class="of-color of-header-styles of-header-styles-color" name="' . esc_attr( $option_name . '[' . $value['id'] . '][color]' ) . '" id="' . esc_attr( $value['id'] . '_color' ) . '" type="text" value="' . esc_attr( $header_style['color'] ) . '" />';
				$output .= '</div>';

				// Text Color
				$output .= '<div class="half-box cf"><div class="ale_setting_title">'. esc_html__('Text Color:','ale').'</div>';
				$output .= '<div id="' . esc_attr( $value['id'] ) . '_color_picker" class="colorSelector"><div style="' . esc_attr( 'background-color:' . $header_style['text-color'] ) . '"></div></div>';
				$output .= '<input class="of-color of-background of-background-color" name="' . esc_attr( $option_name . '[' . $value['id'] . '][text-color]' ) . '" id="' . esc_attr( $value['id'] . '_text-color' ) . '" type="text" value="' . esc_attr( $header_style['text-color'] ) . '" />';
				$output .= '</div></div>';

				// Background Image - New AJAX Uploader using Media Library
				$output .= '<div class="ale_setting_line cf"><div class="ale_setting_title">'.esc_html__('Header Background Image:','ale').'</div> ';
				if (!isset($header_style['image'])) {
					$header_style['image'] = '';
				}

				$output .= optionsframework_medialibrary_uploader( $value['id'], $header_style['image'], null, '',0,'image');
				$class = 'of-header-styles-properties';
				if ( '' == $header_style['image'] ) {
					$class .= ' hide';
				}

				$output .= '</div>';


				// Header Width
				$output .= '<div class="ale_setting_line cf"><div class="half-box"><div class="ale_setting_title">'. esc_html__('Width (px):','ale').'</div>';
				$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][width]' ) . '" type="number" value="' . esc_attr( $header_style['width'] ) . '" />';
				$output .= '</div>';

				// Header Height
				$output .= '<div class="half-box cf"><div class="ale_setting_title">'. esc_html__('Height (px):','ale').'</div>';
				$output .= '<input id="' . esc_attr( $value['id'] ) . '" class="of-input" name="' . esc_attr( $option_name . '[' . $value['id'] . '][height]' ) . '" type="number" value="' . esc_attr( $header_style['height'] ) . '" />';
				$output .= '</div></div>';



				// Content Alignment
				$output .= '<div class="ale_setting_line cf"><div class="ale_setting_title">'. esc_html__('Content Align:','ale').'</div>';
				$output .= '<select class="of-header-styles of-header-styles-text-align" name="' . esc_attr( $option_name . '[' . $value['id'] . '][text-align]'  ) . '" id="' . esc_attr( $value['id'] . '_text-align' ) . '">';
				$aligns = of_recognized_menu_text_align();

				foreach ($aligns as $key => $align) {
					$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $header_style['text-align'], $key, false ) . '>'. esc_html( $align ) . '</option>';
				}
				$output .= '</select>';
				$output .= '</div>';



				break;

		// Editor
		case 'editor':
			$output .= '<div class="explain">' . wp_kses( $explain_value, $allowedtags) . '</div>'."\n";
			echo ''.$output;
			$textarea_name = esc_attr( $option_name . '[' . $value['id'] . ']' );
			$default_editor_settings = array(
				'textarea_name' => $textarea_name,
				'media_buttons' => false,
				'tinymce' => array( 'plugins' => 'wordpress' )
			);
			$editor_settings = array();
			if ( isset( $value['settings'] ) ) {
				$editor_settings = $value['settings'];
			}
			$editor_settings = array_merge($editor_settings, $default_editor_settings);
			wp_editor( $val, $value['id'], $editor_settings );
			$output = '';
			break;

		// Info
		case "info":
			$id = '';
			$class = 'section';
			if ( isset( $value['id'] ) ) {
				$id = 'id="section-' . esc_attr( $value['id'] ) . '" ';
			}
			if ( isset( $value['type'] ) ) {
				$class .= ' section-' . $value['type'];
			}
			if ( isset( $value['class'] ) ) {
				$class .= ' ' . $value['class'];
			}

			$output .= '<div ' . $id . 'class="' . esc_attr( $class ) . '">' . "\n";
			if ( isset($value['name']) ) {
				$output .= '<h4 class="heading">' . esc_html( $value['name'] ) . '</h4>' . "\n";
			}
			if ( $value['desc'] ) {
				$output .= apply_filters('of_sanitize_info', $value['desc'] ) . "\n";
			}
			$output .= '</div>' . "\n";
			break;

		// Heading for Navigation
		case "heading":
			if ($counter >= 2) {
				$output .= '</div>'."\n";
			}
			$class = (isset($value['class']) ? $value['class'] . ' ' : '') . 'nav-tab';
			$jquery_click_hook = preg_replace('/[^a-zA-Z0-9._\-]/', '', strtolower($value['tab']) );
			$jquery_click_hook = "of-option-" . $jquery_click_hook;
			$menu .= '<a id="'.  esc_attr( $jquery_click_hook ) . '-tab" class="' . $class . '" title="' . esc_attr( $value['name'] ) . '" href="' . esc_attr( '#'.  $jquery_click_hook ) . '">' . esc_html( $value['name'] ) . '</a>';
			$output .= '<div class="group" id="' . esc_attr( $jquery_click_hook ) . '">';
			$output .= '<h3>' . esc_html( $value['name'] ) . '</h3>' . "\n";
			break;
			
			
			
			
		/*********************************
		 *********************************
		 ** CUSTOM FIELDS ****************
		 *********************************
		 *********************************/

		// Heading Typography
		case 'typo':
			
			$typo_stored = $val;
			
			// Font Size
			$output .= '<p><label>Font Size: </label>';
			$output .= '<select class="of-typography of-typo-size" name="' . esc_attr( $option_name . '[' . $value['id'] . '][size]' ) . '" id="' . esc_attr( $value['id'] . '_size' ) . '">';
			for ($i = 9; $i < 71; $i++) {
				$size = $i . 'px';
				$output .= '<option value="' . esc_attr( $size ) . '" ' . selected( $typo_stored['size'], $size, false ) . '>' . esc_html( $size ) . '</option>';
			}
			$output .= '</select></p>';
			
		case 'header':
			
			$typo_stored = $val;
			
			// Font Face
			$output .= '<p><label>Font Family: </label>';
			$output .= '<select class="of-typography of-typo-face" name="' . esc_attr( $option_name . '[' . $value['id'] . '][face]' ) . '" id="' . esc_attr( $value['id'] . '_face' ) . '">';
			$faces = of_recognized_font_faces();
			foreach ( $faces as $key => $face ) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typo_stored['face'], $key, false ) . '>' . esc_html( $face ) . '</option>';
			}
			$output .= '</select></p>';
			
			// Font Style
			$output .= '<p><label>Font Style: </label>';
			$output .= '<select class="of-typography of-typo-style" name="'.$option_name.'['.$value['id'].'][style]" id="'. $value['id'].'_style">';
			$styles = ale_get_typo_styles();
			foreach ( $styles as $key => $style ) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typo_stored['style'], $key, false ) . '>'. $style .'</option>';
			}
			$output .= '</select></p>';
			
			// Font Weight
			$output .= '<p><label>Font Weight: </label>';
			$output .= '<select class="of-typography of-typo-weight" name="'.$option_name.'['.$value['id'].'][weight]" id="'. $value['id'].'_style">';
			$weights = ale_get_typo_weights();
			foreach ( $weights as $key => $weight ) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typo_stored['weight'], $key, false ) . '>'. $weight .'</option>';
			}
			$output .= '</select></p>';
			
			// Font Variant
			$output .= '<p><label>Font Variant: </label>';
			$output .= '<select class="of-typography of-typo-variant" name="'.$option_name.'['.$value['id'].'][variant]" id="'. $value['id'].'_style">';
			$variants = ale_get_typo_variants();
			foreach ( $variants as $key => $variant ) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typo_stored['variant'], $key, false ) . '>'. $variant .'</option>';
			}
			$output .= '</select></p>';
			
			// Text Transform
			$output .= '<p><label>Text Transform: </label>';
			$output .= '<select class="of-typography of-typo-transform" name="'.$option_name.'['.$value['id'].'][transform]" id="'. $value['id'].'_style">';
			$transforms = ale_get_typo_transforms();
			foreach ( $transforms as $key => $transform ) {
				$output .= '<option value="' . esc_attr( $key ) . '" ' . selected( $typo_stored['transform'], $key, false ) . '>'. $transform .'</option>';
			}
			$output .= '</select></p>';
			
			break;
			
			
		// Color picker
		case "color_link":
			
			$color_stored = $val;
			if (!isset($color_stored['main'])) {
				$color_stored['main'] = '';
			}
			if (!isset($color_stored['hover'])) {
				$color_stored['hover'] = '';
			}
			
			$labels = isset($value['labels']) ? $value['labels'] : array('main' => 'Main', 'hover' => 'Hover');
			
			$output .= '<div class="color-wrap">';
			$output .= '<span class="color_helper">' . $labels['main'] .':</span>';
			$output .= '<div id="' . esc_attr( $value['id'] . '_main_picker' ) . '" class="colorSelector"><div style="' . esc_attr( 'background-color:' . $color_stored['main'] ) . '"></div></div>';
			$output .= '<input class="of-color" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '[main]" id="' . esc_attr( $value['id'] ) . '_main" type="text" value="' . esc_attr( $color_stored['main'] ) . '" />';
			$output .= '</div><div class="color-wrap">';
			$output .= '<span class="color_helper">' . $labels['hover'] .':</span>';
			$output .= '<div id="' . esc_attr( $value['id'] . '_hover_picker' ) . '" class="colorSelector"><div style="' . esc_attr( 'background-color:' . $color_stored['hover'] ) . '"></div></div>';
			$output .= '<input class="of-color" name="' . esc_attr( $option_name . '[' . $value['id'] . ']' ) . '[hover]" id="' . esc_attr( $value['id'] ) . '_hover" type="text" value="' . esc_attr( $color_stored['hover'] ) . '" />';
			$output .= '</div>';
			
			break;
			
		}

		if ( ( $value['type'] != "heading" ) && ( $value['type'] != "info" ) ) {
			$output .= '</div>';
			if ( ( $value['type'] != "checkbox" ) && ( $value['type'] != "editor" ) ) {
				$output .= '<div class="explain">' . wp_kses( $explain_value, $allowedtags) . '</div>'."\n";
			}
			$output .= '</div></div>'."\n";
		}

		echo ''.$output;

		//jQuery code for dependency fields (show or hide)
		$ale_dependency_script .= $field_script;
	}

		//Print dependency fields minified script
			// make it into one long line
			$ale_dependency_script = str_replace(array("\n","\r"),'',$ale_dependency_script);
			// replace all multiple spaces by one space
			$ale_dependency_script = preg_replace('!\s+!',' ',$ale_dependency_script);
			// replace some unneeded spaces, modify as needed
			$ale_dependency_script = str_replace(array(' {',' }','{ ','; '),array('{','}','{',';'),$ale_dependency_script);


		echo '<script>jQuery(document).ready(function($) {' . $ale_dependency_script . '});	</script>';
	
	echo '</div>';
}