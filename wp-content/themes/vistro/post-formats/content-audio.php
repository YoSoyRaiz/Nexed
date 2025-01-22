<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vistro
 */
$id = get_the_ID();
$post_audio_metabox = get_post_meta($id, 'vistro_post_audio_meta', true) ? get_post_meta($id, 'vistro_post_audio_meta', true) : [];
$post_audio_link = array_key_exists('post_audio_link', $post_audio_metabox) ? $post_audio_metabox['post_audio_link'] : '';

$vistro_enable_social_share = cs_get_option( 'vistro_enable_social_share' );
$blog_button_text = cs_get_option( 'blog_button_text', __('Read More', 'vistro') );
$blog_button_icon = cs_get_option( 'blog_button_icon', 'fas fa-long-arrow-alt-right' );
$excerpt_length = cs_get_option( 'excerpt_length', 180 );
$enable_default_date = cs_get_option( 'enable_default_date' );
if($vistro_enable_social_share == true) {
    $tag_col = 'col-xl-6';
} else {
    $tag_col = 'col-xl-12';
}

if ( is_single() ):
?>
    <div class="blog-topContent-wrapper">
        <?php if ( has_post_thumbnail() == false && $post_audio_link == null  ) : ?>
        <div class="blog-details-header-meta-box position-static p-0">
            <span><i class="fal fa-user"></i>
                <?php echo __('By ', 'vistro') . get_the_author_meta( 'display_name' )?>
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
        <div class="blog-details-content pt-35">
            <div class="blog-details-inner-text mb-80">
                <?php the_content(); ?>
            </div>

            <?php if ( function_exists( 'vistro_social_share' ) && $vistro_enable_social_share == true || has_tag() ) : ?>
            <div class="blog-details-tag-share-wrap mb-80 fix">
                <div class="row align-items-center">
                    <?php if ( function_exists( 'vistro_social_share' ) && $vistro_enable_social_share == true ) : ?>
                    <div class="col-xl-6">
                        <div class="blog-details-share wow fadeInUp" data-wow-delay=".3s">
                            <?php print vistro_social_share();?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="<?php echo esc_attr($tag_col); ?>">
                        <div class="blog-details-tag wow fadeInUp ">
                            <?php if ( function_exists( 'vistro_get_tag' ) ) {
                                    print vistro_get_tag();
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="post-page-wrapper">
            <?php
                wp_link_pages( [
                    'before'      => '<div class="page-links mt-40 mb-55">' . esc_html__( 'Pages:', 'vistro' ),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ] );
            ?>
        </div>
    </div>

    <?php else: ?>

    <article id="post-<?php the_ID();?>" <?php post_class( 'tx-blog-box' );?>>
        <div class="vst-blog-3-item-single tx-default-blog pb-50 mt-0 ">
            <?php if ( $post_audio_link ): ?>
            <div class="img-wrap">
                <div class="postbox__audio embed-responsive">
                    <?php echo wp_oembed_get( $post_audio_link ); ?>
                </div>
            </div>
            <?php endif;?>
            <div class="content-wrap">
                <div class="title-wrap">
                    <?php if($enable_default_date == true) : ?>
                    <div class="vst-blog-3-date">
                        <span><?php the_time( get_option( 'date_format' ) );?></span>
                    </div>
                    <?php else : ?>
                    <div class="vst-blog-3-date">
                        <span class="date">
                            <?php echo get_the_date('d'); ?>
                        </span>
                        <span class="mounth">
                            <?php echo get_the_date('M'); ?>
                        </span>
                    </div>
                    <?php endif; ?>
                    <h3 class="h1-heading title">
                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                    </h3>
                </div>
                <?php if(!empty( get_the_excerpt() )) : ?>
                <p class="vst-pera-2 mt-20">
                    <?php
                        $excerpt = get_the_excerpt(); $excerpt = substr( $excerpt, 0, $excerpt_length );
                        echo esc_html($excerpt);
                    ?>
                </p>
                <?php endif; ?>
                <div class="btn-wrapper mt-30">
                    <a class="vst-btn-1" href="<?php the_permalink();?>">
                        <?php echo esc_html($blog_button_text); ?>
                        <?php if(!empty( $blog_button_icon )) : ?>
                        <i class="<?php echo esc_attr($blog_button_icon); ?>"></i>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </article>

<?php endif;?>
