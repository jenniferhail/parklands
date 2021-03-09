<?php
    // =========================================================================
    // ADD RSS LINKS TO HEAD SECTION
    // =========================================================================
    add_theme_support('automatic-feed-links');

    // =========================================================================
    // ENABLES FEATURED IMAGES FOR PAGES AND POSTS
    // =========================================================================
    // This enables post thumbnails for all post types,
    // if you want to enable this feature for specific post types,
    // use the array to include the type of post
    ## add_theme_support('post-thumbnails', array('post', 'page'));
    add_theme_support('post-thumbnails');

    // =========================================================================
    // TITLE TAG - RECOMMENDED
    // =========================================================================
    // Since Version 4.1, themes should use add_theme_support() in the functions.php
    // file in order to support title tag
    function theme_slug_setup() {
        add_theme_support('title-tag');
    }

    // =========================================================================
    // REGISTER MENUS
    // =========================================================================
    function mightily_register_nav_menu(){
        register_nav_menus( array(
            'top-menu' => __( 'Top Menu', 'text_domain' ),
            'bottom-menu' => __( 'Bottom Menu', 'text_domain' ),
            'hamburger-menu' => __( 'Hamburger Menu', 'text_domain' ),
            'footer-menu'  => __( 'Footer Menu', 'text_domain' ),
        ) );
    }

    // =========================================================================
    // SVG UPLOADS - ALLOWING SVG UPLOADS TO WORDPRESS
    // =========================================================================
    function mightily_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
      }

    // =========================================================================
    // Color Palette - ass support for editor color palette
    // =========================================================================
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => __( 'Yellow', 'mightily' ),
            'slug'  => 'yellow',
            'color'	=> '#edbd6c',
        ),
        array(
            'name'  => __( 'Light Yellow', 'mightily' ),
            'slug'  => 'light-yellow',
            'color' => '#fef4e2',
        ),
        array(
            'name'  => __( 'Green', 'mightily' ),
            'slug'  => 'green',
            'color' => '#588c9a',
        ),
        array(
            'name'  => __( 'Light Green', 'mightily' ),
            'slug'  => 'light-green',
            'color'	=> '#dee8eb',
        ),
        array(
            'name'  => __( 'Red', 'mightily' ),
            'slug'  => 'red',
            'color' => '#ac463b',
        ),
        array(
            'name'  => __( 'Light Red', 'mightily' ),
            'slug'  => 'light-red',
            'color' => '#f4edeb',
        ),
        array(
            'name'  => __( 'Grey', 'mightily' ),
            'slug'  => 'grey',
            'color'	=> '#686b79',
        ),
        array(
            'name'  => __( 'Light Grey', 'mightily' ),
            'slug'  => 'light-grey',
            'color' => '#f7f8f9',
        ),
        array(
            'name'  => __( 'Black', 'mightily' ),
            'slug'  => 'black',
            'color' => '#000000',
        ),
        array(
            'name'  => __( 'White', 'mightily' ),
            'slug'  => 'white',
            'color'	=> '#ffffff',
        ),
    ) );
