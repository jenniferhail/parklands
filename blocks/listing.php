<?php include(locate_template('blocks/modules/layout_spacing.php')); ?>

<?php

    $post_type = get_sub_field( 'post_type' );
    $tax_query = ['relation' => 'AND'];
    $orderby = get_sub_field('orderby');
    $posts_per_page = get_sub_field('posts_per_page');
    $meta_key = '';
    $meta_type = '';
    $meta_query[] = '';
    $post__not_in = '';

    if(get_sub_field('posts_per_page') == null) {
        $posts_per_page = -1;
    }
    
    if($post_type == 'event' && get_sub_field('orderby') == 'date') {
        $meta_key = 'start_date';
        $orderby = 'meta_value';
        $meta_type = 'DATE';
    }

    if($post_type == 'people' && get_sub_field('orderby') == 'title') {
        $meta_key = 'last_name';
        $orderby = 'meta_value';
        $meta_type = '';
    }

    if($post_type != 'people' && get_sub_field( 'parks' )) {
        $tax_query = update_tax_query($tax_query, 'parks', get_sub_field( 'parks' ));
    }

    if($post_type != 'people' && get_sub_field( 'location_types' )) {
        $tax_query = update_tax_query($tax_query, 'location_types', get_sub_field( 'location_types' ));
    }

    if($post_type != 'people' && get_sub_field( 'amenities' )) {
        $tax_query = update_tax_query($tax_query, 'amenities', get_sub_field( 'amenities' ));
    }

    if($post_type != 'people' && get_sub_field( 'activities' )) {
        $tax_query = update_tax_query($tax_query, 'activities', get_sub_field( 'activities' ));
    }

    if($post_type == 'post' && get_sub_field( 'category' )) {
        $tax_query = update_tax_query($tax_query, 'category', get_sub_field( 'category' ));
    }

    if($post_type == 'people' && get_sub_field( 'people_categories' )) {
        $tax_query = update_tax_query($tax_query, 'people_categories', get_sub_field( 'people_categories' ));
    }

    if($post_type == 'location' && get_sub_field('exclude_location_type') && get_sub_field('exclude')) {
        $tax_query = update_tax_query($tax_query, 'location_types', get_sub_field( 'exclude' ), 'NOT IN');
    }

    if($post_type == 'people') {
        $post__not_in = array(4884);
    }


    $author = '';
    if(is_array(get_sub_field('author'))) {
        $author = implode(get_sub_field('author'));
    }


    if($post_type == 'post' && get_sub_field('author')) {
        array_push($meta_query,array(
            'key'       => 'author',
            'value'     => $author,
            'compare'   => 'LIKE',
        ));
    } else {
        $meta_query[] = '';
    }



    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => $posts_per_page,
        'order'             => get_sub_field( 'order' ),
        'orderby'           => $orderby,
        'meta_key'          => $meta_key,
        'meta_type'         => $meta_type,
        'tax_query'         => $tax_query,
        'meta_query'        => $meta_query,
        'post__not_in'      => $post__not_in,
        'facetwp'           => true,
    );
    $query = new WP_Query( $args );

?>
<?php if(check_for_alert_tax_query($query)) : ?>
    <section id="<?php the_sub_field('block_id'); ?>" class="block listing <?php echo $post_type; ?> <?php echo grid_type($post_type); ?>" style="<?php echo $inline_style; ?>">
        <?php include(locate_template('blocks/modules/intro.php')); ?>
        <div class="wrapper">
            <div class="row">

                <?php if(get_sub_field( 'enable_filters' )) : ?>
                    <?php the_filters(get_sub_field( 'post_type' )); ?>
                <?php endif; ?>

                <ul class="items">

                    <?php if(get_sub_field( 'post_type' ) != 'custom') : ?>
                        <?php // Setting up the regular WP Query for our listing ?>
                        <?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
                            <?php include(locate_template('blocks/items/item.php')); ?>
                        <?php endwhile; ?>

                        <?php else : ?>
                            <div class="no-results">
                                <h2>There are no alerts at this time.</h2>
                            </div>
                        <?php endif; ?>

                        <?php wp_reset_query(); ?>

                    <?php else : ?>

                        <?php // Setting up the custom ACF Query for our listing ?>
                        <?php $custom_list = get_sub_field( 'custom_list' ); ?>
                        <?php if ( $custom_list ) : ?>

                            <?php foreach ( $custom_list as $post ) : ?>
                                <?php setup_postdata ( $post ); ?>
                                <?php include(locate_template('blocks/items/item.php')); ?>
                            <?php endforeach; ?>

                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <div class="no-results">
                                <h2>No selection has been made.</h2>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <?php if(get_sub_field( 'post_type' ) != 'custom') : ?>
                    <?php if ( get_sub_field( 'enable_load_more' )) : ?>
                        <?php echo facetwp_display( 'facet', 'load_more' ); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php elseif($query->found_posts > 0) : ?>
    <section id="<?php the_sub_field('block_id'); ?>" class="block listing <?php echo $post_type; ?> <?php echo grid_type($post_type); ?>" style="<?php echo $inline_style; ?>">
        <?php include(locate_template('blocks/modules/intro.php')); ?>
        <div class="wrapper">
            <div class="row">

                <?php if(get_sub_field( 'enable_filters' )) : ?>
                    <?php the_filters(get_sub_field( 'post_type' )); ?>
                <?php endif; ?>

                <ul class="items">

                    <?php if(get_sub_field( 'post_type' ) != 'custom') : ?>
                        <?php // Setting up the regular WP Query for our listing ?>
                        <?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
                            <?php include(locate_template('blocks/items/item.php')); ?>
                        <?php endwhile; ?>

                        <?php else : ?>
                            <div class="no-results">
                                <h2>No listing content found for that selection.</h2>
                            </div>
                        <?php endif; ?>

                        <?php wp_reset_query(); ?>

                    <?php else : ?>

                        <?php // Setting up the custom ACF Query for our listing ?>
                        <?php $custom_list = get_sub_field( 'custom_list' ); ?>
                        <?php if ( $custom_list ) : ?>

                            <?php foreach ( $custom_list as $post ) : ?>
                                <?php setup_postdata ( $post ); ?>
                                <?php include(locate_template('blocks/items/item.php')); ?>
                            <?php endforeach; ?>

                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <div class="no-results">
                                <h2>No selection has been made.</h2>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <?php if(get_sub_field( 'post_type' ) != 'custom') : ?>
                    <?php if ( get_sub_field( 'enable_load_more' )) : ?>
                        <?php echo facetwp_display( 'facet', 'load_more' ); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>