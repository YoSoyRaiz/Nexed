<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vistro
 */

get_header();

$vistro_error_bg = cs_get_option( 'vistro_error_bg_image', get_template_directory_uri() . '/assets/img/feature/feature-bg-img-1.png');
if(isset($vistro_error_bg['url']) && !empty($vistro_error_bg['url'])) {
	$bg_image_url = $vistro_error_bg['url'];
} else {
	$bg_image_url = get_template_directory_uri() . '/assets/img/feature/feature-bg-img-1.png';
}
if(isset($vistro_error_image['url']) && !empty($vistro_error_image['url'])) {
	$image_url = $vistro_error_image['url'];
} else {
	$image_url = get_template_directory_uri() . '/assets/img/cta/error-404.png';
}

$vistro_error_title = cs_get_option('vistro_error_title', __('Oops! Page Not found.', 'vistro'));
$vistro_error_desc = cs_get_option('vistro_error_desc', vistro_kses_basic('Pellentesque adipiscing commodo elit at imperdiet dui. Sit amet nisl suscipit <br> Iaculis  phasellus vestibulum lorem.', 'vistro'));
$vistro_error_link_text = cs_get_option('vistro_error_link_text', __('Go Back to Home', 'vistro'));
$vistro_error_button_icon = cs_get_option('vistro_error_button_icon', 'fas fa-long-arrow-alt-right');

?>
<div class="erorr-page-area pt-110 pb-110">
	<div class="bg-shape">
		<img src="<?php echo esc_url($bg_image_url); ?>" alt="<?php if(function_exists('vistro_img_alt_text')) { echo vistro_img_alt_text($bg_image_url); } ?>">
	</div>
	<div class="container z-index-3">
		<div class="row">
			<div class="col-12">
				<div class="erorr-page-content text-center">
					<?php if(!empty( $image_url )) : ?>
					<div class="img wow fadeIn" data-wow-delay=".3s">
						<img src="<?php echo esc_url($image_url); ?>" alt="<?php if(function_exists('vistro_img_alt_text')) { echo vistro_img_alt_text($image_url); } ?>">
					</div>
					<?php endif; ?>

					<?php if(!empty( $vistro_error_title )) : ?>
					<h4 class="wow" data-splitting=""><?php print esc_html($vistro_error_title);?></h4>
					<?php endif; ?>

					<?php if(!empty( $vistro_error_desc )) : ?>
					<p class="wow fadeInUp"><?php print vistro_kses_basic($vistro_error_desc);?></p>
					<?php endif; ?>

					<?php if(!empty( $vistro_error_link_text )) : ?>
					<a href="<?php echo home_url(); ?>" class="vst-btn-1">
						<?php print esc_html($vistro_error_link_text);?>
						<?php if(!empty( $vistro_error_button_icon )) : ?>
						<i class="<?php echo esc_attr($vistro_error_button_icon); ?>"></i>
						<?php endif; ?>
					</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
