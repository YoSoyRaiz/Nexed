<?php

namespace ElementHelper\Widget;
use \ElementHelper\Element_El_Select2;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;

defined( 'ABSPATH' ) || die();

class Trending_Posts extends Element_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Vistro Core widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name() {
        return 'trending_posts';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __( 'Trending Posts', 'vistro-core' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.themexriver.com/widgets/post-list/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'elh-widget-icon eicon-parallax';
    }

    public function get_keywords() {
        return ['posts', 'post', 'list', 'blog', 'recent', 'trending', 'trending posts', 'trending post'];
    }

    /**
     * Get a list of All Post Types
     *
     * @return array
     */
    public function get_post_types() {
        $post_types = elh_element_get_post_types( [], ['elementor_library', 'attachment'] );
        return $post_types;
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label'              => __( 'Design Style', 'vistro-core' ),
                'type'               => Controls_Manager::SELECT,
                'options'            => [
                    'style_1' => __( 'Style 1', 'vistro-core' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_post_list',
            [
                'label' => __( 'Treanding Posts', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label'   => __( 'Source', 'vistro-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => $this->get_post_types(),
                'default' => key( $this->get_post_types() ),
            ]
        );

        $this->add_control(
            'show_post_by',
            [
                'label'   => __( 'Show post by:', 'vistro-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'recent',
                'options' => [
                    'recent'   => __( 'Recent Post', 'vistro-core' ),
                    'selected' => __( 'Selected Post', 'vistro-core' ),
                ],

            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label'     => __( 'Item Limit', 'vistro-core' ),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 3,
                'dynamic'   => ['active' => true],
                'condition' => [
                    'show_post_by' => ['recent'],
                ],
            ]
        );

        $repeater = [];

        foreach ( $this->get_post_types() as $key => $value ) {

            $repeater[$key] = new Repeater();

            $repeater[$key]->add_control(
                'image',
                [
                    'label'       => __( 'Customize Image', 'vistro-core' ),
                    'type'        => Controls_Manager::MEDIA,
                    'label_block' => true,
                    'dynamic'     => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'title',
                [
                    'label'       => __( 'Title', 'vistro-core' ),
                    'type'        => Controls_Manager::TEXT,
                    'label_block' => true,
                    'placeholder' => __( 'Customize Title', 'vistro-core' ),
                    'dynamic'     => [
                        'active' => true,
                    ],
                ]
            );

            $repeater[$key]->add_control(
                'post_id',
                [
                    'label'        => __( 'Select ', 'vistro-core' ) . $value,
                    'label_block'  => true,
                    'type'         => Element_El_Select2::TYPE,
                    'multiple'     => false,
                    'placeholder'  => 'Search ' . $value,
                    'data_options' => [
                        'post_type' => $key,
                        'action'    => 'elh_element_post_list_query',
                    ],
                ]
            );

            $this->add_control(
                'selected_list_' . $key,
                [
                    'label'       => '',
                    'type'        => Controls_Manager::REPEATER,
                    'fields'      => $repeater[$key]->get_controls(),
                    'title_field' => '{{ title }}',
                    'condition'   => [
                        'show_post_by' => 'selected',
                        'post_type'    => $key,
                    ],
                ]
            );
        }

        $this->end_controls_section();

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'feature_image',
            [
                'label'        => __( 'Featured Image', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'post_image',
                'default'   => 'full',
                'exclude'   => [
                    'custom',
                ],
                'condition' => [
                    'feature_image' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'meta',
            [
                'label'        => __( 'Show Meta', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->add_control(
            'date_meta',
            [
                'label'        => __( 'Date', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'meta' => 'yes',
                ],
            ]
        );

        // enable default date
        $this->add_control(
            'enable_default_date',
            [
                'label'        => __( 'Enable Default Date', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'meta' => 'yes',
                    'date_meta' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $dir = dirname( __FILE__ );
        if ( !$settings['post_type'] ) {
            return;
        }

        $args = [
            'post_status' => 'publish',
            'post_type'   => $settings['post_type'],
        ];
        if ( 'recent' === $settings['show_post_by'] ) {
            $args['posts_per_page'] = $settings['posts_per_page'];
        }

        $selected_post_type = 'selected_list_' . $settings['post_type'];

        $customize_img = [];
        $ids = [];
        if ( 'selected' === $settings['show_post_by'] ) {
            $args['posts_per_page'] = -1;
            $lists = $settings[$selected_post_type];
            if ( !empty( $lists ) ) {
                foreach ( $lists as $index => $value ) {
                    $post_id = !empty( $value['post_id'] ) ? $value['post_id'] : 0;
                    $ids[] = $post_id;
                    if ( $value['image'] ) {
                        $customize_img[$post_id] = $value['image'];
                    }

                }
            }
            $args['post__in'] = (array) $ids;
            $args['orderby'] = 'post__in';
        }

        $customize_title = [];
        $ids = [];
        if ( 'selected' === $settings['show_post_by'] ) {
            $args['posts_per_page'] = -1;
            $lists = $settings['selected_list_' . $settings['post_type']];
            if ( !empty( $lists ) ) {
                foreach ( $lists as $index => $value ) {
                    $post_id = !empty( $value['post_id'] ) ? $value['post_id'] : 0;
                    $ids[] = $post_id;
                    if ( $value['title'] ) {
                        $customize_title[$post_id] = $value['title'];
                    }

                }
            }
            $args['post__in'] = (array) $ids;
            $args['orderby'] = 'post__in';
        }

        if ( 'selected' === $settings['show_post_by'] && empty( $ids ) ) {
            $posts = [];
        } else {
            $posts = get_posts( $args );
        }

        if ( 'selected' === $settings['show_post_by'] && empty( $ids ) ) {
            $posts = [];
        } else {
            $posts = get_posts( $args );
        }

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_6' ):
            include $dir . '/views/view-6.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_2' ):
            include $dir . '/views/view-2.php';
        else:
            include $dir . '/views/view-1.php';
        endif;
    }
}
