<?php

/**
 * vistro_scripts description
 * @return [type] [description]
 */
function vistro_scripts() {

    wp_enqueue_style( 'vistro-fonts', vistro_fonts_url(), [], null );
    wp_enqueue_style( 'bootstrap-min', VISTRO_THEME_CSS_DIR . 'bootstrap.min.css', [] );
    wp_enqueue_style( 'e-animations', VISTRO_THEME_CSS_DIR . 'e-animations.css', [] );
    wp_enqueue_style( 'nice-select-min', VISTRO_THEME_CSS_DIR . 'nice-select.min.css', [] );
    wp_enqueue_style( 'font-awesome-min', VISTRO_THEME_CSS_DIR . 'font-awesome-min.css', [] );
    wp_enqueue_style( 'flaticon-vistro', VISTRO_THEME_CSS_DIR . 'flaticon-vistro.css', [] );
    wp_enqueue_style( 'magnific-popup', VISTRO_THEME_CSS_DIR . 'magnific-popup.css', [] );
    wp_enqueue_style( 'odometer-min', VISTRO_THEME_CSS_DIR . 'odometer.min.css', [] );
    wp_enqueue_style( 'swiper-min', VISTRO_THEME_CSS_DIR . 'swiper.min.css', [] );
    wp_enqueue_style( 'vistro-core', VISTRO_THEME_CSS_DIR . 'vistro-core.css', [], VERSION );
    wp_enqueue_style( 'vistro-companion', VISTRO_THEME_CSS_DIR . 'vistro-companion.css', [], VERSION );
    wp_enqueue_style( 'vistro-custom', VISTRO_THEME_CSS_DIR . 'vistro-custom.css', [], VERSION );
    wp_enqueue_style( 'vistro-color-dynamic', VISTRO_THEME_CSS_DIR . 'vistro-color-dynamic.css', [], VERSION );
    wp_enqueue_style( 'vistro-style', get_stylesheet_uri() );

    $my_current_lang = apply_filters( 'wpml_current_language', NULL );

    $enable_rtl = cs_get_option( 'enable_rtl', false );
    if ( $my_current_lang != 'en' && $enable_rtl || is_rtl() ) {
        wp_enqueue_style( 'vistro-rtl', VISTRO_THEME_CSS_DIR . 'vistro-rtl.css', [] );
    }

    // all js files
    wp_enqueue_script( 'bootstrap-min', VISTRO_THEME_JS_DIR . 'bootstrap-min.js', ['jquery'], false, true );
    wp_enqueue_script( 'appear-min-js', VISTRO_THEME_JS_DIR . 'appear.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'jquery-nice-select-min', VISTRO_THEME_JS_DIR . 'jquery-nice-select.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'back-to-top-min', VISTRO_THEME_JS_DIR . 'back-to-top.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'counterup-min', VISTRO_THEME_JS_DIR . 'counterup.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'gsap-min', VISTRO_THEME_JS_DIR . 'gsap.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'jquery-scrollUp-min', VISTRO_THEME_JS_DIR . 'jquery.scrollUp.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'magnific-popup-min', VISTRO_THEME_JS_DIR . 'magnific-popup.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'odometer-min', VISTRO_THEME_JS_DIR . 'odometer.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'ScrollSmoother-min', VISTRO_THEME_JS_DIR . 'ScrollSmoother.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'ScrollTrigger-min', VISTRO_THEME_JS_DIR . 'ScrollTrigger.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'split-type-min', VISTRO_THEME_JS_DIR . 'split-type.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'SplitText-min', VISTRO_THEME_JS_DIR . 'SplitText.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'swiper-bundle-min', VISTRO_THEME_JS_DIR . 'swiper-bundle.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'waypoints-min', VISTRO_THEME_JS_DIR . 'waypoints.min.js', ['jquery'], false, true );
    wp_enqueue_script( 'wow', VISTRO_THEME_JS_DIR . 'wow.js', ['jquery'], false, true );
    wp_enqueue_script( 'vistro-custom', VISTRO_THEME_JS_DIR . 'vistro-custom.js', ['jquery'], false, true );

    if ( $my_current_lang != 'en' && $enable_rtl || is_rtl() ) {
        wp_enqueue_script( 'vistro-core-rtl', VISTRO_THEME_JS_DIR . 'vistro-core-rtl.js', ['jquery'], VERSION, true );
    } else {
        wp_enqueue_script( 'vistro-core', VISTRO_THEME_JS_DIR . 'vistro-core.js', ['jquery'], VERSION, true );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'vistro_scripts' );