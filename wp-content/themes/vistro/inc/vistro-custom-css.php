<?php

// logo css
function vistro_primary_color() {

    wp_enqueue_style( 'vistro-color-dynamic', VISTRO_THEME_CSS_DIR . 'vistro-color-dynamic.css', [] );

    $theme_primary_color = cs_get_option( 'theme_primary_color', '#001aff' );

    if ( !empty( $theme_primary_color ) ) {
        $custom_css = '';
        $custom_css .= '
            :root {
                --h1-pr-color: ' . esc_attr( $theme_primary_color ) . ';
            }
        ';

        wp_add_inline_style( 'vistro-color-dynamic', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'vistro_primary_color' );