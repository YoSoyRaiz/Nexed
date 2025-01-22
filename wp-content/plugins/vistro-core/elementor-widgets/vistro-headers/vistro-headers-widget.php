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

class Vistro_Headers extends Element_El_Widget {

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
        return 'vistro_headers';
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
        return __( 'Vistro Headers', 'vistro-core' );
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
        return ['btn', 'header', 'vistro', 'vistro header'];
    }

    // get menu by slug
    public function get_menu() {
        $menus = wp_get_nav_menus();
        $menu_list = array();
        if ( $menus ) {
            foreach ( $menus as $menu ) {
                $menu_list[ $menu->slug ] = $menu->name;
            }
        }
        return $menu_list;
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
                    'style_1' => __( 'Header One', 'vistro-core' ),
                    'style_2' => __( 'Header two', 'vistro-core' ),
                    'style_3' => __( 'Header three', 'vistro-core' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();


        // header social links
        $this->start_controls_section(
            '_section_header_social_links',
            [
                'label' => __( 'Header Social Links', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'enable_social_links_on_header' => 'yes',
                    'design_style' => [
                        'style_2',
                    ],
                ],
            ]
        );

        // repeater
        $repeater = new Repeater();

        // social icon
        $repeater->add_control(
            'social_icon',
            [
                'label'       => __( 'Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
                'label_block' => true,
            ]
        );

        // social link
        $repeater->add_control(
            'social_link',
            [
                'label'       => __( 'Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'vistro-core' ),
                'show_label'  => false,
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        // socal icon bg color
        $repeater->add_control(
            'social_icon_bg_color',
            [
                'label'     => __( 'Icon Background Color', 'vistro-core' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-social-media-1 li a' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        // social icons list
        $this->add_control(
            'header_social_icons_lists',
            [
                'label'       => __( 'Social Icons List', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'social_link' => __( 'https://your-link.com', 'vistro-core' ),
                    ],
                ],
                'title_field' => '{{{ social_link.url }}}',
            ]
        );

        // end header social links
        $this->end_controls_section();

        // logo section
        $this->start_controls_section(
            '_section_logo',
            [
                'label' => __( 'Logo', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // logo
        $this->add_control(
            'logo',
            [
                'label'       => __( 'Logo', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ]
        );

        // sideino logo
        $this->add_control(
            'mobile_logo',
            [
                'label'       => __( 'Mobile Logo', 'vistro-core' ),
                'type'        => Controls_Manager::MEDIA,
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
            ]
        );

        // enable custom link
        $this->add_control(
            'enable_custom_link',
            [
                'label'        => __( 'Enable Custom Link', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );

        // custom link
        $this->add_control(
            'custom_link',
            [
                'label'       => __( 'Custom Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'vistro-core' ),
                'show_label'  => false,
                'default'     => [
                    'url' => '#',
                ],
                'condition'   => [
                    'enable_custom_link' => 'yes',
                ],
            ]
        );

        // end logo section
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_menu',
            [
                'label' => __( 'Menu Options', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // select menu
        $this->add_control(
            'select_menu',
            [
                'label'       => __( 'Select Menu', 'vistro-core' ),
                'type'        => Controls_Manager::SELECT2,
                'options'     => $this->get_menu(),
                'label_block' => true,
                'multiple'    => false,
            ]
        );

        $this->end_controls_section();

        // CONTACT NUMBER
        $this->start_controls_section(
            '_section_contact_number',
            [
                'label' => __( 'Contact Number', 'vistro-core' ),
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
            'contact_info_icon',
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
            'contact_number',
            [
                'label'       => __( 'Number', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( '+880 123 456 789', 'vistro-core' ),
                'label_block' => true,
            ]
        );

        // email address
        $this->add_control(
            'email_address',
            [
                'label'       => __( 'Email Address', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        // END CONTACT NUMBER
        $this->end_controls_section();

        // BUTTON SECTION
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Buttons', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => [
                        'style_1',
                        'style_3',
                    ],
                ],
            ]
        );

        // SEARCH ICON
        $this->add_control(
            'search_icon',
            [
                'label'       => __( 'Search Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fal fa-search',
                    'library' => 'solid',
                ],
                'label_block' => true,
            ]
        );

        // BUTTON ICON
        $this->add_control(
            'login_button_icon',
            [
                'label'       => __( 'Login Button Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fas fa-arrow-right',
                    'library' => 'solid',
                ],
                'label_block' => true,
            ]
        );

        // BUTTON link
        $this->add_control(
            'button_link',
            [
                'label'       => __( 'Button Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'vistro-core' ),
                'show_label'  => false,
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        // END BUTTON SECTION
        $this->end_controls_section();

        // EXTRA INFO SECTION
        $this->start_controls_section(
            '_section_extra_info',
            [
                'label' => __( 'Extra Info', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // MENU TEXT
        $this->add_control(
            'menu_text',
            [
                'label'       => __( 'Menu Text', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Menu', 'vistro-core' ),
                'label_block' => true,
            ]
        );

        // SEARCH TEXT
        $this->add_control(
            'search_text',
            [
                'label'       => __( 'Search Text', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Find What You Need', 'vistro-core' ),
                'label_block' => true,
                'condition' => [
                    'design_style' => [
                        'style_1',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // social icons section
        $this->start_controls_section(
            '_section_social_icons',
            [
                'label' => __( 'SideInfo Social Icons', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // repeater
        $repeater = new Repeater();

        // social icon
        $repeater->add_control(
            'social_icon',
            [
                'label'       => __( 'Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
                'label_block' => true,
            ]
        );

        // social link
        $repeater->add_control(
            'social_link',
            [
                'label'       => __( 'Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'vistro-core' ),
                'show_label'  => false,
                'default'     => [
                    'url' => '#',
                ],
            ]
        );

        // social icons list
        $this->add_control(
            'social_icons_lists',
            [
                'label'       => __( 'Social Icons List', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'social_link' => __( 'https://your-link.com', 'vistro-core' ),
                    ],
                ],
                'title_field' => '{{{ social_link.url }}}',
            ]
        );

        // end social icons section
        $this->end_controls_section();

        // settings section
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'SETTINGS', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // enable sticky header
        $this->add_control(
            'enable_sticky_header',
            [
                'label'        => __( 'ENABLE STICKY HEADER', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // ENABLE BUTTON
        $this->add_control(
            'enable_login_button',
            [
                'label'        => __( 'ENABLE LOGIN BUTTON?', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'design_style' => [
                        'style_1',
                        'style_3',
                    ],
                ],
            ]
        );

        // enable search popup
        $this->add_control(
            'enable_search_popup',
            [
                'label'        => __( 'ENABLE SEARCH POPUP?', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'design_style' => [
                        'style_1',
                        'style_3',
                    ],
                ],
            ]
        );

        // enable login popup
        $this->add_control(
            'enable_login_popup',
            [
                'label'        => __( 'ENABLE LOGIN POPUP?', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'design_style' => [
                        'style_1',
                        'style_3',
                    ],
                ],
            ]
        );

         // ENABLE CONTACT INFO
         $this->add_control(
            'enable_contact_info',
            [
                'label'        => __( 'ENABLE CONTACT INFO?', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // ENABLE social links on header
        $this->add_control(
            'enable_social_links_on_header',
            [
                'label'        => __( 'ENABLE SOCIAL LINKS ON HEADER?', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // ENABLE SOCIAL LINKS
        $this->add_control(
            'enable_social_links',
            [
                'label'        => __( 'ENABLE SOCIAL LINKS ON SIDEINFO?', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // end settings section
        $this->end_controls_section();

    }

    protected function register_style_controls() {

        // HEADER STYLE
        $this->start_controls_section(
            '_section_style_header',
            [
                'label' => __( 'Header', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // ENABLE POSITION ABSOLUTE
        $this->add_control(
            'enable_position_absolute',
            [
                'label'        => __( 'Enable Position Absolute', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
            ]
        );

        // HEADER TOP POSITION
        $this->add_responsive_control(
            'header_top_position',
            [
                'label'     => __( 'Header Top Position', 'vistro-core' ),
                'type'      => Controls_Manager::SLIDER,
                'size_units'=> [ 'px', '%' ],
                'range'     => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tx-header' => 'top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'enable_position_absolute' => 'yes',
                ],
            ]
        );

        // END HEADER STYLE
        $this->end_controls_section();

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
