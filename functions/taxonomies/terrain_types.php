<?php
// Register Custom Taxonomy
function tax_terrain_types() {

	$labels = array(
		'name'                       => _x( 'Terrain Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Terrain Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Terrain Types', 'text_domain' ),
		'all_items'                  => __( 'All Terrain Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Terrain Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Terrain Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'          	 => true,
	);
	register_taxonomy( 'terrain_types', array( 'location', 'event' ), $args );

}
add_action( 'init', 'tax_terrain_types', 0 );