<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'  => 'Blog Meta Settings',
    'parent' => 'blog_settings',
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Blog Meta Settings', 'vistro-core' ) . '</h3>',
        ],
        // enable default date
        [
            'id'      => 'enable_default_date',
            'type'    => 'switcher',
            'title'   => 'Enable Default Date',
            'default' => false,
        ],
    ],
] );