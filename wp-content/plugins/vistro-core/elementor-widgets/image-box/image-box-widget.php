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

class Image_Box extends Element_El_Widget {

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
        return 'image_box';
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
        return __( 'Image Box', 'vistro-core' );
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
        return ['service', 'gird', 'icon'];
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
                    'style_3' => __( 'Style 3', 'vistro-core' ),
                    'style_4' => __( 'Style 4', 'vistro-core' ),
                    'style_5' => __( 'Style 5', 'vistro-core' ),
                    'style_6' => __( 'Style 6', 'vistro-core' ),
                    'style_7' => __( 'Style 7', 'vistro-core' ),
                    'style_8' => __( 'Style 8', 'vistro-core' ),
                    'style_9' => __( 'Style 9', 'vistro-core' ),
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
                'condition' => [
                    'design_style' => [
                        'style_1',
                        'style_2',
                        'style_3',
                        'style_5',
                        'style_8',
                    ],
                ],
            ]
        );

        // image 3
        $this->add_control(
            'image_3',
            [
                'label'              => __( 'Image 3', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
                'condition' => [
                    'design_style' => [
                        'style_2',
                        'style_3',
                        'style_8',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // shape section
        $this->start_controls_section(
            '_section_shape',
            [
                'label' => __( 'Shape', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => [
                        'style_2',
                    ],
                ],
            ]
        );

        // shape_1
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

        // shape_2
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

        // shape_3
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

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_counter',
            [
                'label' => __( 'Counter', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => [
                        'style_6',
                    ],
                ],
            ]
        );

        // count number
        $this->add_control(
            'count_number',
            [
                'label'       => __( 'Count Number', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __( '100', 'vistro-core' ),
            ]
        );

        // sign
        $this->add_control(
            'sign',
            [
                'label'       => __( 'Sign', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __( '+', 'vistro-core' ),
            ]
        );

        // count title
        $this->add_control(
            'count_title',
            [
                'label'       => __( 'Count Title', 'vistro-core' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => __( 'Happy Clients', 'vistro-core' ),
            ]
        );

        $this->end_controls_section();

        // video section
        $this->start_controls_section(
            '_section_video',
            [
                'label' => __( 'Video', 'vistro-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => [
                        'style_7',
                    ],
                ],
            ]
        );

        // video bg image
        $this->add_control(
            'video_bg_image',
            [
                'label'              => __( 'Video BG Image', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // cercle image
        $this->add_control(
            'cercle_image',
            [
                'label'              => __( 'Cercle Image', 'vistro-core' ),
                'type'               => Controls_Manager::MEDIA,
                'default'            => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        // video link
        $this->add_control(
            'video_link',
            [
                'label'       => __( 'Video Link', 'vistro-core' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url' => 'https://www.youtube.com/watch?v=7e90gBu4pas',
                ],
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