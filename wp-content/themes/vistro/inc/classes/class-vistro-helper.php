<?php

if ( !class_exists( 'vistroHelper' ) ) {
    class Vistro_Helper {

        /**
         * Header Template
         *
         * @return  [type]  [return description]
         */
        public static function vistro_header_template() {
            $meta = get_post_meta( get_the_ID(), 'vistro_page_meta', true );
            $meta_header_option = isset( $meta['meta_header_type'] ) ? $meta['meta_header_type'] : '';

            $f_style = cs_get_option( 'header_style' );
            $header_style = '';

            $meta_header = isset( $meta['meta_header_style'] ) ? $meta['meta_header_style'] : '';

            if ( $meta_header_option == true || $meta_header_option == 1 ) {
                $header_style .= $meta_header;
            } else {
                $header_style .= $f_style;
            }

            if ( $header_style && ( get_post( $header_style ) ) && in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {?>
				<?php $elementor_instance = Elementor\Plugin::instance();?>
					<?php echo Vistro_Core_Helper::vistro_render_header( $header_style ); ?>
				<?php
			} else {
                function_exists( 'vistro_default_header' ) ? vistro_default_header() : '';
            }
        }

        /**
         * Footer Template
         *
         * @return  [type]  [return description]
         */
        public static function vistro_footer_template() {
            $meta = get_post_meta( get_the_ID(), 'vistro_page_meta', true );
            $meta_footer_option = isset( $meta['meta_footer_type'] ) ? $meta['meta_footer_type'] : '';

            $f_style = cs_get_option( 'footer_style' );
            $footer_style = '';

            $meta_footer = isset( $meta['meta_footer_style'] ) ? $meta['meta_footer_style'] : '';

            if ( $meta_footer_option == true || $meta_footer_option == 1 ) {
                $footer_style .= $meta_footer;
            } else {
                $footer_style .= $f_style;
            }

            if ( $footer_style && ( get_post( $footer_style ) ) && in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {?>
				<?php $elementor_instance = Elementor\Plugin::instance();?>
					<?php echo Vistro_Core_Helper::vistro_render_footer( $footer_style ); ?>
				<?php
			} else {
                function_exists( 'vistro_default_footer' ) ? vistro_default_footer() : '';
            }
        }

    }

    // Instantiate theme
    new Vistro_Helper();
}