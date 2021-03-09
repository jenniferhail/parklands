<?php if ( get_field( 'enable_general_content_popup', 'option' ) == 1 ) : ?>
    <div id="modal-2" class="modal micromodal-slide block hero style-3 content-right" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-2-title">
                <div class="modal__wrapper">
                    <header class="modal__header">
                        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>
                    <main class="modal__content row" id="modal-2-content">
                        <div class="col">
                            <?php $general_popup_image = get_field( 'general_popup_image', 'option' ); ?>
                            <?php if ( $general_popup_image ) : ?>
                                <div class="image" style="background-image:url(<?php echo esc_url( $general_popup_image['url'] ); ?>);background-size:cover;background-position:50% 50%">
                                    <img src="<?php echo esc_url( $general_popup_image['url'] ); ?>" alt="<?php echo esc_attr( $general_popup_image['alt'] ); ?>" class="visually-hidden" />
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col">
                            <div class="content">
                               
                                <?php if ( get_field( 'general_popup_icon_enable_icon', 'option' ) == 1 ) : ?>
                                    <?php if(get_field('general_popup_icon_icon_type', 'option') == 'image') : ?>
                                        <?php $icon_image = get_field( 'general_popup_icon_icon_image', 'option' ); ?>
                                        <?php if ( $icon_image ) : ?>
                                            <div class="icon <?php the_field( 'general_popup_icon_icon_size', 'option' ); ?>">
                                                <img src="<?php echo esc_url( $icon_image['url'] ); ?>" alt="<?php echo esc_attr( $icon_image['alt'] ); ?>" />
                                            </div>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <div class="icon <?php the_field( 'general_popup_icon_icon_size', 'option' ); ?>">
                                            <?php echo do_shortcode(get_field('general_popup_icon_icon_animation', 'option')); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(get_field( 'general_popup_label', 'option' )) : ?>
                                    <h1 class="label"><?php the_field( 'general_popup_label', 'option' ); ?></h1>
                                    <h2 class="title h3"><?php the_field( 'general_popup_title', 'option' ); ?></h2>
                                <?php else : ?>
                                    <h1 class="title h3"><?php the_field( 'general_popup_title', 'option' ); ?></h1>
                                <?php endif; ?>
                                <?php if(get_field('general_popup_content', 'option')) : ?>
                                    <p class="copy"><?php the_field( 'general_popup_content', 'option' ); ?></p>
                                <?php endif; ?>
                                <?php if ( have_rows( 'general_popup_buttons_buttons', 'option' ) ) : ?>
                                    <div class="wp-block-buttons">
                                        <?php while ( have_rows( 'general_popup_buttons_buttons', 'option' ) ) : the_row(); ?>
                                            <?php $link = get_sub_field( 'link' ); ?>
                                            <?php if ( $link ) : ?>
                                                <div class="wp-block-button">
                                                    <a href="<?php echo esc_url( $link['url'] ); ?>" class="wp-block-button__link" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>