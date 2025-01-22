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

class Vistro_Testimonial extends Element_El_Widget {

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
        return 'vistro_testimonial';
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
        return __( 'Vistro Testimonial', 'vistro-core' );
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
        return ['count', 'vistro', 'vistro testimonial', 'testimonial', 'vistro testimonial widget'];
    }

    protected function register_content_controls() {

        //Settings
        $this->start_controls_section(
            '_section_choose_style',
            [
                'label' => __( 'CHOOSE DESIGN STYLE', 'vistro-core' ),
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

         // bg image
         $this->start_controls_section(
            '_section_style_bg_image',
            [
                'label' => __( 'BACKGROUND IMAGE', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_1',
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
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_testimonial',
            [
                'label' => __( 'Testimonial', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // repeater
        $repeater = new Repeater();

        // image
        $repeater->add_control(
            'author_image',
            [
                'label'   => __( 'Author Image', 'vistro-core' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // content
        $repeater->add_control(
            'comment',
            [
                'label'       => __( 'Comment', 'vistro-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your content', 'vistro-core' ),
                'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'vistro-core' ),
            ]
        );

        // rating star
        $repeater->add_control(
            'rating_star',
            [
                'label'   => __( 'Rating Star', 'vistro-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '1' => __( '1 Star', 'vistro-core' ),
                    '2' => __( '2 Star', 'vistro-core' ),
                    '3' => __( '3 Star', 'vistro-core' ),
                    '4' => __( '4 Star', 'vistro-core' ),
                    '5' => __( '5 Star', 'vistro-core' ),
                ],
                'default' => '5',
            ]
        );

        // name
        $repeater->add_control(
            'name',
            [
                'label'       => __( 'Name', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your name', 'vistro-core' ),
                'default'     => __( 'John Doe', 'vistro-core' ),
            ]
        );

        // designation
        $repeater->add_control(
            'designation',
            [
                'label'       => __( 'Designation', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your designation', 'vistro-core' ),
                'default'     => __( 'CEO', 'vistro-core' ),
            ]
        );

        $this->add_control(
            'testimonial_lists',
            [
                'label'       => __( 'Testimonial Lists', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $dir = dirname( __FILE__ );

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_4' ):
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
