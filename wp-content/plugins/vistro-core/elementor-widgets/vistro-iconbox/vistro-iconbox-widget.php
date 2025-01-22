<?php

namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Vistro_IconBox extends Element_El_Widget {

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
        return 'vistro_iconbox';
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
        return __( 'Vistro IconBox', 'vistro-core' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.themexriver.com/widgets/gradient-heading/';
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
        return 'elh-widget-icon eicon-t-letter';
    }

    public function get_keywords() {
        return ['count', 'vistro', 'icon box'];
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

        //Settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'vistro-core' ),
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
                    'style_4' => __( 'Style 4', 'vistro-core' ),
                    'style_5' => __( 'Style 5', 'vistro-core' ),
                    'style_6' => __( 'Style 6', 'vistro-core' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // anim sub title
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

        // anim duration sub title
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
            '_section_infoBox',
            [
                'label' => __( 'Icon Box', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
            ]
        );

        // type icon or image
        $this->add_control(
            'type',
            [
                'label'          => __( 'Icon', 'vistro-core' ),
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
                ],
            ]
        );

        // image
        $this->add_control(
            'image',
            [
                'label'       => __( 'Image', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'type' => 'image',
                    'enable_icon' => 'yes',
                ],
            ]
        );

        // icon
        $this->add_control(
            'selected_icon',
            [
                'label'       => __( 'Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
                'default'     => [
                    'value'   => 'fas fa-check',
                    'library' => 'solid',
                ],
                'condition'   => [
                    'type' => 'icon',
                    'enable_icon' => 'yes',
                ],
            ]
        );

        // title
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __( 'Title', 'vistro-core' ),
                'placeholder' => __( 'Enter your title', 'vistro-core' ),
            ]
        );

        // desc
        $this->add_control(
            'desc',
            [
                'label'       => __( 'Description', 'vistro-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => __( 'Description', 'vistro-core' ),
                'placeholder' => __( 'Enter your description', 'vistro-core' ),
                'condition'   => [
                    'design_style' => [
                        'style_3',
                        'style_4',
                        'style_5',
                    ],
                ],
            ]
        );

        // link
        $this->add_control(
            'link',
            [
                'label'       => __( 'Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url' => '#',
                ],
                'condition'   => [
                    'design_style' => [
                        'style_1'
                    ],
                ],
            ]
        );

        // button icon
        $this->add_control(
            'button_icon',
            [
                'label'       => __( 'Button Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
                'default'     => [
                    'value'   => 'fas fa-long-arrow-alt-right',
                    'library' => 'solid',
                ],
                'condition'   => [
                    'design_style' => [
                        'style_1'
                    ],
                ],
            ]
        );

           // bg_image
           $this->add_control(
            'bg_image',
            [
                'label'       => __( 'Background Image', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'design_style' => [
                        'style_4',
                    ],
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

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_6' ):
            include $dir . '/views/view-6.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_5' ):
            include $dir . '/views/view-5.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_4' ):
            include $dir . '/views/view-4.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_3' ):
            include $dir . '/views/view-3.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_2' ):
            include $dir . '/views/view-2.php';
        else:
            include $dir . '/views/view-1.php';
        endif;
    }
}
