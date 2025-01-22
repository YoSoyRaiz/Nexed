<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

if ( !class_exists( 'Custom_Xriver_Companion_Post' ) ) {

    class Custom_Xriver_Companion_Post {

        protected static $instance = null;
        private $post_types = [];
        private $taxonomies = [];

        private function __construct() {
            add_action( 'init', [ $this, 'initialize' ] );
        }

        public static function instance() {
            if ( null == self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        public function initialize() {
            $this->register_taxonomies();
            $this->register_custom_post_types();
        }

        public function add_post_types( $post_types ) {

            if ( !empty( $post_types ) ) {

                foreach ( $post_types as $post_type => $args ) {

                    $title = $args['title'];
                    $plural_title = empty( $args['plural_title'] ) ? $title : $args['plural_title'];

                    if ( !empty( $args['rewrite'] ) ) {
                        $args['rewrite'] = [ 'slug' => $args['rewrite'] ];
                    }

                    $labels = [
                        'name'                     => $plural_title,
                        'singular_name'            => $title,
                        'add_new'                  => esc_html__( 'Add New', VISTRO_CORE_TEXT_DOMAIN ),
                        'add_new_item'             => sprintf( esc_html__( 'Add New %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'edit_item'                => sprintf( esc_html__( 'Edit %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'new_item'                 => sprintf( esc_html__( 'New %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'view_item'                => sprintf( esc_html__( 'View %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'view_items'               => sprintf( esc_html__( 'View %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                        'search_items'             => sprintf( esc_html__( 'Search %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                        'not_found'                => sprintf( esc_html__( '%s not found', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                        'not_found_in_trash'       => sprintf( esc_html__( '%s found in Trash', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                        'parent_item_colon'        => '',
                        'all_items'                => sprintf( esc_html__( 'All %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                        'archives'                 => sprintf( esc_html__( '%s Archives', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'attributes'               => sprintf( esc_html__( '%s Attributes', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'insert_into_item'         => sprintf( esc_html__( 'Insert into %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'uploaded_to_this_item'    => sprintf( esc_html__( 'Uploaded to this %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'filter_items_list'        => sprintf( esc_html__( 'Filter %s list', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                        'items_list_navigation'    => sprintf( esc_html__( '%s list navigation', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                        'items_list'               => sprintf( esc_html__( '%s list', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                        'item_published'           => sprintf( esc_html__( '%s published.', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'item_published_privately' => sprintf( esc_html__( '%s published privately.', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'item_reverted_to_draft'   => sprintf( esc_html__( '%s reverted to draft.', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'item_scheduled'           => sprintf( esc_html__( '%s scheduled.', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'item_updated'             => sprintf( esc_html__( '%s  updated.', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                        'menu_name'                => $plural_title,
                    ];

                    if ( !empty( $args['labels_override'] ) ) {
                        $labels = wp_parse_args( $args['labels_override'], $labels );
                    }

                    $defaults = [
                        'labels'             => $labels,
                        'public'             => true,
                        'publicly_queryable' => true,
                        'show_ui'            => true,
                        'show_in_menu'       => true,
                        'show_in_nav_menus'  => true,
                        'query_var'          => true,
                        'has_archive'        => true,
                        'hierarchical'       => false,
                        'menu_position'      => null,
                        'menu_icon'          => null,
                        'supports'           => [ 'title', 'thumbnail', 'editor', 'excerpt', 'elementor' ],
                    ];

                    $args = wp_parse_args( $args, $defaults );
                    $this->post_types[$post_type] = $args;
                    register_post_type( $post_type, $args );
                }
            }
        }

        public function add_taxonomies( $taxonomies ) {

            foreach ( $taxonomies as $taxonomy => $args ) {

                $title = $args['title'];
                $plural_title = !empty( $args['plural_title'] ) ? $args['plural_title'] : $title;

                $labels = [
                    'name'                       => $title,
                    'singular_name'              => $title,
                    'search_items'               => sprintf( esc_html__( 'Search %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'popular_items'              => sprintf( esc_html__( 'Popular %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'all_items'                  => sprintf( esc_html__( 'All %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'parent_item'                => sprintf( esc_html__( 'Parent %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                    'parent_item_colon'          => sprintf( esc_html__( 'Parent %s:', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                    'edit_item'                  => sprintf( esc_html__( 'Edit %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                    'view_item'                  => sprintf( esc_html__( 'View %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                    'update_item'                => sprintf( esc_html__( 'Update %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                    'add_new_item'               => sprintf( esc_html__( 'Add New %s', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                    'new_item_name'              => sprintf( esc_html__( 'New %s Name', VISTRO_CORE_TEXT_DOMAIN ), $title ),
                    'separate_items_with_commas' => sprintf( esc_html__( 'Separate %s with commas', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'add_or_remove_items'        => sprintf( esc_html__( 'Add or remove %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'choose_from_most_used'      => sprintf( esc_html__( 'Choose from the most used %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'not_found'                  => sprintf( esc_html__( 'No %s found.', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'no_terms'                   => sprintf( esc_html__( 'No %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'items_list_navigation'      => sprintf( esc_html__( '%s list navigation', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'items_list'                 => sprintf( esc_html__( '%s list', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'back_to_items'              => sprintf( esc_html__( '&larr; Back to %s', VISTRO_CORE_TEXT_DOMAIN ), $plural_title ),
                    'menu_name'                  => $plural_title,
                ];

                if ( !empty( $args['labels_override'] ) ) {
                    $labels = wp_parse_args( $args['labels_override'], $labels );
                }

                $defaults = [
                    'hierarchical'      => true,
                    'labels'            => $labels,
                    'show_in_nav_menus' => true,
                    'show_ui'           => null,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'rewrite'           => [ 'slug' => $taxonomy ],
                ];

                $args = wp_parse_args( $args, $defaults );
                $this->taxonomies[$taxonomy] = $args;
                register_taxonomy( $taxonomy, $args['post_type'], $args );
            }
        }

        private function register_custom_post_types() {
            $post_types = apply_filters( 'vistro_custom_post_type', $this->post_types );
            $this->add_post_types( $post_types );
        }

        private function register_taxonomies() {
            $taxonomies = apply_filters( 'custom_tx_companion_taxonomies', $this->taxonomies );
            $this->add_taxonomies( $taxonomies );
        }
    }
}

Custom_Xriver_Companion_Post::instance();
