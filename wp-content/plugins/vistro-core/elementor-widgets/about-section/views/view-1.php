<?php
    $title = elh_element_kses_basic( $settings['title'] );
    $this->add_render_attribute( 'title', 'class', 'tx-title section-title-1 reveal-type' );
    $button_class = '';
    $button_center = '';
    if($settings['button_full_width'] == 'yes') {
        $button_class = 'fullWidth';
    } else {
        $button_class = '';
    }

    if($settings['button_center_align'] == 'yes') {
        $button_center = ' text-center';
    } else {
        $button_center = '';
    }
?>
<div class="vst-about-1-area pt-120 fix">

    <!-- bg-shape -->
    <?php if(!empty( $settings['shape_1']['url'] )) : ?>
    <img class="bg-shape-1" src="<?php echo esc_url($settings['shape_1']['url']); ?>" alt="">
    <?php endif; ?>

    <?php if(!empty( $settings['shape_2']['url'] )) : ?>
    <img class="bg-shape-2" src="<?php echo esc_url($settings['shape_2']['url']); ?>" alt="">
    <?php endif; ?>

    <?php if(!empty( $settings['shape_3']['url'] )) : ?>
    <img class="bg-shape-3" src="<?php echo esc_url($settings['shape_3']['url']); ?>" alt="">
    <?php endif; ?>

    <?php if(!empty( $settings['shape_4']['url'] )) : ?>
    <img class="bg-shape-4" src="<?php echo esc_url($settings['shape_4']['url']); ?>" alt="">
    <?php endif; ?>

    <?php if(!empty( $settings['shape_5']['url'] )) : ?>
    <img class="bg-shape-5" src="<?php echo esc_url($settings['shape_5']['url']); ?>" alt="">
    <?php endif; ?>

    <?php if( $settings['enable_shape_6'] === 'yes' ) : ?>
    <div class="bg-shape-6">
        <span class="dote-shape"></span>
    </div>
    <?php endif; ?>

    <?php if( $settings['enable_shape_7'] === 'yes' ) : ?>
    <div class="bg-shape-7">
        <span class="dote-shape"></span>
    </div>
    <?php endif; ?>

    <?php if( $settings['enable_shape_8'] === 'yes' ) : ?>
    <div class="bg-shape-8">
        <span class="dote-shape"></span>
    </div>
    <?php endif; ?>

    <?php if( $settings['enable_shape_9'] === 'yes' ) : ?>
    <div class="bg-shape-9">
        <span class="dote-shape"></span>
    </div>
    <?php endif; ?>

    <div class="container h1-container z-index-3">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="vst-about-1-left-content">
                    <div class="vst-section-title-1 mb-20">
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

                    <div class="vst-about-1-gallery-img mb-20 h1-animation">
                        <?php if(!empty( $settings['image_1']['url'] )) : ?>
                        <div class="img-1">
                            <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <?php if(!empty( $settings['image_2']['url'] )) : ?>
                        <div class="img-2">
                            <img src="<?php echo esc_url($settings['image_2']['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>
                    </div>

                    <?php if($settings['enable_description'] === 'yes') : ?>
                    <p class="tx-description vst-pera-white-1 about-1-pera wow <?php echo $settings['desc_anim_name'] ? esc_attr($settings['desc_anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['desc_anim_duration'] ? esc_attr($settings['desc_anim_duration']) : ''; ?>">
                        <?php echo elh_element_kses_intermediate($settings['description']); ?>
                    </p>
                    <?php endif; ?>

                    <div class="btn-wrapper <?php echo esc_attr($button_class . $button_center); ?>">
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

            <!-- about-right-content -->
            <div class="col-xl-6">
                <div class="vst-about-1-feature-wrap">
                    <?php foreach($settings['feature_lists'] as $list) : ?>
                    <div class="vst-about-1-feature-item mb-30 wow fadeInRight" data-wow-duration="1s">
                        <?php if($list['enable_icon'] === 'yes') : ?>
                        <div class="icon">
                            <?php if($list['type'] == 'icon') : ?>
                                <?php \Elementor\Icons_Manager::render_icon( $list['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url($list['image']['url']); ?>" alt="" />
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty( $list['title'] )) : ?>
                        <h4 class="h1-heading item-name">
                            <?php echo elh_element_kses_intermediate( $list['title'] ); ?>
                        </h4>
                        <?php endif; ?>

                        <?php if(!empty( $list['link']['url'] )) : ?>
                        <a class="item-btn"
                        href="<?php echo esc_url($list['link']['url']); ?>"
                        target="<?php echo $list['link']['is_external'] ? '_blank' : '_self'; ?>"
                        rel="<?php echo $list['link']['nofollow'] ? 'nofollow' : ''; ?>"
                        >
                            <?php \Elementor\Icons_Manager::render_icon( $list['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>