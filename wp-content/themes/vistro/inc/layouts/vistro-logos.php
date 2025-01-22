<?php
// header logos
function vistro_header_logo() {
    ?>
    <?php
        $vistro_site_logo = cs_get_option( 'vistro_logo', get_template_directory_uri() . '/assets/img/logo/Logo-white.png');
        if(isset($vistro_site_logo['url'])) {
            $logo_url = $vistro_site_logo['url'];
        } else {
            $logo_url = get_template_directory_uri() . '/assets/img/logo/Logo-white.png';
        }
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
            ?>
            <a class="tx-logo" href="<?php print esc_url( home_url( '/' ) );?>">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php if(function_exists('vistro_img_alt_text')) { echo vistro_img_alt_text($logo_url); } ?>" />
            </a>
            <?php
        }
}

// mobile
function vistro_mobile_logo() {
    ?>
    <?php
        $vistro_mobile_logo = cs_get_option( 'vistro_mobile_logo', get_template_directory_uri() . '/assets/img/logo/Logo-white.png');
        if(isset($vistro_mobile_logo['url'])) {
            $logo_url = $vistro_mobile_logo['url'];
        } else {
            $logo_url = get_template_directory_uri() . '/assets/img/logo/Logo-white.png';
        }
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {

            ?>
            <a class="tx-logo" href="<?php print esc_url( home_url( '/' ) );?>">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php if(function_exists('vistro_img_alt_text')) { echo vistro_img_alt_text($logo_url); } ?>" />
            </a>
            <?php

            }
        ?>
    <?php
}



// side info logo
function vistro_side_info_logo() {
    $vistro_side_info_logo = cs_get_option( 'vistro_side_info_logo', get_template_directory_uri() . '/assets/img/logo/Logo-white.png');
    if(isset($vistro_side_info_logo['url'])) {
        $logo_url = $vistro_side_info_logo['url'];
    } else {
        $logo_url = get_template_directory_uri() . '/assets/img/logo/Logo-white.png';
    }

    ?>
    <a class="tx-logo" href="<?php print esc_url( home_url( '/' ) );?>">
        <img src="<?php print esc_url( $logo_url );?>" alt="<?php if(function_exists('vistro_img_alt_text')) { echo vistro_img_alt_text($logo_url); } ?>" />
    </a>


<?php }