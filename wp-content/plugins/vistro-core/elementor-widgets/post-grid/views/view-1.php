<?php
    // choose columns
    $col = 'col-xl-4 col-lg-6 col-md-6';
    if ( $settings['columns'] == 'column_1' ) {
        $col = 'col-xl-12 col-lg-12 col-md-12';
    } elseif ( $settings['columns'] == 'column_2' ) {
        $col = 'col-xl-6 col-lg-6 col-md-6';
    } elseif ( $settings['columns'] == 'column_3' ) {
        $col = 'col-xl-4 col-lg-6 col-md-6';
    } elseif ( $settings['columns'] == 'column_4' ) {
        $col = 'col-xl-3 col-lg-6 col-md-6';
    } else {
        $col = 'col-xl-4 col-lg-6 col-md-6';
    }
?>
<div class="vst-blog-1-area">
    <div class="container h1-container">
        <div class="row">
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

                $author_name = get_the_author_meta( 'display_name', $post->post_author );

                // get post categories
                $categories = get_the_category( $post->ID );
                $cat_name = '';

                if ( !empty( $categories ) ) {
                    $cat_name = $categories[0]->name;
                }

                // enable default date
                $enable_default_date = $settings['enable_default_date'];

            ?>
            <div class="<?php echo esc_attr( $col ); ?>">
                <div class="vst-blog-1-item wow <?php echo $settings['anim_name'] ? esc_attr($settings['anim_name']) : ''; ?> " data-wow-duration="<?php echo $settings['anim_duration'] ? esc_attr($settings['anim_duration']) : ''; ?>">

                    <!-- img -->
                    <div class="img-wrap">
                        <?php if(!empty( $thumb && $settings['feature_image'] === 'yes' )) : ?>
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php if(function_exists('tf_img_alt_text')) { echo tf_img_alt_text($thumb); } ?>" />
                        <?php endif; ?>

                        <?php if ( 'yes' === $settings['meta'] && 'yes' === $settings['date_meta'] ): ?>
                        <div class="date-wrap">
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

                    <!-- content -->
                    <div class="vst-blog-1-item-content">
                        <div class="content-wrap">
                            <div class="meta-content">
                                <?php if ( 'yes' === $settings['meta'] && 'yes' === $settings['author_meta'] ): ?>
                                <a class="author" href="#">
                                    <i class="fas fa-user"></i>
                                    <?php echo esc_html__('by', 'vistro-core'); ?>
                                    <?php echo esc_html($author_name); ?>
                                </a>
                                <?php endif; ?>
                                <?php
                                    if ( 'yes' === $settings['meta'] && 'yes' === $settings['categories_meta'] && !empty( $categories ) ) {
                                        $cat_link = get_category_link( $categories[0]->term_id );
                                        echo '<a class="tags" href="' . esc_url($cat_link) . '"><i class="fas fa-tag"></i>' . esc_html($cat_name) . '</a>';
                                    }
                                ?>
                            </div>
                            <div class="title-wrap">
                                <h2 class="title h1-heading">
                                    <a href="<?php echo esc_url(get_the_permalink( $post->ID )); ?>"><?php echo esc_html($title); ?></a>
                                </h2>
                                <?php if(!empty( $excerpt )) : ?>
                                <p class="vst-pera-2"><?php echo esc_html($excerpt); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

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
    </div>
</div>