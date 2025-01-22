<?php
    $this->add_render_attribute( 'title', 'class', 'hero-1-title tx-split-text split-in-right-hero' );
?>
<div class="vst-hero-1-area vst-hero-2 add-class fix">
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <img class="h2-bg-shape-1" src="<?php echo esc_url($settings['image_1']['url']) ?>" alt="">
    <?php endif; ?>

    <?php if(!empty( $settings['image_2']['url'] )) : ?>
    <img class="h2-bg-shape-2" src="<?php echo esc_url($settings['image_2']['url']) ?>" alt="">
    <?php endif; ?>

    <?php if(!empty( $settings['image_3']['url'] )) : ?>
    <img class="h2-bg-shape-3" src="<?php echo esc_url($settings['image_3']['url']) ?>" alt="">
    <?php endif; ?>

    <div class="vst-hero-1-wrap">

        <!-- hero-content -->
        <div class="container h1-container">
            <div class="vst-hero-1-content hero-2">
                <?php if( $settings['enable_sub_title'] === 'yes' ) : ?>
                <h6 class="vst-subtitle-1 wow fadeInLeft" data-wow-duration="2s">
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

                <?php if( $settings['enable_description'] === 'yes' ) : ?>
                <p class="vst-pera-white-1 hero-1-pera wow fadeInUp" data-wow-duration="2s" >
                    <?php echo elh_element_kses_intermediate($settings['description']); ?>
                </p>
                <?php endif; ?>

                <?php IF($settings['enable_feature_list'] === 'yes') : ?>
                <div class="vst-hero-2-feature mb-40">
                    <?php foreach($settings['list_items'] as $list) : ?>
                    <h5 class="name wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
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

                <?php if( $settings['enable_button'] === 'yes' ) : ?>
                <a class="vst-btn-1 wow fadeInLeft"
                data-wow-duration="2s"
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

        <!-- bg-img -->
        <div class="vst-hero-2-bg-img-position">
            <div class="vst-hero-2-bg-img wow slideInRight" data-wow-duration="3s">
                <?php if(!empty( $settings['bg_image']['url'] )) : ?>
                <img class="main-img" src="<?php echo esc_url($settings['bg_image']['url']) ?>" alt="">
                <?php endif; ?>

                <?php if(!empty( $settings['image_4']['url'] )) : ?>
                <div class="flaq-img">
                    <img src="<?php echo esc_url($settings['image_4']['url']) ?>" alt="">
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>