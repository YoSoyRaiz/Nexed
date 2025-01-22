<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vistro
 */

get_header();

if(!empty( VISTRO_CORE )) {
	$blog_details_wrapper = 'tx-detailsWrapper__prev';
}else {
	$blog_details_wrapper = 'tx-detailsWrapper__unit';
}
$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 'col-xxl-8 col-xl-8 col-lg-8' : 'col-xxl-12 col-xl-12 col-lg-12';



$id = get_the_ID();
// post format video
$post_video_metabox = get_post_meta($id, 'vistro_post_video_meta', true) ? get_post_meta($id, 'vistro_post_video_meta', true) : [];
$post_video_link = array_key_exists('post_video_link', $post_video_metabox) ? $post_video_metabox['post_video_link'] : '';

// post format gallery
$post_gallery_metabox = get_post_meta($id, 'vistro_post_gallery_meta', true) ? get_post_meta($id, 'vistro_post_gallery_meta', true) : [];
$gallery_images = array_key_exists('post_gallery_images', $post_gallery_metabox) ? $post_gallery_metabox['post_gallery_images'] : '';
$gallery_ids = explode( ',', $gallery_images );
$gallery_class = $gallery_ids != null ? 'tx-blog-gallery d-none' : '';

// post format audio
$post_audio_metabox = get_post_meta($id, 'vistro_post_audio_meta', true) ? get_post_meta($id, 'vistro_post_audio_meta', true) : [];
$post_audio_link = array_key_exists('post_audio_link', $post_audio_metabox) ? $post_audio_metabox['post_audio_link'] : '';

$has_thumb = '';
if ( has_post_thumbnail() || !empty($gallery_ids) || $post_video_link || $post_audio_link  ) {
    $has_thumb = 'has-thumbnail';
} else {
    $has_thumb = 'has-nOthumbnail';
}
?>

<div class="tx-blog-area blog-details-area pt-110 pb-110">
    <div class="container">
		<div class="row g-0">
			<?php
				while ( have_posts() ):
				the_post();
				if ( has_post_thumbnail() || $post_video_link || $post_audio_link  || !empty($gallery_ids) ) :
			?>
			<div class="col-12">
				<div class="blog-details-header-img <?php echo esc_attr($has_thumb . ' ' . get_post_format()); ?>">

					<?php if ( get_post_format() == 'video' && has_post_thumbnail() ) : ?>
						<div class="img">
							<a class="d-block popup-video" href="<?php echo esc_url($post_video_link); ?>">
								<?php the_post_thumbnail( 'full', ['class' => 'img-responsive w-100'] ); ?>
							</a>
						</div>
						<?php if(!empty( $post_video_link )) : ?>
						<div class="blog-details-video-btn wow fadeIn" data-wow-delay=".3s">
							<a href="<?php echo esc_url($post_video_link); ?>" class="popup-video"><i class="fas fa-play"></i></a>
						</div>
						<?php endif; ?>

					<?php elseif ( get_post_format() == 'gallery' && !empty($gallery_ids) ) : ?>
					<div class="img <?php echo esc_attr($gallery_class); ?>">
						<div class="format-gallery">
							<div class="swiper-container" data-txPostGallery>
								<div class="swiper-wrapper">
									<?php foreach ( $gallery_ids as $gallery_item_id  ): ?>
									<div class="swiper-slide">
										<div class="tx-thumb w-100">
											<?php echo wp_get_attachment_image( $gallery_item_id, 'full' ); ?>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
							</div>
							<div class="tx-slideNav tx-slideNav__styleMiddle tx-slideNav__styleLight">
								<div class="swiper-button-prev">
									<i class="far fa-arrow-left"></i>
								</div>
								<div class="swiper-button-next">
									<i class="far fa-arrow-right"></i>
								</div>
							</div>
						</div>
					</div>
					<?php elseif ( get_post_format() == 'audio' ) : ?>

					<?php if ( $post_audio_link ): ?>
					<div class="blog-detail_image">
						<div class="postbox__audio embed-responsive">
							<?php echo wp_oembed_get( $post_audio_link ); ?>
						</div>
					</div>
					<?php endif; ?>

					<?php else : ?>
						<?php if( has_post_thumbnail() ) : ?>
						<div class="img">
							<?php the_post_thumbnail( 'full', ['class' => 'img-responsive w-100'] ); ?>
						</div>
						<?php endif; ?>
					<?php endif; ?>

					<?php if( has_post_thumbnail() ) : ?>
					<div class="blog-details-header-meta-box">
						<span><i class="fal fa-user"></i>
							<?php echo esc_html__('By ', 'vistro') . get_the_author_meta( 'display_name' )?>
						</span>
						<span><i class="fal fa-calendar"></i><?php the_time( get_option( 'date_format' ) );?></span>
						<span><i class="fal fa-comment"></i>
							<?php echo get_comments_number();
								$comment_count = get_comments_number();
								if ( $comment_count === '1' ) {
									echo __( ' Comment', 'vistro' );
								} else {
									echo __( ' Comments', 'vistro' );
								}
							?>
						</span>
					</div>
					<?php endif; ?>

				</div>
			</div>
			<?php endif; endwhile; ?>
			<div class="<?php print esc_attr( $blog_column );?>">
				<div class="tx-detailsWrapper <?php echo esc_attr($blog_details_wrapper); ?>">
					<div class="blog-details-left pr-40">
						<?php
							while ( have_posts() ):
							the_post();
							get_template_part( 'post-formats/content', get_post_format() );

							if(VISTRO_CORE) {
								if(!empty(get_previous_post() || get_next_post()) ) {
									get_template_part( 'post-formats/content', 'related-post' );
								}
							} else if(comments_open() || get_comments_number()) {
								echo '<div class="mt-50"></div>';
							} else {
								echo '<div class="d-none"></div>';
							}

						?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ): ?>
						<div class="comments-area">
							<div class="tx-commentsWrapper blog-details-comments-wrap mt-75">
								<?php comments_template(); ?>
							</div>
						</div>
						<?php
							endif;
							endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>

			<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
			<div class="col-xxl-4 col-xl-4 col-lg-4">
				<div class="tx-sidebarWrapper sidebar-wrap margin-left-10 mt-none-30 <?php echo esc_attr($has_thumb); ?>">
					<?php get_sidebar();?>
				</div>
			</div>
			<?php endif;?>
        </div>
    </div>
</div>

<?php
get_footer();
