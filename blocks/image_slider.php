<?php include(locate_template('blocks/modules/layout_spacing.php')); ?>

<?php $image_images = get_sub_field( 'image' ); ?>
    <section id="<?php the_sub_field('block_id'); ?>" class="block slider gallery" data-menutitle="Sliders" style="<?php echo $inline_style; ?>">
    <?php include(locate_template('blocks/modules/intro.php')); ?>   
    <?php if ( $image_images ) :  ?>
        <div class="wrapper">
            <div class="items" data-id="1" data-slick='{
                "slidesToShow": 3, 
                "slidesToScroll": 1,
                "arrows": true, 
                "fade": false,
                "centerMode": true,
                "adaptiveHeight": false,
                "variableWidth": true,
                "responsive": [{"breakpoint": 768,"settings": {"arrows": true}}]
            }'>
                <?php foreach ( $image_images as $image_image ): ?>
                    <div class="item">
                        <a href="<?php echo esc_url( $image_image['sizes']['large'] ); ?>">
                            <img src="<?php echo esc_url( $image_image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image_image['alt'] ); ?>" />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>