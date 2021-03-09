<?php include(locate_template('blocks/modules/layout_spacing.php')); ?>

<?php
    $style = get_sub_field( 'style' );
    $image = get_sub_field( 'image' );
    $meta = get_sub_field( 'meta' );
    $label = get_sub_field( 'label' );
    $title = get_sub_field( 'title' );

    $classes = '';
    if($style == 'style-2' && get_sub_field('background') == 'bg') {
        $classes = ' bg';
    }

    $label_content = false;
    $label_rows = get_sub_field('label');
    if($label_rows['icon_image'] || $label_rows['icon_animation'] || $label_rows['label']) {
        $label_content = true;
    }
       
?>

<section id="<?php the_sub_field('block_id'); ?>" class="block hero <?php echo $style; ?> <?php the_sub_field( 'content_position' ); ?><?php echo $classes; ?>" style="<?php echo $inline_style; ?>">

    <?php if($style == 'style-1' || $style == 'style-4') : ?>
        <?php if ( $image ) : ?>
            <div class="image" style="background-image:url(<?php echo $image['url']; ?>); background-size: <?php the_sub_field( 'image_size' ); ?>;">
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" class="visually-hidden" />
            </div>
        <?php endif; ?>
    <?php endif; ?>

	<div class="wrapper">
		<div class="row">


            <?php if($style == 'style-2' || $style == 'style-3') : ?>
                <div class="col">
                    <?php if($style == 'style-2' && get_sub_field('enable_embed_code') == 1 && get_sub_field('embed_code')) : ?>
                        <div class="embed-code">
                            <?php the_sub_field( 'embed_code' ); ?>
                        </div>
                    <?php else : ?>
                        <?php if ( $image ) : ?>
                            <div class="image" style="background-image:url(<?php echo $image['url']; ?>); background-size: <?php the_sub_field( 'image_size' ); ?>;" >
                                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" class="visually-hidden" />
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


			<div class="col">

                <?php if(get_sub_field( 'enable_meta' ) == 1 || $label_content || have_rows('title') || get_sub_field( 'title_blurb' ) || get_sub_field( 'content' ) || have_rows('buttons')) : ?>
                    
                    <div class="content">
                        <?php if($style == 'style-4' || $style == 'style-1' && get_sub_field( 'enable_meta' ) == 1) : ?>
                            <?php if ( have_rows( 'meta' ) ) : ?>
                                <div class="meta">
                                    <?php while ( have_rows( 'meta' ) ) : the_row(); ?>
                                        <?php include(locate_template('blocks/modules/icon.php')); ?>
                                        <div class="right">
                                            <?php sunrise_sunset(); ?>
                                            <?php if(get_sub_field( 'blurb' )) : ?>
                                                <p><?php echo the_sub_field( 'blurb' ); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if(get_sub_field( 'enable_meta' ) == null) : ?>
                            <?php if ( have_rows( 'label' ) ) : ?>
                                <?php while ( have_rows( 'label' ) ) : the_row(); ?>
                                    <?php include(locate_template('blocks/modules/icon.php')); ?>
                                    <?php if(get_sub_field('label')) : ?>
                                        <h1 class="label"><?php the_sub_field( 'label' ); ?></h1>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php include(locate_template('blocks/modules/title.php')); ?>

                        <?php if($style == 'style-1' && get_sub_field( 'title_blurb' )) : ?>
                            <p class="title-blurb"><?php the_sub_field( 'title_blurb' ); ?></p>
                        <?php endif; ?>

                        <?php the_sub_field( 'content' ); ?>
                        <?php include(locate_template('blocks/modules/buttons.php')); ?>
                    </div>
                <?php endif; ?>

			</div>
        </div>
        
        <?php if($style == 'style-1' && get_sub_field( 'enable_interactive_map_button' ) == 1) : ?>
            <?php $interactive_map_link = get_sub_field( 'interactive_map_link' ); ?>
            <?php if ( $interactive_map_link ) : ?>
                <a class="map-button" href="<?php echo esc_url( $interactive_map_link['url'] ); ?>" target="<?php echo esc_attr( $interactive_map_link['target'] ); ?>"><span><?php echo esc_html( $interactive_map_link['title'] ); ?></span></a>
            <?php endif; ?>
        <?php endif; ?>

    </div>

    <?php if($style == 'style-4' && get_sub_field( 'enable_inner_hero' ) == 1) : ?>
        <!-- Block inception -->
        <section class="block hero style-3 slider content-right">
            <div class="wrapper">
                <div class="items" data-id="1" data-slick='{
				"slidesToShow": 1, 
				"slidesToScroll": 1,
				"arrows": false,
				"dots": true, 
				"fade": true,
				"centerMode": false,
				"adaptiveHeight": true,
				"variableWidth": false,
				"autoplay": false,
				"autoplaySpeed": 6000,
				"responsive": [{"breakpoint": 768,"settings": {"arrows": false}}]
			}'>
                    <?php if ( have_rows( 'inner_hero_slider' ) ) : ?>
                        <?php while ( have_rows( 'inner_hero_slider' ) ) : the_row(); ?>
                            <div class="item">
                                <div class="row">
                                    <div class="col">
                                        <?php $slider_image = get_sub_field( 'image' ); ?>
                                        <div class="image"
                                            style="background-image:url(<?php echo esc_url( $slider_image['url'] ); ?>);">
                                                <img src="<?php echo esc_url( $slider_image['url'] ); ?>" alt="<?php echo esc_attr( $slider_image['alt'] ); ?>" class="visually-hidden" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="content">
                                            <?php include(locate_template('blocks/modules/icon.php')); ?>
                                            <?php if(get_sub_field('label')) : ?>
                                                <h1 class="label"><?php echo get_sub_field('label'); ?></h1>
                                            <?php endif; ?>
                                            <?php include(locate_template('blocks/modules/title.php')); ?>
                                            <?php echo get_sub_field('content'); ?>
                                            <?php include(locate_template('blocks/modules/buttons.php')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</section>