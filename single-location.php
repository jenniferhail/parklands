<?php get_header(); ?>
	<section class="block single post item">
		<article class="article">
			<div class="wrapper">
				<div class="row">
					<div class="col clearfix">

						<?php $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id() ); ?>
						<?php if($srcset) : ?>
							<figure class="image float-right">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" srcset="<?php echo esc_attr( $srcset ); ?>">
							</figure>
						<?php endif; ?>

						<header class="meta">
							<div class="item-header">
								<?php the_activities(get_the_ID()); ?>
								<ul class="list dots">
									<?php the_distance(); ?>
									<?php the_duration(); ?>
									<?php the_difficulty(get_the_ID()); ?>
								</ul>
								<?php the_location_type(get_the_ID()); ?>
								<?php the_directions(); ?>
							</div>
							<h2 class="title h2"><?php the_title(); ?></h2>
							<?php the_park(get_the_ID()); ?>
						</header>
						
						<div class="content">
							<?php the_field( 'short_description' ); ?>
							<?php include(locate_template('blocks/modules/share.php')); ?>
							<?php include(locate_template('blocks/modules/buttons.php')); ?>
						</div>

					</div>
				</div>
			</div>
		</article>
	</section>

	<?php if(acf_activated() && have_rows('blocks')) : ?>

		<?php while (acf_activated() && have_rows('blocks')) : the_row(); ?>
			<?php $block_type = get_row_layout(); ?>
			<?php include(locate_template('blocks/' . $block_type . '.php')); ?>
		<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer(); ?>
