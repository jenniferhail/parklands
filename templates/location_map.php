<?php
/* Template Name: Location Map */
get_header();
?>

<?php
    $args = array(
        'post_type' => ['location'],
        'posts_per_page' => '-1',
        'facetwp' => true,
    );
    $query = new WP_Query( $args );
?>

<?php //when bringing the filters into the markup it causes problems ?>

<section class="block interactive-map">
    <div class="wrapper">
        <button class="map-btn"><span>Map Legend</span></button>
        <div class="side-panel">
            <button class="close-btn">
                <span class="toggle-wrapper">
                    <span class="toggle-bar toggle-bar-1"></span>
                    <span class="toggle-bar toggle-bar-2"></span>
                    <span class="toggle-bar toggle-bar-3"></span>
                    <span class="toggle-bar toggle-bar-4"></span>
                </span>
                <span class="visually-hide-text">Close Map Legend</span>
            </button>
            <h1 class="title h3">Map Filters</h1>
            <div class="fieldset map-filters">
                <?php //echo facetwp_display( 'facet', 'location_map_prox' ); ?>
                <?php echo facetwp_display( 'facet', 'park' ); ?>
                <?php echo facetwp_display( 'facet', 'activity' ); ?>
                <?php echo facetwp_display( 'facet', 'location_types' ); ?>
                <?php echo facetwp_display( 'facet', 'amenities' ); ?>
                <?php echo facetwp_display( 'facet', 'difficulty' ); ?>
                <?php echo facetwp_display( 'facet', 'duration' ); ?>
                <?php echo facetwp_display( 'facet', 'distance' ); ?>
            </div>
        </div>
        <div class="map">
            <?php echo facetwp_display( 'facet', 'location_map' ); ?>
        </div>
    </div>
</section>

<div class="jail-containment-unit">
    <?php //This can not be in the same div as our filters. ?>
    <?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
                
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
