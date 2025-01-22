<?php

/**
 * [vistro_header_menu description]
 * @return [type] [description]
 */
function vistro_header_menu() {
    if (has_nav_menu('main-menu')) {
        $menu_args = [
            'theme_location' => 'main-menu',
            'menu_class'     => 'nav navbar-nav clearfix list-unstyled',
            'walker'         => class_exists('Vistro_Mega_Menu_Walker') ? new Vistro_Mega_Menu_Walker : '',
            'fallback_cb'    => ['Navwalker_Class', 'fallback'],
            'echo'           => false,
        ];

        $menu = wp_nav_menu($menu_args);
        $menu = str_replace('menu-item-has-children', 'dropdown', $menu);
        $menu = str_replace('sub-menu', 'dropdown-menu', $menu);

        echo wp_kses_post($menu);
    } else {
        echo '<ul class="navigation clearfix"></ul>'; // Display an empty menu
    }
}
