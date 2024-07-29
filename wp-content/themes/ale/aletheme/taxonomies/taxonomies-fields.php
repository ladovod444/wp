<?php

if(class_exists('Tax_Meta_Class')) {
    if (is_admin()) {
        /*
         * prefix of meta keys, optional
         */
        $prefix = 'ale_';
        /*
         * configure your meta box
         */
        $config_location = array(
            'id' => 'ale_custom_icon',
            // meta box id, unique per meta box
            'title' => esc_html__('Category Icon','ale'),
            // meta box title
            'pages' => array('work-category'),
            // taxonomy name, accept categories, post_tag and custom taxonomies
            'context' => 'normal',
            // where the meta box appear: normal (default), advanced, side; optional
            'fields' => array(),
            // list of meta fields (can be added by field arrays)
            'local_images' => true,
            // Use local or hosted images (meta box images for add/remove)
            'use_with_theme' => true
            //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
        );


        /*
         * Initiate your meta box
         */
        $location_icon = new Tax_Meta_Class($config_location);


        $location_icon->addImage($prefix . 'image_field_id', array('name' => esc_html__('Category Icon ', 'ale')));


        /*
         * Don't Forget to Close up the meta box decleration
         */
        //Finish Meta Box Decleration
        $location_icon->Finish();
    }
}
