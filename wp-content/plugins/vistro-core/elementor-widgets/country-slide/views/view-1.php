<?php
    $title = elh_element_kses_basic( $settings['title'] );
    $this->add_render_attribute( 'title', 'class', 'tx-title section-title-1 black reveal-type' );
?>
<div class="vst-services-1-ara ">
    <div class="container h1-container">
        <div class="vst-services-1-wrap h1-animation bg-default pt-80 pb-80" data-background="<?php echo $settings['image_1']['url'] ? esc_url($settings['image_1']['url']) : ''; ?>">

            <?php if(!empty( $settings['image_2']['url'] )) : ?>
            <img src="<?php echo esc_url($settings['image_2']['url']) ?>" alt="" class="bg-img-1" data-wow-duration="2s">
            <?php endif; ?>

            <!-- section-title -->
            <div class="vst-section-title-1 text-center mb-20">
                <?php if($settings['enable_sub_title'] === 'yes') : ?>
                <h6 class="vst-subtitle-1 tx-subTitle wow <?php echo $settings['sub_anim_name'] ? esc_attr($settings['sub_anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['sub_anim_duration'] ? esc_attr($settings['sub_anim_duration']) : ''; ?>">
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

            <!-- services-slider -->
            <div class="swiper vst-services-1-slider-wrap  mb-30">
                <div class="swiper-container services_1_slider_active">
                    <div class="swiper-wrapper">
                        <?php foreach($settings['country_lists'] as $list) : ?>
                        <div class="swiper-slide">
                            <div class="vst-services-1-slider-item">
                                <?php if($list['enable_icon'] === 'yes') : ?>
                                <div class="flaq">
                                    <?php if($list['type'] == 'icon') : ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $list['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($list['image']['url']); ?>" alt="" />
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>

                                <?php if(!empty( $list['link']['url'] )) : ?>
                                <a class="s-btn"
                                href="<?php echo esc_url($list['link']['url']); ?>"
                                target="<?php echo $list['link']['is_external'] ? '_blank' : '_self'; ?>"
                                rel="<?php echo $list['link']['nofollow'] ? 'nofollow' : ''; ?>"
                                >
                                    <?php echo elh_element_kses_intermediate( $list['title'] ); ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $list['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </a>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if(!empty( $settings['country_lists'] )) : ?>
                <div class="vst-services-1-slider-btn">
                    <div class="services_1_prev">
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </div>
                    <div class="services_1_next">
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </div>
                </div>
                <?php endif; ?>

            </div>

            <!-- services-content -->
            <div class="vst-services-1-content text-center">
                <?php if($settings['enable_description'] === 'yes') : ?>
                <p class="tx-description vst-pera-white-1 services-1-pera white-color wow <?php echo $settings['desc_anim_name'] ? esc_attr($settings['desc_anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['desc_anim_duration'] ? esc_attr($settings['desc_anim_duration']) : ''; ?>">
                    <?php echo elh_element_kses_intermediate($settings['description']); ?>
                </p>
                <?php endif; ?>

                <a class="vst-btn-1"
                data-wow-duration="1s"
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
    </div>
</div>