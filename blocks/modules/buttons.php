<?php if ( have_rows( 'buttons' ) ) : ?>
    <div class="wp-block-buttons">
        <?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
            <?php $link = get_sub_field( 'link' ); ?>
            <?php if ( $link ) : ?>
                <div class="wp-block-button">
                    <a href="<?php echo esc_url( $link['url'] ); ?>" class="wp-block-button__link" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>