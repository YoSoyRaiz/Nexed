<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package vistro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function vistro_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if ( !is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}
add_filter( 'body_class', 'vistro_body_classes' );

/**
 * Get tags.
 */
function vistro_get_tag() {
    $html = '';
    if ( has_tag() ) {
        $html .= '<h6 class="title h1-heading">'.esc_html__('Tags:', 'vistro').'</h6>';
        $html .= get_the_tag_list( '', ' ', '' );
    }
    return $html;
}

/**
 * Get categories.
 */
function vistro_get_category() {

    $categories = get_the_category( get_the_ID() );
    $x = 0;
    foreach ( $categories as $category ) {
        if ( $x == 1 ) {
            break;
        }
        $x++;
     print '<a class="blog-cat" href="' . get_category_link( $category->term_id ) . '">' . esc_html( $category->name ) . '</a>';

    }
}

/** img alt-text **/
function vistro_img_alt_text( $img_er_id = null ) {
    $image_id = $img_er_id;
    $image_alt = get_post_meta( attachment_url_to_postid( $image_id ), '_wp_attachment_image_alt', true );
    $image_title = get_the_title( $image_id );

    if ( !empty( $image_id ) ) {
        if ( $image_alt ) {
            $alt_text = get_post_meta( attachment_url_to_postid( $image_id ), '_wp_attachment_image_alt', true );
        } else {
            $alt_text = get_the_title( $image_id );
        }
    } else {
        $alt_text = esc_html__( 'Image Alt Text', 'vistro' );
    }

    return $alt_text;
}



// vistro_ofer_sidebar_func
function vistro_offer_sidebar_func() {
    if ( is_active_sidebar( 'offer-sidebar' ) ) {

        dynamic_sidebar( 'offer-sidebar' );
    }
}
add_action( 'vistro_offer_sidebar', 'vistro_offer_sidebar_func', 20 );

// vistro_service_sidebar
function vistro_service_sidebar_func() {
    if ( is_active_sidebar( 'services-sidebar' ) ) {

        dynamic_sidebar( 'services-sidebar' );
    }
}
add_action( 'vistro_service_sidebar', 'vistro_service_sidebar_func', 20 );

// vistro_portfolio_sidebar
function vistro_portfolio_sidebar_func() {
    if ( is_active_sidebar( 'portfolio-sidebar' ) ) {

        dynamic_sidebar( 'portfolio-sidebar' );
    }
}
add_action( 'vistro_portfolio_sidebar', 'vistro_portfolio_sidebar_func', 20 );

// vistro_faq_sidebar
function vistro_faq_sidebar_func() {
    if ( is_active_sidebar( 'faq-sidebar' ) ) {

        dynamic_sidebar( 'faq-sidebar' );
    }
}
add_action( 'vistro_faq_sidebar', 'vistro_faq_sidebar_func', 20 );

// mega menu filter
add_filter( 'vistro_enable_megamenu', 'vistro_enable_megamenu' );
function vistro_enable_megamenu() {
	return true;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

// menu badge function
add_filter('wp_nav_menu_objects', 'vistro_wp_nav_menu_objects', 10, 2);

function vistro_wp_nav_menu_objects( $items, $args ) {
	// loop
	foreach( $items as &$item ) {

        $menu_badge = function_exists( 'get_field' ) ? get_field( 'menu_badge', $item ) : '';
		// append icon
		if( !empty( $menu_badge ) ) {
			$item->title .= ' <span class="vistro-menu-badge">'.esc_attr($menu_badge).'</span>';
		}
	}
	// return
	return $items;

}

// post view function
function vistro_post_view($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '1');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}


// enable mega menu
add_filter( 'ct_enable_megamenu', 'itfirm_enable_megamenu' );
function itfirm_enable_megamenu() {
	return true;
}


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function vistro_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'vistro_pingback_header' );

/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter( 'the_content', 'vistro_shortcode_extra_content_remove' );
function vistro_shortcode_extra_content_remove( $content ) {

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr( $content, $array );

}

// enable_rtl
function vistro_enable_rtl() {
    if ( get_theme_mod( 'rtl_switch', false ) ) {
        return ' dir="rtl" ';
    } else {
        return '';
    }
}

function vistro_fonts_url() {
    $font_url = '';
    /**
    * Translators: If there are characters in your language that are not supported
    * by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'vistro' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap';
        $font_url = 'https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,300;0,8..60,400;0,8..60,500;0,8..60,600;0,8..60,700;0,8..60,800;0,8..60,900;1,8..60,300;1,8..60,400;1,8..60,500;1,8..60,600;1,8..60,700;1,8..60,800&display=swap';
        $font_url = 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap';
    }
    return $font_url;
}

// wp_body_open
if ( !function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 *
 * pagination
 */
if ( !function_exists( 'vistro_pagination' ) ) {

    function _vistro_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function vistro_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];
        }

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul class="blog-page-next-prev-btn list-unstyled d-flex aling-items-center pt-30 mb-0 pl-0">';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _vistro_pagi_callback( $pagi );
    }
}

// rtl_enable
function rtl_enable() {
    $my_current_lang = apply_filters( 'wpml_current_language', NULL );
    $rtl_enable = get_theme_mod( 'rtl_switch', false );
    if ( $my_current_lang != 'en' && $rtl_enable ) {
        return true;
    } else {
        return false;
    }
}

