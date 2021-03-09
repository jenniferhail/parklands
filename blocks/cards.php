<?php include(locate_template('blocks/modules/layout_spacing.php')); ?>

<?php
    $style = get_sub_field('style');
    $classes = '';
    if($style == 'style-2') {
        $classes = ' ' . get_sub_field('background') . ' ' . get_sub_field('alignment') . ' ' . get_sub_field('columns');
    }

?>
<section id="<?php the_sub_field('block_id'); ?>" class="block cards <?php echo $style . $classes; ?>" style="<?php echo $inline_style; ?>">
    <?php include(locate_template('blocks/modules/intro.php')); ?>
    <div class="wrapper">
        <div class="row">
            <?php if ( have_rows( 'cards' ) ) : ?>
                <?php while ( have_rows( 'cards' ) ) : the_row(); ?>
                    <div class="col">

                        <!-- Style 1 Image -->
                        <?php if($style == 'style-1') : ?>
                            <?php $image = get_sub_field( 'image' ); ?>
                                <?php if ( $image ) : ?>
                                    <div class="image" style="background-image:url(<?php echo esc_url( $image['url'] ); ?>); background-position: <?php the_sub_field( 'image_alignment' ); ?>">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="visually-hidden" />
                                        <div class="card-title">
                                            <h2 class="h3"><?php the_sub_field( 'label' ); ?></h2>
                                        </div>
                                    </div>
                                <?php endif; ?>
                        <?php endif; ?>

                        <!-- Styles 2 Optional Icon - Image or Animation -->
                        <?php if($style == 'style-2' && get_sub_field('enable_icon') == 1) : ?>
                            <?php if(get_sub_field('icon_type') == 'image') : ?>
                                <?php $icon_image = get_sub_field( 'icon_image' ); ?>
                                <?php if ( $icon_image ) : ?>
                                    <div class="icon">
                                        <img src="<?php echo esc_url( $icon_image['url'] ); ?>" alt="<?php echo esc_attr( $icon_image['alt'] ); ?>" />
                                    </div>
                                <?php endif; ?>
						    <?php else : ?>
                                <div class="icon">
                                    <?php echo do_shortcode(get_sub_field('icon_animation')); ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                                
                        <div class="content">
                            <?php if($style == 'style-1') : ?>
                                <h1 class="title h3"><?php the_sub_field( 'title' ); ?></h1>
                            <?php else : ?>
                                <h1 class="title h4"><?php the_sub_field( 'title' ); ?></h1>
                            <?php endif; ?>
                        
                            <?php if($style == 'style-2' && get_sub_field('blurb')) : ?>
                                <p class="blurb"><?php the_sub_field('blurb'); ?></p>
                            <?php endif; ?>

                            <?php the_sub_field( 'content' ); ?>
                            <?php include(locate_template('blocks/modules/buttons.php')); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>