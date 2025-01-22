<?php
namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Service_Grid extends Element_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Vistro Core widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'service_grid';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Service Grid', 'vistro-core' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.themexriver.com/widgets/icon-box/';
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'elh-widget-icon eicon-preview-medium';
    }

    public function get_keywords() {
        return ['service', 'gird', 'icon'];
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

        // anim delay
        $this->add_control(
            'anim_delay',
            [
                'label'   => __( 'Animation Delay', 'telnet-core' ),
                'type'    => Controls_Manager::TEXT,
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

        // SERVICES
        $this->start_controls_section(
            '_section_service_box',
            [
                'label' => __( 'Services Boxs', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // service image
        $this->add_control(
            'service_image',
            [
                'label'     => __( 'Service Image', 'vistro-core' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'   => [
                    'active' => true,
                ],
            ]
        );

        // enable_icon
        $this->add_control(
            'enable_icon',
            [
                'label'        => __( 'Enable Icon', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'design_style' => [
                    'style_1',
                    'style_2',
                ],
            ]
        );

        $this->add_control(
            'type',
            [
                'label'          => __( 'Service Icon', 'vistro-core' ),
                'type'           => Controls_Manager::CHOOSE,
                'label_block'    => false,
                'options'        => [
                    'icon'  => [
                        'title' => __( 'Icon', 'vistro-core' ),
                        'icon'  => 'far fa-smile',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'vistro-core' ),
                        'icon'  => 'fa fa-image',
                    ],
                ],
                'default'        => 'icon',
                'toggle'         => false,
                'style_transfer' => true,
                'condition'      => [
                    'enable_icon' => 'yes',
                    'design_style' => [
                        'style_1',
                        'style_2',
                    ],
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label'     => __( 'Service Icon', 'vistro-core' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type'        => 'image',
                    'enable_icon' => 'yes',
                ],
                'dynamic'   => [
                    'active' => true,
                ],
            ]
        );

        // image size select field
        $this->add_responsive_control(
            'image_size',
            [
                'label'     => __( 'Image Size', 'vistro-core' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'big' => 'Big',
                    'mid' => 'Mid',
                    'sm'  => 'Small',
                ],
                'condition' => [
                    'design_style' => [
                        'style_2',
                        'style_3',
                    ],
                ],
            ]
        );



        $this->add_control(
            'selected_icon',
            [
                'type'             => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'label_block'      => true,
                'default'          => [
                    'value'   => 'fal fa-long-arrow-right',
                    'library' => 'fa-solid',
                ],
                'condition'        => [
                    'type'        => 'icon',
                    'enable_icon' => 'yes',
                    'design_style' => [
                        'style_1',
                        'style_2',
                    ],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Service Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __( 'Service title', 'vistro-core' ),
                'placeholder' => __( 'Type Icon Box Title', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        // short_description
        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'vistro-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => __( 'Description', 'vistro-core' ),
                'placeholder' => __( 'Type Description', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        // button_link
        $this->add_control(
            'button_link',
            [
                'label'       => __( 'Button Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url' => '#',
                ],
                'placeholder' => __( 'https://your-link.com', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls() {

    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $dir = dirname( __FILE__ );

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_7' ):
            include $dir . '/views/view-7.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_3' ):
            include $dir . '/views/view-3.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_2' ):
            include $dir . '/views/view-2.php';
        else:
            include $dir . '/views/view-1.php';
        endif;
    }

}