function vistro_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ]
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
        'href' => [],
        'title' => [],
        'class' => [],
        'id' => [],
        ];
        $allowed_html['div'] = [
        'class' => [],
        'id' => [],
        ];
        $allowed_html['img'] = [
        'src' => [],
        'class' => [],
        'alt' => [],
        ];
        $allowed_html = [
            'bdi' => [],
            'br' => [],
        ];
    }

    return $allowed_html;
}

// vistro_kses_basic
function vistro_kses_basic( $string = '' ) {
    return wp_kses( $string, vistro_get_allowed_html_tags( 'basic' ) );
}

// vistro_kses_intermediate
function vistro_kses_intermediate( $string = '' ) {
    return wp_kses( $string, vistro_get_allowed_html_tags( 'intermediate' ) );
}


// vistro_search_form
function vistro_search_popup_form() {
    ?>
    <div class="search-popup">
		<div class="color-layer"></div>
		<button class="close-search"><span class="cross-icon flaticon-multiply fa-fw"></span></button>
		<form method="get" action="<?php print esc_url( home_url( '/' ) );?>">
			<div class="form-group">
                <input type="search" name="s" placeholder="<?php print esc_attr__( 'Search Here', 'vistro' );?>" value="<?php print esc_attr( get_search_query() )?>">
				<button type="submit"><i class="fa fa-solid fa-magnifying-glass fa-fw"></i></button>
			</div>
		</form>
	</div>
    <?php
}

// vistro_search_form
function vistro_search_mobile() {
    ?>
    <div class="search-box">
        <form method="get" action="<?php print esc_url( home_url( '/' ) );?>">
            <div class="form-group">
                <input type="search" name="s" placeholder="<?php print esc_attr__( 'SEARCH HERE', 'vistro' );?>" value="<?php print esc_attr( get_search_query() )?>">
                <button type="submit"><span class="icon far fa-search fa-fw"></span></button>
            </div>
        </form>
    </div>
    <?php
}

// vistro product search_form
function vistro_woo_search_form() {
    ?>
    <form method="get" action="<?php print esc_url(home_url('/')); ?>">
        <div class="vistro-woo-search">
            <input type="hidden" name="post_type" value="product">
            <input type="search" name="s" placeholder="<?php print esc_attr__('Product name E. G.', 'vistro'); ?>">

            <?php $terms = (!empty(get_terms('product_cat'))) ? get_terms('product_cat') : ''; ?>
            <select class="vistro-woo-search__select" name="product_cat">
                <option selected disabled><?php print esc_html__('Categories', 'vistro'); ?></option>
                <?php foreach ($terms as $term): ?>
                <option value="<?php print esc_attr($term->slug); ?>"><?php print esc_html($term->name); ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit"><i class="fal fa-search"></i></button>
        </div>
    </form>
    <?php
}


function advanced_search_query($query) {

    if($query->is_search()) {
        // category terms search.
        if (isset($_GET['product_cat']) && !empty($_GET['product_cat'])) {
            $query->set('tax_query', array(array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array($_GET['product_cat']) )
            ));
        }
    }
    return $query;
}
add_action('pre_get_posts', 'advanced_search_query', 1000);

function vistro_woo_search_popup() {
    ?>
    <div class="search-popup-wrapper">
        <div class="inner-wrapper">
            <button class="close-button" data-search-close><i class="fal fa-times"></i></button>
            <form method="get" action="<?php print esc_url(home_url('/')); ?>">
                <div class="vistro-woo-search vistro-woo-search__popup">
                    <input type="hidden" name="post_type" value="product">
                    <input type="search" name="s" placeholder="<?php print esc_attr__('Product name E. G.', 'vistro'); ?>">

                    <?php $terms = (!empty(get_terms('product_cat'))) ? get_terms('product_cat') : ''; ?>
                    <select class="vistro-woo-search__select" name="product_cat">
                        <option selected disabled><?php print esc_html__('Categories', 'vistro'); ?></option>
                        <?php foreach ($terms as $term): ?>
                        <option value="<?php print esc_attr($term->slug); ?>"><?php print esc_html($term->name); ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit"><i class="fal fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <?php
}

// vistro_copyright_text
function vistro_copyright_text() {
    print cs_get_option( 'vistro_copyright', vistro_kses_basic( '© Copyright 2023 Design by Vistro', 'vistro' ) );
}

/**
 * [vistro_header_lang description]
 * @return [type] [description]
 */
function vistro_header_lang_defualt() {
    $vistro_language_switcher = get_theme_mod( 'vistro_language_switcher', false );
    if ( $vistro_language_switcher ): ?>
    <ul>
        <li><a href="#0" class="lang_btn"><?php print esc_html__( 'English', 'vistro' );?> <i class="fal fa-chevron-down"></i></a>
            <?php do_action( 'vistro_language' );?>
        </li>
    </ul>
    <?php endif; ?>
<?php
}

function add_featured_image_class($classes) {
    if (is_single() && has_post_thumbnail()) {
        $classes[] = 'has-featured-image';
    } else {
        $classes[] = 'no-featured-image';
    }
    return $classes;
}
add_filter('body_class', 'add_featured_image_class');
