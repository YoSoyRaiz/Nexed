<?php

namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Section_Heading extends Element_El_Widget {

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
        return 'section_heading';
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
        return __( 'Section Heading', 'vistro-core' );
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
        return ['section', 'heading', 'title'];
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
            '_section_style_settings',
            [
                'label' => __( 'CHOOSE STYLE', 'vistro-core' ),
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

        // enable light mode
        $this->add_control(
            'enable_light_mode',
            [
                'label'        => __( 'Enable Light Mode?', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Enable', 'vistro-core' ),
                'label_off'    => __( 'Disable', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // sub title
        $this->add_control(
            'sub_title',
            [
                'label'       => __( 'Sub Title', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'default'     => 'Sub Title',
                'placeholder' => __( 'Sub Title Text', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_sub_title' => 'yes',
                ],
            ]
        );

        // enable sub title anim
        $this->add_control(
            'enable_sub_title_anim',
            [
                'label'        => __( 'Enable Sub Title Animation', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_sub_title' => 'yes',
                ],
            ]
        );

        // anim sub title
        $this->add_control(
            'sub_anim_name',
            [
                'label'   => __( 'Animation Name', 'telnet-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => $this->elh_element_animations(),
                'default' => 'none',
                'dynamic' => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_sub_title' => 'yes',
                    'enable_sub_title_anim' => 'yes',
                ],
            ]
        );

        // anim duration sub title
        $this->add_control(
            'sub_anim_duration',
            [
                'label'   => __( 'Animation Duration', 'telnet-core' ),
                'type'    => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_sub_title' => 'yes',
                    'enable_sub_title_anim' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'default'     => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_title' => 'yes',
                ],
            ]
        );

        // enable_title_anim
        $this->add_control(
            'enable_title_anim',
            [
                'label'        => __( 'Enable Title Animation', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_title' => 'yes',
                ],
            ]
        );

        // anim  title
        $this->add_control(
            'title_anim_name',
            [
                'label'   => __( 'Animation Name', 'telnet-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => $this->elh_element_animations(),
                'default' => 'none',
                'dynamic' => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_title' => 'yes',
                    'enable_title_anim' => 'yes',
                ],
            ]
        );

        // anim duration  title
        $this->add_control(
            'title_anim_duration',
            [
                'label'   => __( 'Animation Duration', 'telnet-core' ),
                'type'    => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_title' => 'yes',
                    'enable_title_anim' => 'yes',
                ],
            ]
        );

        // description
        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'rows'        => 4,
                'default'     => 'The opportunity to work abroad is a popular prospect, one',
                'placeholder' => __( 'Description Text', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_description' => 'yes',
                ],
            ]
        );

        // enable description left border
        $this->add_control(
            'enable_description_left_border',
            [
                'label'        => __( 'Enable Description Left Border', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
                'condition'    => [
                    'enable_description' => 'yes',
                ],
            ]
        );

        // enable_description_anim
        $this->add_control(
            'enable_description_anim',
            [
                'label'        => __( 'Enable Description Animation', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_description' => 'yes',
                ],
            ]
        );

        // anim sub title
        $this->add_control(
            'desc_anim_name',
            [
                'label'   => __( 'Animation Name', 'telnet-core' ),
                'type'    => Controls_Manager::SELECT,
                'options' => $this->elh_element_animations(),
                'default' => 'none',
                'dynamic' => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_description' => 'yes',
                    'enable_description_anim' => 'yes',
                ],
            ]
        );

        // anim duration sub title
        $this->add_control(
            'desc_anim_duration',
            [
                'label'   => __( 'Animation Duration', 'telnet-core' ),
                'type'    => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'condition'   => [
                    'enable_description' => 'yes',
                    'enable_description_anim' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label'     => __( 'Title HTML Tag', 'vistro-core' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'h1' => [
                        'title' => __( 'H1', 'vistro-core' ),
                        'icon'  => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => __( 'H2', 'vistro-core' ),
                        'icon'  => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => __( 'H3', 'vistro-core' ),
                        'icon'  => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => __( 'H4', 'vistro-core' ),
                        'icon'  => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => __( 'H5', 'vistro-core' ),
                        'icon'  => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => __( 'H6', 'vistro-core' ),
                        'icon'  => 'eicon-editor-h6',
                    ],
                ],
                'default'   => 'h2',
                'toggle'    => false,
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'     => __( 'Alignment', 'vistro-core' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'vistro-core' ),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'vistro-core' ),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'vistro-core' ),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        // SETTINGS
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // ENABLE SUB TITLE
        $this->add_control(
            'enable_sub_title',
            [
                'label'        => __( 'Enable Sub Title', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // ENABLE TITLE
        $this->add_control(
            'enable_title',
            [
                'label'        => __( 'Enable Title', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // ENABLE DESCRIPTION
        $this->add_control(
            'enable_description',
            [
                'label'        => __( 'Enable Description', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {

        $this->start_controls_section(
            '_section_style_CONTAINER',
            [
                'label' => __( 'SECTION CONTAINER STYLE', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // container bg color
        $this->add_control(
            'container_bg_color',
            [
                'label'     => __( 'Background Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-sectionHeading' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // padding
        $this->add_responsive_control(
            'container_padding',
            [
                'label'      => __( 'Padding', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-sectionHeading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // margin
        $this->add_responsive_control(
            'container_margin',
            [
                'label'      => __( 'Margin', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-sectionHeading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_sub_title',
            [
                'label' => __( 'SUB HEADING STYLE', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // sub title color
        $this->add_control(
            'sub_title_color',
            [
                'label'     => __( 'Sub Title Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-subTitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        // sub title bg color
        $this->add_control(
            'sub_title_bg_color',
            [
                'label'     => __( 'Background Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-subTitle' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // sub title padding
        $this->add_responsive_control(
            'sub_title_padding',
            [
                'label'      => __( 'Padding', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-subTitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // sub title margin
        $this->add_responsive_control(
            'sub_title_margin',
            [
                'label'      => __( 'Margin', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-subTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // sub title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'sub_title_typography',
                'label'    => __( 'Typography', 'vistro-core' ),
                'selector' => '
                {{WRAPPER}} .tx-subTitle
                ',
            ]
        );

        // sub title border radius
        $this->add_responsive_control(
            'sub_title_border_radius',
            [
                'label'      => __( 'Border Radius', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-subTitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'HEADING STYLE', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // title color
        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Title Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        // title span color
        $this->add_control(
            'title_span_color',
            [
                'label'     => __( 'Title Span Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // title padding
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => __( 'Padding', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // title margin
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => __( 'Margin', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // title typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'vistro-core' ),
                'selector' => '
                {{WRAPPER}} .tx-title
                ',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_description',
            [
                'label' => __( 'DESCRIPTION STYLE', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // description color
        $this->add_control(
            'description_color',
            [
                'label'     => __( 'Description Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        // description padding
        $this->add_responsive_control(
            'description_padding',
            [
                'label'      => __( 'Padding', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // description margin
        $this->add_responsive_control(
            'description_margin',
            [
                'label'      => __( 'Margin', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .tx-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // description typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'description_typography',
                'label'    => __( 'Typography', 'vistro-core' ),
                'selector' => '
                {{WRAPPER}} .tx-description
                ',
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $dir = dirname( __FILE__ );

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $title = elh_element_kses_basic( $settings['title'] );

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
