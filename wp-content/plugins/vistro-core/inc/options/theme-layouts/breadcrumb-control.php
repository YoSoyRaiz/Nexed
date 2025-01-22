<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'  => esc_html__( 'Breadcrumb Layout', 'vistro-core' ),
    'parent' => 'theme_layout',
    'priority' => 3,
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Breadcrumb Layout', 'vistro-core' ) . '</h3>',
        ],
        [
            'id'      => 'breadcrumb_bg_img',
            'title'   => esc_html__( 'Breadcrumb Image', 'vistro-core' ),
            'type'    => 'media',
            'desc'    => esc_html__( 'Upload breadcrumb Image', 'vistro-core' ),
            'preview_width' => '500',
            'preview_height' => '300',
        ],
        // breadcrub padding
        [
            'id'          => 'breadcrumb_padding',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Breadcrumb Padding', 'choicy-core' ),
            'output'      => '.tx-breadcrumb',
            'output_mode' => 'padding',
            'units'       => [ 'px', 'em' ],
            'default'     => [
                'top'    => '110px',
                'right'  => '0px',
                'bottom' => '120px',
                'left'   => '0px',
            ],
        ],
    ],
] );