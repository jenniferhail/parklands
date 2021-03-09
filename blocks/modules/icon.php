<?php if ( get_sub_field( 'enable_icon' ) == 1 ) : ?>
    <?php if(get_sub_field('how_many') == 'one') : ?>
        <?php if(get_sub_field('icon_type') == 'image') : ?>
            <?php $icon_image = get_sub_field( 'icon_image' ); ?>
            <?php if ( $icon_image ) : ?>
                <div class="icon <?php the_sub_field( 'icon_size' ); ?>">
                    <img src="<?php echo esc_url( $icon_image['url'] ); ?>" alt="<?php echo esc_attr( $icon_image['alt'] ); ?>" />
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="icon <?php the_sub_field( 'icon_size' ); ?>">
                <?php echo do_shortcode(get_sub_field('icon_animation')); ?>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <?php if ( have_rows( 'icons' ) ) : ?>
            <?php while ( have_rows( 'icons' ) ) : the_row(); ?>

            <?php if(get_sub_field('icon_type') == 'image') : ?>
                <?php $icon_image = get_sub_field( 'icon_image' ); ?>
                <?php if ( $icon_image ) : ?>
                    <div class="icon icon-small">
                        <img src="<?php echo esc_url( $icon_image['url'] ); ?>" alt="<?php echo esc_attr( $icon_image['alt'] ); ?>" />
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="icon icon-small">
                    <?php echo do_shortcode(get_sub_field('icon_animation')); ?>
                </div>
            <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>
    <?php endif; ?>


<?php endif; ?>