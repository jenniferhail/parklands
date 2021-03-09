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
								<?php the_location_type(get_the_ID()); ?>
								<?php if(get_field( 'map' )) : ?>
									<?php $map = get_field( 'map', get_the_ID()); ?>
									<?php if($map['address'] || $map['lat']) : ?>
										<div class="line">
											<a href="http://maps.google.com/maps/?z=12&t=m&q=<?php echo $map['address']; ?>&loc:<?php echo $map['lat']; ?>+<?php echo $map['lng']; ?>" class="link" target="_blank">Get Directions</a>
										</div>
									<?php endif; ?>
								<?php endif; ?>
								<?php the_event_date(); ?>
								<?php the_event_time(); ?>
							</div>
							<h2 class="title h2"><?php the_title(); ?></h2>
							<?php the_park(get_the_ID()); ?>
						</header>
						
						<div class="content">
							<?php the_field('short_description'); ?>
							<?php include(locate_template('blocks/modules/share.php')); ?>
							<?php if(get_field('book_now')) : ?>
								<div class="wp-block-buttons">
									<?php event_book_now_link(); ?>
								</div>
							<?php endif; ?>
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
