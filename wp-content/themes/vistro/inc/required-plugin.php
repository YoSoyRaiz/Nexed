<?php

add_action( 'tgmpa_register', 'vistro_register_required_plugins' );

function vistro_register_required_plugins() {

    $plugins = [
        [
            'name'               => esc_html__( 'Vistro Core', 'vistro' ),
            'slug'               => 'vistro-core',
            'source'             => esc_url( 'https://themexriver.com/wp/vistro/vistro-plug/vistro-core.zip' ),
            'external_url'       => esc_url( 'https://themexriver.com/wp/vistro/vistro-plug/vistro-core.zip' ),
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ],
        [
            'name'     => esc_html__( 'Elementor Page Builder', 'vistro' ),
            'slug'     => 'elementor',
            'required' => true,
        ],
        [
            'name'         => esc_html__( 'Envato Market', 'vistro' ),
            'slug'         => 'envato-market',
            'source'       => esc_url( 'https://goo.gl/pkJS33' ),
            'external_url' => esc_url( 'https://goo.gl/pkJS33' ),
            'required'     => true,
        ],
        [
            'name'     => esc_html__( 'WP Classic Editor', 'vistro' ),
            'slug'     => 'classic-editor',
            'required' => false,
        ],
        [
            'name'     => esc_html__( 'Contact Form 7', 'vistro' ),
            'slug'     => 'contact-form-7',
            'required' => true,
        ],
        [
            'name'               => esc_html__( 'SVG Support', 'gilroy' ),
            'slug'               => 'svg-support',
            'required'           => true,
        ],
        [
            'name'     => esc_html__( 'One Click Demo Import', 'vistro' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ],

    ];

    $config = [
        'id'           => 'vistro',
        'parent_slug'  => 'vistro',
        'menu'         => 'tgmpa-install-plugins',
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'default_path' => '',
    ];

    tgmpa( $plugins, $config );
}
