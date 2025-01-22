<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'  => esc_html__( 'Blog Details Settings', 'vistro-core' ),
    'parent' => 'blog_settings',
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Blog Details Settings', 'vistro-core' ) . '</h3>',
        ],
        // enable social share
        [
            'id'      => 'vistro_enable_social_share',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Social Share', 'vistro-core' ),
            'default' => false,
        ],

        // enable blog navigation
        [
            'id'      => 'vistro_enable_blog_navigation',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable Blog Navigation', 'vistro-core' ),
            'default' => false,
        ],
    ],
] );
