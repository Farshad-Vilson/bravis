(function($) {
    "use strict";

    /* RTL detection helper — used by Swiper widgets in the theme */
    window.pxlIsRtl = (typeof pxlCoreVars !== 'undefined' && pxlCoreVars.isRtl === 'true')
        || document.documentElement.getAttribute('dir') === 'rtl'
        || document.documentElement.classList.contains('rtl');

    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.waypoint = function($element, callback, options) {
            if( $element.length <= 0) return;
            const defaultOptions = {
              offset: '100%',
              triggerOnce: true
            };
            options = jQuery.extend(defaultOptions, options);
            const correctCallback = function () {
              const element = this.element || this,
                result = callback.apply(element, arguments);

              if (options.triggerOnce && this.destroy) {
                this.destroy();
              }
              return result;
            };

            return $element.elementorWaypoint(correctCallback, options);
        };
    });

}(jQuery));