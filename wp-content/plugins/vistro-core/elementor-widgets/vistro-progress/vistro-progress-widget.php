<?php
namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;

defined( 'ABSPATH' ) || die();

class Vistro_Progress extends Element_El_Widget {

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
        return 'vistro_progress';
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
        return __( 'Vistro Progress', 'vistro-core' );
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
        return ['vistro', 'skill', 'speed', 'progress', 'bar'];
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

        // BUTTON & TEXT
        $this->start_controls_section(
            '_section_progress',
            [
                'label' => __( 'Progress', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // progress value
        $this->add_control(
            'progress_value',
            [
                'label'       => __( 'Progress Value', 'vistro-core' ),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['%'],
                'range'       => [
                    '%' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'default'     => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'label_block' => true,
                'selectors'   => [
                    '{{WRAPPER}} .s-progress' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // title
        $this->add_control(
            'progress_title',
            [
                'label'       => __( 'Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Title', 'vistro-core' ),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {

        //  PROGRESS BAR STYLE
        $this->start_controls_section(
            '_section_progress_bar_style',
            [
                'label' => __( 'Progress Bar', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // progress bg color
        $this->add_control(
            'progress_bg_color',
            [
                'label'     => __( 'Progress Bar Background Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .s-progress' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        // END SECTION
        $this->end_controls_section();


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

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_3' ):
            include $dir . '/views/view-3.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_2' ):
            include $dir . '/views/view-2.php';

        else:
            include $dir . '/views/view-1.php';
        endif;
    }

}