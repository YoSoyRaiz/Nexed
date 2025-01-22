<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Plugin Name: Vistro Core
 * Plugin URI: https://themexriver.com/
 * Description: Vistro Core is a reliable and feature-rich WordPress plugin developed by themexriver.
 * Version: 1.0.5
 * Author: themexriver
 * Author URI: https://themexriver.com/
 * Text Domain: vistro-core
 */

define( 'VISTRO_CORE_DIR', plugin_dir_path( __FILE__ ) );
define( 'VISTRO_CORE_URL', plugin_dir_url( __FILE__ ) );
define( 'TA_ASSETS', trailingslashit( VISTRO_CORE_URL . 'assets' ) );

define( 'VISTRO_CORE_TEXT_DOMAIN', 'tf-companion' );
define( 'VISTRO_CORE_PLUGIN_ACTIVED', in_array( 'vistro-core/vistro-core.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

if ( !defined( 'VISTRO_CORE_WOOCOMMERCE_ACTIVED' ) ) {
    define( 'VISTRO_CORE_WOOCOMMERCE_ACTIVED', in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
}

// load plugin text domain
function vistro_core_load_textdomain() {
    load_plugin_textdomain( VISTRO_CORE_TEXT_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'vistro_core_load_textdomain' );

final class Theme_Companion {

    private static $instance;

    function __construct() {

        if ( file_exists( VISTRO_CORE_DIR . '/lib/codestar-framework/codestar-framework.php' ) ) {
            require_once VISTRO_CORE_DIR . '/lib/codestar-framework/codestar-framework.php';
        }

        require_once VISTRO_CORE_DIR . '/inc/custom-post.php';
        require_once VISTRO_CORE_DIR . '/classes/class-demo-importer.php';

        /**
         * widgets
         */
        $footer_widgets = glob( VISTRO_CORE_DIR . '/widgets/*.php' );
        if ( $footer_widgets ) {
            foreach ( $footer_widgets as $footer_widget ) {
                require $footer_widget;
            }
        }

        // INCLUDE ALL OPTIONS
        require_once VISTRO_CORE_DIR . '/classes/vistro-plugin-helper.php';
        require_once VISTRO_CORE_DIR . '/inc/options/theme-metabox.php';
        require_once VISTRO_CORE_DIR . '/inc/options/theme-option.php';
        require_once VISTRO_CORE_DIR . '/inc/options/theme-user-option.php';

        add_filter( 'template_include', [$this, '_custom_template_include'] );
    }

    public static function instance() {

        if ( !isset( self::$instance ) && !( self::$instance instanceof Theme_Companion ) ) {
            self::$instance = new Theme_Companion;
        }
        return self::$instance;
    }

    public function _custom_template_include( $template ) {
        $post_types = vistro_core_post_types();

        if ( !empty( $post_types ) ) {
            foreach ( $post_types as $post_type => $fields ) {
                if ( is_singular( $post_type ) ) {
                    return $this->_get_custom_template( 'single-' . $post_type . '.php' );
                }
            }
        }
        return $template;

    }

    public function _get_custom_template( $template ) {
        if ( $theme_file = locate_template( [$template] ) ) {
            $file = $theme_file;
        } else {
            $file = VISTRO_CORE_DIR . 'template/' . $template;
        }
        return apply_filters( __FUNCTION__, $file, $template );
    }

}

function Theme_Companion() {
    return Theme_Companion::instance();
}
Theme_Companion();

if ( file_exists( VISTRO_CORE_DIR . '/admin/admin-init.php' ) ) {
    require_once VISTRO_CORE_DIR . '/admin/admin-init.php';
}

function ta_enqueue_custom_admin_style() {
    wp_register_style( 'custom_wp_admin_css', VISTRO_CORE_URL . 'assets/css/admin.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'ta_enqueue_custom_admin_style' );

// custom admin script
function ta_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script( 'xpress-main', VISTRO_CORE_URL . 'assets/js/main.js', ['jquery'], false, true );
}
add_action( 'admin_enqueue_scripts', 'ta_admin_scripts' );

/**
 *
 */
function vistro_core_post_types() {

    if ( function_exists( 'cs_get_option' ) ) {
        // services
        $tx_service_slug = cs_get_option( 'tx_service_slug' );
        $tx_service_title = cs_get_option( 'tx_service_title' );
    }
    if ( !isset( $tx_service_slug ) ) {
        $tx_service_slug = 'tx-services';
    }
    if ( !isset( $tx_service_title ) ) {
        $tx_service_title = 'Vistro Services';
    }

    return [
        'tf-header' => [
            'title'        => 'Header Builder',
            'plural_title' => 'Header Builder',
            'rewrite'      => 'tf-header',
            'menu_icon'    => 'dashicons-editor-insertmore',
            'menu_position' => 6,
        ],
        'tf-footer' => [
            'title'        => 'Footer Builder',
            'plural_title' => 'Footer Builder',
            'rewrite'      => 'tf-footer',
            'menu_icon'    => 'dashicons-editor-insertmore',
            'menu_position' => 6,
        ],
        // services
        'services'   => [
            'title'        => 'Services',
            'plural_title' => 'Vistro Services',
            'plural_title'  => '' . $tx_service_title . '',
            'rewrite'       => '' . $tx_service_slug . '',
            'menu_icon'    => 'dashicons-tickets',
            'menu_position' => 4,
        ],
    ];
}

add_filter( 'vistro_custom_post_type', 'vistro_core_post_types' );

/**
 * Custom Taxonomies
 */
function tx_custom_taxonomies() {
    return [
        'project-categories' => [
            'title'        => 'Project Category',
            'plural_title' => 'Project Categories',
            'rewrite'      => 'project-cat',
            'post_type'    => 'projects',
        ],
    ];
}

add_filter( 'custom_tx_companion_taxonomies', 'tx_custom_taxonomies' );

// post scial share
function vistro_social_share() {
    $post_link = get_permalink(get_the_ID());
    $post_title = get_the_title(get_the_ID());

    $html = '<h6 class="title h1-heading">' . esc_html__('Share:', 'vistro-core') . '</h6>';
    $html .= '<a href="https://twitter.com/intent/tweet?url=' . esc_url($post_link) . '&text=' . urlencode($post_title) . '"><i class="fab fa-twitter"></i></a>';
    $html .= '<a class="fb" onClick="window.open(\'http://www.facebook.com/sharer.php?u=' . esc_url($post_link) . '\',\'Facebook\',\'width=600,height=300,left=\'+(screen.availWidth/2-300)+\',top=\'+(screen.availHeight/2-150)+\'\'); return false;" href="http://www.facebook.com/sharer.php?u=' . esc_url($post_link) . '"><i class="fab fa-facebook-f"></i></a>';
    $html .= '<a href="https://www.linkedin.com/sharing/share-offsite/?url=' . esc_url($post_link) . '"><i class="fab fa-linkedin-in"></i></a>';
    $html .= '<a href="https://pinterest.com/pin/create/button/?url=' . esc_url($post_link) . '&media=&description=' . urlencode($post_title) . '"><i class="fab fa-pinterest"></i></a>';

    return $html;
}
// wishlist button function
function vistro_wishlist_button() {
    global $product;
    $html = '';

    if ( class_exists( 'WPCleverWoosw' ) && VISTRO_CORE_WOOCOMMERCE_ACTIVED ) {
        $html .= '<div class="tx-wishlistButton">';
        $html .= do_shortcode( '[woosw id="' . esc_attr( $product->get_id() ) . '"]' );
        $html .= '</div>';
    }

    return $html;
}

// vistro quick view button
function vistro_quick_view_button() {
    global $product;
    $html = '';

    if ( class_exists( 'WPCleverWoosq' ) && VISTRO_CORE_WOOCOMMERCE_ACTIVED ) {
        $html .= '<div class="tx-quickViewButton">';
        $html .= do_shortcode( '[woosq id="' . esc_attr( $product->get_id() ) . '"]' );
        $html .= '</div>';
    }

    return $html;
}

// required files
require_once VISTRO_CORE_DIR . '/element-init.php';

// required files
// require_once( VISTRO_CORE_DIR . '/admin/inc/functions.php' );
// require_once( VISTRO_CORE_DIR . '/admin/inc/core.php' );

// remove auto p from contact form 7
add_filter( 'wpcf7_autop_or_not', '__return_false' );

// dequeue swiper & animate css & js from elementor
function vistro_dequeue_scripts() {
    wp_deregister_style( 'swiper' );
    wp_deregister_style( 'e-animations' );
}
add_action( 'wp_enqueue_scripts', 'vistro_dequeue_scripts' );