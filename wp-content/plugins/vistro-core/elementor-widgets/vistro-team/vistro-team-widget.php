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

class Vistro_Team extends Element_El_Widget {

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
        return 'vistro_team';
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
        return __( 'Vistro Team', 'vistro-core' );
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
        return ['count', 'vistro', 'vistro team'];
    }

    protected function register_content_controls() {

        //Settings
        $this->start_controls_section(
            '_section_design_settings',
            [
                'label' => __( 'Choose Design Style', 'vistro-core' ),
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
                'label' => __( 'Team Member', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // social links
        $repeater = new Repeater();

        // image
        $repeater->add_control(
            'image',
            [
                'label'   => __( 'Team Image', 'vistro-core' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        // designation
        $repeater->add_control(
            'designation',
            [
                'label'       => __( 'Designation', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your designation', 'vistro-core' ),
                'default'     => __( 'CEO & Founder', 'vistro-core' ),
            ]
        );

        // name
        $repeater->add_control(
            'name',
            [
                'label'       => __( 'Name', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your name', 'vistro-core' ),
                'default'     => __( 'John Doe', 'vistro-core' ),
            ]
        );

        // short intro
        $repeater->add_control(
            'short_intro',
            [
                'label'       => __( 'Short Intro', 'vistro-core' ),
                'type'        => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Enter your short intro', 'vistro-core' ),
                'default'     => __( 'CEO & Founder', 'vistro-core' ),
            ]
        );

        // contact info label
        $repeater->add_control(
            'contact_info_label',
            [
                'label'       => __( 'Contact Info Label', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your contact info label', 'vistro-core' ),
                'default'     => __( 'Contact Info', 'vistro-core' ),
            ]
        );

        // call icon
        $repeater->add_control(
            'call_icon',
            [
                'label'       => __( 'Call Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
                'default'     => [
                    'value'   => 'fa fa-phone-alt',
                    'library' => 'fa-solid',
                ],
            ]
        );

        // phone number
        $repeater->add_control(
            'phone_number',
            [
                'label'       => __( 'Phone Number', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your phone number', 'vistro-core' ),
                'default'     => __( '569 2664 2351', 'vistro-core' ),
            ]
        );

        // mail iocn
        $repeater->add_control(
            'mail_icon',
            [
                'label'       => __( 'Mail Icon', 'vistro-core' ),
                'type'        => Controls_Manager::ICONS,
                'label_block' => true,
                'default'     => [
                    'value'   => 'fa fa-envelope',
                    'library' => 'fa-solid',
                ],
            ]
        );

        // email
        $repeater->add_control(
            'mail',
            [
                'label'       => __( 'Email Address', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your mail address', 'vistro-core' ),
                'default'     => __( 'info@mail.com', 'vistro-core' ),
            ]
        );

        // social links
        $repeater->add_control(
            'social_links',
            [
                'label'       => __( 'Social Links', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => [
                    [
                        'name'        => 'social_icon',
                        'label'       => __( 'Social Icon', 'vistro-core' ),
                        'type'        => Controls_Manager::ICONS,
                        'label_block' => true,
                        'default'     => [
                            'value'   => 'fa fa-facebook',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'name'        => 'social_link',
                        'label'       => __( 'Social Link', 'vistro-core' ),
                        'type'        => Controls_Manager::URL,
                        'label_block' => true,
                        'default'     => [
                            'url' => '#',
                        ],
                    ],
                ],
                'default'     => [
                    [
                        'social_icon' => [
                            'value'   => 'fa fa-facebook',
                            'library' => 'fa-solid',
                        ],
                        'social_link' => [
                            'url' => '#',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value'   => 'fa fa-twitter',
                            'library' => 'fa-solid',
                        ],
                        'social_link' => [
                            'url' => '#',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value'   => 'fa fa-linkedin',
                            'library' => 'fa-solid',
                        ],
                        'social_link' => [
                            'url' => '#',
                        ],
                    ],
                ],
                'title_field' => '{{{ social_icon }}}',
            ]
        );

        // link
        $repeater->add_control(
            'link',
            [
                'label'       => __( 'Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'vistro-core' ),
                'default'     => [
                    'url' => '#',
                ],
            ]
        );


        // team members
        $this->add_control(
            'team_members',
            [
                'label'       => __( 'Team Members', 'vistro-core' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );


        $this->end_controls_section();

        // settings
        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        // enable nav
        $this->add_control(
            'enable_nav',
            [
                'label'        => __( 'Enable Nav', 'vistro-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'vistro-core' ),
                'label_off'    => __( 'No', 'vistro-core' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        // end
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
