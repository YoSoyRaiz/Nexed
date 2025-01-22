<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'  => esc_html__( '404 Page Layout', 'vistro-core' ),
    'parent' => 'theme_layout',
    'priority' => 4,
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( '404 Page Layout', 'vistro-core' ) . '</h3>',
        ],
        // bg_image
        [
            'id'    => 'vistro_error_bg_image',
            'type'  => 'media',
            'title' => esc_html__( 'Error Code Background Image', 'vistro-core' ),
            'default' => get_template_directory_uri() . '/assets/img/feature/feature-bg-img-1.png',
            'desc'  => esc_html__( 'Upload your background image', 'vistro-core' ),
            'help'  => esc_html__( 'This image will be used as background image for 404 page.', 'vistro-core' ),
        ],
        [
            'id'    => 'vistro_error_image',
            'type'  => 'media',
            'title' => esc_html__( 'Error Code Image', 'vistro-core' ),
            'default' => get_template_directory_uri() . '/assets/img/cta/error-404.png',
        ],
        [
            'id'      => 'vistro_error_title',
            'type'    => 'text',
            'title'   => esc_html__( '404 Title', 'vistro-core' ),
            'default' => esc_html__( 'Oops! Page Not found.', 'vistro-core' ),
        ],
        [
            'id'      => 'vistro_error_desc',
            'type'    => 'textarea',
            'title'   => esc_html__( '404 Title', 'vistro-core' ),
            'default' => esc_html__( 'Pellentesque adipiscing commodo elit at imperdiet dui. Sit amet nisl suscipit
            Iaculis phasellus vestibulum lorem.', 'vistro-core' ),
        ],
        [
            'id'      => 'vistro_error_link_text',
            'type'    => 'text',
            'title'   => esc_html__( '404 Button', 'vistro-core' ),
            'default' => esc_html__( 'Go Back to Home ', 'vistro-core' ),
        ],
        // button icon
        [
            'id'      => 'vistro_error_button_icon',
            'type'    => 'icon',
            'title'   => esc_html__( '404 Button Icon', 'vistro-core' ),
            'default' => 'fas fa-long-arrow-alt-right',
        ],
    ],
] );