<div class="vst-testimonial-3-slider swiper">
    <div class="swiper-container testimonial_3_active">
        <div class="swiper-wrapper">
            <?php foreach($settings['testimonial_lists'] as $testimonial_list) : ?>
            <div class="swiper-slide">
                <div class="vst-testimonial-3-slider-item">
                    <div class="frist-card mb-15">
                        <?php if(!empty( $testimonial_list['author_image']['url'] )) : ?>
                        <div class="img-wrap">
                            <img src="<?php echo esc_url($testimonial_list['author_image']['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <i class="flaticon-left-quote"></i>
                        <div class="fc-content">
                            <?php if(!empty( $testimonial_list['name'] )) : ?>
                            <h4 class="h1-heading name"><?php echo esc_html($testimonial_list['name']); ?></h4>
                            <?php endif; ?>

                            <?php if(!empty( $testimonial_list['designation'] )) : ?>
                            <h6 class="h1-heading bio"><?php echo esc_html($testimonial_list['designation']); ?></h6>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="secend-card-wrap">
                        <div class="secend-card mb-25">
                            <?php if(!empty( $testimonial_list['author_image']['url'] )) : ?>
                            <div class="img-wrap">
                                <img src="<?php echo esc_url($testimonial_list['author_image']['url']); ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="fc-content">
                                <i class="flaticon-left-quote"></i>
                                <?php if(!empty( $testimonial_list['name'] )) : ?>
                                <h4 class="h1-heading name"><?php echo esc_html($testimonial_list['name']); ?></h4>
                                <?php endif; ?>

                                <?php if(!empty( $testimonial_list['designation'] )) : ?>
                                <h6 class="h1-heading bio"><?php echo esc_html($testimonial_list['designation']); ?></h6>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if(!empty( $testimonial_list['comment'] )) : ?>
                        <p class="vst-pera-2"><?php echo elh_element_kses_intermediate($testimonial_list['comment']); ?></p>
                        <?php endif; ?>
                        <div class="ratting">
                            <?php
                                for ( $i = 1; $i < $testimonial_list['rating_star']; $i++ ) {
                                    echo '<i class="fas fa-star"></i>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>