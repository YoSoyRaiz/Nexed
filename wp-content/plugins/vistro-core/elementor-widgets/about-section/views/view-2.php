<?php
    $title = elh_element_kses_basic( $settings['title'] );
    $this->add_render_attribute( 'title', 'class', 'tx-title section-title-1 black reveal-type' );
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
<div class="vst-success-2-area bg-default h1-animation">
    <div class="container h1-container">
        <div class="vst-success-2-wrap">

            <!-- img -->
            <div class="vst-success-2-img">
                <?php if(!empty( $settings['image_1']['url'] )) : ?>
                <div class="main-img">
                    <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
                </div>
                <?php endif; ?>

                <?php if(!empty( $settings['image_2']['url'] )) : ?>
                <div class="secend-img">
                    <img src="<?php echo esc_url($settings['image_2']['url']); ?>" alt="">
                </div>
                <?php endif; ?>
            </div>

            <div class="vst-success-1-content">
                <div class="vst-section-title-1 mb-45">
                    <?php if(!empty( $settings['sub_title'] )) : ?>
                    <h6 class="vst-subtitle-1 wow fadeInRight" data-wow-duration="2s" >
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

                <div class="vst-success-1-content-margin">

                    <?php if($settings['enable_description'] === 'yes') : ?>
                    <p class="tx-description vst-pera-2 success-pera wow <?php echo $settings['desc_anim_name'] ? esc_attr($settings['desc_anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['desc_anim_duration'] ? esc_attr($settings['desc_anim_duration']) : ''; ?>">
                        <?php echo elh_element_kses_intermediate($settings['description']); ?>
                    </p>
                    <?php endif; ?>

                    <!-- feature -->
                    <div class="vst-success-1-progress mb-35 wow fadeInUp" data-wow-duration="1s">
                        <div class="title-wrap">
                            <span class="name"><?php echo elh_element_kses_intermediate($settings['progress_title']); ?></span>
                            <span class="parcent"><?php echo $settings['progress_value']['size'] ? esc_attr($settings['progress_value']['size']) : ''; ?>%</span>
                        </div>
                        <div class="progress-wrap">
                            <span class="s-progress wow slideInLeft" data-wow-duration="1s"></span>
                        </div>
                    </div>

                    <!-- feature-list -->
                    <div class="vst-success-1-feature-list feature-list-2 mb-45 wow fadeInUp " data-wow-duration="2s">
                        <?php foreach($settings['feature_lists'] as $list) : ?>
                        <h5 class="name">
                            <?php if($list['enable_icon'] === 'yes') : ?>
                            <span class="icon">
                                <?php if($list['type'] == 'icon') : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $list['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($list['image']['url']); ?>" alt="" />
                                <?php endif; ?>
                            </span>
                            <?php endif; ?>
                            <?php echo elh_element_kses_intermediate( $list['title'] ); ?>
                        </h5>
                        <?php endforeach; ?>
                    </div>

                    <!-- btn -->
                    <div class="btn-wrapper btn-wrap <?php echo esc_attr($button_class . $button_center); ?> wow" data-wow-duration="2s">
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
            </div>
        </div>
    </div>
</div>