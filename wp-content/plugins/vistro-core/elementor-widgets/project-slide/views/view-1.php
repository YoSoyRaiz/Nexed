<?php if(!empty( $settings['project_slides'] )) : ?>
<div class="vst-project-1-area">
    <div class="swiper vst-project-1-slider">
        <div class="swiper-container project_1_slider_active">
            <div class="swiper-wrapper">
            <?php foreach($settings['project_slides'] as $list) :  ?>
                <div class="swiper-slide">
                    <div class="vst-project-1-item">
                        <?php if(!empty( $list['image']['url'] )) : ?>
                        <div class="img-wrap">
                            <img src="<?php echo esc_url($list['image']['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <div class="content-wrap">
                            <?php if(!empty( $list['button_icon'] )) : ?>
                            <div class="icon">
                                <?php \Elementor\Icons_Manager::render_icon( $list['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </div>
                            <?php endif; ?>
                            <div class="title-wrap">
                                <?php if(!empty( $list['tag'] )) : ?>
                                <span class="subtitle"><?php echo elh_element_kses_intermediate($list['tag']); ?></span>
                                <?php endif; ?>

                                <?php if(!empty( $list['title'] )) : ?>
                                <a class="title"
                                 href="<?php echo esc_url($list['button_link']['url']) ?>"
                                    target="<?php echo $list['button_link']['is_external'] ? '_blank' : '_self'; ?>"
                                    rel="<?php echo $list['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
                                 >
                                <?php echo elh_element_kses_intermediate($list['title']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <?php if( $settings['enable_slide_nav'] === 'yes' ) : ?>
        <div class="vst-project-1-slider-btn">
            <div class="project_1_prev">
                <i class="fas fa-long-arrow-alt-left"></i>
            </div>
            <div class="project_1_next">
                <i class="fas fa-long-arrow-alt-right"></i>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>