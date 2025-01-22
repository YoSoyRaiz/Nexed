<?php
    $this->add_render_attribute( 'title', 'class', 'hero-3-title h1-heading tx-split-text split-in-right-hero' );
?>
<div class="vst-hero-3-area fix">
    <div class="vst-hero-3-content" data-background="<?php echo $settings['bg_image']['url'] ? esc_url($settings['bg_image']['url']) : ''; ?>">
        <div class="container h1-container z-index-3">
            <div class="row align-items-center">

                <!-- title -->
                <div class="col-xl-6 col-lg-8">
                    <?php if( $settings['enable_sub_title'] === 'yes' ) : ?>
                    <h6 class="hero-3-subtitle h1-heading tx-split-text split-in-right-hero" data-wow-duration="2s">
                        <?php echo elh_element_kses_intermediate($settings['sub_title']); ?>
                    </h6>
                    <?php endif; ?>
                    <?php
                        if($settings['enable_title'] === 'yes') {
                            printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            );
                        }
                    ?>
                </div>

                <!-- list -->
                <div class="col-xl-3 col-lg-4">
                    <?php if($settings['enable_feature_list'] === 'yes') : ?>
                    <div class="vst-hero-3-feature">
                        <?php foreach($settings['list_items'] as $list) : ?>
                        <h5 class="name wow fadeInRight" data-wow-duration="2s">
                            <?php if($list['enable_icon'] === 'yes') : ?>
                            <span class="tx-icon">
                                <?php if($list['type'] == 'icon') : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $list['info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($list['info_image']['url']); ?>" alt="" />
                                <?php endif; ?>
                            </span>
                            <?php endif; ?>

                            <?php echo elh_element_kses_intermediate($list['info_text']); ?>
                        </h5>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- btn -->
                <div class="col-xl-3">
                    <div class="btn-wrap wow fadeInRight" data-wow-delay="1s" data-wow-duration="2s">
                        <?php if( $settings['enable_button'] === 'yes' ) : ?>
                        <a class="vst-btn-1"
                        href="<?php echo esc_url($settings['button_link']['url']); ?>"
                        target="<?php echo $settings['button_link']['is_external'] ? '_blank' : '_self'; ?>"
                        rel="<?php echo $settings['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
                        >
                            <?php echo elh_element_kses_intermediate($settings['button_text']); ?>
                            <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- slider -->
    <div class="vst-hero-3-slider-position">
        <div class="swiper vst-hero-3-slider">
            <div class="swiper-container hero_3_slider_active">
                <div class="swiper-wrapper">
                    <?php foreach($settings['slide_images'] as $slide ) : ?>
                    <div class="swiper-slide">
                        <div class="vst-hero-3-slider-item">
                            <?php if(!empty( $slide['slide_image']['url'] )) : ?>
                            <div class="main-img">
                                <img src="<?php echo esc_url($slide['slide_image']['url']); ?>" alt="">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if( $settings['enable_slide_nav'] === 'yes' ) : ?>
            <div class="vst-hero-3-slider-btn">
                <div class="hero_3_prev wow slideInLeft" data-wow-duration="2s">
                    <i class="fas fa-long-arrow-alt-left"></i>
                </div>
                <div class="hero_3_next wow slideInRight" data-wow-duration="2s">
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>