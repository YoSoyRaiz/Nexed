<div class="vst-testimonial-2-area">
    <div class="container h1-container">
        <div class="swiper vst-testimonial-2-wrap bg-default pt-80 pb-110" data-background="<?php echo $settings['bg_image']['url'] ? esc_url($settings['bg_image']['url']) : ''; ?>">
            <div class="swiper-container testimonial_2_active">
                <div class="swiper-wrapper">
                    <?php foreach($settings['testimonial_lists'] as $testimonial_list) : ?>
                    <div class="swiper-slide">
                        <div class="vst-testimonial-2-item">
                            <?php if(!empty( $testimonial_list['author_image']['url'] )) : ?>
                            <div class="img-wrap">
                                <img src="<?php echo esc_url($testimonial_list['author_image']['url']); ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <?php if(!empty( $testimonial_list['comment'] )) : ?>
                            <p class="h1-heading comment"><?php echo elh_element_kses_intermediate($testimonial_list['comment']); ?></p>
                            <?php endif; ?>
                            <div class="reating">
                                <?php
                                    for ( $i = 1; $i < $testimonial_list['rating_star']; $i++ ) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                ?>
                            </div>
                            <h6 class="h1-heading name">
                                <?php echo esc_html($testimonial_list['name']); ?>
                                <?php if(!empty( $testimonial_list['designation'] )) : ?>
                                <span> <?php echo esc_html($testimonial_list['designation']); ?></span>
                                <?php endif; ?>
                            </h6>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>