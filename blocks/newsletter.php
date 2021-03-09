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
					<div class="wp-block-buttons">
						<div class="wp-block-button">
							<a data-micromodal-trigger="modal-1" href="#" class="wp-block-button__link"><?php the_sub_field( 'newsletter_popup_button_text' ); ?></a>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
</section>