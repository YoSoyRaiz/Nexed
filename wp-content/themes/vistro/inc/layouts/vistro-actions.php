<?php

/**
 *
 * vistro header
 */
function vistro_check_header() {

    $header_meta = get_post_meta( get_the_ID(), 'vistro_page_meta', true ) ? get_post_meta( get_the_ID(), 'vistro_page_meta', true ) : [];
    $page_header_disable = array_key_exists( 'page_header_disable', $header_meta ) ? $header_meta['page_header_disable'] : false;

    if ( $page_header_disable != true ) {
        Vistro_Helper::vistro_header_template();
    }

}
add_action( 'vistro_header_style', 'vistro_check_header', 10 );

/**
 *
 * vistro footer
 */
function vistro_check_footer() {
    $footer_meta = get_post_meta( get_the_ID(), 'vistro_page_meta', true ) ? get_post_meta( get_the_ID(), 'vistro_page_meta', true ) : [];
    $page_footer_disable = array_key_exists( 'page_footer_disable', $footer_meta ) ? $footer_meta['page_footer_disable'] : false;

    if ( $page_footer_disable != true ) {
        Vistro_Helper::vistro_footer_template();
    }
}
add_action( 'vistro_footer_style', 'vistro_check_footer', 10 );

// favicon logo
function vistro_favicon_logo_func() {
    $vistro_favicon = cs_get_option( 'vistro_favicon', get_template_directory_uri() . '/assets/img/favicon.webp');
    if(isset($vistro_favicon['url'])) {
        $vistro_favicon_url = $vistro_favicon['url'];
    } else {
        $vistro_favicon_url = get_template_directory_uri() . '/assets/img/favicon.webp';
    }
?>
<link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $vistro_favicon_url );?>">
<?php
}
add_action( 'wp_head', 'vistro_favicon_logo_func' );