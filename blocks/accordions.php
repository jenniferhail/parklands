<?php include(locate_template('blocks/modules/layout_spacing.php')); ?>

<section id="<?php the_sub_field('block_id'); ?>" class="block accordions" style="<?php echo $inline_style; ?>">
	<?php include(locate_template('blocks/modules/intro.php')); ?>
	<div class="wrapper">
		<?php if ( have_rows( 'accordions' ) ) : $i = 1; ?>
		<?php while ( have_rows( 'accordions' ) ) : the_row(); ?>
			<?php if($i == 1) : ?>
				<details class="accordion active" open>
					<summary class="title">
						<h2><?php the_sub_field( 'title' ); ?></h2>
					</summary>
					<div class="content" style="display: block;">
						<?php the_sub_field( 'content' ); ?>
					</div>
				</details>
			<?php else : ?>
				<details class="accordion" open>
					<summary class="title">
						<h2><?php the_sub_field( 'title' ); ?></h2>
					</summary>
					<div class="content">
						<?php the_sub_field( 'content' ); ?>
					</div>
				</details>
			<?php endif;?>
		
		<?php $i++; endwhile; ?>
		<?php endif; ?>
	</div>
</section>