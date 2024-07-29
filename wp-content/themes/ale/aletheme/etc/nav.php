<?php

class Aletheme_Nav_Walker extends Walker_Nav_Menu
{

    function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
    {

        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . ' '. sanitize_title( $item->title ) . '"';

        if ($depth==0) {
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
        } else {
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
        }


        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        if(ALETHEME_DESIGN_STYLE == 'orquidea'){
            $description  = ! empty( $item->description ) ? '<span class="desc_item_menu font_two">'.esc_attr( $item->description ).'</span>' : '';
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        if(ALETHEME_DESIGN_STYLE == 'orquidea'){
            $item_output .= $description;
        }
        $item_output .= '</a>';
        $item_output .= $args->after;

        if(in_array(ALETHEME_DESIGN_STYLE, ['mimi','pizza'])){
            if(array_search('menu-item-has-children', $classes)) {
                $item_output .= '<span class="open_current_dropdown"></span>';
            }
        }

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

    }
}

class Aletheme_Dropdown_Nav_Walker extends Walker_Nav_Menu {

    /**
     * Easy way to check it's this walker we're using to mod the output
     * @return boolean
     */
    public function is_dropdown()
    {
        return true;
    }

    /**
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output,  $depth = 0, $args = Array()  )
    {
        $output .= "</option>";
    }

    /**
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function end_lvl( &$output,  $depth = 0, $args = Array() )
    {
        $output .= "<option>";
    }

    /**
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = Array(), $current_object_id = 0 )
    {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $classes[] = 'menu-item-depth-' . $depth;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_unique( array_filter( $classes ) ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        // select current item
        $selected = in_array( 'current-menu-item', $classes ) ? ' selected="selected"' : '';

        $output .= $indent . '<option' . $class_names .' value="'. $item->url .'"'. $selected .'>';

        // push sub-menu items in as we can't nest optgroups
        $indent_string = str_repeat( apply_filters( 'dropdown_menus_indent_string', $args->indent_string, $item, $depth, $args ), ( $depth ) ? $depth : 0 );
        $indent_string .= !empty( $indent_string ) ? apply_filters( 'dropdown_menus_indent_after', $args->indent_after, $item, $depth, $args ) : '';

        $item_output = $args->before . $indent_string;
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_dropdown_start_el', $item_output, $item, $depth, $args );
    }

    /**
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Page data object. Not used.
     * @param int $depth Depth of page. Not Used.
     */
    public function end_el( &$output, $item, $depth = 0, $args = Array() )
    {
        $output .= apply_filters( 'walker_nav_menu_dropdown_end_el', "</option>\n", $item, $depth);
    }
}


/**
 * Remove empty options created in the sub levels output
 */
function ale_dropdown_remove_empty_items( $items, $args ) {
    if ( isset( $args->walker ) && is_object( $args->walker ) && method_exists( $args->walker, 'is_dropdown' ) )
        $items = str_replace( "<option></option>", "", $items );
    return $items;
}
add_filter('wp_nav_menu_items', 'ale_dropdown_remove_empty_items', 10, 2 );



/**
 * Navigation Menu Filter
 * @param array $items
 * @param object $menu
 * @param array $args
 * @return array
 */
function ale_archive_menu_filter($items, $menu, $args) {

    foreach ($items as &$item) {
        if ($item->object != 'ale-archive')
            continue;
        $item->url = get_post_type_archive_link($item->type);

        /* set current */
        if (get_query_var('post_type') == $item->type) {
            $item->classes [] = 'current-menu-item';
            $item->current = true;
        }
    }

    return $items;
}
add_filter( 'wp_get_nav_menu_items', 'ale_archive_menu_filter', 10, 3 );


