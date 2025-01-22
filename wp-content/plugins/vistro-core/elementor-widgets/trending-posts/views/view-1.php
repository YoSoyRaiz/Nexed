<div class="footer-blog-item-wrap">
        <?php
            if (!empty($posts)):
            foreach ( $posts as $inx => $post ):
            $title = $post->post_title;
            if ( 'selected' === $settings['show_post_by'] && array_key_exists( $post->ID, $customize_title ) ) {
                $title = $customize_title[$post->ID];
            }

            $thumb = get_the_post_thumbnail_url( $post->ID, 'large' );
            if ( 'selected' === $settings['show_post_by'] && array_key_exists( $post->ID, $customize_img ) && !empty( $customize_img[$post->ID]['url'] ) ) {
                $thumb = $customize_img[$post->ID]['url'];
            }

        ?>
    <div class="footer-blog-item-single">
        <?php if(!empty( $thumb && $settings['feature_image'] === 'yes' )) : ?>
        <div class="img-wrap">
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php if(function_exists('tf_img_alt_text')) { echo tf_img_alt_text($thumb); } ?>">
        </div>
        <?php endif; ?>
        <div class="content-wrap">
            <a class="h1-heading" href="<?php echo esc_url(get_the_permalink( $post->ID )); ?>"><?php echo esc_html($title); ?></a>
            <span class="date"><i class="fal fa-clock"></i> <?php print the_time( get_option( 'date_format' ) ); ?></span>
        </div>
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
</div>