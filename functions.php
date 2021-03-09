<?php
    // =========================================================================
    // HELPER FUNCTIONS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/helpers.php';

    // =========================================================================
    // WORDPRESS HOOKS AND FUNCTIONS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/wp/base.php';
    require_once dirname(__FILE__) . '/functions/wp-hooks.php';

    // =========================================================================
    // ADVANCED CUSTOM FIELDS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/acf/options.php';

    // =========================================================================
    // FACETWP
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/facetwp/options.php';

    // =========================================================================
    // CUSTOM POST TYPES
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/cpt/event.php';
    require_once dirname(__FILE__) . '/functions/cpt/location.php';
    require_once dirname(__FILE__) . '/functions/cpt/people.php';

    // =========================================================================
    // CUSTOM TAXONOMIES
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/taxonomies/topics.php';
    require_once dirname(__FILE__) . '/functions/taxonomies/location_types.php';
    require_once dirname(__FILE__) . '/functions/taxonomies/parks.php';
    require_once dirname(__FILE__) . '/functions/taxonomies/difficulty.php';
    require_once dirname(__FILE__) . '/functions/taxonomies/amenities.php';
    require_once dirname(__FILE__) . '/functions/taxonomies/activity.php';
    require_once dirname(__FILE__) . '/functions/taxonomies/people_categories.php';
    require_once dirname(__FILE__) . '/functions/taxonomies/terrain_types.php';
