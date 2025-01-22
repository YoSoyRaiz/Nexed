<?php
namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Hero_Section extends Element_El_Widget {

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
        return 'hero_section';
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
        return __( 'Hero Section', 'vistro-core' );
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
                    'style_2' => __( 'Style 2', 'vistro-core' ),
                    'style_3' => __( 'Style 3', 'vistro-core' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();

        // IMAGE SECTION
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // BG_IMAGE
        $this->add_control(
            'bg_image',
            [
                'label'       => __( 'Background Image', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        // IMAGE 1
        $this->add_control(
            'image_1',
            [
                'label'       => __( 'Image 1', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => [
                        'style_1',
                        'style_2',
                    ],
                ],
            ]
        );

        // IMAGE 2
        $this->add_control(
            'image_2',
            [
                'label'       => __( 'Image 2', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => [
                        'style_1',
                        'style_2',
                    ],
                ],
            ]
        );

        // IMAGE 3
        $this->add_control(
            'image_3',
            [
                'label'       => __( 'Image 3', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'     => [
                    'active' => true,
                ],
                'condition'   => [
                    'design_style' => 'style_2',
                ],
            ]
        );

        // IMAGE 4
        $this->add_control(
            'image_4',
            [
                'label'       => __( 'Image 4', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'     => [
                    'active' => true,
                ],
                'condition'   => [
                    'design_style' => 'style_2',
                ],
            ]
        );

        // END
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

        $this->end_controls_section();

        // BUTTON SECTION
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'enable_button' => 'yes'
                ],
            ]
        );

        // BUTTON TEXT
        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Button Text', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Read More', 'vistro-core' ),
                'placeholder' => __( 'Button Text', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        // BUTTON ICONS
        $this->add_control(
            'button_icon',
            [
                'label'       => __( 'Button Icon', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fas fa-angle-right',
                    'library' => 'solid',
                ],
            ]
        );

        // BUTTON LINK
        $this->add_control(
            'button_link',
            [
                'label'       => __( 'Button Link', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        // END
        $this->end_controls_section();

        // TIME SECTION
        $this->start_controls_section(
            '_section_time',
            [
                'label' => __( 'Time', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'enable_time' => 'yes',
                    'design_style' => [
                        'style_1',
                    ]
                ],
            ]
        );

        // TIME
        $this->add_control(
            'time',
            [
                'label'       => __( 'Time', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( '8:10:45', 'vistro-core' ),
                'placeholder' => __( 'Time', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        // TIME ZONE
        $this->add_control(
            'time_zone',
            [
                'label'       => __( 'Time Zone', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Washington, DC', 'vistro-core' ),
                'placeholder' => __( 'Time Zone', 'vistro-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        // END
        $this->end_controls_section();


        $this->start_controls_section(
            '_section_list_items',
            [
                'label' => __( 'Feature Lists', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => [
                        'style_2',
                        'style_3',
                    ],
                    'enable_feature_list' => 'yes',
                ],
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

        // slide image
        $this->start_controls_section(
            '_section_slide_image',
            [
                'label' => __( 'Slide Image', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => [
                        'style_3',
                    ],
                ],
            ]
        );

        // repeater
        $repeater = new Repeater();

        // slide_image
        $repeater->add_control(
            'slide_image',
            [
                'label'       => __( 'Slide Image', 'vistro-core' ),
                'label_block' => true,
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        // slide image
        $this->add_control(
            'slide_images',
            [
                'label'       => __( 'Slide Images', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );

        // end
        $this->end_controls_section();

        // SETTINGS
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // ENABLE DOT SHAPE
        $this->add_control(
            'enable_dot_shape',
            [
                'label'        => __( 'Enable Dot Shape', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
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

        // ENABLE BUTTON
        $this->add_control(
            'enable_button',
            [
                'label'        => __( 'Enable Button', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // ENABLE TIME
        $this->add_control(
            'enable_time',
            [
                'label'        => __( 'Enable Time', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // ENABLE FEATURE LIST
        $this->add_control(
            'enable_feature_list',
            [
                'label'        => __( 'Enable Feature List', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'design_style' => 'style_2',
                    'design_style' => 'style_3',
                ]
            ]
        );

        // ENABLE SLIDE NAV
        $this->add_control(
            'enable_slide_nav',
            [
                'label'        => __( 'Enable Slide Nav', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'design_style' => 'style_3',
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {


    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $dir = dirname( __FILE__ );

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $title = elh_element_kses_basic( $settings['title'] );

        if ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_3' ):
            include $dir . '/views/view-3.php';

        elseif ( !empty( $settings['design_style'] ) && $settings['design_style'] == 'style_2' ):
            include $dir . '/views/view-2.php';
        else:
            include $dir . '/views/view-1.php';
        endif;
    }
}
