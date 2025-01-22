<?php
// vistro_search_filter_form
if ( !function_exists( 'vistro_search_filter_form' ) ) {
    function vistro_search_filter_form( $form ) {

        $form = sprintf(
            '<div class="search-box">
                <form class="tx-search-widget sidebar-search-box px-30 mx-30 m-30" action="%s" method="get">
                    <div class="position-relative fix">
                        <input type="search" class="search-input" value="%s" required name="s" placeholder="%s">
                        <button class="search-btn"><i class="fal fa-search"></i></button>
                    </div>
                </form>
            </div>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_search_query() ),
            esc_html__( 'Search...', 'vistro' )
        );

        return $form;
    }
    add_filter( 'get_search_form', 'vistro_search_filter_form' );
    add_filter('render_block_core/search', 'vistro_search_filter_form');
}