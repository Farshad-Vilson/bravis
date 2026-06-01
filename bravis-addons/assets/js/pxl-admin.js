(function($) {
    "use strict";

    $('.pxl-form-auto-update').on('submit', function() {
        var label = (typeof pxlAdminVars !== 'undefined' && pxlAdminVars.uploading) ? pxlAdminVars.uploading : 'Uploading...';
        $(this).find('.button').addClass('loading').html(label);
        $('body').addClass('loading');
    });

}(jQuery));