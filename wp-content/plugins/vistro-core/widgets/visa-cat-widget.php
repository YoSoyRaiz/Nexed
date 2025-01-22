<?php

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

    CSF::createWidget( 'visa_cat_widget', [
        'title'       => 'Vistro Service Cat Widget',
        'classname'   => 'tx-visaCat-widget',
        'description' => 'Service Category widget.',
        'fields'      => [
            [
                'id'    => 'title',
                'type'  => 'text',
                'title' => 'Title',
            ],
            [
                'id'     => 'select_cats',
                'type'   => 'repeater',
                'title'  => 'Repeater Field',
                'fields' => [
                    // visa cat text
                    [
                        'id'    => 'visa_cat_text',
                        'type'  => 'text',
                        'title' => 'Visa Category Text',
                    ],

                    // link
                    [
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => 'Link',
                    ],
                ],
            ],

        ],
    ] );

    if ( !function_exists( 'visa_cat_widget' ) ) {
        function visa_cat_widget( $args, $instance ) {

            echo $args['before_widget'];

            if ( !empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
            }

            $html = '';

            if(!empty($instance['select_cats']) && is_array($instance['select_cats'])) {
            $html .= '<div class="visa-cat-widget sidebar-category">';
                $html .= '<ul class="sidebar-btn list-unstyled">';
                foreach ( $instance['select_cats'] as $cat ) {
                    $html .= '<li>';
                    $html .= '<a href="' . esc_url( $cat['link'] ) . '">';
                    $html .= ''.esc_html( $cat['visa_cat_text'] ).'';
                    $html .= '<i class="fas fa-long-arrow-alt-right"></i></a>';
                    $html .= '</li>';
                }
                $html .= '</ul>';
                $html .= '</div>';
            }

            echo $html;

            echo $args['after_widget'];

        }
    }

}
