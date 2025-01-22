<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vistro
 */

?>

<section class="no-results not-found">
    <h1 class="blog-search-title"><?php esc_html_e( 'Nothing Found', 'vistro' );?></h1>

	<div class="pageontent blog-search-content mt-20 mb-10">
		<?php
            if ( is_home() && current_user_can( 'publish_posts' ) ):

            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'vistro' ),
                    [
                        'a' => [
                            'href' => [],
                        ],
                    ]
                ) . '</p>',
                esc_url( admin_url( 'post-new.php' ) )
            );

            elseif ( is_search() ):
        ?>

        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vistro' );?></p>

            <div class="search-wrap">
                <?php get_search_form(); ?>
            </div>
            <?php
            else:
        ?>

        <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'vistro' );?></p>

            <div class="search-wrap">
                <?php get_search_form(); ?>
            </div>
        <?php
            endif;
        ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
