<?php

namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Utils;
// use background control
use \Elementor\Group_Control_Background;


defined( 'ABSPATH' ) || die();

class Vistro_Cta extends Element_El_Widget {

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
        return 'vistro_cta';
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
        return __( 'Vistro Cta', 'vistro-core' );
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
        return ['btn', 'cta', 'vistro', 'vistro cta'];
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

        // image
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image Section', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_2',
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

        // image_1
        $this->add_control(
            'image_1',
            [
                'label'       => __( 'Image 1', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // image_2
        $this->add_control(
            'image_2',
            [
                'label'       => __( 'Image 2', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // image_3
        $this->add_control(
            'image_3',
            [
                'label'       => __( 'Image 3', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // image_4
        $this->add_control(
            'image_4',
            [
                'label'       => __( 'Image 4', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // end
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Button', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // sub_title
        $this->add_control(
            'sub_title',
            [
                'label'       => __( 'Sub Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Sub Title', 'vistro-core' ),
                'placeholder' => __( 'Type your title here', 'vistro-core' ),
                'label_block' => true,
                'condition'   => [
                    'design_style' => 'style_2',
                ],
            ]
        );

        // title
        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button Text', 'vistro-core' ),
                'placeholder' => __( 'Type your title here', 'vistro-core' ),
                'label_block' => true,
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
                    'type'        => 'image',
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
                    'type'        => 'icon',
                    'enable_icon' => 'yes',
                ],
            ]
        );

        // Button text
        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Button Text', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button Text', 'vistro-core' ),
                'placeholder' => __( 'Type your title here', 'vistro-core' ),
                'label_block' => true,
            ]
        );

        // Button link
        $this->add_control(
            'button_link',
            [
                'label'         => __( 'Button Link', 'vistro-core' ),
                'type'          => Controls_Manager::URL,
                'placeholder'   => __( 'https://your-link.com', 'vistro-core' ),
                'default'       => [
                    'url' => '#',
                ],
                'show_external' => true,
                'label_block'   => false,
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
            include $dir . '/views/view-4.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_2' ):
            include $dir . '/views/view-2.php';

        else:
            include $dir . '/views/view-1.php';
        endif;
    }
}
