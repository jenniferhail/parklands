<?php
/* Template Name: Search Results */
get_header();
?>

<?php if(acf_activated() && have_rows('blocks')) : ?>

<?php while (acf_activated() && have_rows('blocks')) : the_row(); ?>
    <?php $block_type = get_row_layout(); ?>
    <?php include(locate_template('blocks/' . $block_type . '.php')); ?>
<?php endwhile; ?>

<?php endif; ?>

<section class="block search-results">
	<div class="wrapper">
        <?php if(facetwp_activated()) : ?>
            <?php get_template_part('inc/search/search-form'); ?>
            <div class="fieldset filters">
                <?php get_template_part('inc/search/search-panel'); ?>
            </div>
            <div class="query">
                <section class="block listing locations grid-thirds-left">
                    <div class="wrapper">
                        <div class="row">
                            <ul class="items">
                                <?php get_template_part('inc/search/search-query'); ?>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>

        <?php else : ?>
            <h1>Error: FacetWP is not installed or activated.</h1>
        <?php endif; ?>
        <?php echo facetwp_display( 'facet', 'load_more' ); ?>
	</div>
</section>

<?php get_footer(); ?>
