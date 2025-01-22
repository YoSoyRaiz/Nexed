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

class List_Items extends Element_El_Widget {

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
        return 'list_items';
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
        return __( 'List Items', 'vistro-core' );
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
        return ['btn', 'list', 'items'];
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
                    'style_2' => __( 'Style 2', 'vistro-core' ),
                    'style_3' => __( 'Style 3', 'vistro-core' ),
                    'style_4' => __( 'Style 4', 'vistro-core' ),
                    'style_5' => __( 'Style 5', 'vistro-core' ),
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
                'label' => __( 'List Items', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // repeater
        $repeater = new Repeater();

        // enable icon
        $repeater->add_control(
            'enable_icon',
            [
                'label'        => __( 'Enable Icon', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $repeater->add_control(
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

        $repeater->add_control(
            'info_icon',
            [
                'label'       => __( 'Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fal fa-phone',
                    'library' => 'solid',
                ],
                'label_block' => true,
                'condition'   => [
                    'enable_icon' => 'yes',
                    'type'        => 'icon',
                ],
            ]
        );

        $repeater->add_control(
            'info_image',
            [
                'label'       => __( 'Image', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition'   => [
                    'enable_icon' => 'yes',
                    'type'        => 'image',
                ],
            ]
        );

        // info text
        $repeater->add_control(
            'info_text',
            [
                'label'       => __( 'Contact Info Text', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        // link
        $repeater->add_control(
            'link',
            [
                'label'       => __( 'Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        // lists items
        $this->add_control(
            'list_items',
            [
                'label'       => __( 'List Items', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );

        // END CONTACT NUMBER
        $this->end_controls_section();

    }

    protected function register_style_controls() {
        // list items style
        $this->start_controls_section(
            '_section_list_items_style',
            [
                'label' => __( 'List Items', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // text color
        $this->add_control(
            'list_items_text_color',
            [
                'label'     => __( 'Text Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-listItems li' => 'color: {{VALUE}};',
                ],
            ]
        );

        // margin
        $this->add_responsive_control(
            'list_items_margin',
            [
                'label'      => __( 'Margin', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tx-listItems li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // padding
        $this->add_responsive_control(
            'list_items_padding',
            [
                'label'      => __( 'Padding', 'vistro-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .tx-listItems li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // typography
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'list_items_typography',
                'label'    => __( 'Typography', 'vistro-core' ),
                'selector' => '{{WRAPPER}} .tx-listItems li',
            ]
        );

        // icon color
        $this->add_control(
            'list_items_icon_color',
            [
                'label'     => __( 'Icon Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-listItems .tx-icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        // icon bg color
        $this->add_control(
            'list_items_icon_bg_color',
            [
                'label'     => __( 'Icon Background Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tx-listItems i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // end
        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $dir = dirname( __FILE__ );

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_5' ):
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
