<?php
/*
 * Theme Options
 * @package vistro
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'vistro';

    // Create options
    CSF::createOptions( $prefix . '_theme_options', [
        'menu_title'         => 'Theme Options',
        'menu_slug'          => 'vistro-theme-option',
        'menu_type'          => 'menu',
        'enqueue_webfont'    => true,
        'show_in_customizer' => true,
        'menu_icon'          => 'dashicons-category',
        'menu_position'      => 50,
        'theme'              => 'dark',
        'framework_title'    => wp_kses_post( 'Vistro Theme Options <small>by Sabber <br/> Version: 1.0.0</small> ' ),
        'footer_text'        => wp_kses_post( 'The Theme will Created By &copy; Themexriver' ),
    ] );

    // THEME SETTINGS
    CSF::createSection( $prefix . '_theme_options', [
        'id'    => 'theme_settings', // Set a unique slug-like ID
        'title' => 'Theme Settings',
    ] );
    $theme_settings = glob( VISTRO_CORE_DIR . '/inc/options/theme-settings/*.php' );
    if ( $theme_settings ) {
        foreach ( $theme_settings as $theme_setting ) {
            require $theme_setting;
        }
    }

    // HEADER SETTINGS
    CSF::createSection( $prefix . '_theme_options', [
        'id'    => 'header_settings', // Set a unique slug-like ID
        'title' => 'Header Settings',
    ] );
    $header_settings = glob( VISTRO_CORE_DIR . '/inc/options/header-settings/*.php' );
    if ( $header_settings ) {
        foreach ( $header_settings as $header_setting ) {
            require $header_setting;
        }
    }

    // THEME LAYOUT SETTINGS
    CSF::createSection( $prefix . '_theme_options', [
        'id'    => 'theme_layout', // Set a unique slug-like ID
        'title' => 'Theme Layout',
    ] );
    $vistro_layouts = glob( VISTRO_CORE_DIR . '/inc/options/theme-layouts/*.php' );
    if ( $vistro_layouts ) {
        foreach ( $vistro_layouts as $vistro_layout ) {
            require $vistro_layout;
        }
    }

    // THEME BLOG SETTINGS
    CSF::createSection( $prefix . '_theme_options', [
        'id'    => 'blog_settings', // Set a unique slug-like ID
        'title' => 'Blog Settings',
    ] );
    $blog_settings = glob( VISTRO_CORE_DIR . '/inc/options/blog-settings/*.php' );
    if ( $blog_settings ) {
        foreach ( $blog_settings as $blog_setting ) {
            require $blog_setting;
        }
    }

    // THEME SHOP SETTINGS
    CSF::createSection( $prefix . '_theme_options', [
        'id'    => 'shop_settings', // Set a unique slug-like ID
        'title' => 'Shop Settings',
    ] );
    $shop_settings = glob( VISTRO_CORE_DIR . '/inc/options/shop-settings/*.php' );
    if ( $shop_settings ) {
        foreach ( $shop_settings as $shop_setting ) {
            require $shop_setting;
        }
    }

    // THEME FOOTER SETTINGS
    CSF::createSection( $prefix . '_theme_options', [
        'id'    => 'footer_settings', // Set a unique slug-like ID
        'title' => 'Footer Settings',
    ] );
    $footer_settings = glob( VISTRO_CORE_DIR . '/inc/options/footer-settings/*.php' );
    if ( $footer_settings ) {
        foreach ( $footer_settings as $footer_setting ) {
            require $footer_setting;
        }
    }

    // custom post type url slug
    CSF::createSection( $prefix . '_theme_options', [
        'id'     => 'change_url_slug', // Set a unique slug-like ID
        'title'  => 'Custom URL Slug',
        'fields' => [
            // service
            [
                'id'      => 'tx_service_title',
                'type'    => 'text',
                'title'   => 'Service Title',
            ],
            [
                'id'      => 'tx_service_slug',
                'type'    => 'text',
                'title'   => 'Service Slug',
                'desc'    => 'After Change Permalink go to: Settings -> Permalinks -> Scroll Bottom and just Click Save Change Button',
            ],
            [
                'type'    => 'subheading',
                'content' => '<p>' . esc_html__( 'After Change Permalink go to: Settings -> Permalinks -> Scroll Bottom and just Click Save Change Button ', 'vistro-core' ) . ' <a href="' . esc_url( admin_url( 'options-permalink.php' ) ) . '">' . esc_html__( 'Permalinks', 'vistro-core' ) . '</a></p> ',
            ],
        ],
    ] );

    // Backup section
    CSF::createSection( $prefix . '_theme_options', [
        'title'  => esc_html__( 'Backup Export', 'vistro-core' ),
        'id'     => 'backup_options',
        'icon'   => 'fa fa-window-restore',
        'fields' => [
            [
                'type' => 'backup',
            ],
        ],
    ] );

}