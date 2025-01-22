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

class Contact_Info_Lists extends Element_El_Widget {

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
        return 'contact_info_lists';
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
        return __( 'Contact Info Lists', 'vistro-core' );
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
        return ['btn', 'contact info', 'info', 'info lists'];
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
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();

        // CONTACT NUMBER
        $this->start_controls_section(
            '_section_contact_info',
            [
                'label' => __( 'Contact Infos', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // enable icon
        $this->add_control(
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

        // contact info icon
        $this->add_control(
            'info_icon',
            [
                'label'       => __( 'Contact Info Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fal fa-phone',
                    'library' => 'solid',
                ],
                'label_block' => true,
                'condition'   => [
                    'enable_icon' => 'yes',
                ],
            ]
        );

        // NUMBER
        $this->add_control(
            'info_label',
            [
                'label'       => __( 'Contact Info Label', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'condition'   => [
                    'design_style' => [
                        'style_1',
                        'style_3',
                    ],
                ],
            ]
        );

        // info text
        $this->add_control(
            'info_text',
            [
                'label'       => __( 'Contact Info Text', 'vistro-core' ),
                'type'        => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'condition'   => [
                    'design_style' => [
                        'style_1',
                    ],
                ],
            ]
        );

        // phone number
        $this->add_control(
            'phone',
            [
                'label'       => __( 'Phone', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'condition'   => [
                    'design_style' => [
                        'style_2',
                        'style_3',
                    ],
                ],
            ]
        );

        // mail
        $this->add_control(
            'mail',
            [
                'label'       => __( 'Mail', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'condition'   => [
                    'design_style' => [
                        'style_2',
                    ],
                ],
            ]
        );

        // END CONTACT NUMBER
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
