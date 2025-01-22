<div class="vst-service-3-area fix bg-default">
    <div class="container h1-container">
        <!-- slider -->
        <div class="swiper vst-service-3-slider mb-10">
            <div class="swiper-container services_3_slider_active">
                <div class="swiper-wrapper">
                    <?php foreach($settings['service_slides'] as $list) :  ?>
                    <div class="swiper-slide">
                        <div class="vst-service-3-item ">
                            <?php if(!empty( $list['title'] )) : ?>
                            <h3 class="h1-heading"><?php echo elh_element_kses_intermediate($list['title']); ?></h3>
                            <?php endif; ?>

                            <?php if(!empty( $list['image']['url'] )) : ?>
                            <div class="img-wrap">
                                <img src="<?php echo esc_url($list['image']['url']); ?>" alt="">
                            </div>
                            <?php endif; ?>

                            <?php if(!empty( $list['description'] )) : ?>
                            <p class="vst-pera-2"><?php echo elh_element_kses_intermediate($list['description']); ?></p>
                            <?php endif; ?>

                            <a class="s3-btn"
                            href="<?php echo esc_url($list['button_link']['url']) ?>"
                            target="<?php echo $list['button_link']['is_external'] ? '_blank' : '_self'; ?>"
                            rel="<?php echo $list['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
                            >
                                <?php echo elh_element_kses_intermediate($list['button_text']); ?>
                                <?php \Elementor\Icons_Manager::render_icon( $list['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php if( $settings['enable_slide_nav'] === 'yes' ) : ?>
        <div class="vst-service-3-slider-btn">
            <div class="service_3_prev wow slideInLeft" data-wow-duration="2s">
                <i class="fas fa-long-arrow-alt-left"></i>
            </div>
            <div class="service_3_next wow slideInRight" data-wow-duration="2s">
                <i class="fas fa-long-arrow-alt-right"></i>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>