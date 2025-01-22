<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'  => esc_html__( 'Copyright Text', 'vistro-core' ),
    'parent' => 'footer_settings',
    'priority' => 1,
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Copyright Text', 'vistro-core' ) . '</h3>',
        ],
        // copyright text
        [
            'id'      => 'vistro_copyright',
            'title'   => esc_html__( 'Copyright Text', 'vistro-core' ),
            'type'    => 'textarea',
            'desc'    => esc_html__( 'Copyright Text', 'vistro-core' ),
            'default' => '© Copyright 2023, Vistro All Rights Reserved.',
        ],
    ],
] );
