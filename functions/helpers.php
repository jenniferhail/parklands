<?php

function check_for_alert_tax_query($the_query) {
    // Checking the tax_query to see if the post category is 'alert'
    $alert_tax = get_term_by('slug', 'alert', 'category');
    $alert_id = $alert_tax->term_id;
    if($the_query->query_vars['post_type'] == 'post') {
        $tax_query_terms = $the_query->tax_query->queried_terms['category']['terms'];
        if($tax_query_terms) {
            if(in_array($alert_id, $tax_query_terms) && count($tax_query_terms) == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function cookie_notice() {
    if(get_field( 'enable_cookie_notice', 'option' ) == 1) {
        $title = '';
        $message = '';
        $link = '';
        $cookie_link = get_field( 'cookie_link', 'option' );
        if(get_field('cookie_title', 'option')) {
            $title = '<h1 class="title h3">' . get_field('cookie_title', 'option') . '</h1>';
        }
        if(get_field('cookie_message', 'option')) {
            $message = '<p>' . get_field('cookie_message', 'option') . '</p>';
        }
        if($cookie_link) {
            $link = '<a href="' . esc_url( $cookie_link['url'] ) . '" target="' . esc_attr( $cookie_link['target'] ) . '">' . esc_html( $cookie_link['title'] ) . '</a>';
        }
        if( !isset($_COOKIE['cookienotice']) ) {
            echo '
                <div class="cookie-notice option notification bottom">
                    <div class="wrapper">
                        ' . $title . '
                        ' . $message . '
                        ' . $link . '
                        <button class="close">
                            <span class="toggle-wrapper">
                                <span class="toggle-bar toggle-bar-1"></span>
                                <span class="toggle-bar toggle-bar-2"></span>
                            </span>
                            <span class="visually-hide-text">Close Notice</span>
                        </button>
                    </div>
                </div>
                ';
        }
    }
}

function alert_query_loop($post_id) {
    $post_type = get_post_type($post_id); 
    $loops = array();
    $parks = wp_get_post_terms($post_id, 'parks', array( 'fields' => 'ids' ));

    $park_meta_query = array('relation' => 'AND');
	foreach ($parks as $value) {
		$park_meta_query[] = array(
			'key'       => 'park',
			'value'     => $value,
			'compare'   => 'LIKE',
		);
    }
    $park_meta_query[] = array(
        'key' => 'alert_type', 
        'value' => 'Park', 
        'compare' => 'LIKE'
    );

    $location_meta_query = array(
        'relation' => 'AND',
        array(
            'key' => 'location', 
            'value' => '"' . $post_id . '"', 
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'alert_type', 
            'value' => 'Location', 
            'compare' => 'LIKE'
        ),
    );
    $site_meta_query = array(
        array(
            'key' => 'alert_type', 
            'value' => 'Site', 
            'compare' => 'LIKE'
        )
    );

    $args = array(
        'post_type' 		=> ['post'],
        'post_status'		=> 'publish',
        'numberposts'       => -1,
        'tax_query' 		=> array( 
                array( // Alert Category
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => array('alert'),
                    ),
                ),
        'meta_query'        => $site_meta_query,
        
    );

    // if this post-type is on the site, run the site-wide alert loop
    $loops['site'] = get_posts($args);
    
    // If this post-type has parks, run the park alert loop
    if(count($parks) > 0) { 
        $args['meta_query'] = $park_meta_query;
        $loops['park'] = get_posts($args);
    } 

    // If this post-type is a location, run the location alert loop
    if($post_type == 'location') {
        $args['meta_query']=$location_meta_query;
        $loops['location'] = get_posts($args);
    }

    foreach($loops as $loop) {
        foreach($loop as $value) {
            $label = get_post_meta($value->ID, 'alert_type');
            $cookie_label = $label[0] . 'notice' . $value->ID;
            if( !isset($_COOKIE[$cookie_label]) ) {
                echo '<div id="' . $value->ID . '" class="' . $label[0] . '-alert option notification top">
                        <div class="wrapper">
                            <h1 class="title h3">' . get_the_title($value->ID) . '</h1>
                            <p>' . wp_trim_words(get_field("short_description", $value->ID), $num_words = 10, $more = null) . '</p>
                            <a href="' . get_permalink($value->ID) . '" class="link">Read More</a>
                            <button class="close">
                                <span class="toggle-wrapper">
                                    <span class="toggle-bar toggle-bar-1"></span>
                                    <span class="toggle-bar toggle-bar-2"></span>
                                </span>
                                <span class="visually-hide-text">Close Notice</span>
                            </button>
                        </div>
                    </div>';
            }
        }
    }
}

function sunrise_sunset() {
    $location = get_sub_field('location');
    if( $location ) {
        $sunrise = date('g:i a', strtotime(date_sunrise(time(), SUNFUNCS_RET_STRING, $location['lat'], $location['lng'], 90, -5)));
        $sunset = date('g:i a', strtotime(date_sunset(time(), SUNFUNCS_RET_STRING, $location['lat'], $location['lng'], 90, -5)));
        echo '<span class="sunrise">Sunrise <time class="time">' . $sunrise . ' EST</time></span>';
        echo '<span class="sunset">Sunset <time class="time">' . $sunset . ' EST</time></span>';
    }
}

function profile_link($post_id) {
    $terms = get_the_terms($post_id, 'people_categories');
    foreach($terms as $term) {
        if($term->slug == "staff") {
            return true;
        }
    }
}

function grid_type($type) {
    $grid = 'grid-thirds-left';
    $post_type = $type;

    if($post_type == 'people') {
        $grid = 'grid-fifths';
    }

    return $grid;
}

function update_tax_query($tax_query, $taxonomy, $term_id, $operator = 'IN') {
    $tax_query[] = [
        'taxonomy' => $taxonomy,
        'field'    => 'term_id',
        'terms'    => $term_id,
        'operator' => $operator,
    ];

    return $tax_query;
}

function the_directions() {
    if(get_field( 'marker' )) {
        $marker = get_field('marker');
        echo '<div class="line">';
            // echo '<a href="http://maps.google.com/maps/?z=12&t=m&q=' . $marker['address'] . '&loc:' . $marker['lat'] . '+' . $marker['lng'] . '" class="link" target="_blank">Get Directions</a>';
            echo '<a href="http://maps.google.com/maps/place/' . $marker['lat'] . ',' . $marker['lng'] . '" class="link" target="_blank">Get Directions</a>';
        echo '</div>';
    }
}
                                
function the_filters($post_type) {

    $location_filters = get_sub_field( 'location_filter_categories' );
    $event_filters = get_sub_field( 'event_filter_categories' );
    $post_filters = get_sub_field( 'post_filter_categories' );
    $search_boolean = false;
    $new_post_filters = array();

    if (($key = array_search('post_search', $post_filters)) !== false) {
        $search_boolean = true;
        unset($post_filters[$key]);
    }

    if($post_type == 'post') {
        if($search_boolean) {
            echo '<div class="fieldset search-field">';
            echo facetwp_display( 'facet', 'post_search' );
            echo '</div>';
        }
        if(count($post_filters) > 0 ) {
            echo '<div class="fieldset filters">';
            foreach($post_filters as $post_filter) {
                echo facetwp_display( 'facet', $post_filter );
            }
            echo '</div>';
        }
        
    }
    
    echo '<div class="fieldset filters">';

    if($post_type == 'location') {
        foreach($location_filters as $location_filter) {
            echo facetwp_display( 'facet', $location_filter );
        }
    }

    if($post_type == 'event') {
        foreach($event_filters as $event_filter) {
            echo facetwp_display( 'facet', $event_filter );
        }
    }
    
    echo '</div>';
}

function the_activities($post_id) {

    $taxonomy_prefix = 'activities';
    $term_id = NULL;


    $taxonomy = 'activities';

    $activities = get_the_terms($post_id, $taxonomy);
    if($activities) {
        $i = 0;
        echo '<ul class="list">';
            foreach ($activities as $key => $value) {

                $term_id_prefixed = $taxonomy .'_'. $value->term_id;

                $icon = get_field( 'icon', $term_id_prefixed );

                if($icon) {
                    echo '<li class="icon"><img src="' . esc_url( $icon['url'] ) . '" alt="' . $value->name . '" /></li>';
                }

                // if($i >= 1) {
                //     echo ', ' . $value->name;
                // } else {
                //     echo $value->name;
                // }
                // $i++;
            }
        echo '</ul>';
    }
}

function the_post_category($post_id) {
    $category = get_the_terms($post_id, 'category');
    if($category) {
        $i = 0;
        echo '<div class="line"><span class="type">';
            foreach ($category as $key => $value) {
                if($i >= 1) {
                    echo ', ' . $value->name;
                } else {
                    echo $value->name;
                }
                $i++;
            }
        echo '</div></span>';
    }
}

function the_post_date() {
    echo '<div class="line">';
        echo '<time class="date">' . get_the_date() . '</time>';
    echo '</div>';
}

function the_post_author($post_id) {
    $author = get_field( 'author', $post_id );
    if($author) {
        echo '<div class="line">';
        foreach($author as $post_ids) {
            echo '<span class="author">' . get_the_title( $post_ids ) . '</span>';
        }
        echo '</div>';
    }
}

function the_event_date() {
    if(get_field('end_date')) {
        echo '<div class="line">';
            echo '<time class="date">' . get_field('start_date') . '</time> – ';
            echo '<time class="date">' . get_field('end_date') . '</time>';
        echo '</div>';
    } elseif(get_field('start_date')) {
        echo '<div class="line">';
            echo '<time class="date">' . get_field('start_date') . '</time>';
        echo '</div>';
    }
}

function the_event_time() {
    if(get_field('end_time')) {
        echo '<div class="line">';
            echo '<time class="time">' . get_field('start_time') . '</time> – ';
            echo '<time class="time">' . get_field('end_time') . '</time>';
        echo '</div>';
    } elseif(get_field('start_time')) {
        echo '<div class="line">';
            echo '<time class="time">' . get_field('start_time') . '</time>';
        echo '</div>';
    }
}

function event_book_now_link() {
    $book_now = get_field( 'book_now' );
    if($book_now) {
        echo '<div class="wp-block-button">';
            echo '<a class="wp-block-button__link" href="' . esc_url( $book_now['url'] ) . '" target="' . esc_attr( $book_now['target'] ) . '">' . esc_html( $book_now['title'] ) . '</a>';
        echo '</div>';
    } 
}

function the_location_type($post_id) {
    $location_types = get_the_terms($post_id, 'location_types');
    if($location_types) {
        $i = 0;
        echo '<div class="line"><span class="type">';
            foreach ($location_types as $key => $value) {
                if($i >= 1) {
                    echo ', ' . $value->name;
                } else {
                    echo $value->name;
                }
                $i++;
            }
        echo '</div></span>';
    }
}

function the_distance() {
    if(get_field('distance')) {
        echo '<li class="distance">' . get_field('distance') . ' Mi</li>';
    }
}

function the_duration() {
    if(get_field('duration')) {
        echo '<li class="duration">' . get_field('duration') . ' Hr</li>';
    }
}

function the_difficulty($post_id) {
    $difficulty = get_the_terms($post_id, 'difficulty');
    if($difficulty) {
        $i = 0;
        echo '<li class="difficulty">';
            foreach ($difficulty as $key => $value) {
                if($i >= 1) {
                    echo ', ' . $value->name;
                } else {
                    echo $value->name;
                }
                $i++;
            }
        echo '</li>';
    }
}

function the_park($post_id) {
    $park = get_the_terms($post_id, 'parks');
    if($park) {
        $i = 0;
        echo '<p class="tagline green-txt">';
            foreach ($park as $key => $value) {
                if($i >= 1) {
                    echo ', ' . $value->name;
                } else {
                    echo $value->name;
                }
                $i++;
            }
        echo '</p>';
    }
}

//======================================================================
// CUSTOM EXCERPT
//======================================================================
function custom_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(' ', $excerpt) . '...';
    } else {
        $excerpt = implode(' ', $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}

//======================================================================
// REPLACE EXCERPT
//======================================================================
// Replaces the excerpt "Read More" text with a link
function new_excerpt_more($more) {
    global $post;
    return '...';
    // return '<a class="moretag" href="'. get_permalink($post->ID) . '"> ...read more.</a>';
}

//======================================================================
// Add responsive container to embeds
//======================================================================
function video_embed_wrapper($html) {
    return '<div class="video-wrapper">' . $html . '</div>';
}