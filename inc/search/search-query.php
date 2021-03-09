<?php
    $args = array(
        'post_type' => ['post', 'page', 'location'],
        'posts_per_page' => 10,
        'facetwp' => true,
        'meta_query' => array(
            'relation'  => 'OR',
            array(
                'key'     => 'hide_from_search',
                'value'   => 1,
                'compare' => 'NOT IN',
            ),
            array(
                'key' => 'hide_from_search',
                'compare' => 'NOT EXISTS' // this should work...
               ),
        ),
    );
    $query = new WP_Query( $args );
?>

<?php //Look in functions/helpers.php for functions below. ?>

<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>

    <?php include(locate_template('blocks/items/item.php')); ?>

<?php endwhile; endif; ?>