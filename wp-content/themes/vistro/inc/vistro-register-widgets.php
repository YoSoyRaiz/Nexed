<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vistro_widgets_init() {

    // blog sidebar
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'vistro' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="tx-blog-widget sidebar-widget widget sidebar-box sidebar-bg radius-10 p-l-r_30 pt-35 pb-35 mt-30 %2$s"><div class="widget-content">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h4 class="sidebar-box-title">',
        'after_title'   => '</h4>',
    ] );

    if(VISTRO_CORE) {

        // serice sidebar
        register_sidebar( [
            'name'          => esc_html__( 'Service Sidebar', 'vistro' ),
            'id'            => 'service-sidebar',
            'before_widget' => '<div id="%1$s" class="tx-service-widget sidebar-widget widget sidebar-box sidebar-bg radius-10 p-l-r_30 pt-35 pb-35 mt-30 %2$s"><div class="widget-content">',
            'after_widget'  => '</div></div>',
            'before_title'  => '<h4 class="sidebar-box-title">',
            'after_title'   => '</h4>',
        ] );
    }

}
add_action( 'widgets_init', 'vistro_widgets_init' );