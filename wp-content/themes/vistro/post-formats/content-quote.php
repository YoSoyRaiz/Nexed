<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vistro
 */
?>
<article id="post-<?php the_ID();?>" <?php post_class( 'tx-blog-box format-quote' );?>>
    <div class="vst-blog-3-item-single tx-default-blog pb-50 mt-0 ">
        <div class="content-wrap">
            <?php if(!empty( get_the_excerpt() )) : ?>
            <p class="vst-pera-2">
                <?php the_excerpt();?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</article>