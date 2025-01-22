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

class Pricing_Tab extends Element_El_Widget {

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
        return 'pricing_tab';
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
        return __( 'Pricing Tab', 'vistro-core' );
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

        // image section
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // image 1
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

        // image 2
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

        // package bg image
        $this->add_control(
            'package_bg_image',
            [
                'label'       => __( 'Package Background Image', 'vistro-core' ),
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
            '_section_pricing_tab',
            [
                'label' => __( 'Pricing Tab', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // repeater
        $repeater = new Repeater();

        // enable tab icon
        $repeater->add_control(
            'enable_tab_icon',
            [
                'label'        => __( 'Enable Tab Icon', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // tab icon type
        $repeater->add_control(
            'tab_icon_type',
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
                    'enable_tab_icon' => 'yes',
                ],
            ]
        );

        // tab icon image
        $repeater->add_control(
            'tab_icon_image',
            [
                'label'       => __( 'Image', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'tab_icon_type' => 'image',
                    'enable_tab_icon' => 'yes',
                ],
            ]
        );

        // tab icon
        $repeater->add_control(
            'tab_icon',
            [
                'label'       => __( 'Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
                'default'     => [
                    'value'   => 'fas fa-check',
                    'library' => 'solid',
                ],
                'condition'   => [
                    'tab_icon_type' => 'icon',
                    'enable_tab_icon' => 'yes',
                ],
            ]
        );

        // tab_title
        $repeater->add_control(
            'tab_title',
            [
                'label'       => __( 'Tab Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Tab Title', 'vistro-core' ),
                'placeholder' => __( 'Type your title here', 'vistro-core' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'currency',
            [
                'label'       => __( 'Currency', 'trakirna-core' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => false,
                'options'     => [
                    ''             => __( 'None', 'trakirna-core' ),
                    'baht'         => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'trakirna-core' ),
                    'bdt'          => '&#2547; ' . _x( 'BD Taka', 'Currency Symbol', 'trakirna-core' ),
                    'dollar'       => '&#36; ' . _x( 'Dollar', 'Currency Symbol', 'trakirna-core' ),
                    'euro'         => '&#128; ' . _x( 'Euro', 'Currency Symbol', 'trakirna-core' ),
                    'franc'        => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'trakirna-core' ),
                    'guilder'      => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'trakirna-core' ),
                    'krona'        => 'kr ' . _x( 'Krona', 'Currency Symbol', 'trakirna-core' ),
                    'lira'         => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'trakirna-core' ),
                    'peseta'       => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'trakirna-core' ),
                    'peso'         => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'trakirna-core' ),
                    'pound'        => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'trakirna-core' ),
                    'real'         => 'R$ ' . _x( 'Real', 'Currency Symbol', 'trakirna-core' ),
                    'ruble'        => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'trakirna-core' ),
                    'rupee'        => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'trakirna-core' ),
                    'indian_rupee' => '&#8377; ' . _x( 'Rupee (Indian)', 'Currency Symbol', 'trakirna-core' ),
                    'shekel'       => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'trakirna-core' ),
                    'won'          => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'trakirna-core' ),
                    'yen'          => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'trakirna-core' ),
                    'rand'         => 'R ' . _x( 'Rand', 'Currency Symbol', 'trakirna-core' ),
                    'dinar'        => '&#8373; ' . _x( 'Dinar', 'Currency Symbol', 'trakirna-core' ),
                    'dirham'       => '&#x62f;&#x2e;&#x625; ' . _x( 'Dirham', 'Currency Symbol', 'trakirna-core' ),
                    'riyal'        => '&#65020; ' . _x( 'Riyal', 'Currency Symbol', 'trakirna-core' ),
                    'ringgit'      => '&#82;&#77; ' . _x( 'Ringgit', 'Currency Symbol', 'trakirna-core' ),
                    'baht'         => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'trakirna-core' ),
                    'custom'       => __( 'Custom', 'trakirna-core' ),
                ],
                'default'     => 'dollar',
            ]
        );


        $repeater->add_control(
            'currency_custom',
            [
                'label'     => __( 'Custom Symbol', 'trakirna-core' ),
                'type'      => Controls_Manager::TEXT,
                'condition' => [
                    'currency' => 'custom',
                ],
                'dynamic'   => [
                    'active' => true,
                ],
            ]
        );

        // PRICE
        $repeater->add_control(
            'price',
            [
                'label'   => __( 'Price', 'trakirna-core' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '9.99',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // PERIOD
        $repeater->add_control(
            'period',
            [
                'label'   => __( 'Period', 'trakirna-core' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'Per Month', 'trakirna-core' ),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // package_lists title
        $repeater->add_control(
            'package_lists_title',
            [
                'label'       => __( 'Package Lists Title', 'trakirna-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Package Lists Title', 'trakirna-core' ),
                'placeholder' => __( 'Type Package Lists Title', 'trakirna-core' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'description' => __( 'Type Package Lists Title', 'trakirna-core' ),
                'label_block' => true,
            ]
        );

        // package lists repeater
        $repeater->add_control(
            'package_lists',
            [
                'label'       => __( 'Package Lists', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => [
                    // package list icon
                    [
                        'name'        => 'package_list_icon',
                        'label'       => __( 'Icon', 'vistro-core' ),
                        'type'        => Controls_Manager::ICONS,
                        'label_block' => true,
                        'default'     => [
                            'value'   => 'fas fa-check',
                            'library' => 'solid',
                        ],
                    ],
                    // package list title
                    [
                        'name'        => 'package_list_title',
                        'label'       => __( 'Title', 'vistro-core' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => __( 'Package List Title', 'vistro-core' ),
                        'placeholder' => __( 'Type Package List Title', 'vistro-core' ),
                        'label_block' => true,
                    ],
                ],
                'title_field' => '{{{ package_list_title }}}',
            ]
        );

        // enable extra fee icon
        $repeater->add_control(
            'enable_extra_fee_icon',
            [
                'label'        => __( 'Enable Extra Fee Icon', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // extra fee icon type
        $repeater->add_control(
            'extra_fee_icon_type',
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
                    'enable_extra_fee_icon' => 'yes',
                ],
            ]
        );

        // extra fee icon image
        $repeater->add_control(
            'extra_fee_icon_image',
            [
                'label'       => __( 'Image', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'extra_fee_icon_type' => 'image',
                    'enable_extra_fee_icon' => 'yes',
                ],
            ]
        );

        // extra fee icon
        $repeater->add_control(
            'extra_fee_icon',
            [
                'label'       => __( 'Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
                'default'     => [
                    'value'   => 'fas fa-check',
                    'library' => 'solid',
                ],
                'condition'   => [
                    'extra_fee_icon_type' => 'icon',
                    'enable_extra_fee_icon' => 'yes',
                ],
            ]
        );

        // extra fees text
        $repeater->add_control(
            'extra_fees_text',
            [
                'label'       => __( 'Extra Fees Text', 'vistro-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Extra Fees Text', 'vistro-core' ),
                'placeholder' => __( 'Type your title here', 'vistro-core' ),
                'label_block' => true,
            ]
        );

        // lists items
        $this->add_control(
            'pricingTab_lists',
            [
                'label'       => __( 'Pricing Tabs', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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

    }

    private static function get_currency_symbol( $symbol_name ) {
        $symbols = [
            'baht'         => '&#3647;',
            'bdt'          => '&#2547;',
            'dollar'       => '&#36;',
            'euro'         => '&#128;',
            'franc'        => '&#8355;',
            'guilder'      => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound'        => '&#163;',
            'peso'         => '&#8369;',
            'peseta'       => '&#8359',
            'lira'         => '&#8356;',
            'ruble'        => '&#8381;',
            'shekel'       => '&#8362;',
            'rupee'        => '&#8360;',
            'real'         => 'R$',
            'krona'        => 'kr',
            'won'          => '&#8361;',
            'yen'          => '&#165;',
            'rand'         => 'R',
            'dinar'        => '&#8373;',
            'dirham'       => '&#x62f;&#x2e;&#x625;',
            'riyal'        => '&#65020;',
            'ringgit'      => '&#82;&#77;',
        ];

        return isset( $symbols[$symbol_name] ) ? $symbols[$symbol_name] : '';
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
