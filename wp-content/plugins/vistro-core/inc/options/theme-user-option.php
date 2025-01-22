<?php

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

    // Set a unique slug-like ID
    $vistro_user = 'vistro_user_option';

    // Create profile options
    CSF::createProfileOptions( $vistro_user, [
        'data_type' => 'serialize',
        'title'     => __( 'User Profile', 'vistroplugin' ),
    ] );

    // Create a section
    CSF::createSection( $vistro_user, [
        'fields' => [

            // vistro_enable_author_box
            [
                'id'      => 'vistro_enable_author_box',
                'type'    => 'switcher',
                'title'   => __( 'Enable Author Box', 'vistroplugin' ),
                'default' => true,
            ],
            [
                'id'         => 'vistro_user_social',
                'type'       => 'repeater',
                'title'      => __( 'Social Links', 'vistroplugin' ),
                'dependency' => ['vistro_enable_author_box', '==', 'true'],
                'fields'     => [
                    [
                        'id'    => 'vistro_user_social_icon',
                        'type'  => 'icon',
                        'title' => __( 'Social Icon', 'vistroplugin' ),
                    ],
                    [
                        'id'    => 'vistro_user_social_link',
                        'type'  => 'text',
                        'title' => __( 'Social Link', 'vistroplugin' ),
                    ],
                ],
                'title_field' => 'vistro_user_social_icon',
            ],
        ],
    ] );

}
