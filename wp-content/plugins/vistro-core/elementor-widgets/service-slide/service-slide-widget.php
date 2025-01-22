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

class Service_Slide extends Element_El_Widget {

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
        return 'service_slide';
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
        return __( 'Service Slide', 'vistro-core' );
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
        return ['slide', 'service'];
    }


    protected function register_content_controls() {

        //Settings
        $this->start_controls_section(
            '_section_design_settings',
            [
                'label' => __( 'DESIGN STYLE', 'vistro-core' ),
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
            '_section_list_items',
            [
                'label' => __( 'Slide Items', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // repeater
        $repeater = new Repeater();

        // image
        $repeater->add_control(
            'image',
            [
                'label'   => __( 'Image', 'vistro-core' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // title
        $repeater->add_control(
            'title',
            [
                'label'       => __( 'Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        // description
        $repeater->add_control(
            'description',
            [
                'label'       => __( 'Description', 'vistro-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        // button icons
        $repeater->add_control(
            'button_icon',
            [
                'label'       => __( 'Button Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
            ]
        );

        // buttn text
        $repeater->add_control(
            'button_text',
            [
                'label'       => __( 'Button Text', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        // button link
        $repeater->add_control(
            'button_link',
            [
                'label'       => __( 'Button Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        // lists items
        $this->add_control(
            'service_slides',
            [
                'label'       => __( 'Slide Items', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );

        // END CONTACT NUMBER
        $this->end_controls_section();

        // settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // enable slide nav
        $this->add_control(
            'enable_slide_nav',
            [
                'label'        => __( 'Enable Slide Nav', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // end
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
