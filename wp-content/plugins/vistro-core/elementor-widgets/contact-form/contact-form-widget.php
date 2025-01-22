<?php

namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Contact_Form extends Element_El_Widget
{

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
    public function get_name()
    {
        return 'contact_form';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('Contact Form', 'vistro-core');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.themexriver.com/widgets/contact-7-form/';
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'elh-widget-icon eicon-form-horizontal';
    }

    public function get_keywords()
    {
        return ['form', 'contact', 'cf7', 'contact form', 'gravity', 'ninja'];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'vistro-core' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __( 'Design Style', 'vistro-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'vistro-core' ),
                    'style_2' => __( 'Style 2', 'vistro-core' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title', 'vistro-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // bg_image
        $this->add_control(
            'bg_image',
            [
                'label' => __('Background Image', 'vistro-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'selectors' => [
                    '{{WRAPPER}} .vst-progress-1-item .bg-img-1' => 'background-image: url({{URL}})',
                ],
            ]
        );

        // sub_title
        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'vistro-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Sub Title Here', 'vistro-core'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );

        // title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'vistro-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('Title Here', 'vistro-core'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        // end
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_cf7',
            [
                'label' => elh_element_is_cf7_activated() ? __('Contact Form 7', 'vistro-core') : __('Missing Notice', 'vistro-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        if (!elh_element_is_cf7_activated()) {
            $this->add_control(
                '_cf7_missing_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(
                        __('Hello %2$s, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'vistro-core'),
                        '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term'))
                        . '" target="_blank" rel="noopener">Contact Form 7</a>',
                        elh_element_get_current_user_display_name()
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

            $this->add_control(
                '_cf7_install',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term')) . '" target="_blank" rel="noopener">Click to install or activate Contact Form 7</a>',
                ]
            );
            $this->end_controls_section();
            return;
        }

        $this->add_control(
            'form_id',
            [
                'label' => __('Select Your Form', 'vistro-core'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => ['' => __('', 'vistro-core')] + \elh_element_get_cf7_forms(),
            ]
        );

        $this->add_control(
            'html_class',
            [
                'label' => __('HTML Class', 'vistro-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __('Add CSS custom class to the form.', 'vistro-core'),
            ]
        );

        $this->end_controls_section();


    }

    protected function register_style_controls() {

    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if (!elh_element_is_cf7_activated()) {
            return;
        }
        $dir = dirname(__FILE__);

        if (!empty($settings['design_style']) && $settings['design_style'] == 'style_3') :
            include $dir . '/views/view-3.php';

        elseif (!empty($settings['design_style']) && $settings['design_style'] == 'style_2') :
            include $dir . '/views/view-2.php';
        else :
            include $dir . '/views/view-1.php';
        endif;
    }
}
