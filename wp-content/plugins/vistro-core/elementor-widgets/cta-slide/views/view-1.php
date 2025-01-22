<div class="vst-testimonial-1-img-slider swiper">
    <div class="swiper-container testimonial_1_active ">
        <div class="swiper-wrapper">
        <?php foreach($settings['cta_slides'] as $list) :  ?>
            <div class="swiper-slide">
                <div class="vst-testimonial-1-img-item">
                    <?php if(!empty( $list['image']['url'] )) : ?>
                    <div class="img-wrap">
                        <img src="<?php echo esc_url($list['image']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="content-wrap">
                        <?php if(!empty( $list['title'] )) : ?>
                        <h4 class="titile"><?php echo elh_element_kses_intermediate($list['title']); ?></h4>
                        <?php endif; ?>
                        <a class="vst-btn-1"
                        href="<?php echo esc_url($list['button_link']['url']) ?>"
                        target="<?php echo $list['button_link']['is_external'] ? '_blank' : '_self'; ?>"
                        rel="<?php echo $list['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
                        >
                            <?php echo esc_html($list['button_text']); ?>
                            <?php \Elementor\Icons_Manager::render_icon( $list['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>

</div>