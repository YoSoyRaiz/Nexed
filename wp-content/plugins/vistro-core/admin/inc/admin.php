<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $pagenow;

function ta_welcome_page() {
    require_once 'tf-welcome.php';
}

function ta_documentations_page() {
    require_once 'tf-documentations.php';
}

function ta_demo_importer_function() {
    admin_url( 'admin.php?page=tf-demo-importer' );
}

function vistro_theme_options() {
    admin_url( 'admin.php?page=vistro-theme-option' );
}

function ta_admin_menu() {
    if ( current_user_can( 'edit_theme_options' ) ) {
        add_menu_page(
        ''.tf_theme_name().'',
        ''.tf_theme_name().'',
        'administrator',
        'tf-admin-menu',
        'ta_welcome_page',
        'dashicons-smiley', 4 );
        add_submenu_page( 'tf-admin-menu', VISTRO_CORE_TEXT_DOMAIN, esc_html__( 'Welcome', VISTRO_CORE_TEXT_DOMAIN ), 'administrator', 'tf-admin-menu', 'ta_welcome_page' );

        add_submenu_page( 'tf-admin-menu', esc_html__( 'Theme Options', VISTRO_CORE_TEXT_DOMAIN ), esc_html__( 'Theme Options', VISTRO_CORE_TEXT_DOMAIN ), 'administrator', 'vistro-theme-option', 'vistro_theme_options' );

        add_submenu_page( 'tf-admin-menu', esc_html__( 'Demo Import', VISTRO_CORE_TEXT_DOMAIN ), esc_html__( 'Demo Import', VISTRO_CORE_TEXT_DOMAIN ), 'administrator', 'tf-demo-importer', 'ta_demo_importer_function' );
        add_submenu_page( 'tf-admin-menu', VISTRO_CORE_TEXT_DOMAIN, esc_html__( 'Documentations', VISTRO_CORE_TEXT_DOMAIN ), 'administrator', 'tf-documentations', 'ta_documentations_page' );
    }
}
add_action( 'admin_menu', 'ta_admin_menu' );



// if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

//     wp_redirect(admin_url("admin.php?page=tf-documentations"));

// }