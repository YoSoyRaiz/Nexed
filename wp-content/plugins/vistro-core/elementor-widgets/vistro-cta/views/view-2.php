<div class="vst-serving-2-area bg-default " data-background="<?php echo $settings['bg_image']['url'] ? esc_url($settings['bg_image']['url']) : ''; ?>">
    <div class="container h1-container">
        <div class="vst-serving-2-content">
            <?php if(!empty( $settings['sub_title'] )) : ?>
                <h5 class="h1-heading subtitle wow fadeInDown" data-wow-duration="2s">
                    <?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?>
                </h5>
            <?php endif; ?>

            <?php if(!empty( $settings['title'] )) : ?>
                <h3 class="h1-heading title reveal-type"><?php echo elh_element_kses_intermediate( $settings['title'] ); ?></h3>
            <?php endif; ?>

            <a
            href="<?php echo $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : ''; ?>"
            target="<?php echo $settings['button_link']['is_external'] ? '_blank' : '_self'; ?>"
            rel="<?php echo $settings['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
            class="vst-btn-1 wow fadeInUp" data-wow-duration="1s">
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
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <div class="vst-serving-2-img wow fadeInUp">
        <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
    </div>
    <?php endif; ?>

    <?php if(!empty( $settings['image_2']['url'] )) : ?>
    <img src="<?php echo esc_url($settings['image_2']['url']); ?>" alt="" class="bg-shape-1 ">
    <?php endif; ?>

    <?php if(!empty( $settings['image_3']['url'] )) : ?>
    <img src="<?php echo esc_url($settings['image_3']['url']); ?>" alt="" class="bg-shape-2 ">
    <?php endif; ?>

    <?php if(!empty( $settings['image_4']['url'] )) : ?>
    <img src="<?php echo esc_url($settings['image_4']['url']); ?>" alt="" class="bg-shape-3 ">
    <?php endif; ?>
</div>