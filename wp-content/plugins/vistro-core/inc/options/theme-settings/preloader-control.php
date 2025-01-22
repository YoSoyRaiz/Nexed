<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'  => 'Preloader ON/OFF',
    'parent' => 'theme_settings',
    'priority' => 1,
    'fields' => [
        [
            'id'      => 'preloader_enable',
            'title'   => esc_html__( 'Enable Preloader', 'vistro-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Preloader', 'vistro-core' ),
            'default' => true,
        ],
        // preloader image
        [
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Preloader Image', 'vistro-core' ),
            'desc'     => esc_html__( 'Upload Preloader Image', 'vistro-core' ),
            'default'  => [
                'url' => get_template_directory_uri() . '/assets/img/preloader.gif',
            ],
            'dependency' => ['preloader_enable', '==', 'true'],
        ],

        // size
        [
            'id'          => 'preloader_image_width',
            'type'        => 'slider',
            'title'       => 'Width',
            'min'         => 50,
            'max'         => 300,
            'step'        => 1,
            'unit'        => 'px',
            'output'      => '#vistroPreloader img',
            'output_mode' => 'max-width',
        ],
    ],
] );