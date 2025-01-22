<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'  => 'Blog Button Settings',
    'parent' => 'blog_settings',
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Blog Button Settings', 'vistro-core' ) . '</h3>',
        ],
        // blog_button_text
        [
            'id'      => 'blog_button_text',
            'type'    => 'text',
            'title'   => 'Blog Button Text',
            'default' => 'Read More',
        ],
        // blog_button_icon
        [
            'id'      => 'blog_button_icon',
            'type'    => 'icon',
            'title'   => 'Blog Button Icon',
            'default' => 'fas fa-long-arrow-alt-right',
        ],
    ],
] );