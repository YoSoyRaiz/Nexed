<?php
    $title = elh_element_kses_basic( $settings['title'] );
    $this->add_render_attribute( 'title', 'class', 'tx-title section-title-1 fs-53 reveal-type' );
?>
<div class="vst-benefit-1-area pt-130 pb-70">
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="" class="bg-img-1">
    <?php endif; ?>

    <div class="container h1-container z-index-3">
        <div class="vst-benefit-1-wrap">
            <div class="vst-benefit-1-content bg-default" data-background="<?php echo $settings['image_2']['url'] ? esc_url($settings['image_2']['url']) : ''; ?>">
                <div class="vst-section-title-1 mb-25">
                    <?php if(!empty( $settings['sub_title'] )) : ?>
                    <h6 class="vst-subtitle-1 wow fadeInDown" data-wow-duration="2">
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
                    <?php if(!empty( $settings['description'] )) : ?>
                    <p class="vst-pera-2 success-pera wow fadeInUp" data-wow-duration="2s">
                        <?php echo elh_element_kses_intermediate($settings['description']); ?>
                    </p>
                    <?php endif; ?>
                </div>

                <?php if(!empty( $settings['list_items'] )) : ?>
                <ul class="vst-success-3-feature mb-40 list-unstyled">
                    <?php foreach($settings['list_items'] as $list) : ?>
                    <li class="reveal-type">
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
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <div class="btn-wrap wow flipInX" data-wow-duration="1s">
                    <a class="vst-btn-1"
                    href="<?php echo $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : ''; ?>"
                    target="<?php echo $settings['button_link']['is_external'] ? '_blank' : '_self'; ?>"
                    rel="<?php echo $settings['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
                    >
                        <?php echo elh_element_kses_intermediate($settings['button_text']); ?>
                        <?php if($settings['enable_icon'] === 'yes') : ?>
                            <?php if($settings['type'] == 'icon') : ?>
                                <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
                            <?php endif; ?>
                        <?php endif; ?>
                    </a>
                </div>
            </div>

            <!-- right-content -->
            <div class="vst-benefit-1-slider-wrap">
                <div class="vst-benefit-1-slider swiper">
                    <div class="swiper-container benefit_1_main_active">
                        <div class="swiper-wrapper">
                            <?php foreach($settings['country_lists'] as $list) : ?>
                            <div class="swiper-slide">
                                <div class="vst-benefit-1-slider-item">
                                    <img src="<?php echo esc_url($list['image_1']['url']); ?>" alt="">
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- flaq-slider -->
                <div class="vst-benefit-1-slider-flaq swiper">
                    <div class="swiper-container benefit_1_flaq_active">
                        <div class="swiper-wrapper">
                            <?php foreach($settings['country_lists'] as $list) : ?>
                            <div class="swiper-slide">
                                <div class="vst-benefit-1-slider-item-flaq">
                                    <?php if($list['enable_icon'] === 'yes') : ?>
                                    <div class="img-wrap">
                                        <?php if($list['type'] == 'icon') : ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $list['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        <?php else : ?>
                                            <img src="<?php echo esc_url($list['image']['url']); ?>" alt="" />
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if(!empty( $list['title'] )) : ?>
                                    <h5 class="h1-heading">
                                        <?php echo elh_element_kses_intermediate( $list['title'] ); ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $list['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>