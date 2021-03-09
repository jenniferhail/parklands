<?php
    //======================================================================
    // Dynamically load membership levels in the Member Perks Block
    //======================================================================
    function acf_load_member_field_choices( $field ) {
        // reset choices
        $field['choices'] = array();
            // if has rows
        if( have_rows('member_levels', 'option') ) {
        
            // while has rows
            while( have_rows('member_levels', 'option') ) {
                
                // instantiate row
                the_row();
                
                
                // vars
                $title = strip_tags(get_sub_field('title'));
                // $label = get_sub_field('label');

                
                // append to choices
                $field['choices'][ $title ] = $title;
                
            }
        
        }
        // return the field
        return $field;
    }

    //======================================================================
    // Customize ACF JSON save folder
    //======================================================================
    function acf_json_save_point( $path ) {
        
        // update path
        $path = get_stylesheet_directory() . '/functions/acf/json/';
        
        // return
        return $path;
        
    }
    add_filter('acf/settings/save_json', 'acf_json_save_point');

    //======================================================================
    // Customize ACF JSON load folder
    //======================================================================
    function acf_json_load_point( $paths ) {
        
        // remove original path (optional)
        unset($paths[0]);
        
        // append path
        $paths[] = get_stylesheet_directory() . '/functions/acf/json/';
        
        // return
        return $paths;
        
    }
    add_filter('acf/settings/load_json', 'acf_json_load_point');

    //======================================================================
    // Disable ACF settings screen for non-admin users
    //======================================================================
    function acf_show_admin( $show ) {
        return current_user_can('manage_options');
    }
    add_filter('acf/settings/show_admin', 'acf_show_admin');

    //======================================================================
    // Adding support for Google Maps API
    //======================================================================
    function acf_google_map_api( $api ){
        $api['key'] = 'AIzaSyBmmB9fEaOMfnyY5Y-TIEnTl_SN73LovTI';
        return $api;
    }
    add_filter('acf/fields/google_map/api', 'acf_google_map_api');

    //======================================================================
    // Checking if ACF is Activated
    //======================================================================
    function acf_activated() {
        if (function_exists('get_field')) {
            return true;
        }
        return false;
    }

    //======================================================================
    // SPEED UP ACF
    //======================================================================
    add_filter('acf/settings/remove_wp_meta_box', '__return_true');
    
    //======================================================================
    // ACF Responsive Image
    //======================================================================
    function acf_responsive_image($image_id, $image_size, $max_width) {

        // check the image ID is not blank
        if ($image_id != '') {

            // set the default src image size
            $image_src = wp_get_attachment_image_url($image_id, $image_size);

            // set the srcset with various image sizes
            $image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);

            // generate the markup for the responsive image
            echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
        }
    }

	//======================================================================
    // ADD OPTIONS PAGE
    //======================================================================
	if ( function_exists( 'acf_add_options_page' ) ) {

		acf_add_options_page( array(
			'page_title'	=> 'Site Options',
			'menu_title'	=> 'Site Options',
			'menu_slug' 	=> 'acf-site-options',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
		));
	
	}