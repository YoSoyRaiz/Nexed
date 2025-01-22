<?php

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

    CSF::createWidget( 'gallery_widget', [
        'title'       => 'Vistro Gallery Widget',
        'classname'   => 'tx-gallery-widget',
        'description' => 'Service gallery widget.',
        'fields'      => [
            [
                'id'    => 'title',
                'type'  => 'text',
                'title' => 'Title',
            ],
            [
                'id'     => 'gallery_images',
                'type'   => 'repeater',
                'title'  => 'Repeater Field',
                'fields' => [
                    // image
                    [
                        'id'    => 'image',
                        'type'  => 'media',
                        'title' => 'Image',
                    ],
                ],
            ],

        ],
    ] );

    if ( !function_exists( 'gallery_widget' ) ) {
        function gallery_widget( $args, $instance ) {

            echo $args['before_widget'];

            if ( !empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
            }

            $html = '';

            if(!empty($instance['gallery_images']) && is_array($instance['gallery_images'])) {
            $html .= '<div class="swiper sidebar-slider">';
                $html .= '<div class="swiper-container sidebar_slider_active">';
                $html .= '<div class="swiper-wrapper">';
                foreach ( $instance['gallery_images'] as $cat ) {

                    $image_url = $cat['image']['url'];
                    $image_url = !empty( $image_url ) ? $image_url : '';

                    $html .= '<div class="swiper-slide">';
                    $html .= '<div class="sidebar-slider-item">';
                    $html .= '<img src="'.esc_url($image_url).'" alt="">';
                    $html .= '</div>';
                    $html .= '</div>';
                }
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
            }

            echo $html;

            echo $args['after_widget'];

        }
    }

}
