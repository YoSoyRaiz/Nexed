<?php

/**
 * [vistro_header_social_profiles description]
 * @return [type] [description]
 */
function vistro_header_social_profiles() {

    $socialdefaults = [
        [
            'social_profile_name' => esc_html__( 'facebook-f', 'vistro' ),
            'social_profile_link'  => '#',
        ],
        [
            'social_profile_name' => esc_html__( 'twitter', 'vistro' ),
            'social_profile_link'  => '#',
        ],
        [
            'social_profile_name' => esc_html__( 'youtube', 'vistro' ),
            'social_profile_link'  => '#',
        ],
    ];

    $header_social_links = get_theme_mod( 'header_social_links', $socialdefaults );
    $header_social_switch = get_theme_mod( 'header_social_switch', false );


    if(!empty($header_social_links) && $header_social_switch == true) :
    ?>


    <?php foreach($header_social_links as $header_social_link) : ?>
    <a href="<?php print esc_url( $header_social_link['social_profile_link'] );?>" target="_blank">
        <i class="fab fa-<?php print esc_attr( $header_social_link['social_profile_name'] );?>"></i>
    </a>
    <?php endforeach; ?>


<?php
endif;
}

/**
 * [vistro_sideSocial_profiles description]
 * @return [type] [description]
 */
function vistro_sideSocial_profiles() {

    $socialdefaults = [
        [
            'sideSocial_profile_name' => esc_html__( 'facebook-f', 'vistro' ),
            'sideSocial_profile_link'  => '#',
        ],
        [
            'sideSocial_profile_name' => esc_html__( 'twitter', 'vistro' ),
            'sideSocial_profile_link'  => '#',
        ],
        [
            'sideSocial_profile_name' => esc_html__( 'youtube', 'vistro' ),
            'sideSocial_profile_link'  => '#',
        ],
    ];

    $sideSocial_links = get_theme_mod( 'sideSocial_links', $socialdefaults );


    if(!empty($sideSocial_links)) :
    ?>


    <?php foreach($sideSocial_links as $sideSocial_link) : ?>
    <a href="<?php print esc_url( $sideSocial_link['sideSocial_profile_link'] );?>" target="_blank">
        <i class="fab fa-<?php print esc_attr( $sideSocial_link['sideSocial_profile_name'] );?>"></i>
    </a>
    <?php endforeach; ?>


<?php
endif;
}