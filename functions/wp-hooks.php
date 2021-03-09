<?php
    //======================================================================
    // WORDPRESS ACTIONS
    //======================================================================
    add_action('wp_enqueue_scripts', 'mightyResources');

    add_action('after_setup_theme', 'theme_slug_setup');
    add_action('wp_head', 'add_meta_tags', 1);
    add_action( 'after_setup_theme', 'mightily_register_nav_menu', 0 ); // Register Nav Menus
    add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 ); // removing Gutenberg css from the front end
    add_action( 'init', 'add_taxonomies_to_pages' ); // Adding Park Taxonomy to Pages
    add_action( 'after_setup_theme', 'adding_custom_image_size' ); // Adding a custom image size


    add_action('wp_footer', 'init_slick_sliders', 100); // Adding Slick JS to the footer

    remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
    remove_action('wp_head', 'wp_generator'); // remove wordpress version
    remove_action('wp_head', 'feed_links', 2); // remove rss feed links
    remove_action('wp_head', 'feed_links_extra', 3); // remove all extra rss feed links
    remove_action('wp_head', 'index_rel_link'); // remove link to index page
    remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
    remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'rest_output_link_wp_head'); // remove JSON link from head
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

    //======================================================================
    // WORDPRESS FILTERS
    //======================================================================
    add_filter('embed_oembed_html', 'video_embed_wrapper', 10, 3);
    add_filter('video_embed_html', 'video_embed_wrapper'); // Jetpack
    add_filter('excerpt_more', 'new_excerpt_more');
    add_filter('jpg_quality', 'high_jpg_quality');
    add_filter('upload_mimes', 'mightily_mime_types'); // Allowing SVG uploads to WP
    add_filter( 'image_size_names_choose', 'my_custom_sizes' ); //Adding new image size to the Media Library


    //======================================================================
    // FACETWP
    //======================================================================
    add_action( 'wp_footer', 'fwp_add_facet_labels', 100 ); // Adding labels to facets
    add_action('wp_footer', 'add_facetwp_submit', 100); // Adding submit/reset buttons to facet search
    add_action('wp_footer', 'add_facetwp_map_reset', 100); // Adding reset button to facet map
    add_action('wp_footer', 'disable_map_filtering', 100); // Disabling/hiding the Map Filter

    //======================================================================
    // ACF
    //======================================================================
    add_filter('acf/fields/flexible_content/layout_title', 'my_acf_fields_flexible_content_layout_title', 10, 4); // Adding 'style' labels to acf flex layouts (they show in the editor)
    add_filter('acf/load_field/key=field_5fa590be72fce', 'acf_load_member_field_choices'); // Dynamically loading the Member Levels for the Member Perks Chart
