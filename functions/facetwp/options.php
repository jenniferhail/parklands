<?php

    //======================================================================
    // Disable(hide) the facet map filtering button
    //======================================================================
    // https://gist.github.com/djrmom/4043e6b0ad774de8514ca5e0daed8a75
    function disable_map_filtering() {
        ?>
        <script>
            (function($) {
    
                $(document).on('facetwp-loaded', function() {
                    var filterButton = $( ".facetwp-map-filtering" );
                    if(filterButton.length) {
                        if ( !filterButton.hasClass('enabled') && 'undefined' == typeof FWP_MAP.enableFiltering ) {
                        filterButton.hide();
                        }
                    }
                });
            })(jQuery);
        </script>
        <?php
    }


    //======================================================================
    // Checking if FacetWP is Activated
    //======================================================================
    function facetwp_activated() {
        if (function_exists('facetwp_display')) {
            return true;
        }
        return false;
    }

    // =========================================================================
    // ADDING SUPPORT FOR FACETWP
    // =========================================================================
    add_filter( 'facetwp_is_main_query', function( $bool, $query ) {
        return ( true === $query->get( 'facetwp' ) ) ? true : $bool;
    }, 10, 2 );

    //======================================================================
    // ADDING SUBMIT/RESET BUTTON TO FACETWP
    //======================================================================
    function add_facetwp_submit() {
    ?>
    <script>(function($) {
    $(document).on('facetwp-loaded', function() {
        $('.facetwp-input-wrap').each(function() {
            if ($(this).find('.facetwp-search-submit').length < 1) {
                $(this).find('.facetwp-search').after('<button onclick="FWP.reset()">Reset</button>');
                $(this).find('.facetwp-search').after('<button class="facetwp-search-submit" onclick="FWP.refresh()">Search</button>');
            }
        });
    });
    })(jQuery);
    </script>
    <?php
    }

    //======================================================================
    // ADDING RESET BUTTON TO THE MAP
    //======================================================================
    function add_facetwp_map_reset() {
    ?>
    <script>(function($) {
    $(document).on('facetwp-loaded', function() {
        $('.interactive-map').each(function() {
            if ($(this).find('.facetwp-search-reset').length < 1) {
                $(this).find('.map-filters').after('<button class="facetwp-search-reset" onclick="FWP.reset()">Reset</button>');
            }
        });
    });
    })(jQuery);
    </script>
    <?php
    }

    //======================================================================
    // ADDING LABELS TO FACETWP
    //======================================================================
    function fwp_add_facet_labels() {
        ?>
        <script>
        (function($) {
            $(document).on('facetwp-loaded', function() {
                $('.facetwp-facet').each(function() {
                    var $facet = $(this);
                    var facet_name = $facet.attr('data-name');
                    var facet_label = FWP.settings.labels[facet_name];
        
                    if ($facet.closest('.facet-wrap').length < 1 && $facet.closest('.facetwp-flyout').length < 1) {
                        $facet.wrap('<div class="facet-wrap"></div>');
                        $facet.before('<h3 class="h6 facet-label">' + facet_label + '</h3>');
                    }
                });
            });
        })(jQuery);
        </script>
        <?php
        }

?>