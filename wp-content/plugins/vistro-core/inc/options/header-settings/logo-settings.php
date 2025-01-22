<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'    => esc_html__( 'Logo Settings', 'vistro-core' ),
    'parent'   => 'header_settings',
    'priority' => 1,
    'fields'   => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Logo Settings', 'vistro-core' ) . '</h3>',
            'desc'    => esc_html__( 'This option only for changing the default logo, If you set Header from Elementor Please Check The Header Builder for changing header logo and content', 'vistro-core' ),
        ],
        // vistro_logo
        [
            'id'            => 'vistro_logo',
            'title'         => esc_html__( 'Default Logo', 'vistro-core' ),
            'type'          => 'media',
            'desc'          => esc_html__( 'Upload Logo', 'vistro-core' ),
            'default'       => [
                'url'    => get_template_directory_uri() . '/assets/img/logo/Logo-white.png',
                'width'  => '150px',
                'height' => '50px',
            ],
            'preview'       => true,
            'preview_width' => '150',
        ],
        // vistro_dark_logo
        [
            'id'            => 'vistro_dark_logo',
            'title'         => esc_html__( 'Dark Logo', 'vistro-core' ),
            'type'          => 'media',
            'desc'          => esc_html__( 'Upload Dark Logo', 'vistro-core' ),
            'default'       => [
                'url'    => get_template_directory_uri() . '/assets/img/logo/Logo-black.png',
                'width'  => '150px',
                'height' => '50px',
            ],
            'preview'       => true,
            'preview_width' => '150',
        ],
        // logo width
        [
            'id'          => 'vistro_logo_width',
            'type'        => 'slider',
            'title'       => 'Logo Width',
            'min'         => 80,
            'max'         => 300,
            'step'        => 1,
            'unit'        => 'px',
            'default'     => 100,
            'output'      => '.tx-header .tx-logo img',
            'output_mode' => 'max-width',
        ],
        // vistro_favicon_url
        [
            'id'            => 'vistro_favicon',
            'type'          => 'media',
            'title'         => esc_html__( 'Favicon', 'vistro-core' ),
            'desc'          => esc_html__( 'Upload Favicon', 'vistro-core' ),
            'default'       => [
                'url' => get_template_directory_uri() . '/assets/img/favicon.png',
            ],
            'preview'       => true,
        ],

    ],
] );