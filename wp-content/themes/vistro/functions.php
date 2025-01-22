<?php

// DEFINE CONSTANTS
define( 'VISTRO_THEME_DIR', get_template_directory() );
define( 'VISTRO_THEME_URI', get_template_directory_uri() );
define( 'VISTRO_THEME_CSS_DIR', VISTRO_THEME_URI . '/assets/css/' );
define( 'VISTRO_THEME_JS_DIR', VISTRO_THEME_URI . '/assets/js/' );
define( 'VISTRO_THEME_INC', VISTRO_THEME_DIR . '/inc/' );
define( 'VISTRO_CORE_PLUG_DIR', plugins_url( 'vistro-core/assets/' ) );
define( 'VISTRO_CORE', in_array( 'vistro-core/vistro-core.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

// INCLUDE CS FRAMEWORK FILE
require VISTRO_THEME_INC . 'csf-functions.php';

if ( site_url() == "https://themexriver.com/wp/vistro" || site_url() == 'http://localhost:10373' ) {
    define( 'VERSION', time() );
} else {
    define( 'VERSION', wp_get_theme()->get( 'Version' ) );
}


// INCLUDE VISTRO AFTER SETUP
require VISTRO_THEME_INC . 'vistro-after-setup.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vistro_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'vistro_content_width', 640 );
}
add_action( 'after_setup_theme', 'vistro_content_width', 0 );

// INCLUDE VISTRO REGISTER WIDGETS
require VISTRO_THEME_INC . 'vistro-register-widgets.php';

// INCLUDE VISTRO ENQUEUE SCRIPTS
require VISTRO_THEME_INC . 'vistro-enqueue-scripts.php';

// INCLUDE CUSTOM HEADER
require VISTRO_THEME_INC . 'custom-header.php';

// INCLUDE CUSTOM FUNCTIONS FILE
require VISTRO_THEME_INC . 'vistro-functions.php';

// INCLUDE CUSTOM CSS
require VISTRO_THEME_INC . 'vistro-custom-css.php';

// INCLUDE DEFAULT COMMENT
require VISTRO_THEME_INC . 'vistro-comment.php';

// INCLUDE LOGO FILE
require VISTRO_THEME_INC . 'layouts/vistro-logos.php';

// INCLUDE MENU FILE
require VISTRO_THEME_INC . 'layouts/vistro-menus.php';

// INCLUDE DEFAULT BREADCRUMB
require VISTRO_THEME_INC . 'layouts/vistro-breadcrumb.php';

// INCLUDE MENU FILE
require VISTRO_THEME_INC . 'layouts/vistro-sideinfo.php';

// INCLUDE ALL ACTION FILE
require VISTRO_THEME_INC . 'layouts/vistro-actions.php';

// INCLUDE SOCIAL LINKS FILE
require VISTRO_THEME_INC . 'layouts/vistro-social-links.php';

// INCLUDE DEFAULT HEADER
require VISTRO_THEME_INC . 'layouts/vistro-default-header.php';

// INCLUDE FOOTER FILE
require VISTRO_THEME_INC . 'layouts/vistro-default-footer.php';

// INCLUDE SEARCH WIDGET FILE
require VISTRO_THEME_INC . 'vistro-search-widget.php';

// LOAD JETPACK COMPATIBILITY FILE
if ( defined( 'JETPACK__VERSION' ) ) {
    require VISTRO_THEME_INC . 'jetpack.php';
}

// ALL CLASS FILE
include_once VISTRO_THEME_INC . 'classes/class-vistro-helper.php';
require_once VISTRO_THEME_INC . 'classes/class-breadcrumb.php';
require_once VISTRO_THEME_INC . 'classes/class-navwalker.php';
require_once VISTRO_THEME_INC . 'classes/class-tgm-plugin-activation.php';
require_once VISTRO_THEME_INC . 'required-plugin.php';
