<?php

namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Vistro_Faq extends Element_El_Widget {

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
        return 'vistro_faq';
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
        return __( 'Vistro Faq', 'vistro-core' );
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
        return ['btn', 'faq', 'vistro', 'vistro faq'];
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
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Lists', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        // design style
        $repeater->add_control(
            'design_style',
            [
                'label'              => __( 'Design Style', 'vistro-core' ),
                'type'               => Controls_Manager::SELECT,
                'options'            => [
                    'style_1' => __( 'Style 1', 'vistro-core' ),
                    'style_2' => __( 'Style 2', 'vistro-core' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

         // enable_icon
         $repeater->add_control(
            'enable_icon',
            [
                'label'        => __( 'Enable Icon', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'design_style' => 'style_1',
                ],
            ]
        );

        $repeater->add_control(
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
                    'design_style' => 'style_1',
                ],
            ]
        );

        $repeater->add_control(
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
                    'design_style' => 'style_1',
                ],
                'dynamic'   => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
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
                    'design_style' => 'style_1',
                ],
            ]
        );

        // faq title
        $repeater->add_control(
            'title',
            [
                'label'       => __( 'Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Faq Title', 'vistro-core' ),
                'label_block' => true,
            ]
        );

        // faq content
        $repeater->add_control(
            'content',
            [
                'label'       => __( 'Content', 'vistro-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Faq Content', 'vistro-core' ),
                'label_block' => true,
            ]
        );

        // faq lists
        $this->add_control(
            'faq_lists',
            [
                'label'       => __( 'Lists', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title'   => __( 'Faq Title #1', 'vistro-core' ),
                        'content' => __( 'Faq Content #1', 'vistro-core' ),
                    ],
                    [
                        'title'   => __( 'Faq Title #2', 'vistro-core' ),
                        'content' => __( 'Faq Content #2', 'vistro-core' ),
                    ],
                    [
                        'title'   => __( 'Faq Title #3', 'vistro-core' ),
                        'content' => __( 'Faq Content #3', 'vistro-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );


        $this->end_controls_section();

    }

    protected function register_style_controls() {



    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $dir = dirname( __FILE__ );

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_3' ):
            include $dir . '/views/view-3.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_2' ):
            include $dir . '/views/view-2.php';
        else:
            include $dir . '/views/view-1.php';
        endif;
    }
}
