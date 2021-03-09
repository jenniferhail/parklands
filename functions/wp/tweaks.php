<?php
    //======================================================================
    // ADD CUSTOM IMAGE SIZE
    //======================================================================
    add_theme_support( 'post-thumbnails' );
    function adding_custom_image_size() {
        add_image_size( 'custom-medium-size', 640, 360 );
    }
    function my_custom_sizes( $sizes ) {
        return array_merge( $sizes, array(
            'custom-medium-size' => __( 'Custom Medium Size' ),
        ) );
    }
    //======================================================================
    // ADD PARK TAX TO PAGES
    //======================================================================
    function add_taxonomies_to_pages() {
    register_taxonomy_for_object_type( 'parks', 'page' );
    }
    
    //======================================================================
    // REMOVE GUTENBERG FRONT-END CSS
    //======================================================================
    function smartwp_remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
    } 

    //======================================================================
    // ADD 'STYLE' LABELS TO ACF FLEX CONTENT LAYOUTS
    //======================================================================
    function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

        $style = get_sub_field('style');
        if($style) {
            $title = $title . ' (' . $style . ')';
        }

        return $title;
    }

    //======================================================================
    // ADD AN ADMIN SCRIPT TO MANAGE JS
    //======================================================================
    function admin_resources() {
        wp_register_script('admin_script', get_stylesheet_directory_uri() . '/app/assets/js/admin-scripts.min.js');
        wp_enqueue_script('admin_script');
    }
    add_action('admin_enqueue_scripts', 'admin_resources');

    // =========================================================================
    // REGISTERING SIDEBAR
    // =========================================================================
    if (function_exists('register_sidebar')) {
        register_sidebar([
            'name' => 'Sidebar Widgets',
            'id'   => 'sidebar-widgets',
            'description'   => 'These are widgets for the sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ]);
    }

    // =========================================================================
    // ENABLES 100% JPEG QUALITY
    // =========================================================================
    // Wordpress will compress uploads to 90% of their original size
    function high_jpg_quality() {
        return 100;
    }
