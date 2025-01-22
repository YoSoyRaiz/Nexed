<?php
namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Vistro_Shape extends Element_El_Widget {

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
        return 'vistro_shape';
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
        return __( 'Vistro Shape', 'vistro-core' );
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
        return [ 'shape', 'vistro'];
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
            '_section_image_box',
            [
                'label' => __( 'Vistro Shape', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // image
        $this->add_control(
            'image_1',
            [
                'label'              => __( 'Image', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
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

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_9' ):
            include $dir . '/views/view-9.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_8' ):
            include $dir . '/views/view-8.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_7' ):
            include $dir . '/views/view-7.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_6' ):
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