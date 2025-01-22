(function ($) {
    "use strict"; // Start of use strict
        $(document).ready(function() {
            $('.ocdi__gl-item-button + .ocdi__gl-item-button,a.button.button-primary.js-ocdi-install-plugins-before-import, .ocdi-import-mode-switch').click(function(e){
                $('#wpwrap').addClass('open');
                e.preventDefault();
            });

            $('.tx-close').click(function(e){
                $('#wpwrap').removeClass('open');
            });
        });
})(jQuery);
