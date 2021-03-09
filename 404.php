<?php 
get_header(); 

$inline_style = '';
	$styles = get_field('layout_spacing', 'option');
	foreach($styles as $style => $value) {
		if($value !== null && $value !== '') {
			$attr = str_replace('_','-',$style);
			$inline_style .= $attr . ': ' . $value . 'px; ';
		}
	}

?>
    <section class="block basic-content one-col error" style="<?php echo $inline_style; ?>">
        <div class="wrapper">
            <div class="row">
                <div class="col">
                    <div class="content">
                        <?php if(get_field('404_label', 'option')) : ?>
                            <h1 class="label"><?php the_field( '404_label', 'option' ); ?></h1>
                            <h2 class="title h2"><?php the_field( '404_title', 'option' ); ?></h2>
                        <?php else : ?>
                            <h1 class="title h2"><?php the_field( '404_title', 'option' ); ?></h1>
                        <?php endif; ?>
                        <p class="copy"><?php the_field( '404_content', 'option' ); ?></p>
                    </div>
                    <?php if ( have_rows( '404_buttons_buttons', 'option' ) ) : ?>
                        <div class="wp-block-buttons">
                            <?php while ( have_rows( '404_buttons_buttons', 'option' ) ) : the_row(); ?>
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
        </div>
    </section>

<?php get_footer(); ?>
