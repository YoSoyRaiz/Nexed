<?php
$vistro_enable_blog_navigation = cs_get_option('vistro_enable_blog_navigation');
$vistro_prev_post = get_previous_post();
$prev_post_title = get_the_title($vistro_prev_post);
$vistro_next_post = get_next_post();
$next_post_title = get_the_title($vistro_next_post);
if( $vistro_enable_blog_navigation == true ) {
    if(!empty(get_previous_post() || get_next_post()) ) {
        ?>
        <div class="blog-details-next-post-wrap">
            <div class="post-item wow fadeInUp">
                <a class="btn" href="<?php print get_the_permalink($vistro_prev_post); ?>">
                <?php echo esc_html__('PREV POST', 'vistro'); ?></a>
                <a href="<?php print get_the_permalink($vistro_prev_post); ?>"><?php echo esc_html($prev_post_title); ?></a>
            </div>
            <div class="post-item wow fadeInUp" data-wow-delay=".3s">
                <a class="btn" href="<?php print get_the_permalink($vistro_next_post); ?>">
                <?php echo esc_html__('NEXT POST', 'vistro'); ?></a>
                <a href="<?php print get_the_permalink($vistro_next_post); ?>"><?php echo esc_html($next_post_title); ?></a>
            </div>
        </div>
    <?php
    }
}
?>