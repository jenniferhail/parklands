<?php
    // =========================================================================
    // REGISTER & ENQUEUE
    // =========================================================================
    function mightyResources() {
        $bundleCss = get_stylesheet_directory() . '/dist/assets/css/style.min.css';
        wp_enqueue_style('mightily', get_stylesheet_directory_uri() . '/dist/assets/css/style.min.css', '', filemtime ($bundleCss));

        wp_enqueue_style('typekit', '//use.typekit.net/pkd5ooe.css');

        wp_deregister_script('jquery');
        wp_register_script('jquery', ('//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'), '', '2.2.4', false);
        wp_enqueue_script('jquery');

        wp_enqueue_script('waypoints', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js', ['jquery']);

        wp_enqueue_script('slick', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', ['jquery'], filemtime ($bundleJs) , true);
        wp_enqueue_script('slick-lightbox', '//cdnjs.cloudflare.com/ajax/libs/slick-lightbox/0.2.12/slick-lightbox.min.js', ['jquery'], filemtime ($bundleJs) , true);
        wp_enqueue_style('slick-theme', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css');

        $bundleJs = get_stylesheet_directory() . '/dist/assets/js/bundle.js';
        wp_enqueue_script('mightily', get_stylesheet_directory_uri() . '/dist/assets/js/bundle.js', ['jquery'], filemtime ($bundleJs) , true);
    }

    //======================================================================
    // SLICK SLIDERS
    //======================================================================
    function init_slick_sliders() {
        ?>
        <script>
            (function($) {
                var slider = $('.block.slider.gallery .items');
                if (slider.length > 0) {
                    for (var i = 0; i < slider.length; i++) {
                        // Init first slider
                        $(slider[i]).slick();
                        $(slider[i]).slickLightbox({
                            src: 'src',
                            itemSelector: '.item img'
                        });
                    }
                }
            })(jQuery);
        </script>
        <?php
    }

    //======================================================================
    // META TAGS
    //======================================================================
    // Adding meta so that we can load it in non Wordpress pages i.e. Netforum
    function add_meta_tags() {
        echo '<meta name="viewport" content="width=device-width,initial-scale=1" />' . "\n";
    }

    //======================================================================
    // ACF Options Page
    //======================================================================
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' 	=> 'App Options',
            'menu_title'	=> 'App Options',
            'menu_slug' 	=> 'app-options',
            'capability'	=> 'manage_sites',
            'redirect'		=> false
        ]);
    }
