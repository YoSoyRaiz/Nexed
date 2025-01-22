<?php

    $enable_custom_link = $settings['enable_custom_link'];
    if($enable_custom_link == 'yes') {
        $custom_link = $settings['custom_link']['url'];
    } else {
        $custom_link = home_url( '/' );
    }

    // enable position
    $enable_position_absolute = $settings['enable_position_absolute'];
    if($enable_position_absolute == 'yes') {
        $position_absolute = 'position-absolute';
    } else {
        $position_absolute = '';
    }

    // enable sticky header
    $enable_sticky_header = $settings['enable_sticky_header'];
    if($enable_sticky_header == 'yes') {
        $sticky_header = 'data-txStickyHeader';
    } else {
        $sticky_header = '';
    }
?>
<header class="vst-header-2-area header-transparent-2 tx-header <?php echo esc_attr($position_absolute); ?>" <?php echo esc_attr($sticky_header); ?>>
    <div class="vst-header-2-content d-flex align-items-center">
        <!-- logo -->
        <?php if(!empty( $settings['logo']['url'] )) : ?>
        <div class="brand-logo">
            <a href="<?php echo esc_url($custom_link); ?>"><img src="<?php echo esc_url($settings['logo']['url']); ?>" alt="<?php if(function_exists('vistro_img_alt_text')) { echo vistro_img_alt_text($settings['logo']['url']); } ?>"></a>
        </div>
        <?php endif; ?>

        <?php if ( !empty( $settings['select_menu'] ) ) : ?>
        <div class="vst-header-1-main-navigation d-none d-lg-block">
            <nav class="main-navigation clearfix ul-li">
                <?php
                    $menu_args = [
                        'menu'        => '' . $settings['select_menu'] . '',
                        'menu_class'     => 'nav navbar-nav clearfix list-unstyled',
                        'walker'         => class_exists('Vistro_Mega_Menu_Walker') ? new Vistro_Mega_Menu_Walker : '',
                        'fallback_cb'    => ['Navwalker_Class', 'fallback'],
                        'echo'           => false,
                    ];

                    $menu = wp_nav_menu($menu_args);
                    $menu = str_replace('menu-item-has-children', 'dropdown', $menu);
                    $menu = str_replace('sub-menu', 'dropdown-menu', $menu);

                    echo wp_kses_post($menu);
                ?>
            </nav>
        </div>
        <?php endif; ?>

        <!-- action-btn -->
        <div class="vst-header-2-action d-flex align-items-center">

            <?php if( $settings['enable_social_links_on_header'] === 'yes' ) : ?>
            <ul class="header-social-media-1 d-none d-sm-block list-unstyled mb-0">
                <?php foreach ( $settings['header_social_icons_lists'] as $key => $list ): ?>
                <li>
                    <a href="<?php echo esc_url($list['social_link']['url']); ?>">
                        <?php \Elementor\Icons_Manager::render_icon( $list['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
            <?php endif; ?>

            <?php if($settings['enable_contact_info'] === 'yes') : ?>
            <div class="vst-call-option-wrap ml-70 mr-30 d-none d-xxl-block">
                <div class="vst-call-option-link">
                    <a class="phone" href="tel:<?php echo esc_attr($settings['contact_number']); ?>">
                    <?php echo esc_html($settings['contact_number']); ?></a>
                    <a class="mail" href="mailto:<?php echo esc_attr($settings['email_address']); ?>">
                    <?php echo esc_html($settings['email_address']); ?></a>
                </div>
            </div>
            <?php endif; ?>

            <!-- mobile-menu-open-btn -->
            <?php if ( !empty( $settings['select_menu'] ) ) : ?>
            <div class="mobile_menu_button open_mobile_menu  d-flex d-lg-none">
                <div class="icon">
                    <span class="icon-dot"></span>
                    <span class="icon-dot"></span>
                    <span class="icon-dot"></span>
                    <span class="icon-dot"></span>
                    <span class="icon-dot"></span>
                    <span class="icon-dot"></span>
                    <span class="icon-dot"></span>
                    <span class="icon-dot"></span>
                    <span class="icon-dot"></span>
                </div>
                <?php if(!empty( $settings['menu_text'] )) : ?>
                <span class="text"><?php echo esc_html($settings['menu_text']); ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>

        </div>

    </div>

    <!-- mobile-menu -->
    <div class="mobile_menu position-relative">
        <div class="mobile_menu_wrap">
            <div class="mobile_menu_overlay open_mobile_menu"></div>
            <div class="mobile_menu_content">
                <div class="mobile_menu_close open_mobile_menu">
                    <i class="fal fa-times"></i>
                </div>

                <?php if(!empty( $settings['mobile_logo']['url'] )) : ?>
                <div class="m-brand-logo">
                    <a href="<?php echo esc_url($custom_link); ?>"><img src="<?php echo esc_url($settings['mobile_logo']['url']); ?>" alt=""></a>
                </div>
                <?php endif; ?>

                <div class="mobile-search-bar position-relative">
                    <form action="#">
                        <input type="text" name="search" placeholder="Keywords">
                        <button><i class="fal fa-search"></i></button>
                    </form>
                </div>
                <?php if ( !empty( $settings['select_menu'] ) ) : ?>
                <nav class="mobile-main-navigation  clearfix ul-li">
                <?php
                    $menu_args = [
                        'menu'        => '' . $settings['select_menu'] . '',
                        'menu_class'     => 'nav navbar-nav clearfix list-unstyled',
                        'walker'         => class_exists('Vistro_Mega_Menu_Walker') ? new Vistro_Mega_Menu_Walker : '',
                        'fallback_cb'    => ['Navwalker_Class', 'fallback'],
                        'echo'           => false,
                    ];

                    $menu = wp_nav_menu($menu_args);
                    $menu = str_replace('menu-item-has-children', 'dropdown', $menu);
                    $menu = str_replace('sub-menu', 'dropdown-menu', $menu);

                    echo wp_kses_post($menu);
                ?>
                </nav>
                <?php endif; ?>

                <?php if(!empty( $settings['social_icons_lists'] )) : ?>
                <div class="bi-mobile-header-social text-center">
                    <?php foreach ( $settings['social_icons_lists'] as $key => $list ): ?>
                    <a href="<?php echo esc_url($list['social_link']['url']); ?>">
                        <?php \Elementor\Icons_Manager::render_icon( $list['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </a>
                    <?php endforeach;?>
                </div>
                <?php endif; ?>

            </div>
        </div>
        <!-- /Mobile-Menu -->
    </div>

</header>