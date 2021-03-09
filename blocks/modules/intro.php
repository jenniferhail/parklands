<?php if ( get_sub_field( 'enable_intro' ) == 1 ) : ?>
	<div class="intro">
		<div class="wrapper">
			<div class="content">
				<!-- Optional Label. If no label is present, the Title becomes the H1 -->
				<?php if(get_sub_field('label')) : ?>
					<h1 class="label"><?php the_sub_field('label'); ?></h1>
				<?php endif; ?>
				<?php if(have_rows('intro_title')) : while(have_rows('intro_title')) : the_row(); ?>
					<?php include(locate_template('blocks/modules/title.php')); ?>
				<?php endwhile; endif; ?>
				<?php the_sub_field( 'content' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>