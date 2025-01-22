<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vistro
 */

get_header();

$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 'col-xxl-8 col-xl-8 col-lg-8' : 'col-xxl-12 col-xl-12 col-lg-12';
?>

<div class="tx-blog-area pt-110 pb-110">
    <div class="container">
        <div class="row g-0">
			<div class="<?php print esc_attr( $blog_column );?>">
				<div class="blog__wrapper blog-details-left pr-40">
					<?php
						if ( have_posts() ):
    					if ( is_home() && !is_front_page() ):
    				?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title();?></h1>
					</header>

					<?php
						endif;
							/* Start the Loop */
							while ( have_posts() ): the_post();
								get_template_part( 'post-formats/content', get_post_format() );
							endwhile;
						?>
						<div class="pagination-outer text-center tx-pagination">
							<?php
								vistro_pagination( '
									<i class="fal fa-arrow-left"></i>  '.esc_html__('prew', 'vistro').'',
									''.esc_html__('next', 'vistro').' <i class="fal fa-arrow-right"></i>  ',
									'',
									['class' => '']
								);
							?>
						</div>
						<?php
						else:
							get_template_part( 'post-formats/content', 'none' );
						endif;
					?>
				</div>
			</div>

			<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
			<div class="col-xxl-4 col-xl-4 col-lg-4">
				<div class="tx-sidebarWrapper sidebar-wrap margin-left-10 mt-none-30">
					<?php get_sidebar();?>
				</div>
			</div>
			<?php endif;?>
        </div>
    </div>
</div>

<?php
get_footer();
