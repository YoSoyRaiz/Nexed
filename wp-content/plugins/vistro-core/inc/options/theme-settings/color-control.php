<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'  => esc_html__( 'Color Settings', 'vistro-core' ),
    'parent' => 'theme_settings',
    'priority' => 2,
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Color Settings', 'vistro-core' ) . '</h3>',
        ],
        [
            'id'      => 'theme_primary_color',
            'type'    => 'color',
            'title'   => 'Theme Primary Color',
            'default' => '#001aff',
        ],
    ],
] );