<?php include(locate_template('blocks/modules/layout_spacing.php')); ?>

<section id="<?php the_sub_field('block_id'); ?>" class="block video" style="<?php echo $inline_style; ?>">
    <?php include(locate_template('blocks/modules/intro.php')); ?>
    <div class="wrapper">
        <div class="row">
            <div class="col">
				<div class="embed-container">
					<?php the_sub_field( 'video' ); ?>
                </div>
			</div>
        </div>
    </div>
</section>