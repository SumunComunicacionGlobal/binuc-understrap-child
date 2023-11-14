<?php 
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function fwp_add_facet_labels() {
    if ( !function_exists( 'facetwp_display' ) ) return false;
  ?>
    <script>
      (function($) {
        $(document).on('facetwp-loaded', function() {
          $('.facetwp-facet').each(function() {
            var facet = $(this);
            var facet_name = facet.attr('data-name');
            var facet_type = facet.attr('data-type');
            var facet_label = FWP.settings.labels[facet_name];
            if (facet_type !== 'pager' && facet_type !== 'sort' && facet_type !== 'search') {
              if (facet.closest('.facet-wrap').length < 1 && facet.closest('.facetwp-flyout').length < 1) {
                facet.wrap('<div class="facet-wrap"></div>');
                facet.before('<h3 class="facet-label">' + facet_label + '</h3>');
              }
            }
          });
        });
      })(jQuery);
    </script>
  <?php
}
add_action( 'wp_head', 'fwp_add_facet_labels', 100 );

add_action( 'wp_head', function() { ?>

  <script>
      (function($) {
          $(document).on('facetwp-refresh', function() {
              if ( FWP.soft_refresh == true ) {
                  FWP.enable_scroll = true;
              } else {
                  FWP.enable_scroll = false;
              }
          });
          $(document).on('facetwp-loaded', function() {
              if ( FWP.enable_scroll == true ) {
                  $('html, body').animate({ scrollTop: 0 }, 500);
              }
          });
      })(jQuery);
  </script>

<?php } );