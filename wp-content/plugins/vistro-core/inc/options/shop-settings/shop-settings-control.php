<?php

CSF::createSection( $prefix . '_theme_options', [
    'title'    => esc_html__( 'Shop Settings ON/OFF', 'vistro-core' ),
    'parent'   => 'shop_settings',
    'priority' => 4,
    'fields'   => [
        [
            'id'      => 'shop_filter',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Shop Filter', 'vistro-core' ),
            'default' => false,
            'desc'    => esc_html__( 'Enable/Disable Shop Filter', 'vistro-core' ),
        ],
        [
            'id'      => 'show_discount_percentage',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable discount percentage', 'vistro-core' ),
            'default' => true,
            'desc'    => esc_html__( 'Enable/Disable discount percentage', 'vistro-core' ),
        ],
        [
            'id'      => 'enable_custom_add_to_cart_text',
            'type'    => 'switcher',
            'title'   => esc_html__( 'Enable custom add to cart text', 'vistro-core' ),
            'default' => false,
            'desc'    => esc_html__( 'Enable/Disable custom add to cart text', 'vistro-core' ),
        ],
        [
            'id'      => 'custom_add_to_cart_text',
            'type'    => 'text',
            'title'   => esc_html__( 'Custom add to cart text', 'vistro-core' ),
            'default' => esc_html__( 'Purchase Now', 'vistro-core' ),
            'desc'    => esc_html__( 'Custom add to cart text', 'vistro-core' ),
            'dependency' => [
                'enable_custom_add_to_cart_text',
                '==',
                'true'
            ]
        ],
    ],
] );