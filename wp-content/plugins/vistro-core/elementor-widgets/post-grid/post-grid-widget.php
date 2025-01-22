<?php

namespace ElementHelper\Widget;
use \ElementHelper\Element_El_Select2;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;

defined( 'ABSPATH' ) || die();

class Post_Grid extends Element_El_Widget {

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
        return 'post_grid';
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
        return __( 'Post Grid', 'vistro-core' );
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
        return ['posts', 'post', 'post-grid', 'grid', 'news', 'blog'];
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

    public function elh_element_animations() {
        return [
            'none'              => __( 'None', 'telnet-core' ),
            'fadeIn'            => __( 'Fade In', 'telnet-core' ),
            'fadeInUp'          => __( 'Fade In Up', 'telnet-core' ),
            'fadeInDown'        => __( 'Fade In Down', 'telnet-core' ),
            'fadeInLeft'        => __( 'Fade In Left', 'telnet-core' ),
            'fadeInRight'       => __( 'Fade In Right', 'telnet-core' ),
            'fadeInUpBig'       => __( 'Fade In Up Big', 'telnet-core' ),
            'fadeInDownBig'     => __( 'Fade In Down Big', 'telnet-core' ),
            'fadeInLeftBig'     => __( 'Fade In Left Big', 'telnet-core' ),
            'fadeInRightBig'    => __( 'Fade In Right Big', 'telnet-core' ),
            'bounceIn'          => __( 'Bounce In', 'telnet-core' ),
            'bounceInUp'        => __( 'Bounce In Up', 'telnet-core' ),
            'bounceInDown'      => __( 'Bounce In Down', 'telnet-core' ),
            'bounceInLeft'      => __( 'Bounce In Left', 'telnet-core' ),
            'bounceInRight'     => __( 'Bounce In Right', 'telnet-core' ),
            'rotateIn'          => __( 'Rotate In', 'telnet-core' ),
            'rotateInUpLeft'    => __( 'Rotate In Up Left', 'telnet-core' ),
            'rotateInDownLeft'  => __( 'Rotate In Down Left', 'telnet-core' ),
            'rotateInUpRight'   => __( 'Rotate In Up Right', 'telnet-core' ),
            'rotateInDownRight' => __( 'Rotate In Down Right', 'telnet-core' ),
            'lightSpeedIn'      => __( 'Light Speed In', 'telnet-core' ),
            'rollIn'            => __( 'Roll In', 'telnet-core' ),
            'zoomIn'            => __( 'Zoom In', 'telnet-core' ),
            'zoomInUp'          => __( 'Zoom In Up', 'telnet-core' ),
            'zoomInDown'        => __( 'Zoom In Down', 'telnet-core' ),
            'zoomInLeft'        => __( 'Zoom In Left', 'telnet-core' ),
            'zoomInRight'       => __( 'Zoom In Right', 'telnet-core' ),
            'slideInUp'         => __( 'Slide In Up', 'telnet-core' ),
            'slideInDown'       => __( 'Slide In Down', 'telnet-core' ),
            'slideInLeft'       => __( 'Slide In Left', 'telnet-core' ),
            'slideInRight'      => __( 'Slide In Right', 'telnet-core' ),
        ];
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
                    'style_2' => __( 'Style 2', 'vistro-core' ),
                    'style_3' => __( 'Style 3', 'vistro-core' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // anim name list for animation
        $this->add_control(
            'anim_name',
            [
                'label'   => __( 'Animation Name', 'telnet-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => $this->elh_element_animations(),
                'default' => 'none',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

         // anim duration
         $this->add_control(
            'anim_duration',
            [
                'label'   => __( 'Animation Duration', 'telnet-core' ),
                'type'    => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_post_list',
            [
                'label' => __( 'Post Section', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // select column
        $this->add_control(
            'columns',
            [
                'label'     => __( 'Columns', 'vistro-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'column_1' => __( '1 Column', 'vistro-core' ),
                    'column_2' => __( '2 Columns', 'vistro-core' ),
                    'column_3' => __( '3 Columns', 'vistro-core' ),
                    'column_4' => __( '4 Columns', 'vistro-core' ),
                ],
                'default'   => 'column_3',
                'condition' => [
                    'design_style' => [
                        'style_1'
                    ],
                ],
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

        // button text
        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Button Text', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __( 'get free consultation', 'vistro-core' ),
                'condition' => [
                    'design_style' => [
                        'style_2',
                        'style_3',
                    ],
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

            // excerpt
            $repeater[$key]->add_control(
                'excerpt',
                [
                    'label'       => __( 'Excerpt', 'vistro-core' ),
                    'type'        => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'placeholder' => __( 'Customize Excerpt', 'vistro-core' ),
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
                'default'      => 'no',
                'condition'    => [
                    'meta' => 'yes',
                    'date_meta' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'categories_meta',
            [
                'label'        => __( 'Categories', 'vistro-core' ),
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

        // author_meta
        $this->add_control(
            'author_meta',
            [
                'label'        => __( 'Author', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => '',
                'condition'    => [
                    'meta' => 'yes',
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

        $customize_text = [];
        $ids = [];
        if ( 'selected' === $settings['show_post_by'] ) {
            $args['posts_per_page'] = -1;
            $lists = $settings['selected_list_' . $settings['post_type']];
            if ( !empty( $lists ) ) {
                foreach ( $lists as $index => $value ) {
                    $post_id = !empty( $value['post_id'] ) ? $value['post_id'] : 0;
                    $ids[] = $post_id;
                    if ( $value['excerpt'] ) {
                        $customize_text[$post_id] = $value['excerpt'];
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

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_3' ):
            include $dir . '/views/view-3.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_2' ):
            include $dir . '/views/view-2.php';
        else:
            include $dir . '/views/view-1.php';
        endif;
    }
}
