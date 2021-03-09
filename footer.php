</main>
<footer>
    <div class="wrapper">
        <a class="logo" href="/" target="_self">
            <img class="svg" src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/logo.svg" alt="Parklands Home Page">
        </a>

        <p class="green-txt tagline"><i>A visitor-supported public park</i></p>
        
        <?php if( have_rows('social', 'option') ) : ?>
                <ul class="social-menu">
                    <?php while(have_rows('social', 'option')) : the_row(); ?>
                    <?php
                        $network = get_sub_field('network');
                        $link = get_sub_field('link');
                        if ($link) {
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'];
                            if ($link_target == NULL) {
                                $link_target = '_self';
                            }
                        }
                    ?>
                            <?php if ($network == 'facebook' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-facebook-f icon"></i></a></li>
                            <?php elseif ($network == 'twitter' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-twitter icon"></i></a></li>
                            <?php elseif ($network == 'instagram' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-instagram icon"></i></a></li>
                            <?php elseif ($network == 'snapchat' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-snapchat icon"></i></a></li>
                            <?php elseif ($network == 'pinterest' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-pinterest icon"></i></a></li>
                            <?php elseif ($network == 'googleplus' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-googleplus icon"></i></a></li>
                            <?php elseif ($network == 'linkedin' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-linkedin-in icon"></i></a></li>
                            <?php elseif ($network == 'youtube' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-youtube icon"></i></a></li>
                            <?php elseif ($network == 'vimeo' && $link): ?>
                                <li class="menu-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo $link_target; ?>"><span class="visually-hide-text"><?php echo $link_title; ?></span><i class="fab fa-vimeo icon"></i></a></li>
                            <?php endif; ?>
                    <?php endwhile;?>
                </ul>
            <?php endif; ?>
    </div>
</footer>

<!-- Newsletter Modal -->
<?php include(locate_template('inc/modals/newsletter-modal.php')); ?>

<!-- Weather Modal -->
<?php include(locate_template('inc/modals/weather-modal.php')); ?>

<!-- General Modal -->
<?php if(is_front_page()) : ?>
    <?php include(locate_template('inc/modals/open-content-modal.php')); ?>
<?php endif;?>

<!-- CFS Modal -->
<?php include(locate_template('inc/modals/cfs-modal.php')); ?>

<!-- Mobile Search Modal -->
<?php include(locate_template('inc/modals/mobile-search-modal.php')); ?>


<!-- Production version of Vue -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js" integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ==" crossorigin="anonymous"></script>

<div id="app">

</div>

<?php wp_footer(); ?>

</body>
</html>
