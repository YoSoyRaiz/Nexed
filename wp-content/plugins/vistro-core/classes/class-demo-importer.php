<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class OCDI_Demo_Importer {

    public function __construct() {
        add_filter( 'pt-ocdi/import_files', [$this, 'import_files_config'] );
        add_filter( 'pt-ocdi/before_widgets_import', [$this, 'ocdi_before_widgets_import'] );
        add_filter( 'pt-ocdi/after_import', [$this, 'ocdi_after_import_setup'] );
        add_filter( 'pt-ocdi/plugin_page_setup', [$this, 'ta_plugin_page_setup'] );
        add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
        add_action( 'init', [$this, 'THEME_COMPANIONrewrite_flush'] );
        add_filter( 'pt-ocdi/plugin_intro_text', [$this, 'ocdi_plugin_intro_text'] );
    }

    public function import_files_config() {
        $import_path = trailingslashit( VISTRO_CORE_DIR ) . 'admin/demo/';

        $home_prevs = [
            'ta_home_1' => [
                'title'        => __( 'Home 01', VISTRO_CORE_TEXT_DOMAIN ),
                'page'         => __( 'Home', VISTRO_CORE_TEXT_DOMAIN ),
                'screenshot'   => plugins_url( 'admin/demo/preview/home-1.webp', dirname( __FILE__ ) ),
                'preview_link' => 'https://themexriver.com/wp/'.strtolower(tf_theme_name()).'/',
            ],
            'ta_home_2' => [
                'title'        => __( 'Home 02', VISTRO_CORE_TEXT_DOMAIN ),
                'page'         => __( 'Home 02', VISTRO_CORE_TEXT_DOMAIN ),
                'screenshot'   => plugins_url( 'admin/demo/preview/home-2.webp', dirname( __FILE__ ) ),
                'preview_link' => 'https://themexriver.com/wp/'.strtolower(tf_theme_name()).'/home-02',
            ],
            'ta_home_3' => [
                'title'        => __( 'Home 03', VISTRO_CORE_TEXT_DOMAIN ),
                'page'         => __( 'Home 03', VISTRO_CORE_TEXT_DOMAIN ),
                'screenshot'   => plugins_url( 'admin/demo/preview/home-3.webp', dirname( __FILE__ ) ),
                'preview_link' => 'https://themexriver.com/wp/'.strtolower(tf_theme_name()).'/home-03',
            ],
        ];

        $config = [];

        foreach ( $home_prevs as $key => $prev ) {

            $contents_demo = $import_path . 'content.xml';
            $widget_settings = $import_path . 'widgets.wie';
            $customizer_data = $import_path . 'customizer.dat';
            $codestar = $import_path . 'codestar.json';

            $config[] = [
                'import_file_id'               => $key,
                'import_page_name'             => $prev['page'],
                'import_file_name'             => $prev['title'],
                'local_import_file'            => $contents_demo,
                'local_import_widget_file'     => $widget_settings,
                'local_import_customizer_file' => $customizer_data,
                'local_import_json'           => [
                    [
                        'file_path'   => $codestar,
                        'option_name' => 'vistro',
                    ],
                ],
                'import_preview_image_url'     => $prev['screenshot'],
                'preview_url'                  => $prev['preview_link'],
                'import_notice'                => esc_html__( 'After you import this demo, you will have to setup the slider separately.', 'vistro-core' ),
            ];
        }

        return $config;
    }

    public function ocdi_before_widgets_import( $selected_file ) {
        $this->reset_widgets();
    }

    public function ocdi_after_import_setup( $selected_file ) {

        $this->assign_menu_to_location();
        $this->assign_frontpage_id( $selected_file );
        $this->update_permalinks();
        update_option( 'basa_ocdi_importer_flash', true );
    }

    // reset all widgets and import new widgets
    private function reset_widgets() {

        $widgets = get_option( 'sidebars_widgets' );
        unset( $widgets['array_version'] );

        foreach ( $widgets as $widget => $value ) {
            $widgets[$widget] = [];
        }

        update_option( 'sidebars_widgets', $widgets );
    }

    private function assign_menu_to_location() {

        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', [
            'main-menu' => $main_menu->term_id,
        ] );
    }

    private function assign_frontpage_id( $selected_import ) {

        $front_page = get_page_by_title( $selected_import['import_page_name'] );
        $blog_page = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page->ID );
        update_option( 'page_for_posts', $blog_page->ID );
        update_option('elementor_experiment-e_font_icon_svg' , 'inactive');
        if ( class_exists( '\Elementor\Plugin' ) ) {
			global $wpdb;
			$old_url = 'https://themexriver.com/wp/vistro';
			$new_url = get_site_url();
			$escaped_from = str_replace( '/', '\\/', $old_url );
			$escaped_to = str_replace( '/', '\\/', $new_url );
			$meta_value_like = '[%'; // meta_value LIKE '[%' are json formatted
			$rows_affected = $wpdb->query(
				$wpdb->prepare(
					"UPDATE {$wpdb->postmeta} " .
					'SET meta_value = REPLACE(meta_value, %s, %s) ' .
					"WHERE meta_key = '_elementor_data' AND meta_value LIKE %s;",
					$escaped_from,
					$escaped_to,
					$meta_value_like
				)
			);
			if ( false === $rows_affected ) {
				throw new \Exception( 'An error occurred while replacing URL\'s.' );
			}
			// Allow externals to replace-urls, when they have to.
			$rows_affected += (int) apply_filters( 'elementor/tools/replace-urls', 0, $old_url, $new_url );

			\Elementor\Plugin::$instance->files_manager->clear_cache();
		}
    }

    //Personalize
    public function ta_plugin_page_setup( $default_settings ) {
        $default_settings['parent_slug'] = 'themes.php';
        $default_settings['page_title'] = esc_html__( 'Demo Importer', 'vistro-core' );
        $default_settings['menu_title'] = esc_html__( 'Demo Importer', 'vistro-core' );
        $default_settings['capability'] = 'import';
        $default_settings['menu_slug'] = 'tf-demo-importer';

        return $default_settings;
    }

    private function update_permalinks() {
        update_option( 'permalink_structure', '/%postname%/' );
    }

    public function THEME_COMPANIONrewrite_flush() {

        if ( get_option( 'basa_ocdi_importer_flash' ) == true ) {
            flush_rewrite_rules();
            delete_option( 'basa_ocdi_importer_flash' );
        }
    }

    public function ocdi_plugin_intro_text( $default_text ) {

        function xriver_let_to_num( $size ) {
            $l = substr( $size, -1 );
            $ret = substr( $size, 0, -1 );
            switch ( strtoupper( $l ) ) {
            case 'P':
                $ret *= 1024;
            case 'T':
                $ret *= 1024;
            case 'G':
                $ret *= 1024;
            case 'M':
                $ret *= 1024;
            case 'K':
                $ret *= 1024;
            }
            return $ret;
        }
        $ssl_check = 'https' === substr( get_home_url(), 0, 5 );
        $green_mark = '<mark class="green"><span class="dashicons dashicons-yes"></span></mark>';

        $tatheme = wp_get_theme();

        $plugins_counts = (array) get_option( 'active_plugins', [] );

        if ( is_multisite() ) {
            $network_activated_plugins = array_keys( get_site_option( 'active_sitewide_plugins', [] ) );
            $plugins_counts = array_merge( $plugins_counts, $network_activated_plugins );
        }

        $default_text = '';

        $default_text .= '
            <table class="system-status-table">
            <h1>'.esc_html__('Importan Notice: Before demo import please make sure your server meet(green) all required options for importing demo data').'</h1>
            <p>'.esc_html__('If any of the option is under red mark, please contact your hosting provider and ask them to change it as recommended.').'</p>
            <tbody>
            <tr>
                <td>' . esc_html__("WP Version", "vistro-core") . '</td>
                <td>
                ' . esc_html($GLOBALS['wp_version']) . '
                <mark class="green">- We recommend using WordPress version 5.1 or above for greater performance and security.</mark></td>
            </tr>
            <tr>
                <td>' . esc_html__("Language", "vistro-core") . '</td>
                <td>' . get_locale() . '</td>
            </tr>
            <tr>
            <td>' . esc_html__("WP Memory Limit", "vistro-core") . '</td>
            <td>';

                $memory = xriver_let_to_num(WP_MEMORY_LIMIT);
                if ($memory < 100663296) {
                    $default_text .= '
                    <mark class="error">' . sprintf(esc_html__('%s - We recommend setting memory to at least 256MB. %s.', "vistro-core"), size_format($memory), '
                        <a href="' . esc_url('//www.wpbeginner.com/wp-tutorials/fix-wordpress-memory-exhausted-error-increase-php-memory/') . '" target="_blank">' . esc_html__('More info', "vistro-core") . '</a>') . '
                    </mark>';
                } else {
                    $default_text .= '
                    <mark class="green">' . size_format($memory) . '</mark>';
                }

                $default_text .= '
                    </td>
                </tr>
                <tr>
                    <td>' . esc_html__('PHP Max Input Vars', "vistro-core") . '</td>
                    <td>';

                $max_input = ini_get('max_input_vars');
                if ($max_input < 3000) {
                    $default_text .= '
                    <mark class="error">' . sprintf(wp_kses(__( '%s - We recommend setting PHP max_input_vars to at least 3000. See:
                        <a href="%s" target="_blank">Increasing the PHP max vars limit</a>', "vistro-core"), ['a' => ['href' => [], 'target' => []]]), $max_input, '//teconce.com/support/2018/12/05/increasing-max-input-vars/') . '
                    </mark>';
                } else {
                    $default_text .= '
                    <mark class="green">' . $max_input . '</mark>';
                }

                $default_text .= ' </td>
                </tr>
                <tr>
                    <td>' . esc_html__('PHP Version', "vistro-core") . ' </td>
                    <td>';

                $mayo_php = phpversion();
                if (version_compare($mayo_php, '7.2', '<')) {
                    $default_text .= sprintf('
                    <mark class="error"> %s </mark> - We recommend using PHP version 7.2 or above for greater performance and security.', esc_html($mayo_php), '');
                } else {
                    $default_text .= '
                    <mark class="green">' . esc_html($mayo_php) . '</mark>';
                }

                $default_text .= ' </td>
                </tr>
                <tr>
                    <td>' . esc_html__('Server Info', "vistro-core") . ' </td>
                    <td>' . esc_html($_SERVER['SERVER_SOFTWARE']) . '</td>
                </tr>
                <tr>
                    <td>' . esc_html__('Secure Connection(HTTPS)', "vistro-core") . ' </td>
                    <td>' . (esc_attr($ssl_check) ? $green_mark : '<mark class="error">Your site is not using a secure connection (HTTPS).</mark>') . '</td>
                </tr>
                </tbody>
                </table>
                ';

                return $default_text;

    }
}

new OCDI_Demo_Importer;