<?php
    $this->add_render_attribute( 'title', 'class', 'hero-1-title tx-split-text split-in-right-hero' );
?>

<div class="vst-hero-1-area add-class fix">

    <!-- bg-shape -->
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <img class="bg-shape-1" src="<?php echo esc_url($settings['image_1']['url']) ?>" alt="">
    <?php endif; ?>

    <?php if(!empty( $settings['image_2']['url'] )) : ?>
    <img class="bg-shape-2" src="<?php echo esc_url($settings['image_2']['url']) ?>" alt="">
    <?php endif; ?>

    <?php if( $settings['enable_dot_shape'] === 'yes' ) : ?>
    <div class="bg-shape-3">
        <span class="dote-shape"></span>
    </div>
    <?php endif; ?>

    <div class="vst-hero-1-wrap">

        <?php if(!empty( $settings['bg_image']['url'] )) : ?>
        <div class="hero-1-bg-img">
            <img src="<?php echo esc_url($settings['bg_image']['url']) ?>" alt="">
        </div>
        <?php endif; ?>

        <?php if( $settings['enable_time'] === 'yes' ) : ?>
        <div class="vst-hero-1-time wow fadeInRight" data-wow-duration="2s">
            <span id="clock" class="time" ><?php echo esc_html($settings['time']); ?></span>
            <span class="text"><?php echo esc_html($settings['time_zone']); ?></span>
        </div>
        <?php endif; ?>

        <!-- hero-content -->
        <div class="container h1-container">
            <div class="vst-hero-1-content">

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
                <p class="vst-pera-white-1 hero-1-pera wow fadeInUp" data-wow-duration="2s">
                    <?php echo elh_element_kses_intermediate($settings['description']); ?>
                </p>
                <?php endif; ?>

                <?php if( $settings['enable_button'] === 'yes' ) : ?>
                <a
                class="vst-btn-1 wow fadeInLeft"
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
    </div>
</div>