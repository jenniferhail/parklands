<?php include(locate_template('blocks/modules/layout_spacing.php')); ?>

<?php 
$icons = get_sub_field('icons');
$terms = get_terms( array(
    'taxonomy' => 'activities',
	'hide_empty' => false,
	'include' => $icons,
) );
?>

<section id="<?php the_sub_field('block_id'); ?>" class="block listing activities grid-small" style="<?php echo $inline_style; ?>">
	<?php include(locate_template('blocks/modules/intro.php')); ?>
	<div class="wrapper">
        <div class="row">
			<ul class="items">
				<?php foreach($terms as $term) : ?>
					<?php $icon = get_field('icon', 'activities_' . $term->term_id); ?>
					<li class="item activity small">
						<p class="name"><?php echo $term->name; ?></p>
						<div class="icon">
							<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">
						</div>
					</li>
				<?php endforeach; ?>
            </ul>
        </div>
	</div>
</section>