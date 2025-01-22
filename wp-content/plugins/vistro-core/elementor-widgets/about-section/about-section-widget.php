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

class About_Section extends Element_El_Widget {

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
        return 'about_section';
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
        return __( 'About Section', 'vistro-core' );
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
                    'style_2' => __( 'Style 2', 'vistro-core' ),
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


        // Image Box
        $this->start_controls_section(
            '_section_image_box',
            [
                'label' => __( 'Image Box', 'vistro-core' ),
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

        // image 2
        $this->add_control(
            'image_2',
            [
                'label'              => __( 'Image 2', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
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

        // make button full width
        $this->add_control(
            'button_full_width',
            [
                'label'        => __( 'Full Width Button', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        $this->add_control(
            'button_center_align',
            [
                'label'              => __( 'Center Align', 'vistro-core' ),
                'type'               => Controls_Manager::SWITCHER,
                'label_on'           => __( 'Yes', 'vistro-core' ),
                'label_off'          => __( 'No', 'vistro-core' ),
                'return_value'       => 'yes',
                'default'            => 'no',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_infoBox',
            [
                'label' => __( 'Icon Box', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // repeatable
        $repeater = new \Elementor\Repeater();

        // enable_icon
        $repeater->add_control(
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

        // image
        $repeater->add_control(
            'image',
            [
                'label'       => __( 'Image', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition'   => [
                    'type' => 'image',
                    'enable_icon' => 'yes',
                ],
            ]
        );

        // icon
        $repeater->add_control(
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
                    'type' => 'icon',
                    'enable_icon' => 'yes',
                ],
            ]
        );

        // title
        $repeater->add_control(
            'title',
            [
                'label'       => __( 'Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => __( 'Title', 'vistro-core' ),
                'placeholder' => __( 'Enter your title', 'vistro-core' ),
            ]
        );

        // link
        $repeater->add_control(
            'link',
            [
                'label'       => __( 'Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        // button icon
        $repeater->add_control(
            'button_icon',
            [
                'label'       => __( 'Button Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
                'default'     => [
                    'value'   => 'fas fa-long-arrow-alt-right',
                    'library' => 'solid',
                ],
            ]
        );

        // end repeatable
        $this->add_control(
            'feature_lists',
            [
                'label'       => __( 'Info Box', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title' => __( 'Title #1', 'vistro-core' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // ALL SHAPES
        $this->start_controls_section(
            '_section_shapes',
            [
                'label' => __( 'Shapes', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_1',
                ],
            ]
        );

        // SHAPE 1
        $this->add_control(
            'shape_1',
            [
                'label'              => __( 'Shape 1', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // SHAPE 2
        $this->add_control(
            'shape_2',
            [
                'label'              => __( 'Shape 2', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // SHAPE 3
        $this->add_control(
            'shape_3',
            [
                'label'              => __( 'Shape 3', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // SHAPE 4
        $this->add_control(
            'shape_4',
            [
                'label'              => __( 'Shape 4', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // SHAPE 5
        $this->add_control(
            'shape_5',
            [
                'label'              => __( 'Shape 5', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // ENABLE SHAPE 6
        $this->add_control(
            'enable_shape_6',
            [
                'label'        => __( 'Enable Shape 6', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        // ENABLE SHAPE 7
        $this->add_control(
            'enable_shape_7',
            [
                'label'        => __( 'Enable Shape 7', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        // ENABLE SHAPE 8
        $this->add_control(
            'enable_shape_8',
            [
                'label'        => __( 'Enable Shape 8', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        // ENABLE SHAPE 9
        $this->add_control(
            'enable_shape_9',
            [
                'label'        => __( 'Enable Shape 9', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'vistro-core' ),
                'label_off'    => __( 'Hide', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        // END
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_progress',
            [
                'label' => __( 'Progress', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_2',
                ],
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