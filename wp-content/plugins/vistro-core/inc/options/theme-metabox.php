<?php
/*
 * Theme Metabox
 * @package vistrotools
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {

    $prefix = 'vistro';

    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $page_metabox = 'vistro_page_meta';

    CSF::createMetabox( $page_metabox, [
        'title'     => 'Page Options',
        'post_type' => ['page'],
    ] );

    // Header Section
    CSF::createSection( $page_metabox, [
        'title'  => 'Header',
        'fields' => [
            [
                'type'    => 'subheading',
                'content' => esc_html__( 'HEADER OPTIONS', 'vistro-core' ),
            ],

            [
                'id'       => 'meta_header_type',
                'type'     => 'switcher',
                'title'    => __( 'Enable Header From Page?', 'vistroplugin' ),
                'text_on'  => __( 'Yes', 'vistroplugin' ),
                'text_off' => __( 'No', 'vistroplugin' ),
                'default'  => false,
            ],
            [
                'id'         => 'meta_header_style',
                'type'       => 'select',
                'title'      => __( 'Select Header Style', 'vistroplugin' ),
                'options'    => Vistro_Core_Helper::get_header_types(),
                'dependency' => ['meta_header_type', '==', 'true'],
            ],
            [
                'id'       => 'page_header_disable',
                'type'     => 'switcher',
                'title'    => __( 'DIsable This page Header?', 'vistroplugin' ),
                'text_on'  => __( 'Yes', 'vistroplugin' ),
                'text_off' => __( 'No', 'vistroplugin' ),
                'default'  => false,
            ],
        ],
    ] );

    // Breadcrumb Section
    CSF::createSection( $page_metabox, [
        'title'  => 'Page Breadcrumb',
        'fields' => [
            [
                'type'    => 'subheading',
                'content' => esc_html__( 'BREADCRUMB OPTIONS', 'vistro-core' ),
            ],
            [
                'id'       => 'enable_page_preadcrumb',
                'type'     => 'switcher',
                'title'    => __( 'Enable Breadcrumb?', 'vistroplugin' ),
                'text_on'  => __( 'Yes', 'vistroplugin' ),
                'text_off' => __( 'No', 'vistroplugin' ),
                'default'  => true,
            ],
            [
                'id'         => 'hide_bg_img',
                'type'       => 'switcher',
                'title'      => __( 'Hide Image?', 'vistroplugin' ),
                'text_on'    => __( 'Yes', 'vistroplugin' ),
                'text_off'   => __( 'No', 'vistroplugin' ),
                'default'    => true,
                'dependency' => ['enable_page_preadcrumb', '==', 'true'],
            ],
            [
                'id'         => 'bg_img_from_page',
                'type'       => 'media',
                'title'      => esc_html__( 'Page Breadcrumb Background Image', 'vistro-core' ),
                'dependency' => ['enable_page_preadcrumb', '==', 'true'],
                'dependency' => [
                    ['enable_page_preadcrumb', '==', 'true'],
                    ['hide_bg_img', '!=', 'true'],
                ],

            ],
            [
                'id'         => 'page_custom_title',
                'type'       => 'text',
                'title'      => esc_html__( 'Page Custom Title', 'vistro-core' ),
                'dependency' => ['enable_page_preadcrumb', '==', 'true'],
            ],

        ],
    ] );

    // Header Section
    CSF::createSection( $page_metabox, [
        'title'  => 'Footer',
        'fields' => [
            [
                'type'    => 'subheading',
                'content' => esc_html__( 'FOOTER OPTIONS', 'vistro-core' ),
            ],
            [
                'id'       => 'meta_footer_type',
                'type'     => 'switcher',
                'title'    => __( 'Enable Footer From Page?', 'vistroplugin' ),
                'text_on'  => __( 'Yes', 'vistroplugin' ),
                'text_off' => __( 'No', 'vistroplugin' ),
                'default'  => false,
            ],
            [
                'id'         => 'meta_footer_style',
                'type'       => 'select',
                'title'      => __( 'Select Footer Style', 'vistroplugin' ),
                'options'    => Vistro_Core_Helper::get_footer_types(),
                'dependency' => ['meta_footer_type', '==', 'true'],
            ],
            [
                'id'       => 'page_footer_disable',
                'type'     => 'switcher',
                'title'    => __( 'DIsable This page Footer?', 'vistroplugin' ),
                'text_on'  => __( 'Yes', 'vistroplugin' ),
                'text_off' => __( 'No', 'vistroplugin' ),
                'default'  => false,
            ],

        ],
    ] );

    // post audio meta options
    $post_audio_metabox = 'vistro_post_audio_meta';

    CSF::createMetabox( $post_audio_metabox, [
        'title'        => 'Post Options',
        'post_type'    => ['post'],
        'post_formats' => ['audio'],
    ] );

    CSF::createSection( $post_audio_metabox, [
        'fields' => [
            [
                'id'      => 'post_audio_link',
                'type'    => 'text',
                'title'   => __( 'Audio Link', 'vistroplugin' ),
                'default' => '',
            ],
        ],
    ] );

    // post video meta options
    $post_video_metabox = 'vistro_post_video_meta';

    CSF::createMetabox( $post_video_metabox, [
        'title'        => 'Post Options',
        'post_type'    => ['post'],
        'post_formats' => ['video'],
    ] );

    CSF::createSection( $post_video_metabox, [
        'fields' => [
            [
                'id'      => 'post_video_link',
                'type'    => 'text',
                'title'   => __( 'Video Link', 'vistroplugin' ),
                'default' => '',
            ],
        ],
    ] );

    // post gallery meta options
    $post_gallery_metabox = 'vistro_post_gallery_meta';

    CSF::createMetabox( $post_gallery_metabox, [
        'title'        => 'Post Options',
        'post_type'    => ['post'],
        'post_formats' => ['gallery'],
    ] );

    CSF::createSection( $post_gallery_metabox, [
        'fields' => [
            [
                'id'    => 'post_gallery_images',
                'type'  => 'gallery',
                'title' => __( 'Gallery Images', 'vistroplugin' ),
            ],
        ],
    ] );

    // product meta options
    $product_metabox = 'vistro_product_meta';

    CSF::createMetabox( $product_metabox, [
        'title'     => 'Product Options',
        'post_type' => ['product'],
    ] );

    // product badge
    CSF::createSection( $product_metabox, [
        'title'  => 'Product Badge',
        'fields' => [
            [
                'type'    => 'subheading',
                'content' => esc_html__( 'Product Badge', 'vistro-core' ),
            ],
            [
                'id'       => 'enable_product_badge',
                'type'     => 'switcher',
                'title'    => __( 'Product Badge', 'vistroplugin' ),
                'text_on'  => __( 'Yes', 'vistroplugin' ),
                'text_off' => __( 'No', 'vistroplugin' ),
                'default'  => false,
            ],
            [
                'id'         => 'product_badge_text',
                'type'       => 'text',
                'title'      => esc_html__( 'Product Badge Text', 'vistro-core' ),
                'default'    => 'New',
                'dependency' => ['enable_product_badge', '==', 'true'],
            ],
        ],
    ] );

    // product meta options
    $movie_metabox = 'vistro_movie_meta';

    CSF::createMetabox( $movie_metabox, [
        'title'     => 'Movie Info',
        'post_type' => ['movies'],
    ] );

    // product badge
    CSF::createSection( $movie_metabox, [
        'title'  => 'Movie Info',
        'fields' => [
            [
                'type'    => 'subheading',
                'content' => esc_html__( 'Movie Info', 'vistro-core' ),
            ],

            // year label
            [
                'id'         => 'movie_year_label',
                'type'       => 'text',
                'title'      => esc_html__( 'Movie Year Label', 'vistro-core' ),
                'default'    => 'Year',
            ],

            // relase year
            [
                'id'         => 'movie_release_year',
                'type'       => 'text',
                'title'      => esc_html__( 'Movie Release Year', 'vistro-core' ),
                'default'    => '',
            ],

            // country label
            [
                'id'         => 'movie_rating_label',
                'type'       => 'text',
                'title'      => esc_html__( 'Movie Rating Label', 'vistro-core' ),
                'default'    => 'Rating',
            ],

            // movie rating
            [
                'id'         => 'movie_rating',
                'type'       => 'text',
                'title'      => esc_html__( 'Movie Rating', 'vistro-core' ),
            ],

            // video link
            [
                'id'         => 'movie_video_link',
                'type'       => 'text',
                'title'      => esc_html__( 'Movie Video Link', 'vistro-core' ),
            ],
        ],
    ] );

} //endif
