<?php
    if (!empty($posts)):
    foreach ( $posts as $inx => $post ):
    $title = $post->post_title;

    if ( 'selected' === $settings['show_post_by'] && array_key_exists( $post->ID, $customize_title ) ) {
        $title = $customize_title[$post->ID];
    }

    $excerpt = $post->post_excerpt;
    if ( 'selected' === $settings['show_post_by'] && array_key_exists( $post->ID, $customize_text ) ) {
        $excerpt = $customize_text[$post->ID];
    }

    $thumb = get_the_post_thumbnail_url( $post->ID, 'large' );
    if ( 'selected' === $settings['show_post_by'] && array_key_exists( $post->ID, $customize_img ) && !empty( $customize_img[$post->ID]['url'] ) ) {
        $thumb = $customize_img[$post->ID]['url'];
    }

    // enable default date
    $enable_default_date = $settings['enable_default_date'];

?>
<div class="vst-blog-3-item-single blog-3-style-2 h1-animation">
    <div class="content-wrap">
        <div class="title-wrap mb-20">
            <h3 class="h1-heading title">
                <a href="<?php echo esc_url(get_the_permalink( $post->ID )); ?>"><?php echo esc_html($title); ?></a>
            </h3>
            <?php if ( 'yes' === $settings['meta'] && 'yes' === $settings['date_meta'] ): ?>
            <div class="vst-blog-3-date">
                <?php
                    if( 'yes' === $enable_default_date ) {
                        print '<span class="mounth">'.the_time( get_option( 'date_format' ) ).'</span>';
                    } else {
                        print '<span class="date">'.get_the_date( "d").'</span>
                        <span class="mounth">'.get_the_date( "M").'</span>';
                    }
                ?>
            </div>
            <?php endif; ?>
        </div>
        <?php if(!empty( $excerpt )) : ?>
        <p class="vst-pera-2"><?php echo esc_html($excerpt); ?></p>
        <?php endif; ?>
        <a class="vst-btn-1" href="<?php echo esc_url(get_the_permalink( $post->ID )); ?>">
            <?php echo elh_element_kses_intermediate($settings['button_text']); ?>
            <i class="fas fa-long-arrow-alt-right"></i>
        </a>
    </div>
    <?php if(!empty( $thumb && $settings['feature_image'] === 'yes' )) : ?>
    <div class="img-wrap">
        <img src="<?php echo esc_url($thumb); ?>" alt="<?php if(function_exists('tf_img_alt_text')) { echo tf_img_alt_text($thumb); } ?>" />
    </div>
    <?php endif; ?>
</div>
<?php endforeach;
    else:
        printf('%1$s %2$s %3$s',
            __('No ', 'vistro-core'),
            esc_html($settings['post_type']),
            __('Found', 'vistro-core')
        );
    endif;
?>