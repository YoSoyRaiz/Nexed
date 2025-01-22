<?php

/**
 * Default Header Style
 */
function vistro_default_header() {
		if ( has_nav_menu( 'main-menu' ) ) {
			$no_menu_class = '';
		} else {
			$no_menu_class = 'no-menu';
		}
    ?>
	<header class="vst-header-1-area tx-header tx-defaultHeader <?php echo esc_attr( $no_menu_class ); ?>">
		<div class="vst-header-1-content d-flex align-items-center justify-content-between justify-content-lg-center">
			<div class="brand-logo m-0">
				<?php function_exists( 'vistro_header_logo' ) ? vistro_header_logo() : '';?>
			</div>
			<div class="vst-header-1-main-navigation d-none d-lg-block ml-100">
				<nav class="main-navigation clearfix ul-li">
					<?php function_exists( 'vistro_header_menu' ) ? vistro_header_menu( 'main-menu' ) : null;?>
				</nav>
			</div>
			<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
			<div class="vst-header-1-action d-flex align-items-center d-lg-none">
				<div class="mobile_menu_button open_mobile_menu ">
					<div class="icon">
						<span class="icon-dot"></span>
						<span class="icon-dot"></span>
						<span class="icon-dot"></span>
						<span class="icon-dot"></span>
						<span class="icon-dot"></span>
						<span class="icon-dot"></span>
						<span class="icon-dot"></span>
						<span class="icon-dot"></span>
						<span class="icon-dot"></span>
					</div>
					<span class="text"><?php echo esc_html__('menu', 'vistro'); ?></span>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<div class="mobile_menu position-relative">
			<div class="mobile_menu_wrap">
				<div class="mobile_menu_overlay open_mobile_menu"></div>
				<div class="mobile_menu_content">
					<div class="mobile_menu_close open_mobile_menu">
						<i class="fal fa-times"></i>
					</div>
					<div class="m-brand-logo">
						<?php function_exists( 'vistro_header_logo' ) ? vistro_header_logo() : '';?>
					</div>
					<nav class="mobile-main-navigation  clearfix ul-li">
						<?php function_exists( 'vistro_header_menu' ) ? vistro_header_menu( 'main-menu' ) : null;?>
					</nav>
				</div>
			</div>
		</div>
	</header>
    <?php
}
