<?php 
    $button_text = 'View Location';

    if(get_post_type() == 'event') {
        $button_text = 'View Event';
    }
    if(get_post_type() == 'post') {
        $button_text = 'View Article';
    }
    if(get_post_type() == 'page') {
        $button_text = 'View Page';
    }

    $srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id() );
    $alt = get_post_meta ( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
?>

<li id="post-<?php the_ID(); ?>" class="item <?php echo get_post_type(); ?>">
    <?php if(get_post_type() !== 'people') : ?>
        <div class="item-header">

            <?php if(get_post_type() == 'location') : ?>
                <?php the_activities(get_the_ID()); ?>
                <ul class="list dots">
                    <?php the_distance(); ?>
                    <?php the_duration(); ?>
                    <?php the_difficulty(get_the_ID()); ?>
                </ul>
                <?php the_location_type(get_the_ID()); ?>
            <?php endif; ?>

            <?php if(get_post_type() == 'post') : ?>
                <?php the_post_category(get_the_ID()); ?>
                <?php the_post_date(); ?>
                <?php the_post_author(get_the_ID()); ?>
            <?php endif; ?>

            <?php if(get_post_type() == 'event') : ?>
                <?php the_activities(get_the_ID()); ?>
                <?php the_event_date(); ?>
                <?php the_event_time(); ?>
            <?php endif; ?>

        </div>
    
        <?php if(get_the_post_thumbnail_url()) : ?>
            <img class="image" src="<?php echo get_the_post_thumbnail_url(); ?>" srcset="<?php echo esc_attr( $srcset ); ?>">
        <?php endif; ?>

        <h2 class="title h4"><?php the_title(); ?></h2>

        <?php the_park(get_the_ID()); ?>

        <div class="wp-block-buttons">
            <div class="wp-block-button">
                <a href="<?php the_permalink(); ?>" class="wp-block-button__link"><?php echo $button_text; ?></a>
            </div>
            <?php if(get_post_type() == 'event') : event_book_now_link(); endif;?>
        </div>
    <?php endif; ?>

    <?php if(get_post_type() == 'people') : ?>
        <?php if(get_the_post_thumbnail_url()) : ?>
            <div class="image" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" srcset="<?php echo esc_attr( $srcset ); ?>"  alt="<?php echo $alt; ?>" class="visually-hidden" />
            </div>
        <?php endif; ?>
        <?php if(profile_link(get_the_ID())) : ?>
            <h2 class="title h4"> <a href="<?php the_permalink(); ?>" class="profile-link"><?php the_title(); ?></a></h2>
        <?php else : ?>
            <h2 class="title h4"><?php the_title(); ?></h2>
        <?php endif; ?>
        <p class="label"><?php the_field('position'); ?><?php if(get_field('company')) : echo ', ' . get_field('company'); endif; ?></p>
    <?php endif; ?>
    
</li>