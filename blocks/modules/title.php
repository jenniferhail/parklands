<?php if ( have_rows( 'title' ) ) : ?>
	<h2 class="title">
		<?php while ( have_rows( 'title' ) ) : the_row(); ?>
			<span class="line <?php the_sub_field( 'font_size' ); ?> <?php the_sub_field( 'line_break' ); ?> <?php the_sub_field( 'font_color' ); ?>"><?php the_sub_field( 'line' ); ?></span>
		<?php endwhile; ?>
	</h2>
<?php endif; ?>