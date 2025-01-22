<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-layouts
 *
 * @package vistro
 */

$preloader_enable = cs_get_option( 'preloader_enable', true );
$enable_scroll_up = cs_get_option( 'enable_scroll_up', true );
$preloader_image = cs_get_option( 'preloader_image', get_template_directory_uri() . '/assets/img/preloader.gif');
$image_url = get_template_directory_uri() . '/assets/img/preloader.gif';

if(isset($preloader_image['url']) && !empty($preloader_image['url'])) {
    $image_url = $preloader_image['url'];
} else {
    $image_url = get_template_directory_uri() . '/assets/img/preloader.gif';
}


?>

<!doctype html>
<html <?php language_attributes();?> <?php print vistro_enable_rtl();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php wp_body_open();?>

<div class="page-wrapper">
    <div class="cursor"></div>
	<div class="cursor-follower"></div>

    <!-- preloader start -->
    <?php if( $preloader_enable == true ) : ?>
    <div id="vistroPreloader">
        <div class="loader">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php if(function_exists('vistro_img_alt_text')) { echo vistro_img_alt_text($image_url); } ?>">
        </div>
    </div>
    <?php endif; ?>
    <!-- preloader end -->

    <!-- offcanvas start -->
    <div class="offcanvas-overlay"></div>

    <!-- back to top start -->
    <?php if( $enable_scroll_up == true ) : ?>
    <div class="scroll-top">
        <div class="scroll-top-wrap">
            <i  class="icon-1 fal fa-long-arrow-up"></i>
        </div>
    </div>
    <?php endif; ?>
    <!-- back to top end -->

    <!-- header start -->
    <?php do_action( 'vistro_header_style' );?>
    <!-- header end -->

    <!-- wrapper-box start -->
    <?php do_action( 'vistro_before_main_content' );?>