<?php include(locate_template('blocks/modules/layout_spacing.php')); ?>

<section id="<?php the_sub_field('block_id'); ?>" class="block basic-content <?php the_sub_field( 'background' ); ?> one-col" style="<?php echo $inline_style; ?>">
    <?php include(locate_template('blocks/modules/icon.php')); ?>
    <div class="wrapper">
		<div class="row">
			<div class="col">
				<div class="content">
					<?php if(get_sub_field('label')) : ?>
						<h1 class="label"><?php the_sub_field( 'label' ); ?></h1>
					<?php endif; ?>
					<?php the_sub_field( 'content' ); ?>
					<?php if ( get_sub_field( 'enable_embed_code' ) == 1 ) : ?>
						<div class="embed-code">
							<?php the_sub_field( 'embed_code' ); ?>
						</div>
					<?php endif; ?>
                    <?php include(locate_template('blocks/modules/buttons.php')); ?>
                </div>
			</div>
		</div>
	</div>
</section>