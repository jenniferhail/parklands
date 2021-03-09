<?php 
	get_header(); 

	$srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id() );
    $alt = get_post_meta ( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );

?>

<section class="block single profile align-center">
	<div class="wrapper">
		<div class="row">
            <div class="col">
				<?php if(get_the_post_thumbnail_url()) : ?>
					<div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>'); background-repeat: no-repeat; background-position: top center; background-size: cover;">
						<img class="visually-hidden" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>" srcset="<?php echo esc_attr( $srcset ); ?>">
					</div>
				<?php endif; ?>
                <div class="content">
					<div class="info">
						<ul class="list dots text-align-center">
							<li class="role"><?php the_field('position'); ?></li>
							<?php if(get_field('email')) : ?>
								<li class="email"><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></li> 
							<?php endif; ?>                       
						</ul>
					</div>
                    <h2 class="h3 name"><?php the_title(); ?></h2>
                    <?php the_field('bio'); ?>
				</div>
            </div>
		</div>
	</div>
</section>

	<?php if(acf_activated() && have_rows('blocks')) : ?>

		<?php while (acf_activated() && have_rows('blocks')) : the_row(); ?>
			<?php $block_type = get_row_layout(); ?>
			<?php include(locate_template('blocks/' . $block_type . '.php')); ?>
		<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer(); ?>
