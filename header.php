<!doctype html>
<?php $site_url = site_url(); ?>
<?php $template_directory = get_template_directory_uri() . '/favicon.ico'; ?>


<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow">
	<?php } ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <script src="https://kit.fontawesome.com/15caa5e93e.js" crossorigin="anonymous"></script>
    
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>

</head>

<body <?php body_class('front-end'); ?>>
	
    <?php do_action('wp_body_open'); ?>	

    <?php cookie_notice(); ?>    
	
	<nav class="skip-nav">
        <ul class="skip-menu">
            <a href="#nav-toggle" class="menu-item">Skip to main menu</a>
            <a href="#main" class="menu-item">Skip to main content</a>
        </ul>
	</nav>
	
	<header class="header">	
        <?php alert_query_loop(get_the_ID()); ?>	
        <div class="wrapper mobile-bar">
            <div class="row">
                <a class="logo" href="/" target="_self">
                    <img class="svg" src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/logo-green.svg" alt="Parklands Home Page">
				</a>
				
                <nav class="top-menu">
                    <ul class="main-menu">
                        <li class="menu-item donate button"><a href="/donate/#donate-form">Donate</a></li>
                        <li class="menu-item cfs"><a href="#">CFS</a></li>
                        <li id="weather-forecast" class="menu-item weather">
							<button id="weather-trigger">
                                Weather
                                <!-- 
                                Note: Need to add the component here -->
								<!-- <weather-data></weather-data> -->
                                <!-- <span class="icon"></span><span class="forecast"><?php // echo $result_forecast; ?> <?php // echo $result_temp; ?><?php // echo $result_tempUnit; ?></span> -->
							</button>
						</li>
                        <li class="menu-item search"><a href="#">Search</a></li>
                    </ul>
				</nav>
				
                <nav class="bottom-menu">

					<ul class="main-menu bottom">
						<?php
							$args = array(
								'theme_location' => 'bottom-menu',
								'container' => 'false',
								'items_wrap' => '%3$s'
							);
						?>
						<?php wp_nav_menu($args); ?>
					</ul>

                    <button id="nav-toggle" class="nav-toggle">
                        <span class="toggle-wrapper">
                            <span class="toggle-bar toggle-bar-1"></span>
                            <span class="toggle-bar toggle-bar-2"></span>
                            <span class="toggle-bar toggle-bar-3"></span>
                            <span class="toggle-bar toggle-bar-4"></span>
                        </span>
                        <span class="visually-hide-text">Show Main Menu</span>
                    </button>
                </nav>
            </div>
            <nav class="hamburger-menu">
                <div class="wrapper">
                    <ul class="main-menu">
						<?php
							$args = array(
								'theme_location' => 'hamburger-menu',
								'container' => 'false',
								'items_wrap' => '%3$s'
							);
						?>
						<?php wp_nav_menu($args); ?>
					</ul>
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
                    <div class="contact">
                        <p>© 21st Century Parks, Inc. dba The Parklands of Floyds Fork 2020</br>
                            Mailing Address:</br>
                            471 West Main Street, Suite 202</br>
                            Louisville, KY 40202</p>
                    </div>
                </div>
            </nav>
        </div>
    </header>

<main id="main">
