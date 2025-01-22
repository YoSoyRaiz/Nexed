<?php

class Vistro_Active {

    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_footer', array( $this, 'display_notice' ) );
    }

    public function enqueue_scripts( $hook ) {

        if ( 'appearance_page_tf-demo-importer' !== $hook ) {
            return;
        }

        // Enqueue scripts
        wp_enqueue_script( 'vistro-pakps', plugin_dir_url( __FILE__ ) . 'assets/js/active.js', array( 'jquery' ), '1.0.0', true );

        // Enqueue styles
        wp_enqueue_style( 'vistro-pakps', plugin_dir_url( __FILE__ ) . 'assets/css/active.css', array(), '1.0.0', 'all' );

    }

    public function display_notice() {
        $hook = get_current_screen();

        if ( 'appearance_page_tf-demo-importer' !== $hook->base ) {
            return;
        }

        echo '
            <div class="tx-notice">
                <span class="tx-close">x</span>
                <div class="tx-wrapper">
                    <h3>Please Activate Your License</h3>
                    <p>To import the demo, please activate your license <a class="button-primary" href="' . admin_url( 'admin.php?page=vistro-license', '' ) . '">Click Here</a></p>
                </div>
            </div>
        ';
    }
}

if ( ! get_option( "Vistro_lic_Key" ) ) {
    new Vistro_Active();
}
